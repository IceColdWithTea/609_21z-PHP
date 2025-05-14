<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование блюда</title>
</head>
<body>
<h1>Редактирование блюда</h1>

<form action="{{ route('dishes.update', $dish->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Название блюда:</label>
        <input type="text" id="name" name="name" value="{{ $dish->name }}" required>
    </div>

    <div>
        <label for="category_id">Категория:</label>
        <select id="category_id" name="category_id" required>
            <option style="display:none" value="">-- Выберите категорию --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $dish->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Способ приготовления:</label><br>
        <input type="radio" id="method_boiling" name="cooking_method" value="Варить" {{ $dish->cooking_method == 'Варить' ? 'checked' : '' }}>
        <label for="method_boiling">Варка</label><br>
        <input type="radio" id="method_frying" name="cooking_method" value="Жарить" {{ $dish->cooking_method == 'Жарить' ? 'checked' : '' }}>
        <label for="method_frying">Жарка</label><br>
        <input type="radio" id="method_baking" name="cooking_method" value="Запекать" {{ $dish->cooking_method == 'Запекать' ? 'checked' : '' }}>
        <label for="method_baking">Запекание</label><br>
        <input type="radio" id="method_mixing" name="cooking_method" value="Смешать" {{ $dish->cooking_method == 'Смешать' ? 'checked' : '' }}>
        <label for="method_mixing">Смешивание</label><br>
        <input type="radio" id="method_freezing" name="cooking_method" value="Заморозить" {{ $dish->cooking_method == 'Заморозить' ? 'checked' : '' }}>
        <label for="method_freezing">Заморозка</label>
    </div>

    <div>
        <label for="cooking_time">Время приготовления (в минутах):</label>
        <input type="number" id="cooking_time" name="cooking_time" min="1" value="{{ $dish->cooking_time }}">
    </div>

    <button type="submit">Сохранить изменения</button>
</form>

<a href="{{ route('dishes.index') }}">Назад к списку блюд</a>
</body>
</html>
