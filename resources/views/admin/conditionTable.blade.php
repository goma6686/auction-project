<table class="table table-light table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @php
            $counter = 0;
        @endphp
        @foreach ($conditions as $condition)
        @php
            $counter++;
        @endphp
            <tr scope="row">
                <th>{{$counter}}</th>
                <td>
                    {{$condition->name}}
                </td>
                <td style="text-align: right;">
                    <a href="#" class="btn btn-sm btn-dark " role="button">Edit</a>
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
                    <td></td>
                    <td>
                        @csrf
                    <button type="submit" class="btn btn-sm btn-dark">Add</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
