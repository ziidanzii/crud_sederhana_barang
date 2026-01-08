<?php
include ("config.php");
if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $stmt = $conn->prepare("INSERT INTO tabel_barang (nama_barang, kategori, harga, stok) VALUES 
    (?, ?, ?, ?)");
    $stmt->bindParam($nama_barang, $kategori, $harga, $stok);
    $stmt->execute([$nama_barang,$kategori, $harga, $stok]);
    header('location: index.php');
    exit();
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> Tambah Barang</title>
    </head>
    <body>
        <h2 style="font-weight: 700;
        font-family:poppins;
        background-color: yellowgreen;
        color: floralwhite;
        padding: 10px;
        text-align: center;">
        Tambah barang</h2>
        <form method="post">
            <table align="center" cellpadding="8" cellspacing+"0" border="1">
            <tr>    
            <td>nama barang</td>
                <td><input type="text" name="nama_barang" required></td>
           </tr>

            <tr>    
            <td>kategori</td>
                <td><input type="text" name="kategori" required></td>
           </tr>

            <tr>    
            <td>harga</td>
                <td><input type="text" name="harga" required></td>
           </tr>

            <tr>    
            <td>stok</td>
                <td><input type="text" name="stok" required></td>
           </tr>

           <tr>
            <td colspan="2" align="center">
                <button type="submit" style="
                padding: 5px 10px;
                color: floralwhite;
                background-color:yellowgreen;
                font-weight:bold;
                border-radius: 5px;
                border: none;
                font-size: 14px;">simpan</button>
            </td>
           </tr>
            </table>
        </form>
    </body>