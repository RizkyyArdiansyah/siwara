<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/form.css') ?>">
    <title>Edit Panel</title>
</head>

<body>
    <div class="container">
        <h2>Tambah Data</h2>
        <form id="Form" method="post">
            <div class="row">
                <div class="column">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" required>
                </div>
                <div class="column">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" id="harga" required>
                </div>
            </div>
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="description" required></textarea>
            <div class="row">
                <div class="column">
                    <label for="lat">Lat</label>
                    <input type="text" name="lat" id="lat" required>
                </div>
                <div class="column">
                    <label for="lon">Lon</label>
                    <input type="text" name="lon" id="lon" required>
                </div>
                <div class="column">
                    <label for="img">Url Gambar</label>
                    <input type="text" name="img" id="img" required>
                </div>
            </div>
            <div id="error_message"></div>
            <!-- Tombol tambah dengan event onclick -->
            <button type="button" class="send" onclick="submitForm('<?= site_url('dashboard/tambah_gn') ?>')">Tambah Gunung</button>
            <button type="button" class="send" onclick="submitForm('<?= site_url('dashboard/tambah_pt') ?>')">Tambah Pantai</button>
            <!-- batal -->
            <?= anchor('dashboard', 'Batal', ['class' => 'batal']) ?>
        </form>
    </div>

    <!-- buat nentuin yang mau ditambah flora or fauna, juga buat cegah input kosong-->
    <script>
        function submitForm(action) {
            var form = document.getElementById('Form');
            var inputs = form.querySelectorAll('input[required], textarea[required]');
            var isValid = true;

            inputs.forEach(function(input) {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('error');
                } else {
                    input.classList.remove('error');
                }
            });

            if (!isValid) {
                document.getElementById('error_message').innerHTML = '<p> Semua Harus Diisi! </p>';
            } else {
                document.getElementById('error_message').innerHTML = "";
                form.action = action;
                form.submit();
            }
        }
    </script>

</body>

</html>