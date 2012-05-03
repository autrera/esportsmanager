<?php
    App::uses('customFormOptions', 'Lib');
?>
<div class = "row">
    <div class = "span8">
        <div class="streams form">
        <?php echo $this->Form->create('Stream', array(
            'type' => 'file',
            'class' => 'form-horizontal',
            'inputDefaults' => customFormOptions::getOptionsDefault()
        ));?>
            <fieldset>
                <legend><?php echo __('Add a Stream Provider'); ?></legend>
            <?php
                echo $this->Form->input('name');
                echo $this->Form->input('prefix_url',
                    customFormOptions::getOptionsDefault(
                        __('La url base, que llevarán, todos los streams de los usuarios, sobre este provedor')
                    )
                );
                echo $this->Form->input('logo', 
                    customFormOptions::getOptionsFile('The icon of the stream provider. Size: 36px X 36px')
                );
            ?>
            </fieldset>
        <?php echo $this->Form->end(customFormOptions::getOptionsBtnSubmit());?>
        </div>
    </div>
    <div class = "span4">
        <?php include_once(ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS . 'sidebar.php'); ?>
    </div>
</div>