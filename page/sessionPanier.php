<!-- /page/sessionPanier.php -->
<?php include_once __DIR__ . "/../component/header.php" ?>

<h1>Mon panier</h1>

<?php

$i = 1;
$totalPrice = 0;
$arrayPanier= [];
foreach($_SESSION['slug'] as $item){
  $url = "https://steam-ish.test-02.drosalys.net/api/game/" . $item;
  $json = file_get_contents($url);
  $array = json_decode($json, true);
  $arrayPanier[] = $array;
} 
  
// echo '<pre>';
// var_dump($arrayPanier);
// echo '</pre>';

?>

<?php if(isset($_GET['pay'])) : ?>
  <?php if($_GET['pay'] === 'success') : ?>
    <p>Félicitation ! Vous venez de payer vos articles</p>
  <?php endif; ?>  
<?php endif; ?>

<div class="container containerPanierDetails">
  <h3>liste des jeux vidéos</h3>  
  <div>
    <?php foreach($arrayPanier as $value) : ?>
      <div class="panierNamePrice">
        <div class="panierName">
          <p><?= $i++ ?>. <?= $value['name'] ?></p>
        </div>
        <a href="./panierTraitementDeleteItem.php?delete=<?= $value['slug'] ?>"><button class="buttonDelete">x</button></a>
        <p><?= $value['price'] ?></p>
      </div>
      <?php $totalPrice+= $value['price'] ?>
    <?php endforeach; ?>
  </div>
  <div class="panierButtonLien">
    <div>
      <p>Le prix à payer est de : <?= $totalPrice ?></p>
      <?php if(count($arrayPanier) > 0) : ?>
        <a href="./sessionPanierTraitementPaiement.php"><button type="submit">Payer</button></a>
      <?php endif; ?>
    </div>
    <a href="../index.php">Ajouter des articles</a>
  </div>
    


</div>

<?php include_once __DIR__ . "/../component/footer.php" ?>