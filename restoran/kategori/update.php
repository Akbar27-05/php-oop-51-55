<?php 
    if (isset($_GET['id'])) {
        $id=$_GET['id'];

        $sql = "SELECT * FROM tblkategori WHERE idkategori = $id";

        $row=$db->getITEM($sql);
    }
?>

<h3>Ubah Kategori</h3>

<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Ubah</label>
            <input type="text" name="kategori" required value="<?php echo $row['kategori']?>" class="form-control">
        </div>
        <div>
            <input class="btn btn-primary mt-2" type="submit" value="simpan" name="simpan">
        </div>
    </form>
</div>

<?php 
    if (isset($_POST['simpan'])) {
        $kategori = $_POST['kategori'];

        $sql = "UPDATE tblkategori SET kategori='$kategori' WHERE idkategori=$id";

        $db->runSQL($sql);

        header("location:?f=kategori&m=select");
    }
?>