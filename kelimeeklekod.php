<?php 
session_start();

include 'ayar.php';

$kadi = @$_SESSION["kgiris"];

$data = $db-> prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
$data -> execute([
    $kadi
]);

$_data = $data -> fetch(PDO::FETCH_ASSOC);

if($_data["sucuk"] == 1)
{

    $isim = @$_GET["kelimead"];
    $esanlam = @$_GET["esanlam"];
    $turkce = @$_GET["turkce"];


    $sorgu = $db-> prepare('INSERT INTO kelimeler SET kelime_isim = ?, kelime_esanlam = ?, kelime_turkce = ?');
    $ekle = $sorgu->execute([
    $isim,
    $esanlam,
    $turkce
    ]);

    header('Refresh:0; https://nazobook.social/kelimeler');
}
else
{
    header('Refresh:0; https://nazobook.social/anasayfa');
}
?>