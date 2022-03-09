<section class="write-article user-account">
  <h1>Write new Article that is gonna be revolutionnary</h1>
  <form method="POST" action="/add-new-post" enctype="multipart/form-data">
    <div>
      <label for="title">Title</label>
      <input id="title" type="text" name="title">
    </div>
    <div>
      <label for="content">Content</label>
      <textarea id="content" name="content"></textarea>
    </div>    
    <div>
      <label for="image">Image</label>
      <input id="image" type="file" name="image">
    </div>  
  </form>
</section>