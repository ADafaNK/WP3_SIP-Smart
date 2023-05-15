<?php
include "database/database.php";
?>
<html>

<head>
    <script src="https://kit.fontawesome.com/5b2b770845.js" crossorigin="anonymous"></script>
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style-login.css">
</head>

<body>
    <section class="wall">
        <div class="walls"></div>
    </section>
    <form method="post">
        <center>
            <header>
                <div class="kotak">
                    <img style="width: 225px; height:338px;" src="https://img.freepik.com/premium-photo/beautiful-view-rice-fields-morning-with-reflection-sunrise_80375-470.jpg?w=740" alt="">
                    <div class="head">Welcome</div>
                    <ul>
                        <li><input type="text" name="id" autofocus placeholder="ID"></li>
                        <li><input type="password" name="password" placeholder="Password"></li>
                        <input class="login" type="submit" name="login" value="Login" required="">
                        <hr>
                        <li><a href="registrasi">Registrasi!</a></li>
                    </ul>
                </div>
            </header>
            <p>Sistem Informasi Pertanian</p>
        </center>
    </form>
    <?php
    if (isset($_POST['login'])) {
        $id = $_POST['id'];
        $pass = $_POST['password'];
        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id' AND pass='$pass'");
        $cek = mysqli_num_rows($query);
        $query_admin = mysqli_query($koneksi, "SELECT * FROM dt_admin WHERE id='$id' AND pass='$pass'");
        $cek_admin = mysqli_num_rows($query_admin);
        if ($cek_admin == 1) {
            $_SESSION['id'] = $id;
            header("location:finalproject");
            exit;
        } elseif ($cek == 1) {
            $_SESSION['id'] = $id;
            header("location:fp_user");
            exit;
        } elseif ($id == "") {
            echo "<input onclick='salah()'><script>function salah(){confirm('ID Tidak Ditemukan')}</script>";
        } else {
            echo "<div class='notif'><i class='fa-solid fa-triangle-exclamation'></i>Password Salah!!</div>";
        }
    }
    ?>
    </div>
</body>

</html>