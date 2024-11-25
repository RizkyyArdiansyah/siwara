<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/peta.css') ?>">
    <title>S.I.W.A.R.A</title>
</head>

<body>
    <div class="title">Sistem Informasi <span>Wisata Nusantara</span> Indonesia</div>
    <div class="tips">Klik penanda di peta untuk mendapat informasi!</div>

    <!-- Pilihan Kategori -->
    <div class="card">
        <h4>Opsi Kategori</h4>
        <select id="kategori">
            <option value="semua">Semua</option>
            <option value="gunung">Gunung</option>
            <option value="pantai">Pantai</option>
        </select>
    </div>

    <div id="peta"></div>

    <!-- JS Custom Halaman Peta -->
    <script>
        // Peta awal
        const peta = L.map('peta').setView([-1.015, 117.065], 6);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
        }).addTo(peta);

        // Custom icon untuk marker
        const icongunung = L.icon({
            iconUrl: 'https://cdn-icons-png.flaticon.com/512/2435/2435627.png',
            iconSize: [35, 35],
            iconAnchor: [12, 27],
            popupAnchor: [5, -30]
        });

        const iconpantai = L.icon({
            iconUrl: 'https://uxwing.com/wp-content/themes/uxwing/download/location-travel-map/vacation-beach-icon.png',
            iconSize: [50, 40],
            iconAnchor: [12, 27],
            popupAnchor: [12, -30]
        });

        // Ambil data dari database
        var gunung = <?= json_encode($gunung) ?>;
        var pantai = <?= json_encode($pantai) ?>;

        // Fungsi untuk menampilkan data pada peta
        function tampilkanData(data, icon) {
            data.forEach(function (item) {
                var marker = L.marker([item.lat, item.lon], {
                    icon: icon
                }).addTo(peta).bindPopup(
                    '<img src="' + item.img + '" alt="" style="width:100%;height:180px;border-radius:10px;"><br>' +
                    '<center><b>' + item.nama + '</b></center>' +
                    '<p>' + item.deskripsi + '</p>' +
                    '<p><b>Harga tiket: Rp. ' + item.harga + ' /orang</b></p>' +
                    '<div style="text-align: center; margin-top: 10px;">' +
                    '<a href="<?= site_url("login") ?>" ' +
                    'style="display: inline-block; padding: 8px 16px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px; text-align: center;">' +
                    'Pesan Tiket' +
                    '</a>' +
                    '</div>'
                );
            });
        }

        // Tampilkan data gunung dan pantai saat halaman pertama kali dimuat
        tampilkanData(gunung, icongunung);
        tampilkanData(pantai, iconpantai);

        // Fungsi filter kategori
        function filterData(kategori) {
            // Hapus semua marker pada peta
            peta.eachLayer(layer => {
                if (layer instanceof L.Marker) {
                    peta.removeLayer(layer);
                }
            });

            // Tampilkan marker sesuai kategori
            if (kategori === 'semua') {
                tampilkanData(gunung, icongunung);
                tampilkanData(pantai, iconpantai);
            } else if (kategori === 'gunung' || kategori === 'pantai') {
                tampilkanData(kategori === 'gunung' ? gunung : pantai, kategori === 'gunung' ? icongunung : iconpantai);
            }
        }

        // Event listener untuk dropdown kategori
        document.getElementById('kategori').addEventListener('change', function () {
            const kategori = this.value;
            filterData(kategori);
        });
    </script>
</body>

</html>
