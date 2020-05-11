<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        @foreach($users as $user)
            <td>
                {{ $user->name }}
            </td>

            <td>
                {{ $user->email }}
            </td>
        @endforeach
    </tr>

    </tbody>
</table>
