<!-- /page/panierTraitementDeleteItem.php -->

<?php

session_start();

$delete = $_GET['delete'];

if (isset($_SESSION['slug'])) {
  $index = array_search($delete, $_SESSION['slug']);
  if ($index) {
    unset($_SESSION['slug'][$index]);
  }
}

header('Location: ./sessionPanier.php?delete=success');
exit();






