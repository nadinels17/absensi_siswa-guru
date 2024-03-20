<?php 

require "config/function.php";
$conn = mysqli_connect("localhost" , "root","","projekpiket");

$id_siswa=$_GET["id"];

if  (hapusabsen($id_siswa)>0) {
    
    echo "
            <script>
                document.location.href = 'dataabsen-siswa.php';
            </script>
    ";
} else{
    echo "
            <script>
                alert('data gagal dihapus!');
                document.location.href = 'dataabsen-siswa.php';
            </script>
    ";
}

?>