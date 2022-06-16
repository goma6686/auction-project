<table class="table border-dark table-light table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $counter = 0;
        @endphp
        @foreach ($conditions as $condition)
        @if ($loop->first) @continue @endif
        @php
            $counter++;
        @endphp
            <tr scope="row">
                <th>{{$counter}}</th>
                <td>
                    {{$condition->name}}
                </td>
                <td>
                    <form action="/condition/delete/{{$condition->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this post?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tr scope="row">
            <th>#</th>
                <form enctype="multipart/form-data" method="POST" action="/condition">
                    <td>
                        <input type="text" name="name" class="form-control" required="">
                    </td>
                    <td>
                        @csrf
                    <button type="submit" class="btn btn-sm btn-dark">Add</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
