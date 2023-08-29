<!-- /page/sessionPanierTraitementPaiement.php -->

<?php

session_start();

$_SESSION['slug'] = [];
  header('Location: ./sessionPanier.php?pay=success');
  exit();


