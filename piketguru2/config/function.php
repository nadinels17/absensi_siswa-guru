<?php
require "connection.php";

function regisSiswa($data){
    global $conn;

    $nama = $data["nama"];
    $username = $data["username"];
    $kode_kelas = $data["kode_kelas"];
    $kelas = $data["nama_kelas"];

    $validasi_nama = mysqli_query($conn," SELECT nama FROM data_siswa WHERE nama = '$nama'");
    if(mysqli_fetch_assoc($validasi_nama)){
        echo"
            <script>
                alert('Siswa Sudah Terdaftar')
            </script>";
        return false;
    };

    $query = "INSERT INTO data_siswa VALUES(null,'$kode_kelas','$nama','$username', '$kelas')";
    mysqli_query($conn, $query);
    $_SESSION["guru_berhasil"]=true;
    return mysqli_affected_rows($conn);
}

function regisGuru($data){
    global $conn;

    $nama = $data["nama"];
    $nip = $data["nip"];
    $email = $data["email"];
    $jurusan = $data["nama_kejuruan"];
    $kode_hari = $data["kode_hari"];

    $foto= regisguru_foto();


    $validasi_nama = mysqli_query($conn," SELECT nama FROM data_guru WHERE nama = '$nama'");
    if(mysqli_fetch_assoc($validasi_nama)){
        echo"
            <script>
                alert('Nama Guru Sudah Terdaftar')
            </script>";
        return false;
    };

    $validasi_nip = mysqli_query($conn," SELECT nip FROM data_guru WHERE nip = '$nip'");
    if(mysqli_fetch_assoc($validasi_nip)){
        echo"
            <script>
                alert('NIP Guru Sudah Terdaftar')
            </script>";
        return false;
    };

    $validasi_email = mysqli_query($conn," SELECT email FROM data_guru WHERE email = '$email'");
    if(mysqli_fetch_assoc($validasi_email)){
        echo"
            <script>
                alert('Email Guru Sudah Terdaftar')
            </script>";
        return false;
    };

    if (empty($foto)) {
        return false;
    }

    $query = "INSERT INTO data_guru VALUES(null,'$nama','$nip','$email', '$kode_hari', '$jurusan','$foto')";
    mysqli_query($conn, $query);
    $_SESSION["guru_berhasil"]=true;
    return mysqli_affected_rows($conn);
}


function regisguru_foto() {

    $filename = $_FILES["file"]["name"];
    $size = $_FILES["file"]["size"];
    $error = $_FILES["file"]["error"];
    $temp = $_FILES["file"]["tmp_name"];

    $validExtension = ['png', 'jpg', 'jpeg'];
    $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);


    if ($error == 4) {
        echo "<script>alert('Wajib upload foto!')</script>";
        return false;
    } elseif (!in_array($fileExtension, $validExtension)) {
        echo "<script>alert('file hanya boleh berupa png, jpg, dan jpeg!')</script>";
        return false;
    } elseif ($size > 1000000) {
        echo "<script>alert('Max ukuran file adalah 1 MB!')</script>";
        return false;
    }

    // MOVE UPLOADED FILE
    $filename = pathinfo($filename, PATHINFO_FILENAME) . '_' . uniqid() . '.' . $fileExtension;
    move_uploaded_file($temp, 'assets/imgregis-guru//' . $filename);

    return $filename;

}

function hapusdata_guru($id){
    global $conn;
    // $id=$_GET["id_transaksi"];
    mysqli_query($conn, "DELETE FROM data_guru WHERE id= $id");
    return mysqli_affected_rows($conn);
}


function updataguru($data) {
    global $conn;

    $id= $data["id"];
    $nama = $data["nama"];
    $nip = $data["nip"];
    $email = $data["email"];
    $jurusan = $data["gurukejuru"];
    $kode_hari = $data["kode_hari"];
    
    if($_FILES["fileBaru"]["error"] == 4){
        $foto = $data['fileLama'];
    } else{
        // unlink('assets/imgregis-guru/'. $data['fileLama']);
        $foto = updatefoto_guru();
    }

    mysqli_query ($conn, "UPDATE data_guru SET nama='$nama', 
                                                nip='$nip', 
                                                email= '$email',
                                                id_hari='$kode_hari',
                                                id_kejuruan= '$jurusan',
                                                foto='$foto' WHERE id= '$id'");
    
    $_SESSION['update']=true;
    return mysqli_affected_rows($conn);
}

function updatefoto_guru(){
    $filename = $_FILES["fileBaru"]["name"];
    $error = $_FILES["fileBaru"]["error"];
    $temp = $_FILES["fileBaru"]["tmp_name"];

    $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);

    if ($error == 4) {
        echo "<script>alert('Wajib upload foto!')</script>";
        return false;
    } 

    // MOVE UPLOADED FILE
    $filename = pathinfo($filename, PATHINFO_FILENAME) . '_' . uniqid() . '.' . $fileExtension;
    move_uploaded_file($temp, 'assets/imgregis-guru//' . $filename);

    return $filename;
}

function hapusdata_siswa($id){
    global $conn;
    // $id=$_GET["id_transaksi"];
    mysqli_query($conn, "DELETE FROM data_siswa WHERE id= $id");
    return mysqli_affected_rows($conn);
}

function updatasiswa($data)
{
    global $conn;

    $id = $_GET["id"];
    $nama = $data["nama"];
    $username = $data["username"];
    $kode_kelas = $data["id_kodekelas"];
    $namakelas = $data["kelas"];

    mysqli_query($conn, "UPDATE data_siswa SET id_kodekelas= '$kode_kelas', nama='$nama', username= '$username', id_kelas='$namakelas' WHERE id= $id");


    return mysqli_affected_rows($conn);
}

function search_guru($data){
    global $conn;

    $return = mysqli_query($conn, "SELECT * FROM absensi_guru WHERE
                    nama LIKE '%$data%'
                    OR
                    nip LIKE '%$data%'");

    return $return;
}

function search_siswa($data){
    global $conn;

    $return = mysqli_query($conn, "SELECT * FROM absensi_murid WHERE
                    nama LIKE '%$data%'
                    OR
                    kelas LIKE '%$data%'");

    return $return;
}
?>