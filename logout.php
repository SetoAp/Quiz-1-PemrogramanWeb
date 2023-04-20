<?php
    session_start();
    
    //melakukan penghpusan session saat logout
    session_destroy();

    //membuka halaman data mahasiswa sebagai Guest
    header("location:data_mahasiswa.php");