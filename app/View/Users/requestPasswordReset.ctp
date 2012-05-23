<div class = "row">
	<div class = "span8">
        <div class="form">
        <?php echo $this->Form->create('User', array(
            'class' => 'form-horizontal',
            'inputDefaults' => customFormOptions::getOptionsDefault()
        ));?>
            <fieldset>
                <legend><?php echo __('Password Reseter'); ?></legend>
                <div class = "control-group">
                    <label class = "control-label">
                        Captcha
                    </label>
                    <div class = "controls">
                        <?php echo $this->element('captcha'); ?>
                        <div class="help-block">
                            Fill this up correctly, please. Make love, no spam.
                        </div>
                    </div>
                </div>
            </fieldset>
        <?php echo $this->Form->end(
            customFormOptions::getOptionsBtnSubmit('Register')
        );?>
        </div>
	</div>
	<?php echo $this->element('sidebar'); ?>
</div>
