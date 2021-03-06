<?php
?>
<div class = "row">
    <div class = "span8">
        <?php echo $this->element('addButton', array(
            'actions' => $actions,
            'controller' => 'games'
        )) ?>
        <div class = "page-header">
            <h1>.: Games</h1>
        </div>
        <ul class="thumbnails games-index">
            <?php foreach ($games as $game): ?>
            <li class="span4 game-container">
                <div class="thumbnail">
                    <h2 class = "game-title">
                    	<a href = "/games/view/<?php echo $game['Game']['id']; ?>">
                        <?php echo $game['Game']['name'] ?>
	                    </a>
                    </h2>
                    <?php echo $this->element('responsiveImg', array('url' => $game['Game']['thumbnail'])); ?>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>
