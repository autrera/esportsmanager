<?php
    App::uses('utilities', 'Lib');
?>
<div class = "row">
    <div class = "span8">
    <?php if (in_array('add', $actions)): ?>
        <div class = "well">
            <a href = "/news/add" class = "btn btn-primary btn-large">
                <i class="icon-plus icon-white"></i>
                Add
            </a>
        </div>
    <?php endif; ?>
    <div class="page-header">
        <h1>.: News <small>enjoyable and accurate info</small></h1>
    </div>
    <?php foreach ($news as $new): ?>
        <div class = "news-row">
            <div class = "news-image pull-left">
                <a href = "/news/view/<?php echo $new['News']['id'] ?>" 
                    title = "Click to read it">
                    <img src = "<?php echo $new['Games']['thumbnail'] ?>" >
                </a>
            </div>
            <div class = "news-title">
                <h3>
                    <a href = "/news/view/<?php echo $new['News']['id'] ?>"
                        title = "Click to read it">
                        <?php echo $new['News']['title'] ?>
                    </a>
                </h3>
            </div>
            <div class = "news-details">
                <span class="label label-inverse">
                    <i class="icon-asterisk icon-white"></i>
                    <?php echo $new['Games']['name'] ?>
                </span>
                <span class="label label-inverse">
                    <i class="icon-calendar icon-white"></i>
                    <?php 
                        echo utilities::formatDate($new['News']['created']); 
                    ?>
                </span>
                <?php 
                    echo $this->element('userLink', array(
                        'nickname' => $new['Users']['nickname'],
                        'user_id'  => $new['Users']['id'],
                    )); 
                ?>
            </div>
            <div class = "news-content">
                <p>
                    <?php
                        echo utilities::tokenTruncate($new['News']['content'], 300
                        );
                    ?>
                </p>
            </div>
            <div class = "clear"></div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>