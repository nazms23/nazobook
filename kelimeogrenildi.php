<?php 
session_start();

include 'ayar.php';




$kadi = @$_SESSION["kgiris"];

$data2 = $db-> prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
$data2 -> execute([
    $kadi
]);

$_data2 = $data2 -> fetch(PDO::FETCH_ASSOC);



if($_data2["sucuk"] == 1)
{






$id = @$_GET["id"];
$isaret = 1;
$isaret2 = 0;



$data = $db-> prepare("SELECT * FROM kelimeler WHERE kelime_id=?");
$data -> execute([
    $id
]);

$_data = $data -> fetch(PDO::FETCH_ASSOC);


if(@$_data["kelime_ogrenildi"] == 0)
{
    $sorgu = $db-> prepare('UPDATE kelimeler SET kelime_ogrenildi= ? WHERE kelime_id = ?');
    $ekle = $sorgu->execute([
    $isaret,
    $id
    ]);

    header('Refresh:0; https://nazobook.social/kelimeler');
}
else
{
    $sorgu = $db-> prepare('UPDATE kelimeler SET kelime_ogrenildi= ? WHERE kelime_id = ?');
    $ekle = $sorgu->execute([
    $isaret2,
    $id
    ]);

    header('Refresh:0; https://nazobook.social/kelimeler');
}


}
else
{
    header('Refresh:0; https://nazobook.social/anasayfa');
}




?>