<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }

        .navbar {
            background-color: #e0e0e0;
        }

        .navbar-brand {
            color: #333 !important;
            font-weight: 600;
        }

        .card {
            border: none;
            border-radius: 12px;
            background-color: #ffffff;
        }

        .table thead {
            background-color: #eeeeee;
        }

        .table th {
            font-weight: 600;
            color: #444;
        }

        .badge-stock {
            background-color: #d6d6d6;
            color: #333;
            font-weight: 500;
        }

        .footer-text {
            font-size: 13px;
            color: #888;
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="container">
        <span class="navbar-brand">Sistem Perpustakaan</span>
    </div>
</nav>

<div class="container mt-5">
    <div class="card p-4 shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Daftar Buku</h5>
            <small class="text-muted">Data dari API Server</small>
        </div>

        <table class="table table-borderless align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody id="dataBuku"></tbody>
        </table>
    </div>

    <div class="text-center mt-4 footer-text">
        © 2026 - API Perpustakaan
    </div>
</div>

<script>
fetch('http://20.20.20.21/api/read.php')
.then(response => response.json())
.then(data => {
    let output = '';
    data.forEach(buku => {
        output += `
        <tr>
            <td>${buku.id}</td>
            <td>${buku.judul}</td>
            <td>${buku.penulis}</td>
            <td>${buku.tahun_terbit}</td>
            <td><span class="badge badge-stock">${buku.stok}</span></td>
        </tr>
        `;
    });
    document.getElementById('dataBuku').innerHTML = output;
});
</script>

</body>
</html>