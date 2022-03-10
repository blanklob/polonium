<div class="max-w-7xl mx-auto mt-8 px-4 sm:px-6">
  <section class="max-w-4xl mx-auto p-12 shadow-xl rounded">
    <h1 class="text-4xl font-medium mt-4 mb-12 text-center">My Account</h1>
    <form method="POST" action="/modify-user" enctype="multipart/form-data">
      <div class="mb-2">
        <label class="font-sans font-medium text-gray-700" for="first_name">First Name</label>
        <input class="border border-solid border-gray-300 appearance-none rounded w-full px-3 py-3 focus focus:border-amber-600 focus:outline-none active:outline-none active:border-amber-600" id="first_name" type="text" value="<?php echo $_COOKIE['userFirstName']; ?>" name="first_name">
      </div>
      <div class="mb-2">
        <label class="font-sans font-medium text-gray-700" for="last_name">Last Name</label>
        <input class="border border-solid border-gray-300 appearance-none rounded w-full px-3 py-3 focus focus:border-amber-600 focus:outline-none active:outline-none active:border-amber-600" id="first_name" type="text" value="<?php echo $_COOKIE['userLastName']; ?>" name="last_name">
      </div>

      <div class="mb-2">
        <label class="font-sans font-medium text-gray-700" for="email">Email</label>
        <input class="border border-solid border-gray-300 h-48 appearance-none rounded w-full px-3 py-3 focus focus:border-amber-600 focus:outline-none active:outline-none active:border-v-600" id="email" type="email" name="email" value="<?php echo $_COOKIE['userEmail']; ?>">
      </div>          

      <input class="mt-4 cursor-pointer whitespace-nowrap inline-flex items-center justify-center px-16 py-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-amber-600 hover:bg-amber-700" type="submit" value="Update infos">
      </input>
    </form>
  </section>
</div>