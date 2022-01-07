<section class="user-account">
  <h1>My Account</h1>
  <form>
    <div>
      <label for="first-name">First Name</label>
      <input id="first-name" type="text" value="{{Database storage first name value}}">
    </div>
    <div>
      <label for="name">Name</label>
      <input id="name" type="text" value="{{Database storage name value}}">
    </div>
    <div>
      <label for="email">Email</label>
      <input id="email" type="email" value="{{Database storage email value}}">
    </div>
    <div class="password-input">
      <label for="pass">Password</label>
      <input id="pass" type="password">
      <input id="check-pass" type="password">
      <a>Change password</a>
    </div>
    <input type='submit' value="Update infos">
  </form>

</section>