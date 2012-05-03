<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8">
        <div class="users form">
        <?php echo $this->Session->flash('auth'); ?>
        <?php echo $this->Form->create('User', array(
            'class' => 'form-horizontal',
            'inputDefaults' => customFormOptions::getOptionsDefault()
        ));?>
            <fieldset>
                <legend><?php echo __('Please enter your username and password'); ?></legend>
            <?php
                echo $this->Form->input('email');
                echo $this->Form->input('password');
            ?>
            </fieldset>
        <?php echo $this->Form->end(customFormOptions::getOptionsBtnSubmit());?>
        </div>
    </div>
    <div class = "span4">
        <?php include_once(ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS . 'sidebar.php'); ?>
    </div>
</div>