<div class="matches form">
<?php echo $this->Form->create('Match');?>
    <fieldset>
        <legend><?php echo __('Add a Match'); ?></legend>
    <?php
        echo $this->Form->input('team', array(
            'options' => $teams
        ));
        echo $this->Form->input('name');
        echo $this->Form->input('home_score');
        echo $this->Form->input('visit_score');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
