<?php

$act = isset($_GET['act']) ? $_GET['act'] : false ;
$kode = isset ($_GET['id']) ? $_GET['id'] : false ;
if($act == 'edit') { 
    $url = base_url(). "index.php?page=prodi&act=update" ;
    if($kode){
    $query = $db -> query ("SELECT * FROM prodi WHERE id = '$kode'");
    $row = $query -> fetch_array ();
    }else{
    echo  "<script>
    alert('parameter prodi tidak valid');
    window.location.href='". base_url() . " index.php?page=prodi' ;
    </script>" ;
    }
}else{
    $url = base_url(). "index.php?page=prodi&act=save" ;

}
?>

        <div class="card">
            <div class="card-header">
                Input Data Prodi
            </div>
            <div class="card-body">
                <form action="<?php echo $url; ?> " method="post">
                    <input type="hidden" name="kd_prodi_old" value="<?php echo isset($row) ? $row['kd_prodi'] : '' ; ?>">
                        <div class="mb-3">
                            <label for="kd_prodi">  Kd Prodi </label>
                            <input type="text" class="form-control" name="kd_prodi" id="kd_prodi" value="<?php echo isset($row) ? $row['kd_prodi'] : '' ; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama_prodi">  Nama Prodi </label>
                            <input type="text" class="form-control" name="nama_prodi" id="nama_prodi" value="<?php echo isset($row) ? $row['nama_prodi'] : '' ; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="kd_fakultas">  Kd Fakultas </label>
                            <input type="text" class="form-control" name="kd_fakultas" id="kd_fakultas" value="<?php echo isset($row) ? $row['kd_fakultas'] : '' ; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password">  Password </label>
                            <input class="form-control" type="password" name="password" id="password">
                        </div>
                        <div class="mb-3">
                                <a class="btn btn-danger btn-sm float-start" href="<?php echo base_url() . 'index.php?page=prodi'; ?>">
                                <i class="fa-solid fa-chevron-left"></i> 
                                Kembali 
                                </a>
                                <button class="btn btn-primary btn-sm float-end" type="submit">
                                <i class="fa-regular fa-floppy-disk"></i>
                                Simpan Data
                                </button>
                        </div>
                </form>
            </div>
        </div>
