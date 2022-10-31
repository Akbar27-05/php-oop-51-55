<form action="" method="post">
    Kategori:
    <input type="text" name="kategori">
    <input type="submit" name="simpan" value="simpan">
</form>

<?php 
    require_once "../function.php";

    if (isset($_POST['simpan'])) {
        $kategori=$_POST['kategori'];

        $sql = "INSERT INTO tblkategori VALUES ('','$kategori')";
        $result = mysqli_query($koneksi,$sql);

        header("location:http://localhost/rpl/php%20mysql%2017-22/restoran/kategori/select.php");

    }

    
?>