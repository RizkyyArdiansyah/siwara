<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/admin.css'); ?>">
    <!-- css font icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- css kastem -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/admin.css') ?>">
    <title>Dashboard Admin</title>
</head>

<body>
    <nav class="menu">
        <div class="title">Dashboard Admin</div>
        <ul>
            <!-- tambah data -->
            <li>
                <?= anchor('admin/tambah_pg', 'Tambah Data') ?>
            </li>
            <!-- Pilihan Kategori -->
            <li class="selectbox">
                <select onchange="showContainer(this.value)">
                    <option value="gunung">Gunung</option>
                    <option value="pantai">Pantai</option>
                </select>
            </li>
            <!-- Tombol Logout -->
            <li>
                <?= anchor('Login/keluar', 'Logout') ?>
            </li>
        </ul>
    </nav>


    <div id="container-fn" style="display: block;">
        <!-- tabel utama fauna -->
        <div class="container-fn">
            <h2>Daftar Gunung</h2>
            <table border="1">
                <!-- Isi Tabel Fauna -->
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($gunung as $item): ?>
                    <tr>
                        <td><?= $item['nama'] ?></td>
                        <td><?= $item['deskripsi'] ?></td>
                        <td><?= $item['harga'] ?></td>
                        <td><?= $item['lat'] ?></td>
                        <td><?= $item['lon'] ?></td>
                        <td><?= $item['img'] ?></td>
                        <td>
                        <td>
                            <div class="aksi">
                                <a href="<?= base_url('admin/data_gn/' . $item['id']) ?>" class="edit"><i
                                        class="fas fa-edit"></i></a>
                                <a href="<?= base_url('admin/hapus_gn/' . $item['id']) ?>" class="delete"
                                    onclick="return confirmDelete('<?= $item['nama'] ?>');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>


    <div id="container-fl" style="display: none;">
        <!-- tabel utama flora -->
        <div class="container-fl">
            <h2>Daftar Pantai</h2>
            <table border="1">
                <!-- Isi Tabel Flora -->
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($pantai as $item): ?>
                    <tr>
                        <td><?= $item['nama'] ?></td>
                        <td><?= $item['deskripsi'] ?></td>
                        <td><?= $item['harga'] ?></td>
                        <td><?= $item['lat'] ?></td>
                        <td><?= $item['lon'] ?></td>
                        <td><?= $item['img'] ?></td>
                        <td>
                        <td>
                            <div class="aksi">
                                <a href="<?= base_url('admin/data_gn/' . $item['id']) ?>" class="edit"><i
                                        class="fas fa-edit"></i></a>
                                <a href="<?= base_url('admin/hapus_gn/' . $item['id']) ?>" class="delete"
                                    onclick="return confirmDelete('<?= $item['nama'] ?>');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>


    <!-- JavaScript -->
    <script>
        // Fungsi untuk menampilkan container berdasarkan kategori yang dipilih
        function showContainer(category) {
            if (category === 'pantai') {
                document.getElementById('container-fn').style.display = 'none';
                document.getElementById('container-fl').style.display = 'block';
            } else if (category === 'gunung') {
                document.getElementById('container-fn').style.display = 'block';
                document.getElementById('container-fl').style.display = 'none';
            }
        }
    </script>
    <script>
        function confirmDelete(itemName) {
            return confirm('Apakah Anda yakin ingin menghapus ' + itemName + '?');
        }
    </script>

</body>

</html>