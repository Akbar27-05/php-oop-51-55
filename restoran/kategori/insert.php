<h3>Insert Kategori</h3>

<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Kategori</label>
            <input type="text" class="form-control" name="kategori" required placeholder="isi kategori">
        </div>
        <div>
            <input class="btn btn-primary mt-2" type="submit" value="simpan" name="simpan">
        </div>
    </form>
</div>

<?php 
    if (isset($_POST['simpan'])) {
        $kategori = $_POST['kategori'];

        $sql = "INSERT INTO tblkategori VALUES ('','$kategori')";

        $db->runSQL($sql);

        header("location:?f=kategori&m=select");
    }
?>