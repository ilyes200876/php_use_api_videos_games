<!-- /page/sessionPanierTraitement.php -->

<?php
session_start();
$gamesession = $_GET['slug'];



$_SESSION['slug'][] = $gamesession;


echo '<pre>';
var_dump($_SESSION);
echo'</pre>';


