<?php
include 'config.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM tabel_barang WHERE id = ?");
$stmt->execute([$id]);
$b = $stmt->fetch();

if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $stmt = $conn->prepare("UPDATE tabel_barang SET nama_barang=?, kategori=?, harga=?, stok=? WHERE id= ?"); 
    $stmt->execute([$nama,$kategori, $harga, $stok, $id]);
    header('location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>

</head>
<body>
    <h2 style="font-weight: 700;
    font-family: poppins;
    background-color:yellowgreen;
    color: #fafafaff;
    padding: 1-px;
    text-align:center;
    ">Edit Barang</h2>
    <form method="post">
    <table align="center" cellpadding="8" cellspacing="0" border="1">

        <tr>
            <td>NAMA BARANG</td>
            <td>
                <input type="text" name="nama_barang"
                       value="<?php echo htmlspecialchars($b['nama_barang']); ?>"
                       required>
            </td>
        </tr>

        <tr>
            <td>KATEGORI</td>
            <td>
                <input type="text" name="kategori"
                       value="<?php echo htmlspecialchars($b['kategori']); ?>"
                       required>
            </td>
        </tr>

        <tr>
            <td>HARGA</td>
            <td>
                <input type="number" name="harga"
                       value="<?php echo htmlspecialchars($b['harga']); ?>"
                       required>
            </td>
        </tr>

        <tr>
            <td>STOK</td>
            <td>
                <input type="number" name="stok"
                       value="<?php echo htmlspecialchars($b['stok']); ?>"
                       required>
            </td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <button type="submit" style="
                    padding: 5px 10px;
                    color: #fafafaff;
                    background-color: yellowgreen;
                    font-weight: bold;
                    border-radius: 5px;
                    border: none;
                    font-size: 14px;
                ">
                    Update Barang
                </button>
            </td>
        </tr>

    </table>
</form>
        </body>
        </html>