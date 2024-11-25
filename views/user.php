<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/login.css'); ?>">
</head>

<body>
    <div class="login-container">
        <h2>Login Admin</h2>


        <!-- Form untuk login -->
        <?= form_open('User/masuk'); ?>
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Login</button><br><br>
        <?= form_close(); ?>

        <!-- Form untuk registrasi (akan diarahkan ke function regis) -->
        <?= form_open('User/regis'); ?>
        <button type="submit">Register</button>
        <?= form_close(); ?>
    </div>
</body>

</html>
