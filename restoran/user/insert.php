<h3>Insert User</h3>

<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Nama / User</label>
            <input type="text" class="form-control" name="user" required placeholder="nama/isi user">
        </div>

        <div class="form-group w-50 mt-3">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" required placeholder="Email">
        </div>
        <div class="form-group w-50 mt-3">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" number required placeholder="Password">
        </div>
        <div class="form-group w-50 mt-3">
            <label for="">Konfirmasi Password</label>
            <input type="password" class="form-control" name="konfirmasi" required placeholder="Konfirmasi Password">
        </div>
        <div class="form-group w-50 mt-3">
            <label for="">Label</label> <br>
            <select name="level" id="">
                <option value="admin">Admin</option>
                <option value="koki">Koki</option>
                <option value="kasir">Kasir</option>
            </select>
        </div>


        <div>
            <input class="btn btn-primary mt-2" type="submit" value="simpan" name="simpan">
        </div>
    </form>
</div>

<?php 
    if (isset($_POST['simpan'])) {
        $user = $_POST['user'];
        $email = $_POST['email'];
        $password = hash('sha256',$_POST['password']);
        $konfirmasi = hash('sha256',$_POST['konfirmasi']);
        $level = $_POST['level'];

        if ($password == $konfirmasi) {
            $sql = "INSERT INTO tbluser VALUES ('','$user','$email','$password','$level',1)";

            $db->runSQL($sql);
            header("location:?f=user&m=select");
        }else{
            echo "<h3>Password Tidak Cocok!</h3>";
        }

    }
?>