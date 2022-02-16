<!DOCauthor_nameTYPE html>
<html>
<head>
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
<h1>{{ env('APP_NAME') }}</h1>
<p>Salutare, {{$details['author']}}.<br>Ai primit un nou comentariu la tichetul '{{$details['title']}}'.</p>
<br>
<p>{{$details['link']}}</p>
</body>
</html>
