<!DOCTYPE html>
<html>

<head>
    <script src="https://kit.fontawesome.com/5b2b770845.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <title>Web Pertanian</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style-admin.css">
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
                }
                elseif($nama=="44441"){
                    echo "<div class='nama'>";
                    echo "Admin";
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
                <li id="b4"><a href="admin">Admin</a></li>
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
<?php foreach($dt_admin as $u){ ?>
	<form action="<?php echo base_url(). 'admin/update'; ?>" method="post">
		<table style="margin-top: 10%;">
			<tr>
				<td class="text-light">Nama</td>
				<td>
					<input type="hidden" name="nim" value="<?php echo $u->nim ?>">
					<input type="text" name="nama" value="<?php echo $u->nama ?>">
				</td>
			</tr>
			<tr>
				<td class="text-light">password</td>
				<td><input type="text" name="pass" value="<?php echo $u->pass ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>
</div>
</div>
    <div class="wall">
        <div class="walls"></div>
    </div>

</body>

</html>