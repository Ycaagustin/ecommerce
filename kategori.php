<h1>Data Kategori</h1>
<div class="box">
    <p><a href="tambah-kategori.php" class="btn">+ Tambah Data</a></p>
    <style>
        .table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

.table th {
    background-color: #5a8f3d;
    color: white;
}

.btn {
    display: inline-block;
    padding: 8px 15px;
    background-color: #5a8f3d;
    color: white;
    border-radius: 5px;
    text-decoration: none;
}
    </style>

    <table class="table">
        <thead>
            <tr>
                <th width="60px">No</th>
                <th>Kategori</th>
                <th width="150px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_id DESC");
                if(mysqli_num_rows($kategori) > 0){
                while($row = mysqli_fetch_array($kategori)){
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['kategori_name'] ?></td>
                <td>
                    <a href="edit-kategori.php?id=<?php echo $row['kategori_id'] ?>">Edit</a> |
                    <a href="proses-hapus.php?idk=<?php echo $row['kategori_id'] ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php }} else { ?>
            <tr>
                <td colspan="3">Tidak ada data</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
