

<?php 
    require_once '../function.php';

    $sql = "SELECT * FROM tblkategori WHERE  idkategori = $id";
    $result = mysqli_query($koneksi, $sql);

    $row=mysqli_fetch_assoc($result);
?>

<form action="" method="post">
    Kategori:
    <input type="text" name="Kategori" value="<?php echo $row['kategori']?>">
    <br>
    <input type="submit" value="simpan" name="simpan">
</form>

<?php 
if (isset($_POST['simpan'])) {
    $kategori = $_POST['Kategori'];

    $sql = "UPDATE tblkategori set kategori = '$kategori' WHERE idkategori = $id";

    $result = mysqli_query($koneksi, $sql);

    header("location:select.php");
}
?>