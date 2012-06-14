<div class = "row">
    <div class = "span8">
        <?php echo $this->element('addButton', array(
            'actions' => $actions,
            'controller' => 'teams'
        )) ?>
        <div class = "page-header">
            <h1>.: Teams <small>Our beloved players</small></h1>
        </div>
        <?php foreach ($teams as $team): ?>
        <div class = "teams-index">
            <div class = "team-content">
            <?php if (! empty($team['Team']['photo'])): ?>
                <div class = "row team-picture">
                    <div class = "span8">
                        <a href = "teams/view/<?php echo $team['Team']['id']; ?>">
                            <img src = "<?php echo $team['Team']['photo'] ?>">
                        </a>
                    </div>
                </div>
            <?php endif;?>
            </div>
        </div>
        <hr>
        <?php endforeach; ?>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>