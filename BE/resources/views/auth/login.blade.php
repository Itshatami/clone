<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>

<body>
    <form action="/login" method="POST">
        @csrf
        <input type="email" name="email" placeholder="example@info.com">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="Register">
    </form>
</body>

</html>
