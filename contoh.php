<?php
@session_start();
include "koneksi.php";
if(@$_SESSION['admin']||@$_SESSION['guru']||@$_SESSION['siswa']){
    ?>
<!DOCTYPE html>
<html>

<h1>aksjhajka</h1>
</html>
<?php
}else{
    header("location: login.php");
}
?>