<!DOCauthor_nameTYPE html>
<html>
<head>
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
<h1>{{ env('APP_NAME') }}</h1>
<p>Salutare, {{$details['admin_name']}}.<br>Jucatorul '{{ $details['reported_name'] }}' a fost raportat de catre '{{ $details['author_name'] }}'.<br>Pentru mai multe informatii acceseaza link-ul de mai jos.</p>
<br>
<p>{{ $details['link'] }}</p>
</body>
</html>
