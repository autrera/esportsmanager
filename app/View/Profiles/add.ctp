<div class="profiles form">
<?php echo $this->Form->create('Profile');?>
    <fieldset>
        <legend><?php echo __('Add your Profile'); ?></legend>
    <?php
        echo $this->Form->input('first_name');
        echo $this->Form->input('last_name');
        echo $this->Form->input('birthdate');
        echo $this->Form->input('description');
        echo $this->Form->input('picture');
        echo $this->Form->input('gender', array(
            'options' => array(
                'M' => 'M',
                'F' => 'F',
            )
        ));
        echo $this->Form->input('countries', array(
            'options' => $countries 
        ));
        echo $this->Form->input('avatars', array(
            'options' => $avatars 
        ));

    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
