<h3>Registrasi Pelanggan</h3>

<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Pelanggan</label>
            <input type="text" class="form-control" name="pelanggan" required placeholder="Isi Pelanggan">
        </div>

        <div class="form-group w-50 mt-3">
            <label for="">Alamat</label>
            <input type="text" class="form-control" name="alamat" required placeholder="Isi Alamat">
        </div>
        <div class="form-group w-50 mt-3">
            <label for="">Telp</label>
            <input type="text" class="form-control" name="telp" number required placeholder="Isi Telp">
        </div>
        <div class="form-group w-50 mt-3">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" number required placeholder="Isi Email">
        </div>
        <div class="form-group w-50 mt-3">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" number required placeholder="Password">
        </div>
        <div class="form-group w-50 mt-3">
            <label for="">Konfirmasi Password</label>
            <input type="password" class="form-control" name="konfirmasi" required placeholder="Konfirmasi Password">
        </div>
        
        <div>
            <input class="btn btn-primary mt-2" type="submit" value="simpan" name="simpan">
        </div>
    </form>
</div>

<?php 
    if (isset($_POST['simpan'])) {
        $pelanggan = $_POST['pelanggan'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];

        if ($password == $konfirmasi) {
            $sql = "INSERT INTO tblpelanggan VALUES ('','$pelanggan','$alamat',$telp,'$email','$password',1)";

            $db->runSQL($sql);
            header("location:?f=home&m=info");
        }else{
            echo "<h3>Password Tidak Cocok!</h3>";
        }

    }
?>