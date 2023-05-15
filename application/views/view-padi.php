<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/5b2b770845.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <title>Jual Beli Padi</title>
    <link rel="stylesheet" href="assets/css/style-padi.css">
</head>
<body>
    <div class="atas">
        <input type="checkbox" id="check">
        <label for="check">
            <div class="batal" id="btn">></div>
            <div class="a3" id="cancel"></div>
        </label>
        <div class="sidebar">
            <div class="user">
                <?php
                include "database/database.php";
                $nama = $_SESSION['id'];
                if ($nama == "") {
                    header("location:login");
                    exit;
                }
                elseif($nama=="44441"){
                    $query = mysqli_query($koneksi, "SELECT * FROM dt_admin WHERE id='$nama'");
                    $data = mysqli_fetch_array($query);
                    echo "<div class='nama'>";
                    echo "$data[nama]";
                    echo "</div>";
                    echo "<i class='fa-solid fa-star'></i>";
                    echo "<div class='id'>";
                    echo "********";
                    echo "</div><br>";
                } 
                else {
                    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$nama'");
                    $data = mysqli_fetch_array($query);
                    echo "<div class='nama'>";
                    echo "$data[nama]";
                    echo "</div>";
                    echo "<i class='fa-solid fa-circle-user'></i>";
                    echo "<div class='id'>";
                    echo $_SESSION['id'];
                    echo "</div><br>";
                }
                ?>
            </div>
            <ul>
                <li id="b1"><a href="finalproject">Home</a></li>
                <li id="b2"><a href="hasilpanen">Hasil Panen</a></li>
                <li id="b3"><a href="admin">Admin</a></li>
                <li id="b4"><a style="background: rgb(238, 234, 226);" href="hasilpadi">Jual Beli Padi</a></li>
                <li id="b5"><a href="contact">Contact</a></li>
            </ul>
            <div class="sidebar-bg">
                <div class="sidebar-bgs"></div>
            </div>
        </div>
        <section id="header"></section>
        <div class="head">
            <div class="header">
                <img src="assets/img/logo.png" alt="">
                <h2>SIP Smart</h2>
                <ul>
                    <li><a id="tombol" href="finalproject">Beranda</a></li>
                    <li><a href="hasilpanen">Panen</a></li>
                    <li><a id="tombol" href="admin">Admin</a></li>
                    <li><a  style="background-color: rgb(150, 209, 55); padding: 10px 20px; border-radius: 20px"id="tombol" id="tombol" href="hasilpadi">Produk</a></li>
                    <li><a id="tombol" href="contact">Kontak</a></li>
                    <li>
                        <input type="checkbox" id="checklogout">
                        <label for="checklogout">
                            <span>
                                LogOut
                                <div class="labellogout">
                                    <a href="login"><i class="fa-solid fa-right-from-bracket"></i></a>
                                </div>  
                            </span>
                        </label>
                    </li>
                </ul>
                <a id="back" href="#header"><i class="fa-solid fa-up-long"></i></a>
            </div>
        </div>
        <script>
            window.addEventListener("scroll", function() {
                var header = document.querySelector(".header");
                header.classList.toggle("bar", window.scrollY > 0);
            })
        </script>
        <div class="s1">
            <div class="border-tambah">
                <a href="<?php echo base_url(); ?>hasilpadi/tambah/" class="tambah">Tambah<br>Produk</a>
            </div>
            <div class="table">
                <table class="table-table">
                    <?php foreach ($padi as $row) { ?>
                        <div class="isitable">
                            <img src="assets/img/bsi.png" alt="">
                            <div class="tanggal"><?php echo $row->tanggal; ?></div>
                            <div class="deskripsi"><?php echo $row->deskripsi; ?></div>
                            <div class="alamat"><?php echo $row->alamat; ?></div>
                            <div class="harga">Harga : <?php echo $row->harga; ?></div>
                            <a href="<?php echo base_url(); ?>hasilpadi/hapus/<?php echo $row->id; ?>" class="hapus"><i class="fa-solid fa-xmark"></i></a>
                            <a href="<?php echo base_url(); ?>hasilpadi/edit/<?php echo $row->id; ?>" class="edit">Edit</a>
                        </div>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="wall">
        <div class="walls"></div>
    </div>
</body>
</html>