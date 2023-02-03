<?php 
session_start();
include 'ayar.php';

session_destroy();

header('Refresh:0; https://nazobook.social/anasayfa');


?>