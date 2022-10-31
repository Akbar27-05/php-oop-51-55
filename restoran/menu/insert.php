<?php 
    $row = $db->getALL("SELECT * FROM tblkategori ORDER BY kategori ASC");
?>
<h3>Insert Menu</h3>

<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group w-50">
            
            <label for="">Kategori</label> <br>
            
            <select name="idkategori" id="">
            
            <?php foreach($row as $r): ?>
            <option value="<?php echo $r['idkategori']?>"> <?php echo $r['kategori']?>
            </option>
            <?php endforeach?>
            
        </select>
        </div>

        <div class="form-group w-50 mt-3">

            <label for="">Menu</label>
            <input type="text" class="form-control" name="menu" required placeholder="isi menu">
        </div>

        <div class="form-group w-50 mt-3">
            
            <label for="">Harga</label>
            <input type="text" class="form-control" name="harga" number required placeholder="isi harga">
        </div>

        <div class="form-group w-50 mt-3">
            
            <label for="">Gambar</label>
            <input type="file" class="form-control" name="gambar">
        </div>

        <div>
            <input class="btn btn-primary mt-2" type="submit" value="simpan" name="simpan">
        </div>
    </form>
</div>

<?php 
    if (isset($_POST['simpan'])) {
        $idkategori = $_POST['idkategori'];
        $menu = $_POST['menu'];
        $harga = $_POST['harga'];
        $gambar = $_FILES['gambar']['name'];
        $temp = $_FILES['gambar']['tmp_name'];

        if (empty($gambar)) {
            echo "<h3>Masukan Gambar</h3>";
        }else {
            $sql = "INSERT INTO tblmenu VALUES ('',$idkategori,'$menu','$gambar',$harga)";
            
            move_uploaded_file($temp,'../upload/'.$gambar);
            
            $db->runSQL($sql);
            header("location:?f=menu&m=select");
        }
    }
?>