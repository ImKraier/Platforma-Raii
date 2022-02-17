<!DOCTYPE html>
<html>
<head>
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
<h1>{{ env('APP_NAME') }}</h1>
<p>Salutare, {{$details['author_name']}}.<br>Administratorul {{ $details['admin_name'] }} tocmai ce a raspuns raportului tau.</p>
<p>Pentru a vedea mai multe apasa pe link-ul de mai jos.</p>
<br>
<p>{{ $details['link'] }}</p>
</body>
</html>
