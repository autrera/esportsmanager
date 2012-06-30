<div class = "row">
    <div class = "span8">
<?php
        echo $this->element('indexActionsTop', array(
            'actions' => $actions,
            'isOwner' => $isOwner,
        ));
?>
        <div class = "row">
            <div class = "new-view">
                <div class = "span2 author-block">
                    <div class = "author-picture">
                        <img src = "<?php echo $profile['Profile']['picture']; ?>" >
                    </div>
                    <div class = "author-info">
                        <?php 
                            echo $this->element('userLink', array(
                                'nickname' => $noticia['Users']['nickname'],
                                'user_id'  => $noticia['Users']['id'],
                            )); 
                            echo $this->element('userNation', array(
                                'country' => $profile['Countries']
                            ));
                        ?>
                    </div>
                </div>
                <div class = "span6 new-main">
                    <?php if (!empty ($noticia['News']['banner'])): ?>
                    <div class = "row">
                        <div class = "span6">
                            <img src = "/files/view/<?php echo 'news/' . $noticia['News']['id'] . '/460/banner'; ?>" >
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class = "page-header new-title">
                        <h1><?php echo $noticia['News']['title'] ?></h1>
                    </div>
                    <div class = "new-details">
                        <span class="label label-inverse">
                            <i class="icon-asterisk icon-white"></i>
                            <?php echo $noticia['Games']['name'] ?>
                        </span>
                        <?php echo $this->element('timeStampLabel', array(
                            'timestamp' => $noticia['News']['created'],
                            'format' => 'd/m/Y - H:i'
                        )); ?>
                        <?php echo $this->element('viewsLabel', array(
                            'views' => $noticia['News']['counter'],
                        )); ?>
                    </div>
                    <div class = "new-social">
                        <?php echo $this->element('shareBox'); ?>
                    </div>
                    <div class = "new-content">
                        <?php echo $noticia['News']['content']; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->element('facebook-comments'); ?>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>