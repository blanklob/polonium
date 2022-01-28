<h1>Page Sign Up</h1>

<section class="write-article user-account">
<form method="POST" action="/add-user">
  <div>
    <label for="first_name">first_name</label>
    <input id="first_name" type="text" name="first_name">
  </div>
  <div>
    <label for="last_name">last_name</label>
    <input type="text" id="last_name" name="last_name">
  </div>   
  <div>
    <label for="email">email</label>
    <input type="email" id="email" name="email">
  </div>  
  <div>
    <label for="password">password</label>
    <input type="password" id="password" name="password">
  </div>  
  <div>
    <label for="role">role</label>
    <select name="role" id="role">
      <option value=1>admin</option>
      <option value=2>writer</option>
      <option value=3>reader</option>
    </select>
  </div>
  <input type="submit" value="envoyer">
</form>
</section>