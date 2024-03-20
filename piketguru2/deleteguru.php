<?php 

require "config/function.php";
$conn = mysqli_connect("localhost" , "root","","projekpiket");

$id=$_GET["id"];

// mysqli_query($conn, "DELETE FROM data_guru WHERE id= $id");
if (hapusdata_guru($id)>0) {
    header('location: data-guru.php');
    $_SESSION['hapus_guru']=true;                                           
} else{
    header('location: data-guru.php');
}

?>