<footer>
        <table id="navtablefot">
            <tr>
            <td class="navtabtd"><a href="https://nazobook.social/anasayfa" class="navtaba" style="font-family: 'Ubuntu Condensed', sans-serif;">Anasayfa</a></td>
            <?php 
                if(@$_SESSION["kgiris"])
                {
                    echo '<td class="navtabtd"><a href="https://nazobook.social/gonderilerim" class="navtaba" style="font-family: \'Ubuntu Condensed\', sans-serif;">Gönderilerim</a></td>';
                    echo '<td class="navtabtd"><a href="https://nazobook.social/duyurular" class="navtaba" style="font-family: \'Ubuntu Condensed\', sans-serif;">Duyurular</a></td>';
                    echo '<td class="navtabtd"><a href="https://nazobook.social/sohbet" class="navtaba" style="font-family: \'Ubuntu Condensed\', sans-serif;">Sohbet</a></td>';
                }
                ?>
                <td class="navtabtd"><a href="https://nazobook.social/kurallar" class="navtaba" style="font-family: 'Ubuntu Condensed', sans-serif;">Kurallar</a></td>  
                <td class="navtabtd"><a href="#enust" class="navtaba" style="font-family: 'Ubuntu Condensed', sans-serif;">En üst</a></td>  
            </tr>
        </table>
    </footer>