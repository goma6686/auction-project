<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Items</th>
            <th scope="col">Bids</th>
            <th scope="col">Date Joined</th>
            <th scope="col">Active</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @php
            $counter = 0;
        @endphp
        @foreach ($data as $d)
            @php
            $counter++;
            @endphp
            <tr scope="row">
                <th>{{$d}}</th>
                <td>
                    {{$d->name}}
                </td>
                <td>
                    {{$d->email}}
                </td>
                <td>
                    items
                </td>
                <td>
                    bids
                </td>
                <td>
                    date joined
                </td>
                Active
                <td>
                   
                </td>
                <td>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@if($counter == 0)
<h3 style="text-align: center;">No Users found :(
 </h3>
@endif
