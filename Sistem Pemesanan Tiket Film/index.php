<?php
ob_start();

	if (ISSET($_POST['submit'])){
		 include 'config.php';
		 $username = $_POST['username'];
		 $film = $_POST['judulFilm'];
		 $jam = $_POST['jam'];
		 $tanggal = $_POST['tanggal'];
		 $tiket = $_POST['totaltiket'];		 

	switch ($film) {
		case 'titanic':
				$query = "SELECT * FROM film WHERE judul = 'Titanic'";
				$sql = mysqli_query($connect, $query);
				$datafilm = mysqli_fetch_array($sql);

				$idfilm = $datafilm['id_film'];
			break;
		case 'yowisben':
				$query = "SELECT * FROM film WHERE judul = 'YOWIS BEN'";
				$sql = mysqli_query($connect, $query);
				$datafilm = mysqli_fetch_array($sql);

				$idfilm = $datafilm['id_film'];
			break;
		case 'bucin':
				$query = "SELECT * FROM film WHERE judul = 'BUCIN'";
				$sql = mysqli_query($connect, $query);
				$datafilm = mysqli_fetch_array($sql);

				$idfilm = $datafilm['id_film'];
			break;
		case 'moneyheist':
				$query = "SELECT * FROM film WHERE judul = 'MONEY HEIST'";
				$sql = mysqli_query($connect, $query);
				$datafilm = mysqli_fetch_array($sql);

				$idfilm = $datafilm['id_film'];
			break;
		case 'kadaver':
				$query = "SELECT * FROM film WHERE judul = 'KADAVER'";
				$sql = mysqli_query($connect, $query);
				$datafilm = mysqli_fetch_array($sql);

				$idfilm = $datafilm['id_film'];
			break;
		case 'microhabitat':
				$query = "SELECT * FROM film WHERE judul = 'MICROHABITAT'";
				$sql = mysqli_query($connect, $query);
				$datafilm = mysqli_fetch_array($sql);

				$idfilm = $datafilm['id_film'];
			break;

		default:

			break;
	};
	switch ($jam) {
		case '1000':
				$query1 = "SELECT * FROM jadwal WHERE waktu = '$jam' and id_film = '$idfilm'";
				$sql1 = mysqli_query($connect, $query1);
				$datajadwal = mysqli_fetch_array($sql1);

				if(!$datajadwal) {
					?>
					<script type="text/javascript">
						alert("Jadwal Tidak Ada!");
					</script>
					<?php
				};

				if($datajadwal) {
					$idjadwal = $datajadwal['id_jadwal'];;
				};
			break;
		case '1130':
				$query1 = "SELECT * FROM jadwal WHERE waktu = '$jam' and id_film = '$idfilm'";
				$sql1 = mysqli_query($connect, $query1);
				$datajadwal = mysqli_fetch_array($sql1);

				if(!$datajadwal) {
					?>
					<script type="text/javascript">
						alert("Jadwal Tidak Ada!");
					</script>
					<?php
				};

				if($datajadwal) {
					$idjadwal = $datajadwal['id_jadwal'];
				};
			break;
		case '1300':
				$query1 = "SELECT * FROM jadwal WHERE waktu = '$jam' and id_film = '$idfilm'";
				$sql1 = mysqli_query($connect, $query1);
				$datajadwal = mysqli_fetch_array($sql1);

				if(!$datajadwal) {
					?>
					<script type="text/javascript">
						alert("Jadwal Tidak Ada!");
					</script>
					<?php
				};

				if($datajadwal) {
					$idjadwal = $datajadwal['id_jadwal'];
				};
			break;
		case '1430':
				$query1 = "SELECT * FROM jadwal WHERE waktu = '$jam' and id_film = '$idfilm'";
				$sql1 = mysqli_query($connect, $query1);
				$datajadwal = mysqli_fetch_array($sql1);

				if(!$datajadwal) {
					?>
					<script type="text/javascript">
						alert("Jadwal Tidak Ada!");
					</script>
					<?php
				};

				if($datajadwal) {
					$idjadwal = $datajadwal['id_jadwal'];
				};
			break;
		case '1600':
				$query1 = "SELECT * FROM jadwal WHERE waktu = '$jam' and id_film = '$idfilm'";
				$sql1 = mysqli_query($connect, $query1);
				$datajadwal = mysqli_fetch_array($sql1);

				if(!$datajadwal) {
					?>
					<script type="text/javascript">
						alert("Jadwal Tidak Ada!");
					</script>
					<?php
				};

				if($datajadwal) {
					$idjadwal = $datajadwal['id_jadwal'];
				};
			break;
		case '1730':
				$query1 = "SELECT * FROM jadwal WHERE waktu = '$jam' and id_film = '$idfilm'";
				$sql1 = mysqli_query($connect, $query1);
				$datajadwal = mysqli_fetch_array($sql1);

				if(!$datajadwal) {
					?>
					<script type="text/javascript">
						alert("Jadwal Tidak Ada!");
					</script>
					<?php
				};

				if($datajadwal) {
					$idjadwal = $datajadwal['id_jadwal'];
				};
			break;
		case '1900':
				$query1 = "SELECT * FROM jadwal WHERE waktu = '$jam' and id_film = '$idfilm'";
				$sql1 = mysqli_query($connect, $query1);
				$datajadwal = mysqli_fetch_array($sql1);

				if(!$datajadwal) {
					?>
					<script type="text/javascript">
						alert("Jadwal Tidak Ada!");
					</script>
					<?php
				};

				if($datajadwal) {
					$idjadwal = $datajadwal['id_jadwal'];
				};
			break;
		default:
			break;
	};

	$query2 = "SELECT * FROM pemesan WHERE username = '$username'";
	$sql2 = mysqli_query($connect, $query2);
	$datauser = mysqli_fetch_array($sql2);

	if(!$datauser){
		?>
			<script type="text/javascript">
				alert("Username tidak ditemukan!");
			</script>
		<?php
	}

	if($datauser){
		$idpemesan = $datauser['id_pemesan'];
	}

	$harga = $tiket*50000;

	$sql1 = "INSERT INTO tiket VALUES('','$idpemesan','$idjadwal','$tiket', '$harga')";
	$result1 = mysqli_query($connect, $sql1);

	if($result1){
		?>
			<script type="text/javascript">
				alert("Berhasil!");
			</script>
		<?php
	}

 	}
 ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
	<title>AfrinTix</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body style=" 
	font-family: "comic sans"; 
	">
<main>
	<center><div class="container-PB" id="PB" style="
		display: flex;
		width: 40%;
		position: relative;
		border-radius: 15px;
		top: 7vh;
	">
		<section class="cont-form">
			<form id="res" action="index.php" method="post" style="
				background-color: rgba(76,255,76,0.3);
				width: 60vh;
				padding: 30px;
				margin-bottom: 20px;
				margin-top: 20px;
				margin-left: 10%;
				border-radius: 10px;
				top: 5vh;
			">
				<h2 id="pb1" style="font-size: 25px; font-weight: bold; text-align: center;">Pemesanan Tiket</h2>
				 <table width='100%' border="0">
		            <tr> 
		                <td>Username</td>
		                <td><input type="text" style="width: 85%" name="username" placeholder="Username"></td>
		            </tr>
		            <tr> 
		                <td>Tanggal</td>
		                <td><input type="date" style="width: 85%" name="tanggal" placeholder="Tanggal" "></td>
		            </tr>
		            <tr> 
		                <td>Judul Film</td>
		                <td><select class="select" name="judulFilm" style="width: 85%">
				 			<optgroup label="Judul Film">
				 				<option value="titanic">Titanic</option>
				 				<option value="yowisben">YOWIS BEN</option>
				 				<option value="bucin">BUCIN</option>
				 				<option value="moneyheist">MONEYHEIST</option>
				 				<option value="kadaver">KADAVER</option>
				 				<option value="microhabitat">MicroHabitat</option>
				 			</optgroup>
				 		</select></td>
		            </tr>
		            <tr> 
		                <td>Jam</td>
		                <td><select class="select" name="jam" style="
				 			width: 85%;">
				 			<optgroup label="JAM">
				 				<option value="1000">10.00 WIB</option>
				 				<option value="1130">11.30 WIB</option>
				 				<option value="1300">13.00 WIB</option>
				 				<option value="1430">14.30 WIB</option>
				 				<option value="1600">16.00 WIB</option>
				 				<option value="1730">17.30 WIB</option>
				 				<option value="1900">19.00 WIB</option>
				 			</optgroup>
				 		</select></td>
		            </tr>
		            <tr> 
		                <td>Jumlah Tiket</td>
		                <td><input type="text" style="width: 85%" name="totaltiket" placeholder="Total Tiket" "></td>
		            </tr>
		        </table>

				 <!-- Submit Button -->
				 <input type="submit" class="btn btn-primary" name="submit" value="Pesan" style="
					width: 49%;
					margin-top: 15px;
					border-radius: 10px;
					">
				 <input type="reset" class="btn btn-primary" name="reset" value="Reset" style="
					width: 49%;
					margin-top: 15px;
					border-radius: 10px;
					">
				 <a href="pemesan.php"><button type="button" class="btn btn-primary" name="daftar" style="
					width: 100%;
					margin-top: 15px;
					border-radius: 10px;
					">Daftar</button></a>
				 <a href="jadwal.php"><button type="button" class="btn btn-primary" name="daftar" style="
						width: 100%;
						margin-top: 15px;
						border-radius: 10px;
						">Lihat Jadwal Film</button></a>
			</form>
		</section>
	</div></center>
</main>
</body>
</html>