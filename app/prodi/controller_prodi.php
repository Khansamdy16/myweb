<?php

$act = $_GET['act'] ;

if($act == 'save') {
    $kd_prodi = $_POST['kd_prodi'] ;
    $nama_prodi = $_POST['nama_prodi'] ;
    $kd_fakultas = $_POST['kd_fakultas'] ;
    $password = sha1($_POST['password']) ;

    $query = $db->query("INSERT INTO prodi (kd_prodi, nama_prodi, kd_fakultas, password)
    VALUES ('$kd_prodi', '$nama_prodi', '$kd_fakultas', '$password') ") ;
    if($query) {
        echo "<script>
            alert('Data sukses disimpan');
            window.location.href='".base_url()."index.php?page=prodi' ;
        </script>" ;
    }
    else {
        echo "<script>
            alert('Data gagal disimpan');
            window.location.href='".base_url()."index.php?page=prodi&act=input' ;
        </script>" ;
    }

}
else if($act == 'update'){
    $kd_prodi_old = $_POST['kd_prodi_old'] ;
    $kd_prodi = $_POST['kd_prodi'] ;
    $nama_prodi = $_POST['nama_prodi'] ;
    $kd_fakultas = $_POST['kd_fakultas'] ;
    $password = $_POST['password'] ;

    if (!empty($password)) {
        $password_fix = sha1 ($password) ;
        $query = $db -> query ("UPDATE prodi SET kd_prodi = '$kd_prodi',
                                                 nama_prodi = '$nama_prodi',
                                                 kd_fakultas = '$kd_fakultas',
                                                 password = '$password_fix'
                                                 WHERE kd_prodi='$kd_prodi_old'") ;
    }else{
        $query = $db -> query ("UPDATE prodi SET kd_prodi = '$kd_prodi',
                                                 nama_prodi = '$nama_prodi',
                                                 kd_fakultas = '$kd_fakultas'
                                                 WHERE kd_prodi='$kd_prodi_old' ") ;
       }
        if($query) {
            echo "<script>
                alert('Data sukses diubah');
                window.location.href='".base_url()."index.php?page=prodi' ;
            </script>" ;
        } else {
            echo "<script>
                alert('Data gagal diubah');
                window.location.href='".base_url()."index.php?page=prodi' ; ;
            </script>" ;
        }
    
}
else if($act == 'hapus'){
    $kd_prodi =$_GET ['kd_prodi'] ;
    $query = $db -> query("DELETE FROM prodi WHERE kd_prodi = '$kd_prodi' ") ;
        if($query) {
            echo "<script>
                alert('Data sukses dihapus');
                window.location.href='".base_url()."index.php?page=prodi' ;
            </script>" ;
        } else {
            echo "<script>
                alert('Data gagal dihapus');
                window.location.href='".base_url()."index.php?page=prodi' ;
            </script>" ;
    }
}
else{
    echo "<script>
    alert('Maaf, parameter anda tidak valid');
    window.location.href='".base_url()."index.php?page=prodi' ;
</script>" ; 
}


