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
    @foreach($pending_verification_ads as $pending_verification_ad)
        <tr>
            <td>
                {{ $pending_verification_ad->created_at }}
            </td>

            <td>
                {{ $pending_verification_ad->vehicle_detail->unique_identifier }}
            </td>

            <td>
                {{ $pending_verification_ad->vehicle_detail->id }}
            </td>

            <td>
                {{ $pending_verification_ad->vehicle_detail->car_make->name }}
            </td>

            <td>
                {{ $pending_verification_ad->vehicle_detail->car_model->name }}
            </td>

            <td>
                @if(isset($pending_verification_ad->vehicle_detail->vehicle_contact->area_id))
                    {{ $pending_verification_ad->vehicle_detail->vehicle_contact->area->name }}
                @endif
            </td>

            <td>
                @if(isset($pending_verification_ad->vehicle_detail->vehicle_contact->name))
                    {{ $pending_verification_ad->vehicle_detail->vehicle_contact->name }}
                @endif
            </td>
    </tr>
    @endforeach
    </tbody>
</table>
