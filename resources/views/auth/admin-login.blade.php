<!DOCTYPE html>
<html>
<head>
    <title>Login Admin – Universitas Tadulako</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 420px;
            text-align: center;
        }

        .login-container img {
            width: 60px;
            height: auto;
            margin-bottom: 16px;
        }

        .login-container h1 {
            margin-bottom: 4px;  /* Jarak lebih rapat */
            color: #800000; /* Merah maroon khas Untad */
            font-size: 22px;
        }

        .login-container p {
            margin-top: 0;      /* Hilangkan jarak atas */
            margin-bottom: 24px;
            font-size: 14px;
            color: #555;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #333;
            text-align: left;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 16px;
        }

        input[type="checkbox"] {
            margin-right: 6px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #b30000; /* Merah Untad */
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #8a0000;
        }

        .error-message {
            background-color: #ffe6e6;
            color: #d8000c;
            padding: 10px;
            border: 1px solid #d8000c;
            border-radius: 6px;
            margin-bottom: 16px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="{{ asset('img/untad-new.jpeg') }}" alt="Logo Untad">
        
        <h1>Sistem Akademik</h1>
        <p>Universitas Tadulako</p>

        @if ($errors->any())
            <div class="error-message">
                <ul style="margin: 0; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.admin.store') }}" method="POST">
            @csrf
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required autofocus>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <label style="text-align: left;">
                <input type="checkbox" name="remember"> Remember Me
            </label>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
