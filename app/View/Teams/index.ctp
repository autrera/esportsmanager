<?php
        echo "<pre>";
        print_r($teams);
        echo "</pre>";
?>
<div class = "row">
    <div class = "span8">
        <?php echo $this->element('addButton', array(
            'actions' => $actions,
            'controller' => 'news'
        )) ?>
        <div class = "page-header">
            <h1>.: Teams <small>Our beloved players</small></h1>
        </div>
        <?php foreach ($teams as $team): ?>
        <div class = "teams-index">
            <h2>
                <a href = "teams/view/<?php echo $team['Team']['id']; ?>">
                    <?php echo $team['Team']['name']; ?>
                </a>
            </h2>
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
            <?php if (! empty($team['Users'])): ?>
                <?php foreach ($team['Users'] as $player): ?>
                <div class = "row user-content">
                    <div class = "span8">
                        <ul class = "thumbnails">
                            <li class = "span1">
                                <div class = "thumbnail">
                                    <a href = "/users/view/<?php echo $player['Users']['id'] ?>" rel="popover" 
                                        data-original-title = "<?php echo $player['Users']['nickname']; ?>" 
                                        data-content = "<?php echo $player['Profile']['description']; ?>"
                                    >
                                        <img src = "<?php echo $player['Profile']['picture'] ?>">
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
            </div>
        </div>
        <hr>
        <?php endforeach; ?>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>