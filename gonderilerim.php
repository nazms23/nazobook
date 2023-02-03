<?php 
session_start();
include 'ayar.php';
$kadi = @$_SESSION["kgiris"];

if(isset($_GET["p"]))
{
    $kullaniciad = @$_GET["p"];
}else
{
    $kullaniciad = $kadi;
}


$data = $db-> prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
$data -> execute([
    $kadi
]);

$_data = $data -> fetch(PDO::FETCH_ASSOC);

$data8 = $db-> prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
$data8 -> execute([
    $kullaniciad
]);

$_data8 = $data8 -> fetch(PDO::FETCH_ASSOC);

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
    <meta name="keywords" content="türkçe,türkiye,nazobook,nazobook sitesi,nazobook site, xlouy, xlouy nazobook, site, paylaşmak, gonderiler" />
    <meta name="author" content="xLouy" />
    <meta name="robots" content="index,follow" />
    <link rel="icon" href="siteresimleri/favicon.ico" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Almarai&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca&display=swap" rel="stylesheet">
    <title>NazoBook | <?php echo $kullaniciad; ?> Gönderileri</title>
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
        <h1 id="bolumismi" style="font-family: 'Almarai', sans-serif;"><?php echo $kullaniciad; ?> Gönderileri</h1>
        <hr>
        <hr>
        <?php 
        $bosluk = " ";

        $dataList = $db -> prepare("SELECT * FROM gonderiler WHERE gonderi_kadi = ? ORDER BY gonderi_id DESC ");
        $dataList -> execute([
            $kullaniciad
        ]);
        $dataList = $dataList -> fetchAll(PDO::FETCH_ASSOC);
        foreach($dataList as $row)
        {
            echo '<div class="gonderidiv">
            <table id="gonderitable">
                <tr>
                    <td><h3 style="font-family: \'Almarai\', sans-serif; color: rgb(23, 235, 13);">'.$row["gonderi_baslik"].'</h3></td>
                </tr>
                <tr>
                    <td>';
                    if(file_exists("kprofilphoto/".$row["gonderi_kadi"]."/profilphoto".$_data8["uye_pp"].".jpg"))
                    {
                        echo '<img src="kprofilphoto/'.$row["gonderi_kadi"].'/profilphoto'.$_data8["uye_pp"].'.jpg" alt="" width="100px" height="100px" style="float: left;">';
                    }else if(file_exists("kprofilphoto/".$row["gonderi_kadi"]."/profilphoto".$_data8["uye_pp"].".png"))
                    {
                        echo '<img src="kprofilphoto/'.$row["gonderi_kadi"].'/profilphoto'.$_data8["uye_pp"].'.png" alt="" width="100px" height="100px" style="float: left;">';
                    }else
                    {
                        echo '<img src="siteresimleri/bospp.jpg" alt="" width="85px" height="78px" style="float: left;">';
                    }

                    
                    
                    
                echo '<h4 style="position: relative; left: 10px; font-family: \'Almarai\', sans-serif;';

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
                >'.$row["gonderi_kadi"].'</h4><p style="position: relative; left: 10px; font-family: \'Almarai\', sans-serif; color: azure;">Tarih : '.$row["gonderi_tarih"].'</p></td>
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
                
                if(@$_SESSION["kgiris"])
                {
                    if($_data["sucuk"] == 1)
                    {
                        echo '<tr>
                        <td><a href="gonderisil.php?no='.$row["gonderi_no"].'&gkadi='.$row["gonderi_kadi"].'" id="gonderisil">Gönderiyi Sil</a></td> 
                            <td><a href="" id="gonderisil">Kullanıcıyı Banla</a></td> 
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