<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ARAWAKO</title>
</head>
<body>
<p>Registrar Usuario
    <form action="register.php" method="post">
        <input type="text" name="name" placeholder="Nombre">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="telefono" placeholder="telefono">
        <input type="text" name="password" placeholder="Password">
        <input type="submit" value="enviar">
    </form>
</p>
<p>Login
    <form action="login.php" method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="password" placeholder="Password">
		<input type="submit" value="enviar">
    </form>
</p>

<p>Recuperar
    <form action="recuperar.php" method="post">
		<input type="text" name="email" placeholder="Email">
        <input type="submit" value="enviar">
    </form>
</p>
<!--
<p>Actualizar Usuario
    <form action="update.php" method="post">
        <input type="text" name="name" placeholder="Nombre">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="telefono" placeholder="Telefono">
        <input type="text" name="password" placeholder="Password Actual">
        <input type="text" name="nuevo_password" placeholder="Nuevo Password">
        <input type="text" name="id" placeholder="ID Users">
        <input type="submit" value="enviar">
    </form>
</p>-->
</body>
</html>