<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
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
		border-radius: 20px;
		display: flex;
		flex-wrap: nowrap;
		justify-content: space-around;
		font-size: 15px;">
			<ul style="
				list-style: none;
				font-weight: bold;
				font-size: 17px;
				padding: 0px;
				width: 40%;			">
				<li><center>
					<h1 style="
						font-size: 25px;
						letter-spacing: 1px;
						font-weight: bold;
					">Pencarian Jadwal</h1>
					<form action="jadwal.php" method="get">
					 <input type="text" name="cari">
					 <input type="submit" value="Cari">
					</form>
				</center></li>
				<li>
					<h1 style="
						font-size: 25px;
						letter-spacing: 1px;
						font-weight: bold;
						text-align: center;
					">Jadwal Bioskop</h1>
				</li>
				<li style="">
					<table width='100%' border="1">
					    <tr>
					        <th>Judul Film</th> <th>Genre</th> <th>Tanggal</th> <th>Waktu</th>
					    </tr>
					    <?php  
					    if(isset($_GET['cari'])){
						  $cari = $_GET['cari'];

						  	$q = "CREATE VIEW film_view as SELECT * FROM film WHERE judul = '".$cari."'";
         						$sql1 = mysqli_query($connect, $q);
         						$query1 = "SELECT * FROM film_view";
       							$sql1 = mysqli_query($connect, $query1);
       							$datafilm = mysqli_fetch_array($sql1);

							$id_film = $datafilm['id_film'];

						  	$query = "SELECT * FROM jadwal WHERE id_film = $id_film";
							$sql = mysqli_query($connect, $query);
						 	while($datajadwal = mysqli_fetch_array($sql)) {

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
					        echo "</tr>"; 
					    	}    
						 }else{
						 	$query = "SELECT * FROM jadwal ORDER BY id_jadwal";
							$sql = mysqli_query($connect, $query);
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
					        echo "</tr>";       
					    	}
						}
					    ?>
					    </table>
				</li>
			</ul>
		</div>
	</section>
</main>
</body>
</html>
