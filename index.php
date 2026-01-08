<?php
include 'config.php';
$stmt = $conn->prepare("SELECT * FROM tabel_barang ORDER BY id DESC");
$stmt->execute();
$data = $stmt->fetchALL(mode: PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>

</head>
<body>
    <h2 style="font-weight: bold;">Data Barng</h2>
    <a href="tambah.php">
        <button style="
        padding: 5px 10px;
        margin-bottom: 10px;
        color: #fafafaff;
        background-color: yellowgreen;
        font-weight: bold;
        border-radius: 5px;
        border: none;
        font-size: 14px">Tambah barang</button>
    </a>
    <a></a>
    <table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <td>NO</td>
        <td>NAMA BARANG</td>
        <td>KATEGORI</td>
        <td>HARGA</td>
        <td>STOK</td>
        <td>ACTION</td>
    </tr>
    <?php $no = 1; foreach ($data as $row) : ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars(string: $row['nama_barang']); ?></td>
            <td><?php echo htmlspecialchars(string: $row['kategori']); ?></td>
            <td><?php echo htmlspecialchars(string: $row['harga']); ?></td>
            <td><?php echo htmlspecialchars(string: $row['stok']); ?></td>
            <td>
                <a href="#" onclick="alert(Nama Barang: <?php echo htmlspecialchars(string: $row['nama_barang']); ?>\nKategori: 
                <?php echo htmlspecialchars(string: $row['kategori']); ?>\nHarga: <?php echo htmlspecialchars(string: $row['harga']); ?>\nStok: <?php echo htmlspecialchars(string: $row['stok']); ?>)">View</a>
                

                <a style="border: 1px solid blue;
                padding: 5px 10px;
                color:blue;
                text-decoration: none;
                " href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>

                <a style="border: 1px solid red;
                padding: 5px 10px;
                color:red;
                text-decoration: none;" 
                href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('are you sure?')">Delete</a>
                
            </td>

        </tr>
        <?php endforeach; ?>
        </table>
        </body>
        </html>