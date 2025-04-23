<?php
$sucMsg = Session::get_flash('sucMsg');
if (!empty($sucMsg)):
?>
  <div class="alert-msg success js-toggle-msg">
    <?= $sucMsg ?>
  </div>
<?php endif;
$errMsg = Session::get_flash('errMsg');
if (!empty($errMsg)):
?>
  <div class="alert-msg err js-toggle-msg">
    <?= $errMsg ?>
  </div>
<?php endif; ?>

<header class="header">
  <div class="site-width">
    ToDoList
  </div>
</header>
