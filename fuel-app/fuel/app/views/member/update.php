<div class="ctn-main">
  <div class="ctn-form">
    <h1>マイページ</h1>
    <?php echo Form::open(array('action' => "member/mypage/update/{$user_id}", 'method' => 'post')); ?>
    <div>
      <label>ユーザー名</label>
      <?php echo Form::input('username', 'default_value'); ?>
    </div>
    <?php echo Form::submit('更新'); ?>
    <?php echo Form::close(); ?>
  </div>
</div>
