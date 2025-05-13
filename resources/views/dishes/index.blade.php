<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список блюд</title>
</head>
<body>
<h1>Список блюд</h1>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Категория</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($dishes as $dish)
        <tr>
            <td>{{ $dish->id }}</td>
            <td>{{ $dish->name }}</td>
            <td>{{ $dish->category->name ?? 'Нет категории' }}</td>
            <td>
                <a href="{{ route('dishes.edit', $dish->id) }}">Редактировать</a>
                <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить это блюдо?')">Удалить</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<a href="{{ route('dishes.create') }}">Добавить новое блюдо</a>
</body>
</html>
