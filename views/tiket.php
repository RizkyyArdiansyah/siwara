<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Tiket</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/tiket.css') ?>"> <!-- Link ke file CSS -->

    <script>
        const hargaWisata = {
            "Gunung Bromo": 55000,
            "Gunung Rinjani": 10000,
            "Gunung Merapi": 30000,
            "Gunung Semeru": 25000,
            "Gunung Kerinci": 20000,
            "Gunung Ijen": 10000,
            "Gunung Agung": 70000,
            "Gunung Gede Pangrango": 30000,
            "Gunung Lawu": 20000,
            "Pantai Kuta": 50000,
            "Pantai Parangtritis": 20000,
            "Pantai Pink": 100000,
            "Pantai Sanur": 40000,
            "Pantai Tanjung Bira": 30000,
            "Pantai Lanbuan Bajo": 150000,
            "Pantai Balangan": 35000,
            "Pantai Nihiwatu": 200000,
            "Pantai Labuana": 25000
        };

        function updateHarga() {
            const tempat = document.getElementById("nama_tempat").value;
            const harga = hargaWisata[tempat] || 0; // Ambil harga sesuai pilihan
            document.getElementById("harga").value = harga; // Update input harga
            hitungTotal(); // Hitung total harga jika jumlah tiket sudah diisi
        }

        function hitungTotal() {
            const harga = parseFloat(document.getElementById("harga").value) || 0;
            const jumlah = parseInt(document.getElementById("jumlah_tiket").value) || 0;
            const total = harga * jumlah;

            // Gunakan Math.floor() atau parseInt() untuk memastikan tidak ada angka desimal
            const totalHarga = parseInt(total); // Menghilangkan angka desimal
            document.getElementById("total_harga").value = totalHarga; // Menampilkan total harga tanpa desimal
            if (jumlah === 0) {
                document.getElementById("total_harga").value = ""; // Total harga tetap kosong
            }
        }

        function konfirmasiPesan(event) {
            event.preventDefault(); // Menghentikan form dari pengiriman langsung

            // Validasi jika semua input sudah terisi
            const nama = document.getElementById("nama").value;
            const namaTempat = document.getElementById("nama_tempat").value;
            const jumlahTiket = document.getElementById("jumlah_tiket").value;
            const totalHarga = document.getElementById("total_harga").value;

            if (nama === "" || namaTempat === "" || jumlahTiket === "" || totalHarga === "") {
                alert("Mohon isi semua field yang wajib!");
                return; // Tidak lanjutkan jika ada field yang kosong
            }

            // Membuat pesan konfirmasi
            const pesan = `
                Apakah Anda yakin ingin memesan tiket untuk:
                \nNama Pemesan: ${nama}
                \nTempat Wisata: ${namaTempat}
                \nJumlah Tiket: ${jumlahTiket}
                \nTotal Harga: Rp ${totalHarga}
            `;

            // Menampilkan modal konfirmasi
            document.getElementById("modal-pesan").style.display = "block";
            document.getElementById("konfirmasi").onclick = function() {
                document.getElementById("formTiket").submit();
            };
        }

        function tutupModal() {
            document.getElementById("modal-pesan").style.display = "none";
        }
    </script>

</head>

<body>
    <form id="formTiket" action="<?= site_url('tiket/pesan') ?>" method="POST">
        <h1>Pemesanan Tiket Wisata</h1>
        <label for="nama">Nama Pemesan</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required>

        <label for="nama_tempat">Nama Tempat Wisata</label>
        <select id="nama_tempat" name="nama_tempat" required onchange="updateHarga()">
            <option value="">Pilih Tempat Wisata</option>
            <option value="Gunung Bromo">Gunung Bromo</option>
            <option value="Gunung Rinjani">Gunung Rinjani</option>
            <option value="Gunung Merapi">Gunung Merapi</option>
            <option value="Gunung Semeru">Gunung Semeru</option>
            <option value="Gunung Kerinci">Gunung Kerinci</option>
            <option value="Gunung Ijen">Gunung Ijen</option>
            <option value="Gunung Agung">Gunung Agung</option>
            <option value="Gunung Gede Pangrango">Gunung Gede Pangrango</option>
            <option value="Gunung Lawu">Gunung Lawu</option>
            <option value="Pantai Kuta">Pantai Kuta</option>
            <option value="Pantai Parangtritis">Pantai Parangtritis</option>
            <option value="Pantai Pink">Pantai Pink</option>
            <option value="Pantai Sanur">Pantai Sanur</option>
            <option value="Pantai Tanjung Bira">Pantai Tanjung Bira</option>
            <option value="Pantai Labuan Bajo">Pantai Labuan Bajo</option>
            <option value="Pantai Balangan">Pantai Balangan</option>
            <option value="Pantai Nihiwatu">Pantai Nihiwatu</option>
            <option value="Pantai Labuana">Pantai Labuana</option>
        </select>

        <label for="harga">Harga Tiket (per tiket)</label>
        <input type="number" id="harga" name="harga" readonly>

        <label for="jumlah_tiket">Jumlah Tiket</label>
        <input type="number" id="jumlah_tiket" name="jumlah_tiket" placeholder="Masukkan jumlah tiket" required
            oninput="hitungTotal()">

        <label for="total_harga">Total Harga</label>
        <input type="text" id="total_harga" name="total_harga" readonly>

        <button type="submit" onclick="konfirmasiPesan(event)">Pesan Tiket</button>
    </form>

    <!-- Modal Konfirmasi -->
    <div id="modal-pesan" class="modal">
        <div class="modal-content">
            <div class="modal-header">Konfirmasi Pemesanan</div>
            <p id="pesan-konfirmasi"></p>
            <div class="modal-footer">
                <button id="konfirmasi" class="btn-modal">Ya, Pesan</button>
                <button onclick="tutupModal()" class="btn-modal cancel">Batal</button>
            </div>
        </div>
    </div>
</body>

</html>
