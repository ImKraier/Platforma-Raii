<!DOCTYPE html>
<html>
<head>
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
<h1>{{ env('APP_NAME') }}</h1>
<p>Salutare, {{$details['target']}}. Iti multumim ca ai ales sa te joci la noi pe server!</p>
<br>
<p>{{ $details['confirm_link'] }}</p>
</body>
</html>
