<h1>Je suis la page d'accueil</h1>

<div class='posts'>
<?php
  /** @var $francis \App\Entity\Post */

  foreach( $francis as $post ) {
    // var_dump($post);
    ?>

      <article class="home-post">
        <a href='/modify-article/<?php echo $post->getId(); ?>'>
          <div>
            <img src="<?php echo $post->getPostThumbnail(); ?>">
          </div>
          <div>
            <h2><?php echo $post->getTitle(); ?></h2>
            <p><?php echo $post->getContent(); ?></p>
          </div>
        </a>
      </article>

    <?php
  }
?>
</div>