<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="countries form"> 
            <?php echo $this->Form->create('Country', array(
                'class' => 'form-horizontal',
                'type' => 'file',
                'action' => 'edit',
                'inputDefaults' => customFormOptions::getOptionsDefault()
            ));?>
            <fieldset>
                <legend><?php echo __('Edit the Country'); ?></legend>
            <?php
                echo $this->Form->input('name');
                echo $this->Form->input('icon', 
                    customFormOptions::getOptionsFile(
                        __('Leave it alone, unless you want to overwrite the current flag.')
                    )
                );
                echo $this->Form->input('id', array('type' => 'hidden'));
            ?>
            </fieldset>
            <?php echo $this->Form->end(
                customFormOptions::getOptionsBtnSubmit()
            );?>
        </div>
    </div>
</div>