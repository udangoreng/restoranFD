<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="wrapper">
        <h1>Register</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <label for="Nama-input">
                    <img src="{{ asset('img/orang.svg') }}" alt="icon orang" width="20">
                </label>
                <input type="text" name="nama" id="Nama-input" placeholder="Nama">
                @error('nama')
                    <div class="color-red">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="Username-input">
                    <img src="{{ asset('img/username.svg') }}" alt="icon user" width="20">
                </label>
                <input type="text" name="username" id="Username-input" placeholder="Username">
                @error('username')
                    <div class="color-red">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="Email-input">
                    <img src="{{ asset('img/email.svg') }}" alt="icon email" width="20">
                </label>
                <input type="email" name="email" id="Email-input" placeholder="Email">
                @error('email')
                    <div class="color-red">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="No.telp-input">
                    <img src="{{ asset('img/telp.svg') }}" alt="icon telp" width="20">
                </label>
                <input type="number" name="no_telp" id="No.telp-input" placeholder="No.telp">
                @error('no_telp')
                    <div class="color-red">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="Password-input">
                    <img src="{{ asset('img/kunci.svg') }}" alt="icon password" width="20">
                </label>
                <input type="password" name="password" id="Password-input" placeholder="Password">
                @error('password')
                    <div class="color-red">{{ $message }}</div>
                @enderror
            </div>
            <div class="login-link">
                Sudah punya akun? <a href="{{ route('auth.login') }}">Sign In</a>
            </div>
            <button type="submit" name="register">Register</button>
        </form>
    </div>

</body>

</html>