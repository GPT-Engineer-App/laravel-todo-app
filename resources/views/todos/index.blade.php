<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
</head>
<body>
    <div class="container">
        <h1>Todo List</h1>
        <form action="/todo" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Add new todo">
            <button type="submit">Add</button>
        </form>
        <ul>
            @foreach ($todos as $todo)
                <li>
                    {{ $todo->title }}
                    <form action="/todo/{{ $todo->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <form action="/todo/{{ $todo->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="checkbox" name="completed" {{ $todo->completed ? 'checked' : '' }} onchange="this.form.submit()">
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>