<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список блюд</title>
</head>
<body>
<h1>Список блюд</h1>

<table border="2" width="100%" cellspacing="2" cellpadding="5">
    <thead>
    <tr>
        <th border="2">ID</th>
        <th border="2">Название</th>
        <th border="2">Категория</th>
        <th border="2">Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($dishes as $dish)
        <tr>
            <td border="2">{{ $dish->id }}</td>
            <td border="2">{{ $dish->name }}</td>
            <td border="2">{{ $dish->category->name ?? 'Нет категории' }}</td>
            <td border="2">
                <form action="/dishes/{{ $dish->id }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить это блюдо?')">Удалить</button>
                </form>
                <a href="/dishes/{{ $dish->id }}/edit">Редактировать</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $dishes->links() }}

<a href="/dishes/create">Добавить новое блюдо</a>
</body>
</html>
