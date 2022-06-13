<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Price, €</th>
            <th scope="col">Bidders</th>
            <th scope="col">Cover</th>
            <th scope="col">minBid</th>
            <th scope="col">Condition</th>
            <th scope="col">Active</th>
            <th scope="col">End date</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @php
            $counter = 0;
        @endphp
        @foreach ($items as $item)
            @if (Auth::id() == $item->user_id)
            @php
            $counter++;
            @endphp
            <tr scope="row">
                <th>{{$counter}}</th>
                <td>
                    {{$item->title}}
                </td>
                <td>
                    {{$item->price}}
                </td>
                <td>
                    {{$item->bidder_count}}
                </td>
                <td>
                    @if ($item->cover != NULL) 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                        </svg>
                    @else 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                            <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                        </svg>
                    @endif
                </td>
                <td>
                    {{$item->min_bid}}
                </td>
                @foreach ($conditions as $condition)
                    @if ($item->condition_id == $condition->id)
                        <td>
                            {{$condition->name}}
                        </td>
                    @endif
                @endforeach
                <td>
                    @if ($item->is_active == 1) 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                        </svg>
                    @else 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                            <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                        </svg>
                    @endif
                </td>
                <td>
                    {{$item->end_date}}
                </td>
                <td style="text-align: right;">
                    <a href="/profile/edit/{{$item->id}}" class="btn btn-sm btn-dark " role="button">Edit</a>
                </td>
                <td>
                    <form action="/profile/delete/{{$item->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this post?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>
@if($counter == 0)
<h3 style="text-align: center;">No items found :( <br>
    <a href="{{ route('create-post') }}" class="btn btn-md btn-outline-dark mt-3 mx-auto">Add one?</a>
 </h3>
@endif
