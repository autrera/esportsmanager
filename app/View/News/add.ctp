<?php
    $options = array(
        'div' => array(
            'class' => 'control-group'
        ),
        'label' => array(
            'class' => 'control-label'
        ),
        'class' => 'span6',
        'between' => '<div class = "controls">',
        'after' => '</div>',
    );

    $optionsCheckBox = array(
        'div' => array(
            'class' => 'control-group'
        ),
        'label' => array(
            'class' => 'control-label'
        ),
        'class' => '',
        'before' => '<div class = "controls"><label class = "checkbox">',
        'after' => '</label></div>',
        'format' => array(
            'label', 'before', 'input', 'after'
        ),
    );

    $optionsSubmit = array(
        'value' => __('Submit'),
        'class' => array('btn', 'btn-primary'),
        'div' => array(
            'class' => 'form-actions',
        )
    );
?>
<div class = "row">
    <div class = "span8">
        <div class="news form">
        <?php echo $this->Form->create('News', array(
            'class' => 'form-horizontal',
            'inputDefaults' => $options,
        ));?>
            <fieldset>
                <legend><?php echo __('Add some News'); ?></legend>
            <?php
                echo $this->Form->input('title');
                echo $this->Form->input('featured', $optionsCheckBox);
                echo $this->Form->input('content');
            ?>
            </fieldset>
        <?php echo $this->Form->end($optionsSubmit);?>
        </div>
    </div>
    <div class = "span4">
        <?php include_once(ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS . 'sidebar.php'); ?>
    </div>
</div>
