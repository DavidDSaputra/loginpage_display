<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>Selamat Datang</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <a href="#" class="forgot-password">Lupa Password</a>
                <button type="submit" class="btn-login">Masuk</button>
                <p class="register-text">Belum Punya Akun? <a href="#">Daftar</a></p>
            </form>
        </div>
        <div class="login-image">
            <img src="{{ asset('images/campus.jpg') }}" alt="Campus Image">
        </div>
    </div>
</body>
</html>
