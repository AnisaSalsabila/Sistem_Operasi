<?php
@session_start();
include "koneksi.php";
if(@$_SESSION['admin']){
?>

<DOCTYPE! html>
<html>
<style type="text/css">

body{
    font-family: arial;
    font-size: 14px;
    background:url(latar.jpg);
}
</style>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<form action="" method="post" class="form-inline">
            <button type="submit" class="btn btn-primary mb-2" name="submit"><i class="fas fa-search"></i></button>
            <div class="col-sm-11">
                <input type="text" name="cari" palceholder="pencarian" autocomplete="off" class="col-sm-2 col-form-label">
            </div>
        </form>
<div>
<table class="table table-striped table-dark">

  <thead>
    <tr  align="center">
      <th scope="col">KODE BUKU</th>
      <th scope="col">NAMA BUKU</th>
      <th scope="col">STOK BUKU</th>
      <th scope="col">KATEGORI BUKU</th>
      <th scope="col">HARGA BUKU</th>
      <th scope="col" colspan="2">AKSI</th>
    </tr>
  </thead>
  <tbody>
  <?php
                include "koneksi.php";
                $rangking=1;
                if(isset($_POST['submit'])){
                    $cari=$_POST['cari'];
                    $query = mysqli_query($koneksi,"SELECT * FROM buku WHERE nm_buku LIKE '$cari%'");
                }else{
                    $query= mysqli_query($koneksi,"SELECT * FROM buku ORDER BY harga DESC ");
                }
                while ($data = mysqli_fetch_array($query)){
            ?>
    <tr>
        <td align="center"><?php echo $data['kd_buku'];?></td>
        <td align="left"><?php echo $data['nm_buku'];?></td>
        <td align="center"><?php echo $data['stok'];?></td>
        <td align="center"><?php echo $data['kategori'];?></td>
        <td align="center"><?php echo $data['harga'];?></td>
        <td align="center" width="80"><a href="edit_buku.php?id=<?php echo $data['kd_buku']; ?> "><button type="button" class="btn btn-warning">Edit</button>
        <td align="center" width="80"><a href="hapus_buku.php?id=<?php echo $data['kd_buku']; ?>"><button type="button" class="btn btn-danger">Delete</button>
        </td>
    </tr>
<?php      
 }
?>
  </tbody>
</table>
</div>
<a href="tambah_buku.php "><button type="button" class="btn btn-warning btn-lg btn-block">Tambah Buku</button>
<a href="cetak.php"><button type="button" class="btn btn-secondary btn-lg btn-block">Cetak</button>
<a href="logout.php"><button type="button" class="btn btn-danger btn-lg btn-block">logout</button>
</html>
<?php
}else{
    header("location: login.php");
}
?>