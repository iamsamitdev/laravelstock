<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multiple Language</title>
</head>
<body>

    <ul>
        <li><a href="{{ URL::to('change/en') }}">ENGLISH</a> </li>
        <li><a href="{{ URL::to('change/th') }}">THAILAND</a></li>
        <li><a href="{{ URL::to('change/jp') }}">JAPANESE</a></li>
        <li><a href="{{ URL::to('change/ch') }}">CHINESE</a></li>
    </ul>
    
    {{ trans('message.service') }}
    
</body>
</html>