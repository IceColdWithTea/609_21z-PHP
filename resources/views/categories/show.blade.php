<h1>Категория: {{ $category->name }}</h1>

<h2>Блюда:</h2>
<ul>
    @foreach($category->dishes as $dish)
        <li>
            <a href="{{ route('dishes.show', $dish->id) }}">
                {{ $dish->name }}
            </a>
        </li>
    @endforeach
</ul>
