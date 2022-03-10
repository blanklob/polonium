<div class="max-w-7xl mx-auto mt-8 px-4 sm:px-6">
  <section class="max-w-4xl mx-auto p-12 shadow-xl rounded">
    <h1 class="text-4xl font-medium mt-4 mb-12 text-center">Modify Article</h1>
    <form method="POST" action="/modify-post" enctype="multipart/form-data">
      <div class="mb-2">
        <label class="font-sans font-medium text-gray-700" for="title">Title</label>
        <input class="border border-solid border-gray-300 appearance-none rounded w-full px-3 py-3 focus focus:border-amber-600 focus:outline-none active:outline-none active:border-amber-600" id="title" type="text" name="title" value="<?php echo $post->getTitle(); ?>">
      </div>
      <div class="mb-2">
        <label class="font-sans font-medium text-gray-700" for="content">Content</label>
        <textarea class="border border-solid border-gray-300 h-48 appearance-none rounded w-full px-3 py-3 focus focus:border-amber-600 focus:outline-none active:outline-none active:border-v-600" id="content" name="content">
          <?php echo $post->getContent(); ?>
        </textarea>
      </div>              
      <div class="mb-2">
        <label for="formFile" class="font-sans font-medium text-gray-700">Add an Image</label>
        <input class="appearance-none block w-full px-3 py-1.5 text-base font-normal m-0 text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded focus:text-gray-700 focus:bg-white focus:border-amber-800 focus:outline-none" type="file" id="formFile"  value="<?php echo $post->getPostThumbnail(); ?>">
      </div>
      <input class="mt-4 cursor-pointer whitespace-nowrap inline-flex items-center justify-center px-16 py-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-amber-600 hover:bg-amber-700" type="submit" value="Create a Post">
      </input>
    </form>
  </section>
</div>