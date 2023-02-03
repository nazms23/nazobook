<?php 
session_start();
include 'ayar.php';



$kadi = @$_SESSION["kgiris"];

$data = $db-> prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
$data -> execute([
    $kadi
]);

$_data = $data -> fetch(PDO::FETCH_ASSOC);



$sorgu = @$_GET["q"];

$rastgele5 = 0;
$rastgele10 = 0;
$ilkeklenen = 0;
$soneklenen = 0;
$ogrenilen = 0;
$isaretlenen = 0;
$ikiside = 0;


if(@$sorgu == 1)
{
    $rastgele5 = 1;
}
else if($sorgu == 2)
{
    $rastgele10 = 1;
}
else if($sorgu == 3)
{
    $soneklenen = 1;
}
else if($sorgu == 4)
{
    $ogrenilen = 1;
}
else if($sorgu == 5)
{
    $isaretlenen = 1;
}
else if($sorgu == 6)
{
    $ikiside = 1;
}
else
{
    $ilkeklenen = 1;
}




?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1293761005468771"
     crossorigin="anonymous"></script>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nazobook insanların paylaşım yapabileceği bir yerdir." />
    <meta name="keywords" content="türkçe,türkiye,nazobook,nazobook sitesi,nazobook site, xlouy, xlouy nazobook, site, paylaşmak" />
    <meta name="author" content="xLouy" />
    <meta name="robots" content="index,follow" />
    <link rel="icon" href="siteresimleri/favicon.ico" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Almarai&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
    <title>NazoBook | Kelimeler</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="styletable.css">
</head>
<body>
    <?php include 'header.php' ?>
    <article>
        <hr>
        <h1 id="bolumismi" style="font-family: 'Almarai', sans-serif;">Kelimeler</h1>
        <hr>
            <?php 
            
            if(!@$_SESSION["kgiris"])
        {
            echo '<center>
            <h1 style="font-family: \'Almarai\', sans-serif; color:red;">BU KISMI GÖREBİLMEK İÇİN ÖNCE GİRİŞ YAPMAN GEREKİYOR</h1>
            <h2><a href="https://nazobook.social/giris-yap" class="navtaba" style="font-family: \'Ubuntu Condensed\', sans-serif; font-size: 30px;">Giriş Yap</a>
                <a href="https://nazobook.social/kayit-ol" class="navtaba" style="font-family: \'Ubuntu Condensed\', sans-serif; font-size: 30px;">Kayıt Ol</a></h2>
            </center> </article>';
            include 'footer.php';
            echo '</body>
            </html>';
            exit;
        }
         ?>
            <hr>
            <div id="butonlardivv">
            <?php 
            if($rastgele5 == 1)
            {
                echo '<button id="normaldebutonlar" onclick="ilk()">İlk Eklenen</button>
                <button id="normaldebutonlar" onclick="son()">Son Eklenen</button>
                <button id="aktifkenbutonlar" onclick="ras5()">Rastgele 5</button>
                <button id="normaldebutonlar" onclick="ras10()">Rastgele 10</button>
                <button id="normaldebutonlar" onclick="isaret()">İşaretlenen</button>
                <button id="normaldebutonlar" onclick="ogren()">Öğrenilen</button>
                <button id="normaldebutonlar" onclick="ikisi()">İkisi</button> ';

            }
            else if($rastgele10 == 1)
            {
                echo '<button id="normaldebutonlar" onclick="ilk()">İlk Eklenen</button>
                <button id="normaldebutonlar" onclick="son()">Son Eklenen</button>
                <button id="normaldebutonlar" onclick="ras5()">Rastgele 5</button>
                <button id="aktifkenbutonlar" onclick="ras10()">Rastgele 10</button>
                <button id="normaldebutonlar" onclick="isaret()">İşaretlenen</button>
                <button id="normaldebutonlar" onclick="ogren()">Öğrenilen</button>
                <button id="normaldebutonlar" onclick="ikisi()">İkisi</button>  ';
            }
            else if($soneklenen == 1)
            {
                echo '<button id="normaldebutonlar" onclick="ilk()">İlk Eklenen</button>
                <button id="aktifkenbutonlar" onclick="son()">Son Eklenen</button>
                <button id="normaldebutonlar" onclick="ras5()">Rastgele 5</button>
                <button id="normaldebutonlar" onclick="ras10()">Rastgele 10</button>
                <button id="normaldebutonlar" onclick="isaret()">İşaretlenen</button>
                <button id="normaldebutonlar" onclick="ogren()">Öğrenilen</button>
                <button id="normaldebutonlar" onclick="ikisi()">İkisi</button>  ';
            }
            else if($ilkeklenen == 1)
            {
                echo '<button id="aktifkenbutonlar" onclick="ilk()">İlk Eklenen</button>
                <button id="normaldebutonlar" onclick="son()">Son Eklenen</button>
                <button id="normaldebutonlar" onclick="ras5()">Rastgele 5</button>
                <button id="normaldebutonlar" onclick="ras10()">Rastgele 10</button>
                <button id="normaldebutonlar" onclick="isaret()">İşaretlenen</button>
                <button id="normaldebutonlar" onclick="ogren()">Öğrenilen</button>
                <button id="normaldebutonlar" onclick="ikisi()">İkisi</button>  ';
            }
            else if($isaretlenen == 1)
            {
                echo '<button id="normaldebutonlar" onclick="ilk()">İlk Eklenen</button>
                <button id="normaldebutonlar" onclick="son()">Son Eklenen</button>
                <button id="normaldebutonlar" onclick="ras5()">Rastgele 5</button>
                <button id="normaldebutonlar" onclick="ras10()">Rastgele 10</button>
                <button id="aktifkenbutonlar" onclick="isaret()">İşaretlenen</button>
                <button id="normaldebutonlar" onclick="ogren()">Öğrenilen</button>
                <button id="normaldebutonlar" onclick="ikisi()">İkisi</button>  ';
            }
            else if($ogrenilen == 1)
            {
                echo '<button id="normaldebutonlar" onclick="ilk()">İlk Eklenen</button>
                <button id="normaldebutonlar" onclick="son()">Son Eklenen</button>
                <button id="normaldebutonlar" onclick="ras5()">Rastgele 5</button>
                <button id="normaldebutonlar" onclick="ras10()">Rastgele 10</button>
                <button id="normaldebutonlar" onclick="isaret()">İşaretlenen</button>
                <button id="aktifkenbutonlar" onclick="ogren()">Öğrenilen</button>
                <button id="normaldebutonlar" onclick="ikisi()">İkisi</button>  ';
            }
            else if($ikiside == 1)
            {
                echo '<button id="normaldebutonlar" onclick="ilk()">İlk Eklenen</button>
                <button id="normaldebutonlar" onclick="son()">Son Eklenen</button>
                <button id="normaldebutonlar" onclick="ras5()">Rastgele 5</button>
                <button id="normaldebutonlar" onclick="ras10()">Rastgele 10</button>
                <button id="normaldebutonlar" onclick="isaret()">İşaretlenen</button>
                <button id="normaldebutonlar" onclick="ogren()">Öğrenilen</button>
                <button id="aktifkenbutonlar" onclick="ikisi()">İkisi</button>  ';
            }


            ?>
            </div>
            <?php 
            if(@$_data["sucuk"] == 1)
            {
                echo '<button id="normaldebutonlar" onclick="ekle()">Kelime Ekle</button>';
            }
            
            ?>
            <div class="table">
                <table class="table">
                    <tr>
                        <th>Kelime</th>
                        <th>Eş Anlamısı</th>
                        <th>Türkçesi</th>
                    </tr>
                    
                    <?php
                    if($rastgele5 == 1)
                    {
                        $dataList = $db -> prepare("SELECT * FROM kelimeler ORDER BY rand() limit 5");
                        $dataList -> execute();
                        $dataList = $dataList -> fetchAll(PDO::FETCH_ASSOC);
                        foreach($dataList as $row)
                        {
                            if($row["kelime_isaret"] == 1 && $row["kelime_ogrenildi"] == 0)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="isaretli">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="isaretli">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="isaretli">'.$row["kelime_turkce"].'</td>';
                            }
                            else if($row["kelime_ogrenildi"] == 1 && $row["kelime_isaret"] == 0)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="ogrenildi">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="ogrenildi">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="ogrenildi">'.$row["kelime_turkce"].'</td>';
                            }
                            else if($row["kelime_ogrenildi"] == 1 && $row["kelime_isaret"] == 1)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="isogli">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="isogli">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="isogli">'.$row["kelime_turkce"].'</td>';
                            }
                            else
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="normal">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="normal">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="normal">'.$row["kelime_turkce"].'</td>';
                            }

                                
                            if(@$_data["sucuk"] == 1)
                            {
                                echo '
                                <td style="width: 20px;">
                                <div id="buttons">
                                <button onclick="isaretle('.$row["kelime_id"].')" class="isaretle">İşaretle</button>
                                <button onclick="ogrenildi('.$row["kelime_id"].')" class="isaretle">Öğrenildi</button>
                                <button onclick="duzenle('.$row["kelime_id"].')" class="duzenle">Düzenle</button>
                                <button onclick="sil('.$row["kelime_id"].')" class="sil">Sil</button>
                                </div>
                                </td>';
                            }
                                        
                                    
                            echo '</tr>';
                        }
                    }
                    else if($rastgele10 == 1)
                    {
                        $dataList = $db -> prepare("SELECT * FROM kelimeler ORDER BY rand() limit 10");
                        $dataList -> execute();
                        $dataList = $dataList -> fetchAll(PDO::FETCH_ASSOC);
                        foreach($dataList as $row)
                        {
                            if($row["kelime_isaret"] == 1 && $row["kelime_ogrenildi"] == 0)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="isaretli">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="isaretli">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="isaretli">'.$row["kelime_turkce"].'</td>';
                            }
                            else if($row["kelime_ogrenildi"] == 1 && $row["kelime_isaret"] == 0)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="ogrenildi">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="ogrenildi">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="ogrenildi">'.$row["kelime_turkce"].'</td>';
                            }
                            else if($row["kelime_ogrenildi"] == 1 && $row["kelime_isaret"] == 1)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="isogli">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="isogli">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="isogli">'.$row["kelime_turkce"].'</td>';
                            }
                            else
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="normal">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="normal">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="normal">'.$row["kelime_turkce"].'</td>';
                            }

                                
                            if(@$_data["sucuk"] == 1)
                            {
                                echo '
                                <td style="width: 20px;">
                                <div id="buttons">
                                <button onclick="isaretle('.$row["kelime_id"].')" class="isaretle">İşaretle</button>
                                <button onclick="ogrenildi('.$row["kelime_id"].')" class="isaretle">Öğrenildi</button>
                                <button onclick="duzenle('.$row["kelime_id"].')" class="duzenle">Düzenle</button>
                                <button onclick="sil('.$row["kelime_id"].')" class="sil">Sil</button>
                                </div>
                                </td>';
                            }
                                        
                                    
                            echo '</tr>';
                        }
                    }
                    else if($ilkeklenen == 1)
                    {
                        $dataList = $db -> prepare("SELECT * FROM kelimeler ORDER BY kelime_id");
                        $dataList -> execute();
                        $dataList = $dataList -> fetchAll(PDO::FETCH_ASSOC);
                        foreach($dataList as $row)
                        {
                            if($row["kelime_isaret"] == 1 && $row["kelime_ogrenildi"] == 0)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="isaretli">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="isaretli">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="isaretli">'.$row["kelime_turkce"].'</td>';
                            }
                            else if($row["kelime_ogrenildi"] == 1 && $row["kelime_isaret"] == 0)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="ogrenildi">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="ogrenildi">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="ogrenildi">'.$row["kelime_turkce"].'</td>';
                            }
                            else if($row["kelime_ogrenildi"] == 1 && $row["kelime_isaret"] == 1)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="isogli">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="isogli">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="isogli">'.$row["kelime_turkce"].'</td>';
                            }
                            else
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="normal">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="normal">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="normal">'.$row["kelime_turkce"].'</td>';
                            }

                                
                            if(@$_data["sucuk"] == 1)
                            {
                                echo '
                                <td style="width: 20px;">
                                <div id="buttons">
                                <button onclick="isaretle('.$row["kelime_id"].')" class="isaretle">İşaretle</button>
                                <button onclick="ogrenildi('.$row["kelime_id"].')" class="isaretle">Öğrenildi</button>
                                <button onclick="duzenle('.$row["kelime_id"].')" class="duzenle">Düzenle</button>
                                <button onclick="sil('.$row["kelime_id"].')" class="sil">Sil</button>
                                </div>
                                </td>';
                            }
                                        
                                    
                            echo '</tr>';
                        }
                    }
                    else if($soneklenen == 1)
                    {
                        $dataList = $db -> prepare("SELECT * FROM kelimeler ORDER BY kelime_id DESC");
                        $dataList -> execute();
                        $dataList = $dataList -> fetchAll(PDO::FETCH_ASSOC);
                        foreach($dataList as $row)
                        {
                            if($row["kelime_isaret"] == 1 && $row["kelime_ogrenildi"] == 0)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="isaretli">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="isaretli">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="isaretli">'.$row["kelime_turkce"].'</td>';
                            }
                            else if($row["kelime_ogrenildi"] == 1 && $row["kelime_isaret"] == 0)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="ogrenildi">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="ogrenildi">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="ogrenildi">'.$row["kelime_turkce"].'</td>';
                            }
                            else if($row["kelime_ogrenildi"] == 1 && $row["kelime_isaret"] == 1)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="isogli">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="isogli">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="isogli">'.$row["kelime_turkce"].'</td>';
                            }
                            else
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="normal">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="normal">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="normal">'.$row["kelime_turkce"].'</td>';
                            }

                                
                            if(@$_data["sucuk"] == 1)
                            {
                                echo '
                                <td style="width: 20px;">
                                <div id="buttons">
                                <button onclick="isaretle('.$row["kelime_id"].')" class="isaretle">İşaretle</button>
                                <button onclick="ogrenildi('.$row["kelime_id"].')" class="isaretle">Öğrenildi</button>
                                <button onclick="duzenle('.$row["kelime_id"].')" class="duzenle">Düzenle</button>
                                <button onclick="sil('.$row["kelime_id"].')" class="sil">Sil</button>
                                </div>
                                </td>';
                            }
                                        
                                    
                            echo '</tr>';
                        }
                    }
                    else if($isaretlenen == 1)
                    {
                        $dataList = $db -> prepare("SELECT * FROM kelimeler WHERE kelime_isaret = 1 ORDER BY kelime_id DESC");
                        $dataList -> execute();
                        $dataList = $dataList -> fetchAll(PDO::FETCH_ASSOC);
                        foreach($dataList as $row)
                        {
                            if($row["kelime_isaret"] == 1 && $row["kelime_ogrenildi"] == 0)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="isaretli">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="isaretli">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="isaretli">'.$row["kelime_turkce"].'</td>';
                            }
                            else if($row["kelime_ogrenildi"] == 1 && $row["kelime_isaret"] == 0)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="ogrenildi">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="ogrenildi">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="ogrenildi">'.$row["kelime_turkce"].'</td>';
                            }
                            else if($row["kelime_ogrenildi"] == 1 && $row["kelime_isaret"] == 1)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="isogli">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="isogli">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="isogli">'.$row["kelime_turkce"].'</td>';
                            }
                            else
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="normal">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="normal">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="normal">'.$row["kelime_turkce"].'</td>';
                            }

                                
                            if(@$_data["sucuk"] == 1)
                            {
                                echo '
                                <td style="width: 20px;">
                                <div id="buttons">
                                <button onclick="isaretle('.$row["kelime_id"].')" class="isaretle">İşaretle</button>
                                <button onclick="ogrenildi('.$row["kelime_id"].')" class="isaretle">Öğrenildi</button>
                                <button onclick="duzenle('.$row["kelime_id"].')" class="duzenle">Düzenle</button>
                                <button onclick="sil('.$row["kelime_id"].')" class="sil">Sil</button>
                                </div>
                                </td>';
                            }
                                        
                                    
                            echo '</tr>';
                        }
                    }
                    else if($ogrenilen == 1)
                    {
                        $dataList = $db -> prepare("SELECT * FROM kelimeler WHERE kelime_ogrenildi = 1 ORDER BY kelime_id DESC");
                        $dataList -> execute();
                        $dataList = $dataList -> fetchAll(PDO::FETCH_ASSOC);
                        foreach($dataList as $row)
                        {
                            if($row["kelime_isaret"] == 1 && $row["kelime_ogrenildi"] == 0)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="isaretli">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="isaretli">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="isaretli">'.$row["kelime_turkce"].'</td>';
                            }
                            else if($row["kelime_ogrenildi"] == 1 && $row["kelime_isaret"] == 0)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="ogrenildi">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="ogrenildi">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="ogrenildi">'.$row["kelime_turkce"].'</td>';
                            }
                            else if($row["kelime_ogrenildi"] == 1 && $row["kelime_isaret"] == 1)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="isogli">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="isogli">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="isogli">'.$row["kelime_turkce"].'</td>';
                            }
                            else
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="normal">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="normal">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="normal">'.$row["kelime_turkce"].'</td>';
                            }

                                
                            if(@$_data["sucuk"] == 1)
                            {
                                echo '
                                <td style="width: 20px;">
                                <div id="buttons">
                                <button onclick="isaretle('.$row["kelime_id"].')" class="isaretle">İşaretle</button>
                                <button onclick="ogrenildi('.$row["kelime_id"].')" class="isaretle">Öğrenildi</button>
                                <button onclick="duzenle('.$row["kelime_id"].')" class="duzenle">Düzenle</button>
                                <button onclick="sil('.$row["kelime_id"].')" class="sil">Sil</button>
                                </div>
                                </td>';
                            }
                                        
                                    
                            echo '</tr>';
                        }
                    }
                    else if($ikiside == 1)
                    {
                        $dataList = $db -> prepare("SELECT * FROM kelimeler WHERE kelime_ogrenildi = 1 and kelime_isaret = 1 ORDER BY kelime_id DESC");
                        $dataList -> execute();
                        $dataList = $dataList -> fetchAll(PDO::FETCH_ASSOC);
                        foreach($dataList as $row)
                        {
                            if($row["kelime_isaret"] == 1 && $row["kelime_ogrenildi"] == 0)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="isaretli">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="isaretli">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="isaretli">'.$row["kelime_turkce"].'</td>';
                            }
                            else if($row["kelime_ogrenildi"] == 1 && $row["kelime_isaret"] == 0)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="ogrenildi">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="ogrenildi">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="ogrenildi">'.$row["kelime_turkce"].'</td>';
                            }
                            else if($row["kelime_ogrenildi"] == 1 && $row["kelime_isaret"] == 1)
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="isogli">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="isogli">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="isogli">'.$row["kelime_turkce"].'</td>';
                            }
                            else
                            {
                                echo '
                                <tr>
                                <td id="tdk" class="normal">'.$row["kelime_isim"].'</td>
                                <td id="tdes" class="normal">'.$row["kelime_esanlam"].'</td>
                                <td id="tdtr" class="normal">'.$row["kelime_turkce"].'</td>';
                            }

                                
                            if(@$_data["sucuk"] == 1)
                            {
                                echo '
                                <td style="width: 20px;">
                                <div id="buttons">
                                <button onclick="isaretle('.$row["kelime_id"].')" class="isaretle">İşaretle</button>
                                <button onclick="ogrenildi('.$row["kelime_id"].')" class="isaretle">Öğrenildi</button>
                                <button onclick="duzenle('.$row["kelime_id"].')" class="duzenle">Düzenle</button>
                                <button onclick="sil('.$row["kelime_id"].')" class="sil">Sil</button>
                                </div>
                                </td>';
                            }
                                        
                                    
                            echo '</tr>';
                        }
                    }
                        
                        
                        
                    ?>
                    
                </table>

            </div>
            
            
            
    </article>
    <script src="kelime.js"></script>
    <?php include 'footer.php' ?>
</body>
</html>