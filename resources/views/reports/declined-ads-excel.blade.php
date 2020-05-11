<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Reason</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($declined_ads as $declined_ad)
        <tr>
            <td>
                {{ $declined_ad->id }}
            </td>

            <td>
                {{ $declined_ad->reason }}
            </td>

            <td>
                @if($declined_ad->status == 'resolved')
                    Resolved
                @endif

                @if($declined_ad->status == 'not_resolved')
                    Not Resolved
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
