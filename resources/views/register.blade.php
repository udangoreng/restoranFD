<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #18312E;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wrapper {
            background: #ffffff;
            width: 380px;
            padding: 30px 35px;
            border-radius: 15px;
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.15);
        }

        .wrapper h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .wrapper form div {
            position: relative;
            margin-bottom: 18px;
        }

        .wrapper form div img {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.7;
        }

        .wrapper input {
            width: 100%;
            padding: 12px 12px 12px 45px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }

        .wrapper input:focus {
            border-color: #18312E;
            box-shadow: 0px 0px 5px rgba(90, 111, 240, 0.5);
        }


        .login-link {
            font-size: 14px;
            color: #555;
            margin-top: 5px;
            text-align: center;
        }

        .login-link a {
            color: #18312E;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #18312E;
            color: white;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
        }

        button:hover {
            background: #18312E;
            box-shadow: 0 7px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h1>Register</h1>
        <form>
            <div>
                <label for="Nama-input">
                    <img src="orang.svg" alt="icon orang" width="20">
                </label>
                <input type="text" name="Nama" id="Nama-input" placeholder="Nama">
            </div>
            <div>
                <label for="Username-input">
                    <img src="username.svg" alt="icon user" width="20">
                </label>
                <input type="text" name="Username" id="Username-input" placeholder="Username">
            </div>
            <div>
                <label for="Email-input">
                    <img src="email.svg" alt="icon email" width="20">
                </label>
                <input type="email" name="Email" id="Email-input" placeholder="Email">
            </div>
            <div>
                <label for="No.telp-input">
                    <img src="telp.svg" alt="icon telp" width="20">
                </label>
                <input type="number" name="No.telp" id="No.telp-input" placeholder="No.telp">
            </div>
            <div>
                <label for="Password-input">
                    <img src="kunci.svg" alt="icon password" width="20">
                </label>
                <input type="password" name="Password" id="Password-input" placeholder="Password">
            </div>
            <div class="login-link">
                Sudah punya akun? <a href="#">Sign In</a>
            </div>
            <button type="Register">Register</button>
        </form>
    </div>

</body>

</html>