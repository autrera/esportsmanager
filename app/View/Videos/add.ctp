<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="videos form">
            <?php echo $this->Form->create('Video', array(
                'class' => 'form-horizontal',
                'inputDefaults' => customFormOptions::getOptionsDefault(),
            ));?>
            <fieldset>
                <legend><?php echo __('Add a Video'); ?></legend>
            <?php
                echo $this->Form->input('name',
                    customFormOptions::getOptionsDefault(
                        __('The display name of the video on the lists or home. No swearing please, we have kids over here.
                        ')
                    )
                );
                echo $this->Form->input('url',
                    customFormOptions::getOptionsDefault(
                        __('Full address to the video. Be a doll and include the http://')
                    )
                );
            ?>
            </fieldset>
            <?php echo $this->Form->end(
                customFormOptions::getOptionsBtnSubmit()
            );?>
        </div>
    </div>
</div>
