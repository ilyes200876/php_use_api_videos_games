<!-- /page/gameSlug.php -->

<?php include_once __DIR__ . "/../component/header.php" ?>

<?php 

$gameSlug = $_GET['slug'];

$url = "https://steam-ish.test-02.drosalys.net/api/game/" . $gameSlug;
$json = file_get_contents($url);
$array =json_decode($json, true);
// echo '<pre>';
// var_dump($array);
// echo '</pre>';

?>
<div class="container gameSlugDescription">
  <div class="row">
    <div class="col-6">
      <img class="imgGameSlug" src="<?= $array['thumbnailCover'] ?>" alt="<?php $array['description'] ?>">
    </div>
    <div class="col-6 gameDetailsSlug">
      <div>
        <p class="gameNameSlug"><?= $array['name'] ?></p>
        <p class="gameDatePublish">Puplié le : <?= $array['publishedAt'] ?></p>
        <p class="gamePriceSlug">Prix : <?= $array['price'] ?> €</p>
      </div>
      
      <div class="gameDetailsSlug">
        <div>
          <h3>Description du jeu</h3>
          <p class="card-text gameDescriptionSlug"><?= $array['description'] ?></p>
        </div><br>
        <div>
          <p class="titleGameSlug">Les pays</p>
          <?php foreach($array['countries'] as $item) : ?>
            <div class="gameCountriesSlug">
              <p><?= $item['name'] ?></p>
              <p><?= $item['nationality'] ?></p>
              <img class="imgFlagSlug" src="<?= $item['urlFlag'] ?>" alt="">
            </div>  
          <?php endforeach; ?>
        </div><br>
        <div>
          <p class="titleGameSlug">Genre:</p> 
          <div class="gameCountriesSlug">
            <?php foreach($array['genres'] as $item) : ?>
              <p><a href="./gameGenre.php?slug=<?= $item['slug'] ?>"><?= $item['name'] ?></a></p>
            <?php endforeach; ?>
          </div> 
        </div>
      </div>
    </div>
    <div>
      <p class="gameCommentsSlug">Comments</p>
      <?php foreach($array['comments'] as $item) : ?>
        <img class="imgUserComputer" src="../../asset/images/userComputer.png" alt="utilisateur">
        <p><?= $item['account']['nickname'] ?></p>
        <p><?= $item['createdAt'] ?></p>
        <?php if($item['rank'] <= 2.5) : ?>
          <p style="color: red;">rank : <?= $item['rank'] ?> *</p>
          <?php else : ?>
            <p style="color: green;">rank : <?= $item['rank'] ?> *</p>
        <?php endif;  ?>
        <p><?= $item['content'] ?></p>
        <div class="d-flex justify-content-start">
          <div>
            <img class="gameCommentsthumbs"src="../../asset/images/thumbsUp.png" alt="thumbs up">
            <p><?= $item['upVotes'] ?></p>
          </div>
          <div style="width: 20px"></div>
          <div>
            <img class="gameCommentsthumbs" src="../../asset/images/thumbsDown.png" alt="thumbs down">
            <p><?= $item['downVotes'] ?></p>
          </div>
          
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>






<?php include_once __DIR__ . "/../component/footer.php" ?>