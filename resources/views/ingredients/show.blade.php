<h1>{{ $ingredient->name }}</h1>
<h2>Блюда</h2>
<ul>
    @foreach($ingredient->dishes as $dish)
        <li>{{ $dish->name }} ({{ $dish->pivot->quantity }})</li>
    @endforeach
</ul>
