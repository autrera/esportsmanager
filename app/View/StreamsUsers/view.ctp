<div class = "row">
    <div class = "span8">
	    <?php
	        echo $this->element('indexActionsTop', array(
	            'actions' => $actions,
	            'isOwner' => $isOwner,
	        ));
	    ?>
		<div class="row">
			<div class="span8">
				<?php echo $video; ?>
			</div>
		</div>
		<div class="row">
			<div class="span8">
				<?php echo $chat; ?>
			</div>
		</div>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>