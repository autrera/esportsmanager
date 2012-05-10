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
?>
        <div class = "row">
            <div class = "new-view">
                <div class = "span2 new-author">
                    <div class = "author-picture">
                        <img src = "<?php echo $noticia['Profiles']['picture'] ?>" >
                    </div>
                    <div class = "author-info">
                        <?php 
                            echo $this->element('userProfileLink', array(
                                'nickname' => $noticia['Users']['nickname'],
                                'user_id'  => $noticia['Users']['id'],
                            )); 
                        ?>
                    </div>
                </div>
                <div class = "span6 new-main">
                    <div class = "page-header new-title">
                        <h1><?php echo $noticia['News']['title'] ?></h1>
                    </div>
                    <div class = "new-details">
                        <span class="label label-inverse">
                            <i class="icon-asterisk icon-white"></i>
                            <?php echo $noticia['Games']['name'] ?>
                        </span>
                        <span class="label label-inverse">
                            <i class="icon-calendar icon-white"></i>
                            <?php 
                                echo utilities::formatDate(
                                    $noticia['News']['created'], 'd/m/Y - H:i'
                                ); 
                            ?>
                        </span>
                    </div>
                    <div class = "new-social">
                        Twitter - Facebook
                    </div>
                    <div class = "new-content">
                        <?php echo $noticia['News']['content']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>