<div class="ctn-main">
  <div class="common-form-container">
    <h1>サインアップ</h1>
    <?php if (isset($error) && is_array($error) && !empty($error)) : ?>
      <ul class="area-error-msg">
        <?php foreach ($error as $key => $value) : ?>
          <li><?= $value; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <?= $signupform; ?>
  </div>
</div>
