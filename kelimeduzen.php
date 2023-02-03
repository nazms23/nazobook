<?php 
session_start();
include 'ayar.php';

$kadi = @$_SESSION["kgiris"];

$data = $db-> prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
$data -> execute([
    $kadi
]);

$_data = $data -> fetch(PDO::FETCH_ASSOC);

$id = @$_GET["id"];

$data2 = $db-> prepare("SELECT * FROM kelimeler WHERE kelime_id=?");
$data2 -> execute([
    $id
]);

$_data2 = $data2 -> fetch(PDO::FETCH_ASSOC);



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
    <title>NazoBook | Kelime Düzen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php' ?>
    <article>
        <hr>
        <h1 id="bolumismi" style="font-family: 'Almarai', sans-serif;">Kelime düzen</h1>
        <hr>
            <hr>
            <?php 
            
            if($_data["sucuk"] == 1)
            {
                echo '<form action="kelimeduzenkod.php">
                <table style="color: white;">
                    <tr><th>'.$_data2["kelime_isim"].'</th><th>'.$_data2["kelime_esanlam"].'</th><th>'.$_data2["kelime_turkce"].'</th></tr>
                    <tr><td>Kelime</td><td>Eşanlam</td><td>Türkçe</td></tr>
                    <tr><td><input type="text" name="kelimead"></td><td><input type="text" name="esanlam" id=""></td><td><input type="text" name="turkce" id=""></td></tr>
                </table>
                <input type="text" name="id" value="<?php echo $id;?>" style="display: none;">
                <input type="submit" value="Gönder">
    
    
                </form>
                ';
            }else
            {
                echo '
                <center>
                <h1 style="font-family: \'Almarai\', sans-serif; color:red;">BU KISMI SADECE YETKİLİLER GÖREBİLİR</h1>
                </center>';
            }
            ?>
            
        
            
            
            
    </article>
    <?php include 'footer.php' ?>
</body>
</html>