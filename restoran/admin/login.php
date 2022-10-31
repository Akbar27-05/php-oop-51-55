<?php 
    session_start();
    require_once "../dbcontroler.php";
    $db = new DB;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Restoran</title>
    <link rel="stylesheet" href="../bootstrap.v5/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4 mx-auto mt-4">
                <div class="form-group">
                    <form action="" method="post">
                        <div>
                            <h3>Login Restoran</h3>
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
    </div>
</body>
</html>

<?php 
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = hash('sha256',$_POST['password']) ;

        $sql = "SELECT * FROM tbluser WHERE email='$email' AND password='$password'";

        $count = $db->rowCOUNT($sql);
        if ($count == 0) {
            echo "<center><h3>email/password salah</h3></center>";
        }else{
            $sql = "SELECT * FROM tbluser WHERE email='$email' AND password='$password'";
            $row=$db->getITEM($sql);

            $_SESSION['user']=$row['email'];
            $_SESSION['level']=$row['level'];
            $_SESSION['iduser']=$row['iduser'];

            header("location:index.php");
        }
    }
?>