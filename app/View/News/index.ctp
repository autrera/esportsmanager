<div class = "row">
    <div class = "span8">
        <?php if (in_array('add', $actions)): ?>
            <div class = "well">
                <a href = "/news/add" class = "btn btn-primary btn-large">
                    <i class="icon-plus icon-white"></i>
                    Add
                </a>
            </div>
        <?php endif; ?>
    <?php
        echo "<pre>";
        print_r($news);
        echo "</pre>";
    ?>
    </div>
    <div class = "span4">
        <?php include_once(ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS . 'sidebar.php'); ?>
    </div>
</div>