<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">📚 Sistem Perpustakaan</span>
    </div>
</nav>

<div class="container mt-4">
    <h3 class="mb-3">Daftar Buku</h3>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody id="dataBuku"></tbody>
    </table>
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
            <td>${buku.stok}</td>
        </tr>
        `;
    });
    document.getElementById('dataBuku').innerHTML = output;
});
</script>

</body>
</html>