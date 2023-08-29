<!-- /page/gameMenre.php -->
<?php include_once __DIR__ . '/../component/header.php' ?>

<?php

$gameGenre = $_GET['slug'];
$url = 'https://steam-ish.test-02.drosalys.net/api/genre/' . $gameGenre;
$json = file_get_contents($url);
$array =json_decode($json, true);
echo '<pre>';
var_dump($array);
echo '</pre>';


?>

<h1>Les films du genre</h1>
<h3><?= $array['name'] ?></h3>

<div class="row g-4 gameCardPage">
  <?php foreach($array['games'] as $item) : ?>
    <div class="col-md-4">
      <div class="card gameCard">
        <a href="./gameSlug.php?slug=<?= $item['slug'] ?>"><img class="card-img-top imgGameCard" src="<?= $item['thumbnailCover'] ?>" alt=""></a>
        
        <div class="card-body">
          <a href="./gameSlug.php?slug=<?= $item['slug'] ?>"><p class="gameName"><?= $item['name'] ?></p></a>
          
          <p class="gameDatePublish">Puplié le : <?= $item['publishedAt'] ?></p>
          <p class="gamePrice">Prix : <?= $item['price'] ?> €</p>
          
        </div>
      </div>
    </div>
    
  <?php endforeach; ?>
</div>


<?php include_once __DIR__ . '/../component/footer.php' ?>