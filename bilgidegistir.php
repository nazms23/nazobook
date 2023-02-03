<?php 

session_start();

include 'ayar.php';

$profil = @$_SESSION["kgiris"];

$data = $db-> prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
$data -> execute([
    $profil
]);

$_data = $data -> fetch(PDO::FETCH_ASSOC);

$istek = 0;

if(isset($_GET["yenikadi"]))
{
    $istek = 1;
    echo "istek 1";
}else if(isset($_GET["yenieposta"]))
{
    $istek = 2;
    echo "istek 2";
}else if(isset($_GET["eskisifre"]) && isset($_GET["yenisifre"]) )
{
    $istek = 3;
    echo "istek 3";
}else if(isset($_FILES["resim"]))
{
    $istek = 4;
    echo "istek 4";
}


if($istek == 1)
{
    $eskikadi = $profil;
    $yenikadi = @$_GET["yenikadi"];
    $yenikadi = strip_tags($yenikadi);
    $yenikadi = str_replace(' ', '', $yenikadi);

    if($yenikadi != "")
    {
        $kullanici_sor1 = $db->prepare('SELECT * FROM uyeler WHERE uye_kadi = ?');
        $kullanici_sor1->execute([
        $yenikadi
        ]);

        echo $say1 = $kullanici_sor1->rowCount();

        if($say1 == 0)
        {
            $sorgu = $db-> prepare('UPDATE uyeler SET uye_kadi= ? WHERE uye_kadi = ?');
            $ekle = $sorgu->execute([
            $yenikadi,
            $profil
            ]);
            rename("kprofilphoto/".$profil,"kprofilphoto/".$yenikadi);
            rename("kpostfoto/".$profil,"kpostfoto/".$yenikadi);
            $dataList = $db -> prepare("SELECT * FROM gonderiler WHERE gonderi_kadi = ? ORDER BY gonderi_id DESC ");
            $dataList -> execute([
                $eskikadi
            ]);
            $dataList = $dataList -> fetchAll(PDO::FETCH_ASSOC);
            foreach($dataList as $row)
            {
                $sorgu5 = $db-> prepare('UPDATE gonderiler SET gonderi_kadi= ? WHERE gonderi_id = ?');
                $ekle5 = $sorgu5->execute([
                $yenikadi,
                $row["gonderi_id"]
            ]);
            }
            $_SESSION["kgiris"] = $yenikadi;
            header('Refresh:0; https://nazobook.social/profil');
        }else
        {
            header('Refresh:0; https://nazobook.social/profil-kullanici-adi');
        }
    }else
    {
        header('Refresh:0; https://nazobook.social/profil-kullanici-adi2');
        exit;
    }

    
}
else if($istek == 2)
{
    $yenieposta = @$_GET["yenieposta"];
    $yenieposta = strip_tags($yenieposta);
    $yenieposta = str_replace(' ', '', $yenieposta);

    if($yenieposta != "")
    {
        $kullanici_sor1 = $db->prepare('SELECT * FROM uyeler WHERE uye_eposta = ?');
        $kullanici_sor1->execute([
        $yenieposta
        ]);

        echo $say1 = $kullanici_sor1->rowCount();

        if($say1 == 0)
        {
            $sorgu = $db-> prepare('UPDATE uyeler SET uye_eposta= ? WHERE uye_kadi = ?');
            $ekle = $sorgu->execute([
            $yenieposta,
            $profil
            ]);
            header('Refresh:0; https://nazobook.social/profil');
        }else
        {
            
        }
    }else
    {
        header('Refresh:0; https://nazobook.social/profil-eposta2');
        exit;
    }

    
}
else if($istek == 3)
{
    $eskisifre = @$_GET["eskisifre"];
    $eskiesifre = strip_tags($eskisifre);
    $eskisifre = str_replace(' ', '', $eskisifre);
    $yenisifre = @$_GET["yenisifre"];
    $yenisifre = strip_tags($yenisifre);
    $yenisifre = str_replace(' ', '', $yenisifre);

    if($yenisifre != "" || $eskisifre != "" )
    {
        if($eskisifre == $_data["uye_sifre"])
        {
            $sorgu = $db-> prepare('UPDATE uyeler SET uye_sifre= ? WHERE uye_kadi = ?');
            $ekle = $sorgu->execute([
            $yenisifre,
            $profil
            ]);
            header('Refresh:0; https://nazobook.social/profil');
        }else
        {
            header('Refresh:0; https://nazobook.social/profil-sifre');
        }
    }else
    {
        header('Refresh:0; https://nazobook.social/profil-sifre2');
        exit;
    }

    
}
else if($istek == 4)
{

    $ppsayi = $_data["uye_pp"];

    if(file_exists("kprofilphoto/".$profil."/profilphoto".$ppsayi.".jpg"))
    {
        $eskifotoyol = "kprofilphoto/".$profil."/profilphoto".$ppsayi.".jpg";
        unlink($eskifotoyol);
    }else if(file_exists("kprofilphoto/".$profil."/profilphoto".$ppsayi.".png"))
    {
        $eskifotoyol = "kprofilphoto/".$profil."/profilphoto".$ppsayi.".png";
        unlink($eskifotoyol);
    }

    $ppsayi++;

    $sorgu = $db-> prepare('UPDATE uyeler SET uye_pp= ? WHERE uye_kadi = ?');
        $ekle = $sorgu->execute([
        $ppsayi,
        $profil
        ]);



    $yukleklasor = "kprofilphoto/".$profil."/";
    $tmp_name = $_FILES['resim']['tmp_name'];
    $name = $_FILES['resim']['name'];
    $boyut = $_FILES['resim']['size'];
    $tip = $_FILES['resim']['type'];
    $uzanti = substr($name,-4,4);
    $resimad = "profilphoto".$ppsayi.$uzanti;

    if(strlen($name) == 0)
    {
        echo "bir dosya seç";
        header('Refresh:0; https://nazobook.social/profil');
    }

    if($boyut > (1024*1024*10))
    {
        echo "boyut çok fazla";
        header('Refresh:0; https://nazobook.social/profil');
    }

    if($tip != 'image/jpeg' && $tip != 'image/png' && $uzanti != '.jpg')
    {
        echo "Yanlızca jpg veya png olur";
        header('Refresh:0; https://nazobook.social/profil');
    }

    move_uploaded_file($tmp_name, "$yukleklasor/$resimad");
    header('Refresh:0; https://nazobook.social/profil');
}




?>