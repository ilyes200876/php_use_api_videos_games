<!-- index.php -->

<?php include_once __DIR__ . "/component/header.php" ?>

<h1>Les Différents jeux vidéos</h1>
<?php
$i = 1;
if(isset($_GET['page'])){
  $i = $_GET['page'];
}
$url = "https://steam-ish.test-02.drosalys.net/api/game?page=" . $i;
$json = file_get_contents($url);
$tab =json_decode($json, true);
$urlGenre = "https://steam-ish.test-02.drosalys.net/api/genre";
$jsonGenre = file_get_contents($urlGenre);
$tabGenre =json_decode($jsonGenre, true);
if($i > $tab['totalPages']){
  header('Location: index.php?page='. $tab['totalPages']);
  exit();
}

if($i < 1){
  header('Location: index.php?page=1');
  exit();
}
// echo '<pre>';
// var_dump($tab);
// echo '</pre>';

// echo '<pre>';
// var_dump($tabGenre);
// echo '</pre>';

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';




?>

<form action="./page/gameGenre.php" method="GET">
  <label for="genre">Les différents genre de films</label>
  <select name="slug" id="genre">
    <?php foreach($tabGenre['items'] as $item) : ?>
      <option value="<?= $item['slug'] ?>"><?= $item['name'] ?></option>
    <?php endforeach; ?>
  </select>
  <button type="submit">Valider</button>
</form>

<div class="row g-4 gameCardPage">
  <?php foreach($tab['items'] as $item) : ?>
    <div class="col-md-4">
      <div class="card gameCard">
        <a href="page/gameSlug.php?slug=<?= $item['slug'] ?>"><img class="imgGameCard" src="<?= $item['thumbnailCover'] ?>" class="card-img-top" alt="<?php $item['description'] ?>"></a>
        <div class="card-body">
          <a href="page/gameSlug.php?slug=<?= $item['slug'] ?>"><p class="gameName"><?= $item['name'] ?></p></a>
          <p class="gameDatePublish">Puplié le : <?= $item['publishedAt'] ?></p>
          <p class="gamePrice">Prix : <?= $item['price'] ?> €</p>
          <h3>Description du jeu</h3>
          <p class="card-text gameDescription"><?= $item['description'] ?></p>
          <div class="buttonCart">
            <a href="/page/sessionPanierTraitement.php?slug=<?= $item['slug'] ?>"><button class='buttonCart'>Ajouter au panier</button></a>
          </div>
        </div>
      </div>
    </div>
    
  <?php endforeach; ?>
</div>
<div>
  <a href="index.php?page=<?= $i-1 ?>"><button>Précédent</button></a>
  <a href="index.php?page=<?= $i+1 ?>"><button>Suivant</button></a>
</div>


<?php include_once __DIR__ . "/component/footer.php" ?>