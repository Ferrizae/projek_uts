<!DOCTYPE html>
<html>
<head>
    <title>Login Pendakian</title>

    <style>

        body{
            background: #dcedc8;
            font-family: Arial;
        }

        .login{
            width: 350px;
            background: white;
            margin: 100px auto;
            padding: 30px;
            border-radius: 10px;
        }

        input{
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }

        button{
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background: green;
            color: white;
            border: none;
        }

    </style>

</head>
<body>

<div class="login">

<h2 align="center">LOGIN ADMIN</h2>

<form action="proses_login.php" method="POST">

    <input type="text" name="username" placeholder="Username">

    <input type="password" name="password" placeholder="Password">

    <button type="submit" name="login">
        Login
    </button>

</form>

</div>

</body>
</html>