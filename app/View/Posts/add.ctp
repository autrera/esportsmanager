<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
		<div class="posts form">
			<?php echo $this->Form->create('Post', array(
	            'class' => 'form-horizontal',
	            'inputDefaults' => customFormOptions::getOptionsDefault(),
			));?>
		    <fieldset>
		        <legend><?php echo __('Add a Post'); ?></legend>
		    <?php
		        echo $this->Form->input('title',
                    customFormOptions::getOptionsDefault(
                        __('The title of the post. Make it catchy and unique.
                        ')
                    )
		        );
		        echo $this->Form->input('content',
                    customFormOptions::getOptionsDefault(
                        __('Write your ass off.
                        ')
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
