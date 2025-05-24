<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
</head>
<body>
    <h1>Login Admin</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login.admin.store') }}" method="POST">
        @csrf
        <label>Email:</label>
        <input type="email" name="email" required autofocus>
        <br><br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br><br>
        <label>
            <input type="checkbox" name="remember"> Remember Me
        </label>
        <br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
