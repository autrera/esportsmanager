<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="photos form">
            <?php echo $this->Form->create('Photo', array(
                'type' => 'file',
                'class' => 'form-horizontal',
                'inputDefaults' => customFormOptions::getOptionsDefault()
            ));?>
            <fieldset>
                <legend><?php echo __('Add some Photos'); ?></legend>
            <?php
                for ($i = 0; $i < 5; $i++){
                    echo $this->Form->input('Photo.' . $i . '.name');
                    echo $this->Form->input('Photo.' . $i . '.photo', 
                        customFormOptions::getOptionsFile()
                    );
                    echo "<hr>";
                }
            ?>
            </fieldset>
            <?php echo $this->Form->end(
                customFormOptions::getOptionsBtnSubmit()
            );?>
        </div>
    </div>
</div>
