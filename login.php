<?php
@session_start();
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman login</title>
    <style type="text/css">

body{
    font-family: arial;
    font-size: 14px;
    background:url(latar.jpg);
}    
#utama{
    width: 300px;
    margin: 0 auto;
    margin-top: 12%;

}

#judul{
    padding: 15px;
    text-align: center;
    color: #fff;
    font-size: 20px;
    background-color: #d59436;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
    border-bottom: 3px solid #d59436;
}
#inputan{
    background-color: #ccc;
    padding: 20px;
    border-bottom-right-radius:10px;
    border-bottom-left-radius: 10px;
}

input{
    padding:10px;
    border: 0;
}

.lg{
    width: 240px;
}

.btn{
    background-color: #d59436;
    border-radius: 10px;
    color: #fff;
}
.btn:hover{
    background-color:  #82581c  ;
    cursor: pointer;
}
    </style>
</head>
<body>
    <div id="utama">
        <div id="judul">
            Halaman Login
        </div>
        <div id="inputan">
            <form action="" method="post">
                <div>
                    <input type="text" name="user" placeholder="Username" class="lg" />
                </div>
                <div style="margin-top:10px;">
                    <input type="password" name="pass" placeholder="Password" class="lg" />
                </div>
                <div style="margin-top:10px;">
                    <input type="submit" name="login" value="login" class="btn" />
                </div>
            </form>
            <?php
            $user = @$_POST['user'];
            $pass = @$_POST['pass'];
            $login = @$_POST['login'];

            if($login){
                if($user == "" || $pass == ""){
                echo"Usernaem/Password kosong";
                    ?><script type="text/javascript">alert("Username / Password tidak boleh kosong");</script><?php
                }else {
                    $qry = mysqli_query($koneksi,"SELECT * FROM tb_login WHERE username='$user' AND password = md5('$pass')");
                    $data = mysqli_fetch_array($qry);
                    $cek = mysqli_num_rows($qry);
                    if($cek >= 1){
                        if($data['level'] == "admin"){
                            @$_SESSION['admin'] =$data['kode_user'];
                            header("location:halaman.php");
                        }else if($data['level'] == "guru"){
                            @$_SESSION['guru'] =$data['kode_user'];
                            header("location:guru/profil1.php");
                        }else if($data['level'] == "siswa"){
                            @$_SESSION['siswa'] =$data['kode_user'];
                            header("location:siswa/profil1.php");
                        }
                    }else {
                        ?>
                            <script type="text/javascript">
                                alert('Username / Password Salah');
                            </script>
                            <?php
                            echo"Username / Password Salah";
                    }
                }
            }
            ?>

        </div>
    </div>
</body>
</html>
