<?php 

require "config/function.php";
$conn = mysqli_connect("localhost" , "root","","projekpiket");

$id=$_GET["id"];

// mysqli_query($conn, "DELETE FROM data_guru WHERE id= $id");
if  (hapusdata_siswa($id)>0) {
    
    echo "
            <script>
                document.location.href = 'data-siswa.php';
            </script>
    ";
} else{
    echo "
            <script>
                alert('data gagal dihapus!');
                document.location.href = 'data-siswa.php';
            </script>
    ";
}

?>