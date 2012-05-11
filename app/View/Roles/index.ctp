<div class = "row">
    <div class = "span8">
        <?php echo $this->element('addButton', array(
            'actions' => $actions,
            'controller' => 'roles'
        )) ?>
    	<div class = "page-header">
    		<h1>.: Roles</h1>
    	</div>
    	<?php foreach ($roles as $rol): ?>
    	<a href = "#" class = "btn btn-primary btn-large">
    		<i class="icon-user icon-white"></i>
    		<?php echo $rol['Role']['name'] ?>
    	</a>
	    <?php endforeach; ?>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>