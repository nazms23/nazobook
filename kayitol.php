<?php 
require "ayar.php";

$kadi = $_POST["kadi"];
$eposta = $_POST["eposta"];
$sifre = $_POST["sifre"];
$sifre2 = $_POST["sifre2"];
$kadi = strip_tags($kadi);
$sifre = strip_tags($sifre);
$sifre2 = strip_tags($sifre2);
$eposta = strip_tags($eposta);

$kadi = str_replace(' ', '', $kadi);
$sifre = str_replace(' ', '', $sifre);
$sifre2 = str_replace(' ', '', $sifre2);
$eposta = str_replace(' ', '', $eposta);


$kullanici_sor = $db->prepare('SELECT * FROM uyeler WHERE uye_eposta = ?');
$kullanici_sor->execute([
    $eposta
]);

echo $say = $kullanici_sor->rowCount();

$kullanici_sor1 = $db->prepare('SELECT * FROM uyeler WHERE uye_kadi = ?');
$kullanici_sor1->execute([
    $kadi
]);

echo $say1 = $kullanici_sor1->rowCount();

if($sifre == $sifre2 && $say == 0 && $say1 == 0)
{
    $sorgu = $db-> prepare('INSERT INTO uyeler SET uye_kadi = ?, uye_eposta = ?, uye_sifre = ?');
    $ekle = $sorgu->execute([
    $kadi,
    $eposta,
    $sifre
    ]);
    
    $klasorisim = "kpostfoto/".$kadi;
    mkdir($klasorisim,0777, true);
    $klasorisim = "kprofilphoto/".$kadi;
    mkdir($klasorisim,0777, true);

    header('Refresh:0; girisyap.php?p=kayitbasari');
}else if($sifre == $sifre2 && $say >= 1 && $say1 == 0 )
{
    header('Refresh:0; girisyap.php?q=kayit&p=eposta');
}else if($sifre == $sifre2 && $say == 0 && $say1 >= 1 )
{
    header('Refresh:0; girisyap.php?q=kayit&p=kadi');
}else if($sifre == $sifre2 && $say >= 1 && $say1 >= 1 )
{
    header('Refresh:0; girisyap.php?q=kayit&p=kadieposta');
}
else
{
    header('Refresh:0; girisyap.php?q=kayit&p=sifre');
}







?>