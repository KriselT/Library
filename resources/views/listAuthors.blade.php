<h1>Top 3 authors</h1>
<ol>
@foreach ($results as $result)
    <li>{{ $result->author }} with {{$result->number_of_books}} books</li>
@endforeach
</ol>
