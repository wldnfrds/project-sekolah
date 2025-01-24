<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
    <h1>Form Kontak</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Subjek</th>
                <th>Pesan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
                <tr>
                    <td>{{ $record['name'] }}</td>
                    <td>{{ $record['email'] }}</td>
                    <td>{{ $record['subject'] }}</td>
                    <td>{{ $record['message'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
