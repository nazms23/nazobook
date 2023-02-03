<?php 
session_start();

include 'ayar.php';




$profil = @$_SESSION["kgiris"];

$baslik = @$_POST["baslik"];
$baslik = strip_tags($baslik);
$mesaj = @$_POST["gonderimesaj"];
$mesaj = strip_tags($mesaj);
$kadi = $profil;
$resimnu = 0;
$duyuruno = 0;
if(isset($_POST["duyuru"]))
{
    $duyuruno = 1;
}else
{
    $duyuruno = 0;
}

if(isset($_FILES["resim"]))
{
    $resimnu = 1;
}

$data = $db-> prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
$data -> execute([
    $profil
]);

$_data = $data -> fetch(PDO::FETCH_ASSOC);

$gonderisayi = $_data["uye_gonderisayi"];
$gonderisayi2 = $_data["uye_gonderisayi2"];

$gonderisayi2++;
$gonderisayi++;

$sorgu = $db-> prepare('UPDATE uyeler SET uye_gonderisayi= ? WHERE uye_kadi = ?');
$ekle = $sorgu->execute([
$gonderisayi,
$profil
]);

$sorgu = $db-> prepare('UPDATE uyeler SET uye_gonderisayi2= ? WHERE uye_kadi = ?');
$ekle = $sorgu->execute([
$gonderisayi2,
$profil
]);



    $sorgu = $db-> prepare('INSERT INTO gonderiler SET gonderi_kadi = ?, gonderi_baslik = ?, gonderi_mesaj = ?, gonderi_resim =?, gonderi_no= ?, gonderi_duyuru = ?');
    $ekle = $sorgu->execute([
    $kadi,
    $baslik,
    $mesaj,
    $resimnu,
    $gonderisayi,
    $duyuruno
    ]);

    if($resimnu == 1)
    {
        


        




        $klasorisim = "kpostfoto/".$kadi."/".$gonderisayi;
        mkdir($klasorisim,0777, true);

        $yukleklasor = "kpostfoto/".$kadi."/".$gonderisayi."/";
        $tmp_name = $_FILES['resim']['tmp_name'];
        $name = $_FILES['resim']['name'];
        $boyut = $_FILES['resim']['size'];
        $tip = $_FILES['resim']['type'];
        $uzanti = substr($name,-4,4);
        $resimad = "gonderiresim".$uzanti;

        if(strlen($name) == 0)
        {
        echo "bir dosya seç";
        header('Refresh:0; https://nazobook.social/anasayfa');
        }

        if($boyut > (1024*1024*10))
        {
        echo "boyut çok fazla";
        header('Refresh:0; https://nazobook.social/anasayfa');
        }

        if($tip != 'image/jpeg' && $tip != 'image/png' && $uzanti != '.jpg')
        {
        echo "Yanlızca jpg veya png olur";
        header('Refresh:0; https://nazobook.social/anasayfa');
        }

        move_uploaded_file($tmp_name, "$yukleklasor/$resimad");
        header('Refresh:0; https://nazobook.social/anasayfa');
    }else
    {
        header('Refresh:0; https://nazobook.social/anasayfa');
    }
    

    
    









?>