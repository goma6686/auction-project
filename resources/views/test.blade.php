<table border="1">
    <tr>
        <td>id</td>
        <td>name</td>
        <td>description</td>
        <td>condition</td>
        <td>min_bid</td>
        <td>bid_count</td>
        <td>bid_sum</td>
        <td>cover</td>
        <td>is_active</td>
        <td>created_at</td>
    </tr>
    @foreach ($items as $item)
        <tr>
            <td>{{ $item['id'] }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['description'] }}</td>
            <td>{{ $item['condition'] }}</td>
            <td>{{ $item['min_bid'] }}</td>
            <td>{{ $item['bidder_count'] }}</td>
            <td>{{ $item['bid_sum'] }}</td>
            <td>{{ $item['cover'] }}</td>
            <td>{{ $item['is_active'] }}</td>
            <td>{{ $item['cretaed_at'] }}</td>
        </tr>
    @endforeach
</table>