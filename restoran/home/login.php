
        <div class="row">
            <div class="col-4 mx-auto mt-4">
                <div class="form-group">
                    <form action="" method="post">
                        <div>
                            <h3>Login Pelanggan</h3>
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div>
                        <input class="btn btn-primary mt-2" type="submit" value="LOGIN" name="login">
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php 
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1";

        $count = $db->rowCOUNT($sql);
        if ($count == 0) {
            echo "<center><h3>email/password salah</h3></center>";
        }else{
            $sql = "SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1";
            $row=$db->getITEM($sql);

            $_SESSION['pelanggan']=$row['email'];
            $_SESSION['idpelanggan']=$row['idpelanggan'];

            header("location:index.php");
        }
    }
?>
