<div class = "row">
    <div class = "span8">
        <?php echo $this->element('addButton', array(
            'actions' => $actions,
            'controller' => 'news'
        )) ?>
        <div class = "page-header">
            <h1>.: Videos</h1>
        </div>
        <ul class="thumbnails videos-index">
            <?php foreach ($videos as $video): ?>
            <li class="span4 video-container">
                <div class="thumbnail">
                    <iframe width="290" height="190" src="<?php echo $video['Video']['url']; ?>" frameborder="0" allowfullscreen=""></iframe>
                    <h5 class = "video-title">
                        <a href = "/videos/view/<?php echo 
                            $video['Video']['id']; ?>">
                            <?php echo $video['Video']['name'] ?>
                        </a>
                    </h5>
                    <div class = "video-info">
                        <?php echo $this->element('timeStampLabel', array(
                            'timestamp' => $video['Video']['created'],
                            'format' => 'd/m/Y - H:i'
                        )); ?>
                        <?php echo $this->element('userLink', array(
                            'nickname' => $video['Users']['nickname'],
                            'user_id' => $video['Users']['id'],
                        )); ?>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>