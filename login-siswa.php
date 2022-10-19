<div class="container">
<h1 class="text-center">Login Form</h1>
<form action="login-siswa.php" method="POST" class="w-25 mx-auto">
    <label>Username</label><br>
    <input class="form-control" type="text" name="username" placeholder="Ex.Farel" required/>
    <br>
    <label>Password</label><br>
    <input class="form-control" type="password" name="password" placeholder="Ex.---" required/>
    <br>
    <input class="form-control btn btn-primary btn-sm" type="submit" name="login" value="masuk"/>
    <form>

    <?php
    include('./config.php');

    if ( isset($_POST["login"]) ){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM akun
        WHERE username = '$username' AND password = MD5('$password'); ";
        $data = mysqli_query($mysqli, $query);
        if (mysqli_num_rows($data) > 0){
            $row=mysqli_fetch_array($data);

            $_SESSION["login"] = TRUE;
            $_SESSION["akun_id"]=$row["akun_id"];
            $_SESSION["username"]=$row["username"];
            $_SESSION["password"]=$row["password"];
            $_SESSION["nama_akun"]=$row["nama_akun"];
            $_SESSION["role"]=$row["role"];
            echo "
            <script>
            alert('login berhasil');
            window.location='input-nilai.php';
            </script>
        ";
    }else{
        echo "
            <script>
            alert('login gagal');
            window.location='login-siswa.php';
            </script>
        ";
      }
    }
?>