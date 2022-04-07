<!DOCTYPE html>
<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
    <title></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: inherit !important;
        }

        p {
            line-height: inherit
        }
    </style>
</head>
<body style="background-color: #161b25; margin: auto; padding: 40px; -webkit-text-size-adjust: none; text-size-adjust: none; color: white; width: 485px; border-radius: 16px; position: relative;">
    <div style="margin: 0 0 26px 0;">
        <h1 style="text-align: center; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-weight: 100; margin: 0;">Raii România</h1>
        <p style="text-align: center; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-weight: 100; margin: 0; color: #404c68 !important;">platforma.raii.ro</p>
    </div>
    <hr style="border-color: #ffffff0d; margin-bottom: 20px;">
    <div style="color: #c7c7c7; padding-bottom: 40px;">
        <div>
            <h3 style="text-align: left; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-weight: 100; margin: 0 0 20px 0;">Salutare, <strong style="color: white;">{{$details['user_name']}}</strong></h3>
            <h2 style="text-align: left; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-weight: 100; margin: 0 0 20px 0; color: rgb(221, 221, 221);">Tocmai ce ai cumparat produsul <strong style="color: white;">{{ $details['product'] }}</strong> pentru suma de <strong style="color: white;">{{ $details['price'] }}</strong> de puncte.</h2>
            <p style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; margin: 0 0 10px 0; color: white;">Cheia ta de activare este:</p>
            <div style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; text-align: center; background-color: #222837; padding: 16px; border-radius: 10px; font-weight: 600; color: white;margin-bottom: 12px;">
                {{ $details['key'] }}
            </div>
        </div>
    </div>
</body>
</html>
