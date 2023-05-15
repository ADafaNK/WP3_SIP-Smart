<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/5b2b770845.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <title>Admin</title>
    <link rel="stylesheet" href="assets/css/style-admin.css">
</head>
<body>
    <div class="atas">
        <input type="checkbox" id="check">
        <label for="check">
            <div id="btn">></div>
            <div id="cancel"></div>
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
                <li id="b2"><a href="hasilpanen">Hasil Panen</a></li>
                <li id="b3"><a style="background: rgb(238, 234, 226);" href="admin">Admin</a></li>
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
                    <li><a id="tombol" href="hasilpanen">Panen</a></li>
                    <li><a style="background-color: rgb(150, 209, 55); padding: 10px 20px; border-radius: 20px" id="tombol" href="admin">Admin</a></li>
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
            <section class="dp1">
                <input type="checkbox" id="centang">
                <label for="centang">
                    <div id="open">Tambah<br>Admin Baru</div>
                    <div id="close"></div>
                </label>
                <div class="tambah-tengah">
                    <form action="<?php echo base_url() . 'admin/tambah_aksi'; ?>" method="post">
                        <table class="input">
                                <input id="admin" type="text" name="id" value="44441">
                                <td class="text-light" style="border-bottom: 1px solid #c3c3c397; padding: 10px 0px 5px 16px; font-size: 20px;" colspan="2">Tambah Admin</td>
                                <tr><td></td></tr>
                                <tr>
                                <td class="text-light">Nama</td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="nama" autocomplete="off"></td>
                                </tr>
                                <td class="text-light">password</td>
                                <tr>
                                    <td><input type="text" name="pass" autocomplete="off"></td>
                                </tr>
                                <td style="border-top: 1px solid #c3c3c397;" colspan="2"></td>
                                <tr>
                                    <td>
                                        <button>Tambah</button>
                                    </td>
                                </tr>
                                <td><p>ketuk dibagian kosong untuk kembali</p></td>
                            </table>
                    </form>
                </div>

                <table class="table-table">
                    <tr id="atas">
                        <th style="width: 5px; padding-right: 3px;">No</th>
                        <th>Nama</th>
                        <th>Password</th>
                        <th id="atas-table">Action</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($dt_admin as $row) {
                    ?>
                        <tr>
                            <td widtd="5%"><?php echo $no++; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->pass; ?></td>
                            <td id="action">
                                <a href="<?php echo base_url(); ?>admin/hapus/<?php echo $row->nim; ?>" class="hapus">Hapus</a>
                                <a href="<?php echo base_url(); ?>admin/edit/<?php echo $row->nim; ?>" class="edit">Edit</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </section>
            
        <script>
            const open = document.querySelector('#open');
            const close = document.querySelector('#close');
            const modal = document.querySelector('.input');
    
            open.onclick = function() {
                modal.classList.add('show');
            }
            close.onclick = function() {
                modal.classList.remove('show');
            }
        </script>
        </div>
    </div>
    <div class="wall">
        <div class="walls"></div>
    </div>
</body>
</html>