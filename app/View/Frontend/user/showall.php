<?php if( ! isset($_COOKIE['userRole']) || $_COOKIE['userRole'] != 1) {
  header('Location: /');
  exit;
} ?>

<h1>Page Users</h1>

<section class="">
  <table>
    <thead>
      <tr>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Role</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) : ?>
      <tr>
        <td><?php echo $user->getUserFirstName(); ?></td>
        <td><?php echo $user->getUserLastName(); ?></td>
        <td><?php echo $user->getUserEmail(); ?></td>
        <td><?php echo $user->getUserRole(); ?></td>
        <td>
          <a href="/delete-user/<?php echo $user->getId(); ?>">
            <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <line x1="0.353553" y1="0.646447" x2="22.3536" y2="22.6464" stroke="black"/>
              <line x1="22.3536" y1="1.35355" x2="0.353554" y2="23.3536" stroke="black"/>
            </svg>
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</section>