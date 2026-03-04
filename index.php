<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
        }
        .card-custom {
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }
        .navbar {
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand fw-bold">📚 Sistem Perpustakaan</span>
    </div>
</nav>

<div class="container mt-5">
    <div class="card card-custom p-4">
        <h4 class="mb-4 text-center">Daftar Buku</h4>

        <table class="table table-hover align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody id="dataBuku" class="text-center"></tbody>
        </table>
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
            <td><span class="badge bg-success">${buku.stok}</span></td>
        </tr>
        `;
    });
    document.getElementById('dataBuku').innerHTML = output;
});
</script>

</body>
</html>