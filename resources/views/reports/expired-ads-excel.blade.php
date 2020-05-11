<table>
    <thead>
    <tr>
        <th>Date</th>
        <th>Batch No</th>
        <th>Id</th>
        <th>Car Type</th>
        <th>Model</th>
        <th>Town</th>
        <th>Seller</th>
    </tr>
    </thead>
    <tbody>
    @foreach($expired_ads as $expired_ad)
        <tr>
            <td>
                {{ $expired_ad->created_at }}
            </td>

            <td>
                {{ $expired_ad->vehicle_detail->unique_identifier }}
            </td>

            <td>
                {{ $expired_ad->vehicle_detail->id }}
            </td>

            <td>
                {{ $expired_ad->vehicle_detail->car_make->name }}
            </td>

            <td>
                {{ $expired_ad->vehicle_detail->car_model->name }}
            </td>

            <td>
                @if(isset($expired_ad->vehicle_detail->vehicle_contact->area_id))
                    {{ $expired_ad->vehicle_detail->vehicle_contact->area->name }}
                @endif
            </td>

            <td>
                @if(isset($expired_ad->vehicle_detail->vehicle_contact->name))
                    {{ $expired_ad->vehicle_detail->vehicle_contact->name }}
                @endif
            </td>
    </tr>
    @endforeach
    </tbody>
</table>
