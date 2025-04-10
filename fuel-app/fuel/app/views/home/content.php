<?php ?>
<h1>title</h1>
<div class="welcome_user">Welcome, <?php echo $username; ?></div>
<?php echo Asset::img('test.png', array('width' => '200', 'alt' => 'test画像'));  ?>
<p>
 <?php echo Html::anchor('welcome/index', 'トップへ'); ?>
</p>

<?php Asset::add_path('assets/upload/', 'img'); ?>
<?php echo Asset::img('user_img.png', array('width' => '200', 'alt' => 'test画像'));  ?>
