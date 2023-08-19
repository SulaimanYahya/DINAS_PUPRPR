<?php
include "koneksi.php";
$user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_user INNER JOIN tb_penghuni ON tb_penghuni.id_user=tb_user.id_user INNER JOIN tb_kamar ON tb_kamar.id_kamar=tb_penghuni.id_kamar where nik='$_GET[id]'"));
$data_user = array('nama'      =>  $user['nama'],
                    'jen_kel'     =>  $user['jen_kel'],
                    'no_kamar'           =>  $user['no_kamar'],
                    'jenis_kamar'           =>  $user['jenis_kamar'],
                    'angsuran'           =>  "Rp. ".number_format($user['angsuran']),);
 echo json_encode($data_user);