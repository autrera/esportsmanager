<?php
    App::uses('utilities', 'Lib');
?>
<div class = "row">
    <div class = "span8">
        <?php echo $this->element('addButton', array(
            'actions' => $actions,
            'controller' => 'news'
        )) ?>
        <div class="page-header">
            <h1>.: News <small>enjoyable and accurate info</small></h1>
        </div>
    <?php foreach ($news as $new): ?>
        <div class = "news-row">
            <div class = "news-image pull-left">
                <a href = "/news/view/<?php echo $new['News']['slug'] ?>"
                    title = "Click to read it">
                    <?php echo $this->element('responsiveImg', array('url' => $new['Games']['thumbnail'])); ?>
                </a>
            </div>
            <div class = "news-title">
                <h2>
                    <a href = "/news/view/<?php echo $new['News']['slug'] ?>"
                        title = "Click to read it">
                        <?php echo $new['News']['title'] ?>
                    </a>
                </h2>
            </div>
            <div class = "news-details">
                <?php echo $this->element('timeStampLabel', array(
                    'timestamp' => $new['News']['created'],
                    'format' => 'd/m/Y'
                )); ?>
                <?php
                    echo $this->element('userLink', array(
                        'nickname' => $new['Users']['nickname'],
                        'user_id'  => $new['Users']['id'],
                    ));
                ?>
                <?php echo $this->element('viewsLabel', array(
                    'views' => $new['News']['counter'],
                )); ?>

            </div>
            <div class = "news-content">
                <p>
                    <?php
                        echo utilities::tokenTruncate($new['News']['description'], 300
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
