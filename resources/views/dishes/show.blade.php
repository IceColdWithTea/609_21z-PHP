<h1>{{ $dish->name }}</h1>
<p>Метод приготовления: {{ $dish->cooking_method }}</p>
<p>Время готовки: {{ $dish->cooking_time }} minutes</p>
<h2>Ингредиенты</h2>
<ul>
    @foreach($dish->ingredients as $ingredient)
        <li>{{ $ingredient->name }} ({{ $ingredient->pivot->quantity }})</li>
    @endforeach
</ul>
<a href="{{ route('categories.show', $dish->category->id) }}">Вернуться в категорию</a>
