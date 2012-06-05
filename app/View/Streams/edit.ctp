<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="streams form">
            <?php echo $this->Form->create('Stream', array(
                'type' => 'file',
                'class' => 'form-horizontal',
                'action' => 'edit',
                'inputDefaults' => customFormOptions::getOptionsDefault()
            ));?>
            <fieldset>
                <legend><?php echo __('Edit the Stream Provider'); ?></legend>
            <?php
                echo $this->Form->input('name');
                echo $this->Form->input('request_token_url');
                echo $this->Form->input('authorize_url');
                echo $this->Form->input('access_token_url');
                echo $this->Form->input('consumer_key');
                echo $this->Form->input('consumer_secret');
                echo $this->Form->input('logo',
                    customFormOptions::getOptionsFile(
                        __('Leave this blank if you don\'t want to overwrite the logo.')
                    )
                );
                echo $this->Form->input('id', array('type' => 'hidden'));
            ?>
            </fieldset>
            <?php echo $this->Form->end(
                customFormOptions::getOptionsBtnSubmit('Update')
            );?>
        </div>
    </div>
</div>