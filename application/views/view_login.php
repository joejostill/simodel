<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("application/views/style.css"); ?>">
</head>

<body>


    <div class="kotak_login">
        <img src="<?php echo base_url("application/views/logo.png"); ?>" alt="logo" style="width: 500px;">
        <h3>Login</h3>
        <form method="POST" action="./login">
            <label>Username</label>
            <input type="text" name="username" class="form_login">

            <label>Password</label>
            <input type="password" name="password" class="form_login">

            <input type="submit" class="tombol_login" value="LOGIN">

            <br />
            <br />

        </form>
    </div>


    </div>


</body>

</html>