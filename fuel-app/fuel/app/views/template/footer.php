<div id="footer">
    &copy; Copyright TodoList <?php echo date('Y'); ?>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<?= Asset::js('fixfooter.js') ?>

<script>
    $(function() {
        let $toggleMsg = $('.js-toggle-msg');
        if ($toggleMsg.length) {
            $toggleMsg.slideDown();
            setTimeout(function() {
                $toggleMsg.slideUp();
            }, 3000);
        }
    });
</script>
