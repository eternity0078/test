<?php 
  require "includes/config.php"
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title']; ?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">

  <link rel="shortcut icon" href="<?php echo $config['favicon'];?> ">
</head>
<body>

  <div id="wrapper">

    <?php include "includes/header.php"; ?>

<!-- все записи -->
    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <div class="abutton">
              <?php 
              if ($_GET['categorie'] == ""){
                    $articles = mysqli_query($connection, "SELECT * from `articles` ORDER BY `id`");
              ?>
                    <h3>Список всех статей</h3>
                 <?php 
                  } else
                  {
                    $articles = mysqli_query($connection, "SELECT * from `articles` WHERE `categories_id`=".(int)$_GET['categorie']." ORDER BY `id`");
                    $categorie = mysqli_query($connection, "SELECT `title` from `articles_categories` WHERE `id`=".(int)$_GET['categorie']."");
                    $title_cat = mysqli_fetch_assoc($categorie);
                  ?>
                    <h3>Список статей в категории <?php echo $title_cat['title'] ?></h3>
              <?php 
              } 
              ?>
                <a href="/articles.php">Все записи</a>
              </div>
              <div class="block__content">
                <div class="articles articles__horizontal">
              

                  <?php
                  while($art = mysqli_fetch_assoc($articles))
                  {
                    ?>
                    <article class="article">
                    <div class="article__image" style="background-image: url(/media/images/<?php echo $art['image']; ?>"></div>
                    <div class="article__info">
                      <a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
                      <div class="article__info__meta">
                        <?php 
                          $art_cat = false;
                          foreach($categories as $cat)
                          {
                            if ($cat['id'] == $art['categories_id'])
                            {
                              $art_cat=$cat;
                              break;
                            }
                          }
                        ?>
                        <small>Категория: <a href="/articles.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?>
                        </a></small>
                      </div>
                      <div class="article__info__preview"><?php echo mb_substr($art['text'], 0, 100, 'utf-8').'...'; ?> </div>
                    </div>
                  </article>

                  
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </section>

          <section class="content__right col-md-4">
            <?php include "/includes/sidebar.php"; ?>
          </section>

        </div>
      </div>
    </div>

    <?php include "/includes/footer.php"; ?>
  </div>

</body>
</html>