<?php 
session_start();
include 'ayar.php';


$kadi = @$_SESSION["kgiris"];

$data = $db-> prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
$data -> execute([
    $kadi
]);

$_data = $data -> fetch(PDO::FETCH_ASSOC);









?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nazobook insanların paylaşım yapabileceği bir yerdir.">
    <meta name="keywords" content="türkçe,türkiye,nazobook,nazobook sitesi,nazobook site, xlouy, xlouy nazobook, site, paylaşmak, anasayfa">
    <meta name="author" content="xLouy" />
    <meta name="robots" content="index,follow" />
    <link rel="icon" href="siteresimleri/favicon.ico" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Almarai&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
    <title>NazoBook | Anasayfa  </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php' ?>
    <article>
        <hr>
        <h1 id="bolumismi" style="font-family: 'Almarai', sans-serif;">Gönderiler</h1>
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
    <div id="gonderipaylas">
        <?php 
        
        if($_data["uye_ban"] == 1)
        {
            echo '<h1 style="font-family: \'Almarai\', sans-serif; color:red;">BANLANDIĞIN İÇİN PAYLAŞIM YAPAMAZSIN</h1> ';
        }else if($_data["sucuk"] == 1)
        {
            echo '<h3  style="font-family: \'Almarai\', sans-serif; font-size: 25px; color: bisque; margin-left: 25px;">Gönderi Paylaş</h3>
            <form action="gonderipaylas.php" method="POST" enctype="multipart/form-data">
            <table style="margin-left: 10px;">
                <tr>
                    <td style="font-family: \'Almarai\', sans-serif; color: bisque; float: left;">Başlık <input type="text" name="baslik" style="float: right; width: 200px; height: 21px; position: relative; bottom: 5px; font-size: 18px;"></td>
                </tr>
                <tr>
                    <td><textarea name="gonderimesaj" id="gonderimesaj" cols="110" rows="10" placeholder="Mesajını Yaz..."></textarea></td>
                </tr>
                <tr>
                    <td><p style="font-family: \'Almarai\', sans-serif; color: bisque; float: left;">Resim Ekle</p><input type="file" name="resim" style="float: right; position: relative; top:15px;"></td>
                </tr>
                <tr>
                    <td style="font-family: \'Almarai\', sans-serif; color: bisque; float: left;">Duyuru <input type="checkbox" name="duyuru" value="1" style="float: right; width: 200px; height: 21px; position: relative; bottom: 5px; font-size: 18px;"></td>
                </tr>
                <tr>    
                    <td><input type="submit" style="width: 100px; height: 50px; border-radius: 10px; font-family: \'Almarai\', sans-serif; font-size: 20px; background-color: yellowgreen;"></td>
                </tr>
            </table>
            </form>';
        }
        else
        {
            echo '<h3  style="font-family: \'Almarai\', sans-serif; font-size: 25px; color: bisque; margin-left: 25px;">Gönderi Paylaş</h3>
            <form action="gonderipaylas.php" method="POST" enctype="multipart/form-data">
            <table style="margin-left: 10px;">
                <tr>
                    <td style="font-family: \'Almarai\', sans-serif; color: bisque; float: left;">Başlık <input type="text" name="baslik" style="float: right; width: 200px; height: 21px; position: relative; bottom: 5px; font-size: 18px;"></td>
                </tr>
                <tr>
                    <td><textarea name="gonderimesaj" id="gonderimesaj" cols="110" rows="10" placeholder="Mesajını Yaz..."></textarea></td>
                </tr>
                <tr>
                    <td><p style="font-family: \'Almarai\', sans-serif; color: bisque; float: left;">Resim Ekle</p><input type="file" name="resim" style="float: right; position: relative; top:15px;"></td>
                </tr>
                <tr>    
                    <td><input type="submit" style="width: 100px; height: 50px; border-radius: 10px; font-family: \'Almarai\', sans-serif; font-size: 20px; background-color: yellowgreen;"></td>
                </tr>
            </table>
            </form>';
        }
        ?>
        
    </div>
    <hr>
    <hr>
        <?php 
        $bosluk = " ";

        $dataList = $db -> prepare("SELECT * FROM gonderiler ORDER BY gonderi_id DESC");
        $dataList -> execute();
        $dataList = $dataList -> fetchAll(PDO::FETCH_ASSOC);
        foreach($dataList as $row)
        {
            $data9 = $db-> prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
            $data9 -> execute([
                $row["gonderi_kadi"]
            ]);

            $_data9 = $data9 -> fetch(PDO::FETCH_ASSOC);

            if($row["gonderi_duyuru"] == 1)
            {
                echo '<div id="gonderidivduy" style="border-style: solid;
                width: 1000px;
                min-height: 100px;
                margin: auto;
                border-color: rgb(59, 59, 59);
                background-color: rgba(184, 113, 127, 0.568);">';
            }else
            {
                echo '<div class="gonderidiv">';
            }
            echo '
            <table id="gonderitable">
                <tr>
                    <td><h3 style="font-family: \'Almarai\', sans-serif; color: rgb(23, 235, 13);">'.$row["gonderi_baslik"].'</h3></td>
                </tr>
                <tr>
                    <td>';
                    if(file_exists("kprofilphoto/".$row["gonderi_kadi"]."/profilphoto".$_data9["uye_pp"].".jpg"))
                    {
                        echo '<img src="kprofilphoto/'.$row["gonderi_kadi"].'/profilphoto'.$_data9["uye_pp"].'.jpg" alt="" width="100px" height="100px" style="float: left;">';
                    }else if(file_exists("kprofilphoto/".$row["gonderi_kadi"]."/profilphoto".$_data9["uye_pp"].".png"))
                    {
                        echo '<img src="kprofilphoto/'.$row["gonderi_kadi"].'/profilphoto'.$_data9["uye_pp"].'.png" alt="" width="100px" height="100px" style="float: left;">';
                    }else
                    {
                        echo '<img src="siteresimleri/bospp.jpg" alt="" width="85px" height="78px" style="float: left;">';
                    }

                    
                    
                    
                echo '<h4 style="position: relative; left: 10px; font-family: \'Almarai\', sans-serif;"><a href="https://nazobook.social/gonderiler-'.$row["gonderi_kadi"].'" class="gondeributonu" style="text-decoration:none; ';

                $data2 = $db-> prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
                $data2 -> execute([
                    $row["gonderi_kadi"]
                ]);

                $_data2 = $data2 -> fetch(PDO::FETCH_ASSOC);

                if($_data2["sucuk"] == 1)
                {
                    echo 'color: red;"';
                }else
                {
                    echo 'color: azure;"';
                }
                echo '
                >'.$row["gonderi_kadi"].'</a>';
                if($_data2["uye_ban"] == 1)
                {
                    echo '  <p style="color:coral;">Banlı</p';
                }
                echo
                '</h4><p style="position: relative; left: 10px; font-family: \'Almarai\', sans-serif; color: azure;">Tarih : '.$row["gonderi_tarih"].'</p>
                <p style="position: relative; left: 10px; font-family: \'Almarai\', sans-serif; color: azure;">Gönderi Sayısı : '.$_data2["uye_gonderisayi2"].'</p></td>
                </tr>
                <tr>
                    <td><p id="mesajid" style="font-family: \'Almarai\', sans-serif; color: burlywood; min-height: 100px; width: 900px; overflow-wrap: break-word;">'.$row["gonderi_mesaj"].'</p></td>
                </tr>';
                if($row["gonderi_resim"] == 1)
                {
                    if(file_exists("kpostfoto/".$row["gonderi_kadi"]."/".$row["gonderi_no"]."/gonderiresim.jpg"))
                    {
                        echo '<tr>
                    <td><img src="kpostfoto/'.$row["gonderi_kadi"].'/'.$row["gonderi_no"].'/gonderiresim.jpg" alt="" width="700px"></td>
                    </tr>';
                    }else if(file_exists("kpostfoto/".$row["gonderi_kadi"]."/".$row["gonderi_no"]."/gonderiresim.png"))
                    {
                        echo '<tr>
                    <td><img src="kpostfoto/'.$row["gonderi_kadi"].'/'.$row["gonderi_no"].'/gonderiresim.png" alt="" width="700px"></td>
                    </tr>';
                    }
                }
                $begenisor = $db->prepare('SELECT * FROM begeniler WHERE begeni_uyeid = ? && begeni_gonderiid = ?');
                    $begenisor->execute([
                    $_data["uye_id"], $row["gonderi_id"]
                    ]);

                    $say = $begenisor->rowCount();
                if($say == 1)
                {
                    echo '<tr>
                        <td><span style="color:white; width:20px; font-size:25px;">'.$row["gonderi_begeni"].'</span> <img src="siteresimleri/kalp.png" width=30px> <a href="gonderibegen.php?gonderiid='.$row["gonderi_id"].'&kullid='.$_data["uye_id"].'&begeni=1" id="gonderibegeli">BEĞENMEYİ KALDIR</a></td>
                    </tr>';
                }else
                {
                    echo '<tr>
                        <td><span style="color:white; width:20px; font-size:25px;">'.$row["gonderi_begeni"].'</span> <img src="siteresimleri/kalp.png" width=30px> <a href="gonderibegen.php?gonderiid='.$row["gonderi_id"].'&kullid='.$_data["uye_id"].'&begeni=0" id="gonderibegen">BEĞEN</a></td>
                    </tr>';
                }
                
                if(@$_SESSION["kgiris"])
                {
                    if($_data["sucuk"] == 1)
                    {
                        echo '<tr>
                            <td><a href="gonderisil.php?no='.$row["gonderi_no"].'&gkadi='.$row["gonderi_kadi"].'" id="gonderisil">Gönderiyi Sil</a></td> 
                            <td><a href="banla.php?gkadi='.$row["gonderi_kadi"].'" id="gonderisil">Kullanıcıyı Banla</a></td> 
                        </tr>';
                    }
                    else if($row["gonderi_kadi"] == @$_SESSION["kgiris"])
                    {
                        echo '<tr>
                        <td><a href="gonderisil.php?no='.$row["gonderi_no"].'&gkadi='.$row["gonderi_kadi"].'" id="gonderisil">Gönderiyi Sil</a></td> 
                        </tr>';
                    }
                }
            echo '
            </table>
            
            </div>';
        }
        
        
        
        ?>
            
    </article>
    <?php include 'footer.php'; ?>
</body>
</html>