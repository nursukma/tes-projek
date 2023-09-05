<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <h1>Cek Ongkir</h1>
    <form method="POST" action="{{ route('cek-ongkir') }}">
        @csrf
        <label for="input1">Kota Asal</label>
        {{-- <input type="text" id="kota_asal" name="kota_asal" required> --}}
        <select name="origin" id="kota_asal">
            @foreach ($kota as $item)
                <option value="{{ $item['city_id'] }}">{{ $item['city_name'] }}</option>
            @endforeach
        </select>

        <label for="input2">Kota Tujuan</label>
        <select name="destination" id="kota_tujuan">
            @foreach ($kota as $item)
                <option value="{{ $item['city_id'] }}">{{ $item['city_name'] }}</option>
            @endforeach
        </select>

        <label for="input3">Berat (gram)</label>
        <input type="number" id="weight" name="weight" required onkeypress="return isNumberKey(this, event);">

        <button type="submit">Submit</button>
    </form>

    <script>
        function isNumberKey(txt, evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode == 46) {
                //Check if the text already contains the . character
                if (txt.value.indexOf('.') === -1) {
                    return true;
                } else {
                    return false;
                }
            } else {
                if (charCode > 31 &&
                    (charCode < 48 || charCode > 57))
                    return false;
            }
            return true;
        }
    </script>
</body>

</html>
