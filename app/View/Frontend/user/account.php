<section class="user-account">
  <h1>My Account</h1>
  <form method="POST" action="/modify-user">
    <div>
      <label for="first_name">First Name</label>
      <input id="first_name" type="text" value="<?php echo $user->getUserFirstName(); ?>" name="first_name">
    </div>
    <div>
      <label for="last_name">last_name</label>
      <input id="last_name" type="text" value="<?php echo $user->getUserLastName(); ?>" name="last_name">
    </div>
    <div>
      <label for="email">Email</label>
      <input id="email" type="email" value="<?php echo $user->getUserEmail(); ?> "name="email">
    </div>
    <div class="password-input">
      <label for="pass">Password</label>
      <input id="pass" type="password" name="password" value="<?php echo $user->getUserPassword(); ?> "name="password">
      <input id="check-pass" type="password" name="password-check">
      <a>Change password</a>
    </div>
    <input type='submit' value="Update infos">
  </form>

</section>