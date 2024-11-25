<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/regis.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="register-container">
        <h2>Register</h2>

        <?= ($this->session->flashdata('error')) ? '<p class="error" id="error-message">' . $this->session->flashdata('error') . '</p>' : '' ?>
        <?= ($this->session->flashdata('success')) ? '<p class="success">' . $this->session->flashdata('success') . '</p>' : '' ?>

        <?= form_open('Login/prosesRegis'); ?>
        <input type="text" name="nama" placeholder="Nama Lengkap" required><br><br>
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Register</button>
        <?= form_close(); ?>

        <p>Sudah memiliki akun? <a href="<?= site_url('Login'); ?>">Login di sini</a></p>
    </div>

    <script>
        $(document).ready(function() {
            // Jika pesan error ada di halaman
            if ($('#error-message').length > 0) {
                setTimeout(function() {
                    $('#error-message').fadeOut('slow');  // Hilangkan pesan error setelah 3 detik
                }, 3000);  // 3000 milidetik = 3 detik
            }

            // Jika pesan sukses ada di halaman
            if ($('#success-message').length > 0) {
                setTimeout(function() {
                    $('#success-message').fadeOut('slow');  // Hilangkan pesan sukses setelah 3 detik
                }, 3000);  // 3000 milidetik = 3 detik
            }
        });
    </script>
</body>

</html>
