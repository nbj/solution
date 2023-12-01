<ol>
    @foreach ($categories as $category)
        <li>{{ $category->title }}</li>
        <ol>
            @foreach ($category->events as $event)
                <li>{{ $event->title }} ({{ $event->start_date->format('j. F Y') }})</li>
            @endforeach
        </ol>
    @endforeach
</ol>
