<div class="ctn-main">
  <session class="ctn-form">
    <h1>ユーザー登録</h1>
    <?php if (isset($error) && is_array($error) && !empty($error)) : ?>
      <ul class="area-error-msg">
        <?php foreach ($error as $key => $value) : ?>
          <li><?= $value; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <?= $signupform; ?>
  </session>
</div>
