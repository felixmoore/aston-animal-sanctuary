<!DOCTYPE html>
    <html>
    <head>
    <title>User {{ $user->id }}</title>
    </head>
    <body>
    <h1>Username: {{ $user->username }}</h1>
    <ul>
    <li>Type: {{ $user->type }}</li>
    <li>Email: {{ $user->email }}</li>
    </ul>
    </body>
</html>
