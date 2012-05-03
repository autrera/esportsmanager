<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8">
        <div class="news form">
        <?php echo $this->Form->create('News', array(
            'class' => 'form-horizontal',
            'inputDefaults' => customFormOptions::$optionsDefault,
        ));?>
            <fieldset>
                <legend><?php echo __('Add some News'); ?></legend>
            <?php
                echo $this->Form->input('title');
                echo $this->Form->input('featured', 
                    customFormOptions::$optionsCheckBox
                );
                echo $this->Form->input('content');
            ?>
            </fieldset>
        <?php echo $this->Form->end(customFormOptions::$optionsBtnSubmit);?>
        </div>
    </div>
    <div class = "span4">
        <?php include_once(ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS . 'sidebar.php'); ?>
    </div>
</div>
