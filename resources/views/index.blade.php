<ul>
    @foreach($requests as $request)
        <li>{{ $request->uri }}</li>
    @endforeach
</ul>