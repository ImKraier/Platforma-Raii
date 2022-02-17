<!DOCTYPE html>
<html>
<head>
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
<h1>{{ env('APP_NAME') }}</h1>
<p>Salutare, {{$details['to_name']}}.<br>Un nou tichet a fost trimis de catre {{$details['author_name']}} cu subiectul '{{$details['subject']}}'. Pentru a vedea mai multe faceti click pe link-ul de mai jos.</p>
<br>
<p>{{ $details['link'] }}</p>
</body>
</html>
