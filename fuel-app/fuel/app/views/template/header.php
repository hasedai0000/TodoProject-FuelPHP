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
    <div class="header-left">
      ToDoList
    </div>
    <nav class="header-right">
      <?php if (Auth::check()): ?>
        <!-- ログイン済みの場合 -->
        <a href="/signout" class="nav-btn">ログアウト</a>
      <?php else: ?>
        <!-- 未ログインの場合 -->
        <a href="/signup" class="nav-btn">新規登録</a>
        <a href="/signin" class="nav-btn">ログイン</a>
      <?php endif; ?>
    </nav>
  </div>
</header>
