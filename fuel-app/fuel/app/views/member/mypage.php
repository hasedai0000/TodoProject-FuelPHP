<div class="ctn-main">
  <div class="ctn-form">
    <h1>マイページ</h1>
    <ul class="user-info">
      <li>ユーザー ID：<?= $user['user_id']; ?></li>
      <li>ユーザー名：<?= $user['username']; ?></li>
      <li>メールアドレス：<?= $user['email']; ?></li>
    </ul>
    <td>
    </td>
    <button class="edit-button">
      <?php
      echo html_tag('a', array(
        'href' => Uri::create("member/mypage/update/{$user['user_id']}"),
      ), '更新');
      ?>
    </button>
  </div>
</div>
