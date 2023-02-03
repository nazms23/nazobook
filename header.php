<header>
        <a href="https://nazobook.social/anasayfa"><img src="siteresimleri/NazoBook.png" alt="c# logo" id="headimg"></a>
    </header>
    <nav>
    <a name="enust"></a>
        <table id="navtable">
            <tr>
                <td class="navtabtd"><a href="https://nazobook.social/anasayfa" class="navtaba" style="font-family: 'Ubuntu Condensed', sans-serif;">Anasayfa</a></td>
                <?php 
                if(@$_SESSION["kgiris"])
                {
                    echo '<td class="navtabtd"><a href="https://nazobook.social/gonderilerim" class="navtaba" style="font-family: \'Ubuntu Condensed\', sans-serif;">Gönderilerim</a></td>';
                    echo '<td class="navtabtd"><a href="https://nazobook.social/duyurular" class="navtaba" style="font-family: \'Ubuntu Condensed\', sans-serif;">Duyurular</a></td>';
                    echo '<td class="navtabtd"><a href="https://nazobook.social/sohbet" class="navtaba" style="font-family: \'Ubuntu Condensed\', sans-serif;">Sohbet</a></td>';
                    echo '<td class="navtabtd"><a href="https://nazobook.social/kelimeler" class="navtaba" style="font-family: \'Ubuntu Condensed\', sans-serif;">Kelimeler</a></td>';
                }
                ?>
                
                <td class="navtabtd"><a href="https://nazobook.social/kurallar" class="navtaba" style="font-family: 'Ubuntu Condensed', sans-serif;">Kurallar</a></td>  
            </tr>
        </table>
        <div id="kullanici">
            <?php 

            if(file_exists("kprofilphoto/".@$kadi."/profilphoto".$_data["uye_pp"].".jpg"))
            {
                $profilresmi = '<img src="kprofilphoto/'.@$kadi.'/profilphoto'.$_data["uye_pp"].'.jpg" alt="" width="40px" height="28px" id="profilresmiresim">';
            }else if(file_exists("kprofilphoto/".@$kadi."/profilphoto".$_data["uye_pp"].".png"))
            {
                $profilresmi =  '<img src="kprofilphoto/'.@$kadi.'/profilphoto'.$_data["uye_pp"].'.png" alt="" width="40px" height="28px" id="profilresmiresim">';
            }else
            {
                $profilresmi =  '<img src="siteresimleri/bospp.jpg" alt="" width="40px" height="28px" id="profilresmiresim">';
            }
            
            if(@$_SESSION["kgiris"])
            {
                echo '<table id="navtable2">
                <tr>
                <td class="navtabtd2"><a href="cikis.php" class="navtaba" style="font-family: \'Ubuntu Condensed\', sans-serif;">Çıkış Yap</a></td>
                <td class="navtabtd3"><a href="https://nazobook.social/profil" class="navtaba">'.$profilresmi.'</a></td>
                    
                </tr>
            </table>';
            }else
            {
                echo '<table id="navtable2">
                <tr>
                    <td class="navtabtd2"><a href="https://nazobook.social/giris-yap" class="navtaba" style="font-family: \'Ubuntu Condensed\', sans-serif;">Giriş Yap</a></td>
                    <td class="navtabtd2"><a href="https://nazobook.social/kayit-ol" class="navtaba" style="font-family: \'Ubuntu Condensed\', sans-serif;">Kayıt Ol</a></td>
                </tr>
            </table>';
            }
            
            
            
            
            ?>
            
            

        </div>
    </nav>