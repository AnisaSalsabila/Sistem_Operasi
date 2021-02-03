<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $ambilData = mysqli_query($koneksi,"SELECT * FROM buku WHERE kd_buku='$id'");
    $data = mysqli_fetch_array($ambilData)

?> 

<DOCTYPE! html>
<html>
<head>
</head>
<body>
<div class="main_content">
        <div class="header" align="center">Edit Buku</div>
        <div class="info">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        </head>
            <body>
               <form action="" method ="post">
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Kode Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kd_buku" value="<?php echo $data ['kd_buku']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Nama Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nm_buku" value="<?php echo $data ['nm_buku']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Stok Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="stok" value="<?php echo $data ['stok']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">kategori Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kategori" value="<?php echo $data ['kategori']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Harga Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="harga" value="<?php echo $data ['harga']?>">
                        </div>

<br>
<button type="submit" class="btn btn-warning btn-lg btn-block" name="proses">Simpan</button>

    <?php

    if (isset($_POST['proses']))
    {

                    $kd_buku= $_POST['kd_buku'];
                    $nm_buku= $_POST['nm_buku'];
                    $stok= $_POST['stok'];
                    $kategori= $_POST['kategori'];
                    $harga= $_POST['harga'];
                    $tambah= mysqli_query($koneksi,"UPDATE  buku SET nm_buku='$nm_buku',stok='$stok',kategori='$kategori',harga='$harga' WHERE kd_buku='$id'");
                    if($tambah){
                    
                       header('location:index.php');
                    }else {
                        echo "GAGAL";
                    }
    }

    ?>
</body>
</html>
