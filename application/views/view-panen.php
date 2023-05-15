<!DOCTYPE html>
<html>

<head>
    <script src="https://kit.fontawesome.com/5b2b770845.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <title>Hasil Panen</title>
    <link rel="stylesheet" href="assets/css/style-panen.css">
</head>

<body>
    <div class="atas">
        <input type="checkbox" id="check">
        <label for="check">
            <div class="batal" id="btn">></div>
            <div class="a3" id="cancel"></div>
        </label>
        <div class="sidebar">
            <div class="sidebar-bg">
                <div class="sidebar-bgs"></div>
            </div>
            <div class="user">
                <?php
                include "database/database.php";
                $nama = $_SESSION['id'];
                if ($nama == "") {
                    header("location:login");
                    exit;
                } elseif ($nama == "44441") {
                    $query = mysqli_query($koneksi, "SELECT * FROM dt_admin WHERE id='$nama'");
                    $data = mysqli_fetch_array($query);
                    echo "<div class='nama'>";
                    echo "$data[nama]";
                    echo "</div>";
                    echo "<i class='fa-solid fa-star'></i>";
                    echo "<div class='id'>";
                    echo "********";
                    echo "</div><br>";
                } else {
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
                <li id="b2"><a style="background: rgb(238, 234, 226);" href="hasilpanen">Hasil Panen</a></li>
                <li id="b3"><a href="admin">Admin</a></li>
                <li id="b4"><a href="hasilpadi">Jual Beli Padi</a></li>
                <li id="b3"><a href="contact">Contact</a></li>

            </ul>
        </div>
        <section id="header"></section>
        <div class="head">
            <div class="header">
                <img src="assets/img/logo.png" alt="">
                <h2>SIP Smart</h2>
                <ul>
                    <li><a id="tombol" href="finalproject">Beranda</a></li>
                    <li><a  style="background-color: rgb(150, 209, 55); padding: 10px 20px; border-radius: 20px"id="tombol" href="hasilpanen">Panen</a></li>
                    <li><a id="tombol" href="admin">Admin</a></li>
                    <li><a id="tombol" href="hasilpadi">Produk</a></li>
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
            <form action="<?php echo base_url(). 'hasilpanen/tambah_aksi'; ?>" method="post">
                <table class="input">
                        <tr>
                            <td class="text-light">Tanggal</td>
                            <td><input type="date" name="tanggal"></td>
                        </tr>
                        <tr>
                            <td class="text-light">Jenis Padi</td>
                            <td><input type="text" name="jenis_padi"></td>
                        </tr>
                        <tr>
                            <td class="text-light">Hasil Panen</td>
                            <td><input type="text" name="hasil_panen"></td>
                        </tr>
                        <tr>
                            <td class="text-light">Hari</td>
                            <td><input type="text" name="hari"></td>
                        </tr>
                        <tr>
                            <td class="text-light">Berat</td>
                            <td><input type="text" name="berat"></td>
                        </tr>
                </table>
                <input class="tambah" type="submit" value="+">
            </form>	
            <div class="dp1">
                <table class="table-table">
                    <tr id="atas">
                        <th style="width:3%;">No</th>
                        <th id="atas-table">Tanggal</th>
                        <th id="atas-table">Jenis Padi</th>
                        <th id="atas-table">Hasil Panen</th>
                        <th id="atas-table">Hari</th>
                        <th id="atas-table">Berat</th>
                        <th id="atas-table">Action</th>
                    </tr>
                    <?php
                    $no=1;
                    foreach ($panen as $row) {
                    ?>
                        <tr id="bawah">
                            <td style="text-align:center; padding-left: 0px;"><?php echo $no++; ?></td>
                            <td><?php echo $row->tanggal; ?></td>
                            <td><?php echo $row->jenis_padi; ?></td>
                            <td><?php echo $row->hasil_panen; ?> Karung</td>
                            <td><?php echo $row->hari; ?> Hari</td>
                            <td><?php echo $row->berat; ?> Kg</td>
                            <td id="action">
                                <a href="<?php echo base_url(); ?>hasilpanen/hapus/<?php echo $row->id; ?>" class="hapus">Hapus</a>
                                <a href="<?php echo base_url(); ?>hasilpanen/edit/<?php echo $row->id; ?>" class="edit">Edit</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>

    </div>
    <div class="wall">
        <div class="walls"></div>
    </div>
</body>
</html>