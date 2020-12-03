<?php
$id = $_GET['id'];
include 'config.php';

$query1 = "SELECT * FROM admin WHERE id_admin = '$id'";
$sql1 = mysqli_query($connect, $query1);
$dataadmin = mysqli_fetch_array($sql1);

$nama = $dataadmin['username'];

$query = "SELECT * FROM jadwal ORDER BY id_jadwal";
$sql = mysqli_query($connect, $query);

$query2 = "SELECT * FROM tiket ORDER BY id_tiket";
$sql2 = mysqli_query($connect, $query2);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body style="
	padding: 0px;
	margin: 0px;
	font-family: 'serif';
">
<main>
	<section style="
			width: 100%;
			height: 100vh;
			padding: 0px;
			margin: 0px; 
		">

		<div style="width: 80%; 
		position: relative;
		left: 20vh;
		top: 10vh;
		background-color: rgba(255, 255, 255, 0.9);
		border-radius: 20px;
		display: flex;
		flex-wrap: nowrap;
		justify-content: space-around;
		font-size: 15px;">

			<form action="adminpage.php" method="post" style="
				padding: 10px;
				margin: 10px;
				border-radius: 20px;
				width: 60vh;
			"><center>
				<h1 style="
					font-size: 25px;
					letter-spacing: 1px;
					font-weight: bold;
					text-align: center;
				">SELAMAT DATANG @<?php echo $nama ?></h1>
				<a href='addjadwal.php?idadmin=<?php echo $_GET['id'];?>'><input type="" class="btn btn-primary" name="addjadwal" value="Tambah Jadwal" style="
					width: 25%;
					border-radius: 10px;
					"></a>
				 <a href='index.php'><input type="" class="btn btn-primary" name="logout" value="Logout" style="
					width: 25%;
					border-radius: 10px;
					"></a>
				<h1 style="
					font-size: 25px;
					letter-spacing: 1px;
					margin-top: 10px;
					font-weight: bold;
					text-align: center;
				">JADWAL</h1>
				<ul style="
					list-style: none;
					font-family: serif;
					font-weight: bold;
				">
					<li style="">
						<table width='100%' border="1">
						    <tr>
						        <th>Judul Film</th> <th>Genre</th> <th>Tanggal</th> <th>Waktu</th> <th>Edit</th>
						    </tr>
						    <?php  
						    while($datajadwal = mysqli_fetch_array($sql)) {
					    	$id_film = $datajadwal['id_film'];

					    	$query1 = "SELECT * FROM film WHERE id_film = '$id_film'";
							$sql1 = mysqli_query($connect, $query1);
							$datafilm = mysqli_fetch_array($sql1);

						switch ($datajadwal['waktu']) {
								case '1000':
										$waktu = "10.00 WIB";
									break;
								case '1130':
										$waktu = "11.30 WIB";
									break;
								case '1300':
										$waktu = "13.00 WIB";
									break;
								case '1430':
										$waktu = "14.30 WIB";
									break;
								case '1600':
										$waktu = "16.00 WIB";
									break;
								case '1730':
										$waktu = "17.30 WIB";
									break;
								case '1900':
										$waktu = "19.00 WIB";
									break;
								default:
									break;
							}


					        echo "<tr>";
					        echo "<td>".$datafilm['judul']."</td>";
					        echo "<td>".$datafilm['genre']."</td>";
					        echo "<td>".$datajadwal['tanggal']."</td>";
					        echo "<td>".$waktu."</td>";
					        echo "<td><a href='editjadwal.php?idjadwal=$datajadwal[id_jadwal]&idadmin=$id'>Edit</a></td>"; 
					        echo "</tr>";       
					    }
						    ?>
						    </table>
					</li>
				</ul>

				<h1 style="
					font-size: 25px;
					letter-spacing: 1px;
					font-weight: bold;
					text-align: center;
				">Data Transaksi Tiket</h1>
				<ul style="
					list-style: none;
					font-family: serif;
					font-weight: bold;
				">
					<li style="">
						<table width='100%' border="1">
						    <tr>
						        <th>Nama Pemesan</th> <th>Judul Film</th> <th>Total Beli</th> <th>Total harga</th> <th>Hapus Transaksi</th>
						    </tr>
						    <?php  
						    while($datatiket = mysqli_fetch_array($sql2)) {  
						    	$idpemesan = $datatiket['id_pemesan'];
						    	$idjadwal = $datatiket['id_jadwal'];

						    	$queryPEM = "SELECT * FROM pemesan WHERE id_pemesan = '$idpemesan'";
        						$sqlPEM = mysqli_query($connect, $queryPEM);
        						$dataPEM = mysqli_fetch_array($sqlPEM);

        						$queryJAD = "SELECT * FROM jadwal WHERE id_jadwal = $idjadwal";
        						$sqlJAD = mysqli_query($connect, $queryJAD);
        						$dataJAD = mysqli_fetch_array($sqlJAD);

								$id_film = $dataJAD['id_film'];

								$queryFIL = "SELECT * FROM film WHERE id_film = '$id_film'";
								$sqlFIL = mysqli_query($connect, $queryFIL);
								$datafilm = mysqli_fetch_array($sqlFIL);

						        echo "<tr>";
						        echo "<td>".$dataPEM['username']."</td>";
						        echo "<td>".$datafilm['judul']."</td>";
						        echo "<td>".$datatiket['jumlah_tiket']."</td>";
						        echo "<td>".$datatiket['harga_tiket']."</td>";
						        echo "<td><a href='deletetrans.php?idtrans=$datatiket[id_tiket]&idpenjual=$id'>Delete</a></td>";
						        echo "</tr>";        
						    }
						    ?>
						    </table>
					</li>
				</ul>
			</center></form>
		</div>
	</section>
</main>
</body>
</html>
