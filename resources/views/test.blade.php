<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="{{ route('test')  }}">
    <input name="first_name" >

    @error('first_name')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <input type="submit" value="Отправить">
</form>

</body>
</html>
