<?php
?>
<div class = "row">
    <div class = "span8">
    <?php
        echo $this->element('indexActionsTop', array(
            'actions' => $actions,
            'isOwner' => $isOwner,
        ));
    ?>
		<div class = "row">
		    <div class = "span8">
		        <ul class="thumbnails games-index">
		            <li class="span4 game-container">
		                <div class="thumbnail">
		                	<img src = "<?php echo $game['Game']['thumbnail']; ?>">
		                    <h2 class = "game-title">
		                        <?php echo $game['Game']['name'] ?>
		                    </h2>
		                </div>
		            </li>
		        </ul>
		    </div>
		</div>
	</div>
    <?php echo $this->element('sidebar'); ?>
</div>