<?php
$id = $_GET['idadmin'];
include 'config.php';

if (ISSET($_POST['submit'])) {
    $tanggal =$_POST['tanggal'];
    $jam =$_POST['jam'];
    $judul = $_POST['judul'];
    $idadmin = $_POST['idadmin'];

    $query = "SELECT * FROM film WHERE judul='$judul'";
	$sql = mysqli_query($connect, $query);
	$datafilm = mysqli_fetch_array($sql);

	if($datafilm) {
		$idfilm = $datafilm['id_film'];

		$result = mysqli_query($connect, "INSERT INTO jadwal VALUES('','$idfilm','$idadmin','$tanggal','$jam')");

		header("Location: adminpage.php?id=$idadmin");
	}

	if(!$datafilm){
		?>
			<script type="text/javascript">
				alert("Judul Salah!");
			</script>
		<?php
	}
}
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

			<form action="addjadwal.php" method="post" style="
				padding: 10px;
				margin: 10px;
				border-radius: 20px;
				width: 60vh;
			">
				<h1 style="
					font-size: 25px;
					letter-spacing: 1px;
					font-weight: bold;
					text-align: center;
				">TAMBAH JADWAL</h1>
				<ul style="
					list-style: none;
					font-family: serif;
					font-weight: bold;
				">
					<li style="">
						<table width='100%' border="0">
					            <tr> 
					                <td>Judul</td>
					                <td><input type="text" style="width: 80%" name="judul" placeholder="Judul Film"></td>
					            </tr>
					            <tr>
					            	<td></td>
					            	<td></td>
					            </tr>
					            <tr> 
					                <td>Tanggal</td>
					                <td><input type="date" style="width: 80%" name="tanggal" placeholder="Tanggal"></td>
					            </tr>
					            <tr>
					            	<td></td>
					            	<td></td>
					            </tr>
					            <tr> 
					                <td>Waktu</td>
					                <td><select class="select" name="jam" style="
								 			width: 80%;
								 			padding: 5px;
								 			border-radius: 5px;
								 			cursor: pointer;
								 		">
								 			<optgroup label="JAM">
								 				<option value="1000">10.00 WIB</option>
								 				<option value="1130">11.30 WIB</option>
								 				<option value="1300">13.00 WIB</option>
								 				<option value="1430">14.30 WIB</option>
								 				<option value="1600">16.00 WIB</option>
								 				<option value="1730">17.30 WIB</option>
								 				<option value="1900">19.00 WIB</option>
								 			</optgroup>
								 		</select>
								 	</td>
					            </tr>
					            <tr>
					                <td><input type="hidden" name="idadmin" value=<?php echo $_GET['idadmin'];?>></td>
					            </tr>
					    </table>
					</li>
				</ul>
				<button type="submit" name="submit" class="btn btn-primary" style="
					outline: none;
							border: none;
							border-radius: 10px;
							font-size: 17px;
							padding:5px 10px 5px 10px;
							margin-top: 5px;
							margin-bottom: 10px;
							width: 30vh;
							margin-left: 15vh;
							margin-right: 15vh;
							cursor: pointer;
				">Tambah</button>
			</form>
		</div>
	</section>
</main>
</body>
</html>