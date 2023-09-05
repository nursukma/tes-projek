<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TES CODE</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <h1>Hasil Cek Ongkir</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Kurir</th>
                <th>Servis</th>
                <th>Tarif</th>
                <th>Estimasi Pengiriman</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($responses as $item)
                @foreach ($item as $result)
                    @foreach ($result['costs'] as $cost)
                        @foreach ($cost['cost'] as $costItem)
                            <tr>
                                <td>{{ $result['name'] }}</td>
                                <td>{{ $cost['service'] }}</td>
                                <td>{{ $costItem['value'] }}</td>
                                <td>{{ $costItem['etd'] }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
            @endforeach
        </tbody>
    </table>

</body>

</html>
