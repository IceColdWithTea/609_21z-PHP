<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание нового блюда</title>
</head>
<body>
<h1>Создание нового блюда</h1>

<form action="/dishes" method="POST">
    @csrf

    <div>
        <label for="name">Название блюда:</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div>
        <label for="category_id">Категория:</label>
        <select id="category_id" name="category_id" required>
            <option value="">-- Выберите категорию --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Способ приготовления:</label><br>
        <input type="radio" id="method_boiling" name="cooking_method" value="Варить">
        <label for="method_boiling">Варка</label><br>
        <input type="radio" id="method_frying" name="cooking_method" value="Жарить">
        <label for="method_frying">Жарка</label><br>
        <input type="radio" id="method_baking" name="cooking_method" value="Запекать">
        <label for="method_baking">Запекание</label><br>
        <input type="radio" id="method_baking" name="cooking_method" value="Смешать">
        <label for="method_baking">Смешивание</label><br>
        <input type="radio" id="method_baking" name="cooking_method" value="Заморозить">
        <label for="method_baking">Заморозка</label>
    </div>

    <div>
        <label for="cooking_time">Время приготовления (в минутах):</label>
        <input type="number" id="cooking_time" name="cooking_time" min="1">
    </div>

    <button type="submit">Сохранить блюдо</button>
</form>

<a href="/dishes">Назад к списку блюд</a>
</body>
</html>
