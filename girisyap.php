<?php 
session_start();
include 'ayar.php';

$q = @$_GET["q"];
$p = @$_GET["p"];
?>

<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nazobook insanların paylaşım yapabileceği bir yerdir." />
    <meta name="keywords" content="türkçe,türkiye,nazobook,nazobook sitesi,nazobook site, xlouy, xlouy nazobook, site, paylaşmak, giris yap" />
    <meta name="author" content="xLouy" />
    <meta name="robots" content="index,follow" />
    <link rel="icon" href="siteresimleri/favicon.ico" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Almarai&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
    <?php 
        if($q == "kayit")
        {
            echo '<title>NazoBook | Kayıt Ol</title>';
        }else
        {
            echo '<title>NazoBook | Giriş Yap</title>';
        }
        ?>
    
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
        <?php 
        if($q == "kayit")
        {
            echo '<h1 id="bolumismi" style="font-family: \'Almarai\', sans-serif;">Kayıt Ol</h1>';
        }else
        {
            echo '<h1 id="bolumismi" style="font-family: \'Almarai\', sans-serif;">Giriş Yap</h1>';
        }
        ?>
        
        <hr>
        <hr>
        <?php 
        
        if($q == "kayit")
        {
            echo '<div id="girisyapdiv">
            <center>
                <h1 style="font-family: \'Almarai\', sans-serif; font-size: 70px;">KAYIT OL</h1>
        <form action="kayitol.php" method="POST" id="girisyapform">
        <table>
            <tr class="girisyaptr">
                <td style="font-family: \'Almarai\', sans-serif;" class="girisyaptd">Kullanıcı <br> Adı</td>
                <td class="girisyaptd"><input type="text" name="kadi" class="girisyapinput"></td>
            </tr>
            </tr>
            <tr class="girisyaptr">
                <td style="font-family: \'Almarai\', sans-serif;" class="girisyaptd">E posta</td>
                <td class="girisyaptd"><input type="email" name="eposta" class="girisyapinput"></td>
            </tr>
            <tr class="girisyaptr">
                <td style="font-family: \'Almarai\', sans-serif;" class="girisyaptd">Şifre</td>
                <td class="girisyaptd"><input type="password" name="sifre" class="girisyapinput"></td>
            </tr>
            <tr class="girisyaptr">
                <td style="font-family: \'Almarai\', sans-serif;" class="girisyaptd">Şifre <br> Tekrar</td>
                <td class="girisyaptd"><input type="password" name="sifre2" class="girisyapinput"></td>
            </tr>';
            if($p == "sifre")
            {
                echo '<tr class="girisyaptr">
                <td style="font-family: \'Almarai\', sans-serif;" class="girisyaptd" colspan="2">Şifreler uyuşmuyor</td>
                </tr>';
            }else if($p == "eposta")
            {
                echo '<tr class="girisyaptr">
                <td style="font-family: \'Almarai\', sans-serif;" class="girisyaptd" colspan="2">Girdiğiniz E posta ile kayıtlı başka kullanıcı var</td>
                </tr>';
            }else if($p == "kadi")
            {
                echo '<tr class="girisyaptr">
                <td style="font-family: \'Almarai\', sans-serif;" class="girisyaptd" colspan="2">Girdiğiniz Kullanıcı Adı ile kayıtlı başka kullanıcı var</td>
                </tr>';
            }else if($p == "kadieposta")
            {
                echo '<tr class="girisyaptr">
                <td style="font-family: \'Almarai\', sans-serif;" class="girisyaptd" colspan="2">Girdiğiniz Kullanıcı Adı ve E posta ile kayıtlı başka kullanıcı var</td>
                </tr>';
            }
            echo'
            <tr>
                <td colspan="2"><input type="submit" id="girisyapbuton"></td>
            </tr>
            ';
        ?>
        </table>
        </form>
        <p>
            Önemli Not: Eposta ve şifrenizi normalde kullandıklarınızdan farklı yapın, eposta onayı istemediği için 
            sorun olmaz, bi kaç önemli şey olmadığı için her zaman kullandıklarınızı yazarsanız
            site bi hek yediğinde hesaplarınız gider xd kayıt olduğunuzda sorumluluk tamamen size aittir.
        </p>
        </center>
        </div>';
        <?php
        }else
        {
            echo '<div id="girisyapdiv">
            <center>
                <h1 style="font-family: \'Almarai\', sans-serif; font-size: 70px;">GİRİŞ YAP</h1>
        <form action="girisyapkod.php" method="POST" id="girisyapform">
        <table>
            <tr class="girisyaptr">
                <td style="font-family: \'Almarai\', sans-serif;" class="girisyaptd">E posta</td>
                <td class="girisyaptd"><input type="email" name="eposta" class="girisyapinput"></td>
            </tr>
            <tr class="girisyaptr">
                <td style="font-family: \'Almarai\', sans-serif;" class="girisyaptd">Şifre</td>
                <td class="girisyaptd"><input type="password" name="sifre" class="girisyapinput"></td>
            </tr>
            ';
            if($p == "hatali")
            {
                echo '<tr class="girisyaptr">
                <td style="font-family: \'Almarai\', sans-serif;" class="girisyaptd" colspan="2">E posta veya şifre hatalı</td>
                </tr>';
            }else if($p == "kayitbasari")
            {
                echo '<tr class="girisyaptr">
                <td style="font-family: \'Almarai\', sans-serif;" class="girisyaptd" colspan="2">Başarıyla Kayıt Yaptınız</td>
                </tr>';
            }

            echo '
            <tr>
                <td colspan="2"><input type="submit" id="girisyapbuton"></td>
            </tr>
        </table>
        </form>
        <p>Önemli Not: Eposta ve şifrenizi normalde kullandıklarınızdan farklı yapın, eposta onayı istemediği için 
            sorun olmaz, ssl sertifikası ve bi kaç önemli şey olmadığı için her zaman kullandıklarınızı yazarsanız
            site bi hek yediğinde hesaplarınız gider xd kayıt olduğunuzda sorumluluk tamamen size aittir.</p>
        </center>
        </div>';
        }
        ?>
        

        
            
            
    </article>
    <?php include 'footer.php' ?>
</body>
</html>