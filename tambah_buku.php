<DOCTYPE! html>
<html>

<head>
</head>
<body>
<div class="main_content">
        <div class="header" align="center">Tambah Buku</div>
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
                            <input type="text" class="form-control" name="kd_buku">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Nama Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nm_buku">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Stok Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="stok">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">kategori Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kategori">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Harga Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="harga">
                        </div>

<br>
<button type="submit" class="btn btn-warning btn-lg btn-block" name="proses">Simpan</button>

    <?php
    include "koneksi.php";

    if (isset($_POST['proses'])){
        mysqli_query($koneksi,"INSERT INTO buku set 
        kd_buku= '$_POST[kd_buku]',
                    nm_buku= '$_POST[nm_buku]',
                    stok= '$_POST[stok]',
                    kategori= '$_POST[kategori]',
                    harga= '$_POST[harga]'");
                    header('location:index.php');
                     ?>
                     <?php
    }

    ?>
</body>
</html>
