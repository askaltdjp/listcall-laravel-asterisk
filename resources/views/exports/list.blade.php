    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Text</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($getList as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->phonenumber}}</td>
                    <td>{{$data->optional}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>