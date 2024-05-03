<?php
$login = false;
$role = ['admin'];
require '../_main.php';

$user = $_SESSION['login_user'] ?? null;

?>
<?php INCLUDE_HEADER() ?>
<main class="container pt-3">

  <h1>Hello, <?= $user->username ?? 'Guest' ?>: <?=$_SERVER['REQUEST_URI' ]?></h1>

  <?php if (is_login): ?>
    <h4>Want to <a href="<?=ROOT?>/login/logout.php">Logout</a>?</h4>
    <?php else: ?>
      <h4>Plase Login <a href="<?=ROOT?>/login">Here</a></h4>
  <?php endif; ?>

  <?php if (is_role): ?>
    <p>You Are an Administrator</p>
  <?php endif; ?>

</main>
<?php INCLUDE_FOOTER() ?>