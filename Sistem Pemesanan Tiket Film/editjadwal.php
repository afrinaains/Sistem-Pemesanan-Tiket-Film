<?php
$idadmin = $_GET['idadmin'];
$idjadwal = $_GET['idjadwal'];
include 'config.php';

$query = "SELECT * FROM jadwal WHERE id_jadwal='$idjadwal'";
$sql = mysqli_query($connect, $query);
$datajadwal = mysqli_fetch_array($sql);

$idfilm = $datajadwal['id_film'];

$query1 = "SELECT * FROM film WHERE id_film='$idfilm'";
$sql1 = mysqli_query($connect, $query1);
$datafilm = mysqli_fetch_array($sql1);

$judul = $datafilm['judul'];
$tanggal = $datajadwal['tanggal'];
$waktu = $datajadwal['waktu'];

if (ISSET($_POST['submit'])) {
    $tanggalafter =$_POST['tanggal'];
    $jamafter =$_POST['waktu'];
    $idjadwal = $_POST['idjadwal'];
    $idadmin = $_POST['idadmin'];

	$result = mysqli_query($connect, "UPDATE jadwal SET id_admin='$idadmin', tanggal='$tanggalafter', waktu='$jamafter' WHERE id_jadwal='$idjadwal'");

	header("Location: adminpage.php?id=$idadmin");
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

			<form action="editjadwal.php" method="post" style="
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
				">UPDATE JADWAL</h1>
				<ul style="
					list-style: none;
					font-family: serif;
					font-weight: bold;
				">
					<li style="">
						<table width='100%' border="0">
					            <tr> 
					                <td>Nama</td>
					                <td><?php echo $judul;?></td>
					            </tr>
					            <tr> 
					                <td>Tanggal</td>
					                <td><input type="text" style="width: 85%" name="tanggal" value="<?php echo $tanggal;?>"></td>
					            </tr>
					            <tr> 
					                <td>Waktu</td>
					                <td><input type="text" style="width: 85%" name="waktu" value="<?php echo $waktu;?>"></td>
					            </tr>
					            <tr>
					                <td><input type="hidden" name="idjadwal" value=<?php echo $_GET['idjadwal'];?>></td>
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
				">Update</button>
			</form>
		</div>
	</section>
</main>
</body>
</html>