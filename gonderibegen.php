<?php 
session_start();
include 'ayar.php';


$kadi = @$_SESSION["kgiris"];

$data = $db-> prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
$data -> execute([
    $kadi
]);

$_data = $data -> fetch(PDO::FETCH_ASSOC);



$gonderiid = $_GET["gonderiid"];
$kullaniciid = $_GET["kullid"];
$begeni = $_GET["begeni"];

if($kullaniciid == $_data["uye_id"])
{
    if($begeni == 0)
    {
        $sorgu = $db-> prepare('INSERT INTO begeniler SET begeni_uyeid = ?, begeni_gonderiid = ?');
        $ekle = $sorgu->execute([
        $kullaniciid,
        $gonderiid
        ]);

        $data = $db-> prepare("SELECT * FROM gonderiler WHERE gonderi_id=?");
        $data -> execute([
            $gonderiid
        ]);

        $_data2 = $data -> fetch(PDO::FETCH_ASSOC);

        $gonderibegeni = $_data2["gonderi_begeni"]+=1;

        $sorgu = $db-> prepare('UPDATE gonderiler SET gonderi_begeni= ? WHERE gonderi_id = ?');
        $ekle = $sorgu->execute([
        $gonderibegeni,
        $gonderiid
        ]);
    }else
    {
        $sorgu = $db-> prepare('DELETE FROM begeniler WHERE begeni_uyeid = ? AND begeni_gonderiid = ?');
        $ekle = $sorgu->execute([
        $kullaniciid,
        $gonderiid
        ]);


        $data = $db-> prepare("SELECT * FROM gonderiler WHERE gonderi_id=?");
        $data -> execute([
            $gonderiid
        ]);

        $_data2 = $data -> fetch(PDO::FETCH_ASSOC);

        $gonderibegeni = $_data2["gonderi_begeni"]-=1;

        $sorgu = $db-> prepare('UPDATE gonderiler SET gonderi_begeni= ? WHERE gonderi_id = ?');
        $ekle = $sorgu->execute([
        $gonderibegeni,
        $gonderiid
        ]);
    }
    header('Refresh:0; https://nazobook.social/anasayfa');

    
}else
{
    header('Refresh:0; https://nazobook.social/anasayfa');
}














?>