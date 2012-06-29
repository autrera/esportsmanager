<?php
    App::uses('customFormOptions', 'Lib');
    // Agregamos los archivos para el editor de texto
    echo $this->Html->css('bootstrap-wysihtml5');
	echo $this->Html->script('wysihtml5');
    echo $this->Html->script('bootstrap-wysihtml5');
?>
<div class = "row">
    <div class = "span10 offset1">
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
		        <script type="text/javascript">
		        	// Iniciamos el editor de texto
					$('#PostContent').wysihtml5();
				</script>
		    </fieldset>
            <?php echo $this->Form->end(
                customFormOptions::getOptionsBtnSubmit()
            );?>
		</div>
	</div>
</div>
