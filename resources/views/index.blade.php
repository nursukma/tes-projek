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
    <h1>PERULANGAN</h1>

    <form method="POST" action="{{ route('submit.form') }}">
        @csrf
        <input type="number" name="input" placeholder="Masukkan angka" required
            onkeypress="return isNumberKey(this, event);">
        <button type="submit">Submit</button>
    </form>

    @if (session('message'))
        <div class="alert alert-success">
            @foreach (session('message') as $key => $item)
                <ul>
                    @foreach ($item as $value)
                        <li>{{ $value }}</li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    @endif

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
