<?php 

$eposta = $_POST["eposta"];
$sifre = $_POST["sifre"];

$sifre = strip_tags($sifre);
$eposta = strip_tags($eposta);

$sifre = str_replace(' ', '', $sifre);
$eposta = str_replace(' ', '', $eposta);


ob_start();
session_start();
require "ayar.php";

if($eposta != "" || $sifre != "")
{
    $kullanici_sor = $db->prepare('SELECT * FROM uyeler WHERE uye_eposta = ? && uye_sifre = ?');
    $kullanici_sor->execute([
    $eposta, $sifre
    ]);

    echo $say = $kullanici_sor->rowCount();
}else
{
    header('Refresh:0; https://nazobook.social/giris-yap-hata');
    exit;
}





$data = $db-> prepare("SELECT * FROM uyeler WHERE uye_eposta=?");
$data -> execute([
    $eposta
]);

$_data = $data -> fetch(PDO::FETCH_ASSOC);

if($say==1)
{
    $_SESSION["kgiris"] = $_data["uye_kadi"];
    echo "Giriş Yapıldı";
    header('Refresh:0; https://nazobook.social/anasayfa');
}else
{
    header('Refresh:0; https://nazobook.social/giris-yap-hata');
}









?>