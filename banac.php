<?php 

include 'ayar.php';

$banlancak = @$_GET["gkadi"];
$banno = 0;

        $sorgu = $db-> prepare('UPDATE uyeler SET uye_ban= ? WHERE uye_kadi = ?');
        $ekle = $sorgu->execute([
        $banno,
        $banlancak
        ]);
        header('Refresh:0; https://nazobook.social/anasayfa');
?>