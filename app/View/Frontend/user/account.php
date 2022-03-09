<section class="user-account">
  <h1>My Account</h1>
  <form method="POST" action="/modify-user">
    <div>
      <label for="first_name">First Name</label>
      <input id="first_name" type="text" value="<?php echo $_COOKIE['userFirstName']; ?>" name="first_name">
    </div>
    <div>
      <label for="last_name">last_name</label>
      <input id="last_name" type="text" value="<?php echo $_COOKIE['userLastName']; ?>" name="last_name">
    </div>
    <div>
      <label for="email">Email</label>
      <input id="email" type="email" value="<?php echo $_COOKIE['userEmail']; ?> "name="email">
    </div>
    <div class="password-input">
      <a>Change password</a>
    </div>
    <input type='submit' value="Update infos">
  </form>

</section>