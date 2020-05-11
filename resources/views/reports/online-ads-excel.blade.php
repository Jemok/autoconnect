<table>
    <thead>
    <tr>
        <th>Date</th>
        <th>Batch No</th>
        <th>Id</th>
        <th>Car Type</th>
        <th>Model</th>
        <th>Seller</th>
    </tr>
    </thead>
    <tbody>
    @foreach($online_ads as $online_ad)
        <tr>
            <td>
                {{ $online_ad->created_at }}
            </td>

            <td>
                {{ $online_ad->vehicle_detail->unique_identifier }}
            </td>

            <td>
                {{ $online_ad->vehicle_detail->id }}
            </td>

            <td>
                {{ $online_ad->vehicle_detail->car_make->name }}
            </td>

            <td>
                {{ $online_ad->vehicle_detail->car_model->name }}
            </td>

            <td>
                @if(isset($online_ad->vehicle_detail->vehicle_contact->area_id))
                    {{ $online_ad->vehicle_detail->vehicle_contact->area->name }}
                @endif
            </td>
    </tr>
    @endforeach
    </tbody>
</table>
