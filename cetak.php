<?php

//Jika download plugin mpdf dengan composer (versi baru)
include 'vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
 
//Menggabungkan dengan file koneksi yang telah kita buat
include 'koneksi.php';
 
$nama_dokumen='hasil-ekspor';
ob_start();
?>
 
<!DOCTYPE html>
<html>
<body>
	<div>
		<h2 align="center">Laporan Data Buku</h2>
        <hr>
 
		<table width="125%" border="1">
	    	<thead>
            <tr>
    <th>Kode Buku</th>
    <th>Nama Buku</th>
    <th>Stock Buku</th>
    <th>kategori Buku</th>
    <th>Harga Buku</th>
</tr>
<?php
$data= mysqli_query($koneksi,"SELECT * FROM buku");
while($dt=mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?php echo $dt['kd_buku'];?></td>>
        <td><?php echo $dt['nm_buku'];?></td>
        <td><?php echo $dt['stok'];?></td>
        <td><?php echo $dt['kategori'];?></td>
        <td><?php echo $dt['harga'];?></td>
    </tr>
<?php
}

?>
	    	</tbody>
	    </table>
 
    </div>
 
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
 
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("".$nama_dokumen.".pdf" ,'I');
$db1->close();
?>