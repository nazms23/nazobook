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


    $sorgu = $db-> prepare('DELETE FROM kelimeler WHERE kelime_id = ?');
    $ekle = $sorgu->execute([
    $id
    ]);

    header('Refresh:0; https://nazobook.social/kelimeler');
}
else
{
    header('Refresh:0; https://nazobook.social/anasayfa');
}
?>