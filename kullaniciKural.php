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
    <meta name="description" content="Nazobook insanların paylaşım yapabileceği bir yerdir." />
    <meta name="keywords" content="türkçe,türkiye,nazobook,nazobook sitesi,nazobook site, xlouy, xlouy nazobook, site, paylaşmak, kurallar" />
    <meta name="author" content="xLouy" />
    <meta name="robots" content="index,follow" />
    <link rel="icon" href="siteresimleri/favicon.ico" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Almarai&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
    <title>NazoBook | Kurallar</title>
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
        <h1 id="bolumismi" style="font-family: 'Almarai', sans-serif;">Kurallar</h1>
        <hr>
            <!--
            <center>
            <h1 style="font-family: 'Almarai', sans-serif; color:red;">BU KISMI GÖREBİLMEK İÇİN ÖNCE GİRİŞ YAPMAN GEREKİYOR</h1>
            <h2><a href="" class="navtaba" style="font-family: 'Ubuntu Condensed', sans-serif; font-size: 30px;">Giriş Yap</a>
                <a href="" class="navtaba" style="font-family: 'Ubuntu Condensed', sans-serif; font-size: 30px;">Kayıt Ol</a></h2>
            </center>
            -->
            <hr>

            <p style="font-family: 'Almarai', sans-serif; color: aliceblue; font-size: 20px; margin-left: 10px;">
            Herkes istediğini paylaşabilir cinsel içerik haricinde
            <br> <br>
            Paylaşılan din ve siyasetle ilgili şeylerden paylaşımı yapan kişi sorumludur
            <br> <br>
            Herhangi bir şifrelerin çalınması gibi durumda sorumluluk kabul etmiyorum zaten kayıt olurken kocaman yazdım
            <br> <br>
            Kayıt olduğunuz anda bunları kabul etmiş sayılırsınız
            </p>


            
            
            
    </article>
    <?php include 'footer.php' ?>
</body>
</html>