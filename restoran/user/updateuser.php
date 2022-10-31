<?php 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tbluser WHERE iduser=$id";
        $row=$db->getITEM($sql);
    }
?>

<h3>update user</h3>

<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">Nama / User</label>
            <input type="text" class="form-control" name="user" required value="<?php echo $row['user']?>">
        </div>

        <div class="form-group w-50 mt-3">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" required value="<?php echo $row['email']?>">
        </div>
        <div class="form-group w-50 mt-3">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" number required value="<?php echo $row['password']?>">
        </div>
        <div class="form-group w-50 mt-3">
            <label for="">Konfirmasi Password</label>
            <input type="password" class="form-control" name="konfirmasi" required value="<?php echo $row['password']?>">
        </div>
        <div class="form-group w-50 mt-3">
            <label for="">Label</label> <br>
            <select name="level" id="">
                <option value="admin" <?php if ($row['level']=="admin") echo "selected"?> >Admin</option>
                <option value="koki" <?php if ($row['level']=="koki") echo "selected"?> >Koki</option>
                <option value="kasir" <?php if ($row['level']=="kasir") echo "selected"?> >Kasir</option>
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
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];
        $level = $_POST['level'];

        if ($password == $konfirmasi) {
            $sql = "UPDATE tbluser SET user='$user', email='$email', password='$password', level='$level' WHERE iduser=$id";

            $db->runSQL($sql);
            header("location:?f=user&m=select");
        }else{
            echo "<h3>Password Tidak Cocok!</h3>";
        }

    }
?>