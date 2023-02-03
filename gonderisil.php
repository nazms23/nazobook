<?php 

session_start();

include 'ayar.php';

$gonderino = @$_GET["no"];
$kadi = @$_GET["gkadi"];

$kullanici = @$_SESSION["kgiris"];

$data = $db-> prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
$data -> execute([
    $kullanici
]);

$_data = $data -> fetch(PDO::FETCH_ASSOC);



if($_data["sucuk"] == 1)
{       
        $gonderisayi = $_data["uye_gonderisayi2"];
        $gonderisayi--;

        $sorgu = $db-> prepare('UPDATE uyeler SET uye_gonderisayi2= ? WHERE uye_kadi = ?');
        $ekle = $sorgu->execute([
        $gonderisayi,
        $kadi
        ]);
        
        
        $sorgu = $db-> prepare('DELETE FROM gonderiler WHERE gonderi_kadi = ? AND gonderi_no = ?');
        $ekle = $sorgu->execute([
        $kadi,
        $gonderino
        ]);

        header('Refresh:0; https://nazobook.social/anasayfa');
}else if($kullanici == $kadi)
{
        $gonderisayi = $_data["uye_gonderisayi2"];
        $gonderisayi--;

        $sorgu = $db-> prepare('UPDATE uyeler SET uye_gonderisayi2= ? WHERE uye_kadi = ?');
        $ekle = $sorgu->execute([
        $gonderisayi,
        $kadi
        ]);

        $sorgu = $db-> prepare('DELETE FROM gonderiler WHERE gonderi_kadi = ? AND gonderi_no = ?');
        $ekle = $sorgu->execute([
        $kadi,
        $gonderino
        ]);

        header('Refresh:0; https://nazobook.social/anasayfa');
}else
{
        header('Refresh:0; https://nazobook.social/anasayfa');
}









?>