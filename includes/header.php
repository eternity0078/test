<header id="header">
   
  <div class="header__top">
    <div class="container">
      <div class="header__top__logo">
        <h1><a href="/"><?php echo $config['title']; ?></a></h1>
      </div>
      <nav class="header__top__menu">
        <ul>
          <li><a href="/">Главная</a></li>
          <li><a href="/pages/about_me.php">Обо мне</a></li>
          <li><a href="<?php echo $config['vk_url']; ?>">Я Вконтакте</a></li>
        </ul>
      </nav>
    </div>
  </div>

  <?php 
  $categories = mysqli_query($connection, "SELECT * from `articles_categories`");
  ?>
  <div class="header__bottom">
    <div class="container">
      <nav class="menu">
        <ul>
          <?php
            while ($cat = mysqli_fetch_assoc($categories))
              {
                ?>
                <li><a href="/articles.php?categorie=<?php echo $cat['id'];?>"><?php echo $cat['title'];?></a></li>
                <?php
              }
          ?>
        </ul>
      </nav>
    </div>
  </div>

</header>

  
<script src="includes/scripts/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="includes/scripts/menu.js"></script>