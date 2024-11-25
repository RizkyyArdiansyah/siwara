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
        <?php if (isset($pantai)) : ?>
            <h2>Edit pantai</h2>
            <?= form_open('dashboard/perbarui_pt/' . $pantai->id) ?>
            <div class="row">
                <div class="column">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" value="<?= $pantai->nama ?>" required>
                </div>
                <div class="column">
                    <label for="ilmiah">Harga</label>
                    <input type="text" name="harga" id="harga" value="<?= $pantai->harga ?>" required>
                </div>
            </div>
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="description" required><?= $pantai->deskripsi ?></textarea>
            <div class="row">
                <div class="column">
                    <label for="lat">Lat</label>
                    <input type="text" name="lat" id="lat" value="<?= $pantai->lat ?>" required>
                </div>
                <div class="column">
                    <label for="lon">Lon</label>
                    <input type="text" name="lon" id="lon" value="<?= $pantai->lon ?>" required>
                </div>
                <div class="column">
                    <label for="img">Url Gambar</label>
                    <input type="text" name="img" id="img" value="<?= $pantai->img ?>" required>
                </div>
            </div>
            <button type="submit" class="send">Update Data</button>
            

            <!-- batal -->
            <?= anchor('dashboard', 'Batal', ['class' => 'batal']) ?>
            <?= form_close() ?>


        <?php elseif (isset($gunung)) : ?>
            <h2>Edit Fauna</h2>
            <?= form_open('dashboard/perbarui_gn/' . $gunung->id) ?>
            <div class="row">
                <div class="column">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" value="<?= $gunung->nama ?>" required>
                </div>
                <div class="column">
                    <label for="ilmiah">Harga</label>
                    <input type="text" name="harga" id="harga" value="<?= $gunung->harga ?>" required>
                </div>
            </div>
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="description" required><?= $gunung->deskripsi ?></textarea>
            <div class="row">
                <div class="column">
                    <label for="lat">Lat</label>
                    <input type="text" name="lat" id="lat" value="<?= $gunung->lat ?>" required>
                </div>
                <div class="column">
                    <label for="lon">Lon</label>
                    <input type="text" name="lon" id="lon" value="<?= $gunung->lon ?>" required>
                </div>
                <div class="column">
                    <label for="img">Url Gambar</label>
                    <input type="text" name="img" id="img" value="<?= $gunung->img ?>" required>
                </div>
            </div>
            <button type="submit" class="send">Update Data</button>
            <!-- batal -->
            <?= anchor('dashboard', 'Batal', ['class' => 'batal']) ?>
            <?= form_close() ?>


        <?php endif; ?>
    </div>
</body>

</html>