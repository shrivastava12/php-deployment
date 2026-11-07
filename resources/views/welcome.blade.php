<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel on EC2</title>
    <style>
        body { font-family: sans-serif; max-width: 500px; margin: 40px auto; }
        li { display: flex; gap: 8px; align-items: center; margin: 6px 0; }
        .done { text-decoration: line-through; color: #888; }
        .error { color: red; }
    </style>
</head>
<body>
    <h1>Tasks (running on EC2 + Nginx)</h1>

    @error('title') <p class="error">{{ $message }}</p> @enderror

    <form method="POST" action="/tasks">
        @csrf
        <input name="title" placeholder="New task" required>
        <button>Add</button>
    </form>

    <ul>
    @foreach ($tasks as $task)
        <li>
            <form method="POST" action="/tasks/{{ $task->id }}">
                @csrf @method('PATCH')
                <button>{{ $task->done ? '↩' : '✔' }}</button>
            </form>
            <span class="{{ $task->done ? 'done' : '' }}">{{ $task->title }}</span>
            <form method="POST" action="/tasks/{{ $task->id }}">
                @csrf @method('DELETE')
                <button>🗑</button>
            </form>
        </li>
    @endforeach
    </ul>
</body>
</html>