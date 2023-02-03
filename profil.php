<?php 
session_start();
include 'ayar.php';

$kadi = @$_SESSION["kgiris"];

$data = $db-> prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
$data -> execute([
    $kadi
]);

$_data = $data -> fetch(PDO::FETCH_ASSOC);


$hatalar = @$_GET["p"];

?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nazobook insanların paylaşım yapabileceği bir yerdir." />
    <meta name="keywords" content="türkçe,türkiye,nazobook,nazobook sitesi,nazobook site, xlouy, xlouy nazobook, site, paylaşmak, profil" />
    <meta name="author" content="xLouy" />
    <meta name="robots" content="index,follow" />
    <link rel="icon" href="siteresimleri/favicon.ico" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Almarai&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
    <title>NazoBook | Profil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="reklamarea1">


</div>

<div id="reklamarea2">


</div>
<?php include 'header.php' ?>
    <article>
        <hr>
        <h1 id="bolumismi" style="font-family: 'Almarai', sans-serif;">Profil</h1>
        <hr>
            <!--
            <center>
            <h1 style="font-family: 'Almarai', sans-serif; color:red;">BU KISMI GÖREBİLMEK İÇİN ÖNCE GİRİŞ YAPMAN GEREKİYOR</h1>
            <h2><a href="" class="navtaba" style="font-family: 'Ubuntu Condensed', sans-serif; font-size: 30px;">Giriş Yap</a>
                <a href="" class="navtaba" style="font-family: 'Ubuntu Condensed', sans-serif; font-size: 30px;">Kayıt Ol</a></h2>
            </center>
            -->
        <hr>

        <div id="profilresmi">
            <?php 
            if(file_exists("kprofilphoto/".$kadi."/profilphoto".$_data["uye_pp"].".jpg"))
            {
                echo '<img src="kprofilphoto/'.$kadi.'/profilphoto'.$_data["uye_pp"].'.jpg" alt="" width="300px" height="350px" id="profilresmiresim">';
            }else if(file_exists("kprofilphoto/".$kadi."/profilphoto".$_data["uye_pp"].".png"))
            {
                echo '<img src="kprofilphoto/'.$kadi.'/profilphoto'.$_data["uye_pp"].'.png" alt="" width="300px" height="350px" id="profilresmiresim">';
            }else
            {
                echo '<img src="siteresimleri/bospp.jpg" alt="" width="300px" height="350px" id="profilresmiresim">';
            }
            ?>
             <br>
            <form action="bilgidegistir.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="resim">
                <input type="submit" value="Değiştir">
            </form>
            <br>
            <p style="color: azure;">Sadece png ve jpg uzantılı resimler koyabilirsin</p>
            <p style="color: azure;">Resim değiştirirken eğer resmin boyutu fazlaysa yükleme işlemi biraz uzun sürebilir</p>
        </div>
        <div id="profilbilgiler">
            <table>
                <tr class="profiltabletr">
                    <td class="profiltabletd">Kullanıcı <br> Adı</td>
                    <td class="profiltabletd"><?php echo $_data["uye_kadi"] ; ?></td>
                </tr>
                <tr class="profiltabletr">
                    <td class="profiltabletd">Eposta</td>
                    <td class="profiltabletd"><?php echo $_data["uye_eposta"] ; ?></td>
                </tr>
                <tr class="profiltabletr">
                    <td class="profiltabletd">Oluşturma <br> Tarihi</td>
                    <td class="profiltabletd"><?php echo $_data["uye_tarih"] ; ?></td>
                </tr>
                <tr class="profiltabletr">
                    <td class="profiltabletd">Ban Durumu</td>
                    <td class="profiltabletd"><?php if($_data["uye_ban"] == 0) { echo "<p style=\"color:lime;\">Banlı Değil</p>"; }else{ echo "<p style=\"color:red;\">Banlısın</p>";} ?></td>
                </tr>
                <tr class="profiltabletr">
                    <td class="profiltabletd">Gönderi Sayısı</td>
                    <td class="profiltabletd"><?php echo "<p>".$_data["uye_gonderisayi2"]."</p>";?></td>
                </tr>
            </table>
        </div>
        <div id="profilbilgiler">
            <table>
                <form action="bilgidegistir.php" method="GET">
                    <?php 
                    if($hatalar == "kadi")
                    {
                        echo '
                        <tr class="profiltabletr">
                    <td class="profiltabletd" colspan="3">Aynı Kullanıcı Adıyla Başka Bir Hesap Var</td>
                    </tr>
                ';
                    }
                    if($hatalar == "kadi2")
                    {
                        echo '
                        <tr class="profiltabletr">
                    <td class="profiltabletd" colspan="3">Bu Bölüm Boş Bırakılamaz</td>
                    </tr>
                ';
                    }
                    
                    ?>
                <tr class="profiltabletr">
                    <td class="profiltabletd">Kullanıcı <br> Adı</td>
                    <td class="profiltabletd"><input type="text" name="yenikadi"></td>
                    <td class="profiltabletd"><input type="submit" value="Değiştir"></td>
                </tr>
                </form>
                <form action="bilgidegistir.php" method="GET">
                <?php 
                    if($hatalar == "eposta")
                    {
                        echo '
                        <tr class="profiltabletr">
                    <td class="profiltabletd" colspan="3">Aynı Eposta İle Başka Bir Hesap Var</td>
                    </tr>
                ';
                    }
                    if($hatalar == "eposta2")
                    {
                        echo '
                        <tr class="profiltabletr">
                    <td class="profiltabletd" colspan="3">Bu Bölüm Boş Bırakılamaz</td>
                    </tr>
                ';
                    }
                    
                    ?>
                    
                    
                <tr class="profiltabletr">
                    <td class="profiltabletd">E posta</td>
                    <td class="profiltabletd"><input type="email" name="yenieposta"></td>
                    <td class="profiltabletd"><input type="submit" value="Değiştir"></td>
                </tr>
                </form>
                <tr>
                    <td colspan="3">---------------------------------------------------------------------------</td>
                </tr>
                <form action="bilgidegistir.php" method="GET">
                <?php 
                    if($hatalar == "sifre")
                    {
                        echo '
                        <tr class="profiltabletr">
                    <td class="profiltabletd" colspan="3">Şifren Yanlış</td>
                    </tr>
                ';
                    }

                    if($hatalar == "sifre2")
                    {
                        echo '
                        <tr class="profiltabletr">
                    <td class="profiltabletd" colspan="3">Bu Bölüm Boş Bırakılamaz</td>
                    </tr>
                ';
                    }
                    
                    ?>
                <tr class="profiltabletr">
                    <td class="profiltabletd">Eski Şifre</td>
                    <td class="profiltabletd"><input type="password" name="eskisifre"></td>
                </tr>
                <tr class="profiltabletr">
                    <td class="profiltabletd">Yeni Şifre</td>
                    <td class="profiltabletd"><input type="password" name="yenisifre"></td>
                </tr>
                <tr class="profiltabletr">
                    <td class="profiltabletd" colspan="3"><input type="submit" value="Değiştir"></td>
                </tr>
                </form>
            </table>
        </div>

        <?php 
        
        if($_data["sucuk"] == 1)
        {
            echo '
            
            <form action="banac.php" method="GET">
            <input type="text" name="gkadi">
            <input type="submit" value="Banı Aç">
            </form>
            ';
        }
        
        
        ?>
            
            
            
    </article>
    <?php include 'footer.php' ?>
</body>
</html>