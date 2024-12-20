<h1>Блюда</h1>
<ul>
    @foreach($dishes as $dish)
        <li><a href="{{ route('dishes.show', $dish->id) }}">{{ $dish->name }}</a></li>
    @endforeach
</ul>
