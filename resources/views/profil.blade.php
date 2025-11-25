<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>

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
            box-shadow: 0px 10px 25px rgba(0,0,0,0.15);
        }

        .wrapper h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .profile-photo {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-photo img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #000;
        }

        .profile-photo .username {
            font-size: 18px;
            font-weight: 600;
            margin-top: 10px;
        }

        .info-box {
            margin-bottom: 18px;
        }

        .info-box label {
            display: block;
            font-size: 16px;
            color: #333;
            margin-bottom: 6px;
            font-weight: 600;
        }

        .info-box .box {
            width: 100%;
            background: #ffffff;
            padding: 12px;
            border-radius: 12px;
            border: 2px solid #ddd;
            font-size: 14px;
            color: #444;
        }

    </style>
</head>

<body>
    <div class="wrapper">
        <h1>Profil Saya</h1>

        <div class="profile-photo">
            <img src="fotoprofil.jpeg" alt="Foto Profil">
            <p class="username">Gaby</p>
        </div>

        <form>
            <div class="info-box">
                <label>Nama</label>
                <div class="box">Gabriella Felice</div>
            </div>

            <div class="info-box">
                <label>No. Telp</label>
                <div class="box">081234567892</div>
            </div>

            <div class="info-box">
                <label>Email</label>
                <div class="box">gabriellafelice@gmail.com</div>
            </div>
        </form>
    </div>
</body>
</html>
