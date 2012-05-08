<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8 offset2">
        <div class="news form">
        <?php echo $this->Form->create('News', array(
            'class' => 'form-horizontal',
            'action' => 'edit',
            'inputDefaults' => customFormOptions::getOptionsDefault(),
        ));?>
            <fieldset>
                <legend><?php echo __('Edit your news'); ?></legend>
            <?php
                echo $this->Form->input('title');
                echo $this->Form->input('games_id', 
                    customFormOptions::getOptionsDefault(
                        __(
                            ''
                        ),
                        array(
                            'options' => $games 
                        )
                    )
                );
                echo $this->Form->input('featured',
                    customFormOptions::getOptionsCheckBox()
                );
                echo $this->Form->input('content');
                echo $this->Form->input('id', array('type' => 'hidden'));
            ?>
            </fieldset>
            <?php echo $this->Form->end(
                customFormOptions::getOptionsBtnSubmit()
            );?>
        </div>
    </div>
</div>