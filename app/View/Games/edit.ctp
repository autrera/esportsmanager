<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
		<div class="games form">
            <?php echo $this->Form->create('Game', array(
                'class' => 'form-horizontal',
                'type' => 'file',
                'action' => 'edit',
                'inputDefaults' => customFormOptions::getOptionsDefault()
            ));?>
		    <fieldset>
		        <legend><?php echo __('Edit the Game'); ?></legend>
		    <?php
		        echo $this->Form->input('name');
                echo $this->Form->input('game_logo', 
                    customFormOptions::getOptionsFile(
                        __('The game logo. 300x300 pixels is optimal.')
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
