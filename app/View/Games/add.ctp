<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
		<div class="games form">
            <?php echo $this->Form->create('Game', array(
                'class' => 'form-horizontal',
                'type' => 'file',
                'inputDefaults' => customFormOptions::getOptionsDefault()
            ));?>
		    <fieldset>
		        <legend><?php echo __('Add a Game'); ?></legend>
		    <?php
		        echo $this->Form->input('name');
                echo $this->Form->input('game_logo', 
                    customFormOptions::getOptionsFile(
                        __('The game logo. 300x300 pixels is optimal.')
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
