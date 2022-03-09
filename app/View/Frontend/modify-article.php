<section class="write-article user-account">
  <h1>Modify Article</h1>
  <form method="POST" action="/modify-post">
    <div>
      <label for="title">Title</label>
      <input id="title" type="text" name="title" value="<?php echo $post->getTitle(); ?>">
    </div>
    <div>
      <label for="content">Content</label>
      <textarea id="content" name="content"><?php echo $post->getContent(); ?></textarea>
    </div>    
    <div>
      <label for="image">Image</label>
      <input id="image" type="file" name="image" value="<?php echo $post->getPostThumbnail(); ?>">
    </div>  
    <input type="submit">
    </input>
  </form>
</section>