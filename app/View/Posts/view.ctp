<?php
    App::uses('utilities', 'Lib');
?>
<div class = "row">
    <div class = "span8">
<?php
        echo $this->element('indexActionsTop', array(
            'actions' => $actions,
            'isOwner' => $isOwner,
        ));
        $this->set('fb_title_for_layout', $post['Post']['title']);
        $this->set('fb_description_for_layout', utilities::tokenTruncate($post['Post']['content'], 150));
?>
        <div class = "row">
            <div class = "post-view">
                <div class = "span2 author-block">
                    <div class = "author-picture">
                        <img src = "<?php echo $profile['Profile']['picture']; ?>" >
                    </div>
                    <div class = "author-info">
                        <?php 
                            echo $this->element('userLink', array(
                                'nickname' => $post['Users']['nickname'],
                                'user_id'  => $post['Users']['id'],
                            )); 
                            echo $this->element('userNation', array(
                                'country' => $profile['Countries']
                            ));
                        ?>
                    </div>
                </div>
                <div class = "span6 post-main">
                    <div class = "page-header new-title">
                        <h1><?php echo $post['Post']['title'] ?></h1>
                    </div>
                    <div class = "post-details">
                        <?php echo $this->element('timeStampLabel', array(
                            'timestamp' => $post['Post']['created'],
                            'format' => 'd/m/Y - H:i'
                        )); ?>
                        <?php echo $this->element('viewsLabel', array(
                            'views' => $post['Post']['counter'],
                        )); ?>
                    </div>
                    <div class = "post-social">
                        <?php echo $this->element('shareBox'); ?>
                    </div>
                    <div class = "post-content">
                        <?php echo $post['Post']['content']; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->element('facebook-comments'); ?>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>