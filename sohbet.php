<?php 
include 'ayar.php';


$diceksey = 0;

if(isset($_POST["mesaj"]))
{
    $mesaj = $_POST["mesaj"];
    $mesaj = strip_tags($mesaj);

    $mesajs = str_replace(' ', '', $mesaj);
    
    $mesaj3 = mb_strtolower($mesajs, 'UTF-8');

    if($mesajs == "")
    {
        header('Refresh:0; https://nazobook.social/sohbet-bos');
        exit;
    }

    
    $sohbettutsor = $db->prepare('SELECT * FROM sohbet WHERE sohbet_tutucu = ?');
    $sohbettutsor->execute([
        $mesaj3
    ]);

    $say = $sohbettutsor->rowCount();

    if($say == 0)
    {
        $diceksey = 1;
    }else
    {
        $diceksey = 2;

        $data = $db-> prepare("SELECT * FROM sohbet WHERE sohbet_tutucu=?");
        $data -> execute([
            $mesaj3
        ]);

        $_data = $data -> fetch(PDO::FETCH_ASSOC);
    }
}

if(isset($_POST["mesaj2"]))
{
    $mesaj = $_POST["mesaj2"];
    $mesaj = strip_tags($mesaj);

    $mesajs = str_replace(' ', '', $mesaj);

    if($mesajs == "")
    {
        header('Refresh:0; https://nazobook.social/sohbet-bos');
        exit;
    }

    $emesaj = $_POST["emesaj"];
    $emesaj = strip_tags($emesaj);

    $mesajs2 = str_replace(' ', '', $emesaj);

    $mesaj3 = mb_strtolower($mesajs2, 'UTF-8');

   
    
    $sorgu = $db-> prepare('INSERT INTO sohbet SET sohbet_mesaj = ?, sohbet_tutucu = ?');
    $ekle = $sorgu->execute([
    $mesaj,
    $mesaj3
    ]);
    
}




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
    <title>NazoBook | Sohbet</title>
    <link rel="stylesheet" href="style2.css">
    </head>
    <body>
        <div id="header">
             <h1 id="h1he">NAZO BOOK SOHBET</h1>
            
        </div>
        <div id="flex">
            
            <div class="kutu">

                <div id="flexcevap">
                    
                    <div class="cevapsec">
                        <h1 class="h1ler">Cevap</h1>
                        
                        <h3 class="cevap">
                            
                            <?php 
                            
                                if($diceksey == 1)
                                {
                                    echo "Dediğin şeyin ne olduğunu anlamadım, biri bana bunu dediğinde ne demeliyim ?";
                                }else if($diceksey == 2)
                                {
                                    echo $_data["sohbet_mesaj"];
                                }
                                
                            
                            ?>
                        </h3>
                    </div>
                    
                    
                    <div class="cevapsec">
                        <h1 class="h1ler">Mesaj</h1>
                        <h3 class="cevap">
                            <?php 
                                if($diceksey == 1)
                                {
                                    echo $mesaj;
                                }else if($diceksey == 2)
                                {
                                    echo $mesaj;;
                                }

                            ?>
                        </h3>
                    </div>
                </div>






            </div>
            
        </div>

        
        

        
        <div id="form" >
            <?php 
                         
                if(isset($_GET["p"]))
                {
                    echo "<h1  style='color:red; font-size: 20px;    font-weight: bold;' >Boş bırakamazsın!</h1>";
                }

            ?>
            <form id="inform"action="https://nazobook.social/sohbet" method="POST" >
                  <textarea name="<?php 
                    if($diceksey == 1)
                    {
                        echo "mesaj2";
                    }else
                    {
                        echo "mesaj";
                    }
                        
                        
                    ?>" 
                    id="mesaj" cols="148" rows="15"   placeholder="Mesajınızı Gönderin! - Maksimum 583 karakter."; required maxlength="583"></textarea>
                    <?php 
                    if($diceksey == 1)
                    {
                        echo '<textarea name="emesaj" id="emesaj" cols="1" rows="1" style="opacity: 0;">'.$mesaj.'</textarea>';
                    }
                    ?>
                        
                    <br>
                    <input type="submit" class="button">
                    
                </form>
                
        </div>
        <div id="sensizolmuyor"><a href="https://nazobook.social/anasayfa">AnaSayfa</a> </div>
    </body>
</html>