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

    $id = @$_GET["id"];
    $isim = @$_GET["kelimead"];
    $esanlam = @$_GET["esanlam"];
    $turkce = @$_GET["turkce"];


    $sorgu = $db-> prepare('UPDATE kelimeler SET kelime_isim= ? WHERE kelime_id = ?');
    $ekle = $sorgu->execute([
        $isim,
        $id
    ]);


    $sorgu = $db-> prepare('UPDATE kelimeler SET kelime_esanlam= ? WHERE kelime_id = ?');
    $ekle = $sorgu->execute([
        $esanlam,
        $id
    ]);

    $sorgu = $db-> prepare('UPDATE kelimeler SET kelime_turkce= ? WHERE kelime_id = ?');
    $ekle = $sorgu->execute([
        $turkce,
        $id
    ]);

    header('Refresh:0; https://nazobook.social/kelimeler');
}
else
{
    header('Refresh:0; https://nazobook.social/anasayfa');
}
?>