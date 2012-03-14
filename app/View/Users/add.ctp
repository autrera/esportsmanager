<div class="users form">
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
    <?php
        echo $this->Form->input('Profile.first_name');
        echo $this->Form->input('Profile.last_name');
        echo $this->Form->input('Profile.nickname');
        echo $this->Form->input('Profile.birthdate');
        echo $this->Form->input('Profile.description');
        echo $this->Form->input('Profile.gender', array(
            'options' => array(
                'M' => 'Hombre',
                'F' => 'Mujer'
            ))
        );
        echo $this->Form->input('Profile.countries_id', array(
            'options' => $paises)
        );
        echo $this->Form->input('User.avatars_id', array(
            'options' =>  $avatars)
        );
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>