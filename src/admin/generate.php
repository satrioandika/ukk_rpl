<?php

$title = 'Generate Laporan';

require '../../public/app.php';

// require '../layouts/header.php';

// require '../layouts/navAdmin.php';


// logic backend

$query = "SELECT * FROM (( tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan )
                          INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas )";

$result = mysqli_query($conn, $query);

?>


<body>
<style type="text/css">
.head {
	width:100%;
	height:100px;
	border-bottom:1px solid;
	}

</style>
<div class="head">
	<center>
<table>
<tr>
<center><td align="center" width="100%"><font style="font-size:22px; font-family:Arial, Helvetica, sans-serif; text-align:center;">PEMERINTAH KABUPATEN JOMBANG<br />KECAMATAN KESAMBEN<br/>DESA JOMBATAN</font><br /><i><font style="font-size:15px;">Jl. Sedap Malam No 11 Jombatan-Kesamben-Jombang 61484</font></i></td></center>
</tr>
</table>
</center>
</div><br /><br />
<div style="font-size:24px; text-align:center;">Laporan Pengaduan Masyarakat</div><br /><br />
<table align="center" border="1" cellpadding="12" cellspacing="0">
<tr>
			<th>No</th>
			<th>Tgl Pengaduan</th>
			<th>NIK</th>
      <th>Isi Laporan</th>
      <th>Foto</th>
		</tr>
<?php
$no = 1;
$query = mysqli_query ($conn, "SELECT * FROM pengaduan WHERE tgl_pengaduan");
if (mysqli_num_rows ($query)){
while ($data = mysqli_fetch_array ($query)) {
?>
<tr align="left">
<tr>
<td><?php echo $no++ ?></td>
<td><?php echo $data['tgl_pengaduan'] ?></td>
<td><?php echo $data['nik'] ?></td>
<td><?php echo $data['isi_laporan'] ?></td>
<td><img src="../../assets/img/<?= $row["foto"]; ?>" width="50"></td>
</tr>
<?php }}else{
	echo '<tr><td colspan="6" align="center">TIDAK ADA DATA</td></tr>';
}?>
</table>
<br/><br><br><br>
<table class="titik">
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jombatan,.........................<script>document.write(new Date().getFullYear());</script></td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KEPALA DESA JOMBATAN</td>
</tr>
</table>
<br/><br/><br/><br/>
<table class="titik">
<tr>
<td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>. . . . . . . . . . . . . . . . . . . . . .</u></b></td>
</tr>
</table>
<script>
window.print() 
</script>
</body>
<?php require '../layouts/footer.php'; ?>