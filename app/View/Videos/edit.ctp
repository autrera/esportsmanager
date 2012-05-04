<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="videos form">
            <?php echo $this->Form->create('Video', array(
                'class' => 'form-horizontal',
                'action' => 'edit',
                'inputDefaults' => customFormOptions::getOptionsDefault(),
            ));?>
            <fieldset>
                <legend><?php echo __('Edit the video'); ?></legend>
            <?php
                echo $this->Form->input('name');
                echo $this->Form->input('url');
                echo $this->Form->input('id', array('type' => 'hidden'));
            ?>
            </fieldset>
            <?php echo $this->Form->end(
                customFormOptions::getOptionsBtnSubmit('Update')
            ); ?>
        </div>
    </div>
</div>