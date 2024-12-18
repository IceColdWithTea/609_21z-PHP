<h1>Ингредиент: {{ $ingredient->name }}</h1>
<p>Единица измерения: {{ $ingredient->measurement_unit }}</p>
<h2>Используется в блюдах:</h2>
<ul>
    @foreach($ingredient->dishes as $dish)
        <li>{{ $dish->name }} - {{ $dish->pivot->amount }} {{ $ingredient->measurement_unit }}</li>
    @endforeach
</ul>

