<?php
    App::uses('utilities', 'Lib');
?>
<div class = "row">
    <div class = "span8">
        <div id="myCarousel" class="carousel">
            <!-- Carousel items -->
            <div class="carousel-inner">
                <?php foreach ($featuredNews as $key => $new): ?>
                <?php $active = ($key == 0)? 'active' : ''; ?>
                <div class="<?php echo $active; ?> item">
                    <a href = "/news/view/<?php echo $new['News']['slug']; ?>">
                        <?php echo $this->element('responsiveImg', array('url' => $new['News']['banner'])); ?>
                    </a>
                    <div class = "carousel-caption">
                        <h2><?php echo $new['News']['title']; ?></h2>
                        <p>
                            <?php echo $new['News']['description']; ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- Carousel nav -->
            <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                &lsaquo;
            </a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next">
                &rsaquo;
            </a>
        </div>
    </div>
    <div class = "span4">
        <ul class = "thumbnails">
            <li class = "span4">
                <div class = "latest-videos">
                    <div class="module-header">
                        <h4>Latest Videos</h4>
                    </div>
                    <a class = "view-more btn btn-mini btn-primary"
                        href = "/videos" >
                        More
                        <i class="icon-chevron-right icon-white"></i>
                    </a>
                    <iframe width="290" height="190" src="<?php echo $featuredVideo['Video']['url'] ; ?>" frameborder="0" allowfullscreen></iframe>
                    <h5><?php echo $featuredVideo['Video']['name']; ?></h5>
                    <div class = "caption">
                        <?php foreach($latestVideos as $video): ?>
                        <div>
                        <i class="icon-play"></i>
                        <a href = "/videos/view/<?php echo $video['Video']['slug']; ?>">
                            <?php echo $video['Video']['name']; ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class = "row">
    <div class = "span12">
        <div class = "row">
            <div class="span4">
                <div class="latest-matches">
                    <div class="module-header">
                        <h4>Latest Matches</h4>
                    </div>
                    <div class="alert alert-info">Coming Soon!</div>
                </div>
            </div>
            <div class = "span4">
                <div class = "latest-blogs">
                    <div class = "module-header">
                        <h4>Latest Blogs</h4>
                    </div>
                    <a class = "view-more btn btn-mini btn-primary"
                        href = "/posts" >
                        More
                        <i class="icon-chevron-right icon-white"></i>
                    </a>
                    <ul class="latest-blogs-wrapper">
                        <?php foreach($latestPosts as $post): ?>
                        <li class="blog">
                            <div class="title">
                                <a href="/posts/view/<?php echo $post['Post']['slug']; ?>">
                                    <?php echo utilities::tokenTruncate($post['Post']['title'], 35); ?>
                                </a>
                            </div>
                            <div class="info">
                                <?php echo $this->element('userLink', array(
                                    'nickname' => $post['Users']['nickname'],
                                    'user_id' => $post['Users']['id'],
                                )); ?>
                                <?php echo $this->element('timeStampLabel', array(
                                    'timestamp' => $post['Post']['created'],
                                    'format' => 'd/m/Y'
                                )); ?>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class = "span4">
                <div class = "live-streams">
                    <div class = "module-header">
                        <h4>Live Streams</h4>
                    </div>
                    <a class = "view-more btn btn-mini btn-primary"
                        href = "/streamsUsers" >
                        More
                        <i class="icon-chevron-right icon-white"></i>
                    </a>
                    <ul class="nav nav-pills">
                        <?php foreach($liveStreams as $key => $streamProviders): ?>
                        <li class = "<?php echo ($key == 0)? 'active' : ''; ?>">
                            <a href = "#stream-<?php echo $streamProviders['streamData']['name']; ?>" data-toggle = "pill">
                                <?php echo $streamProviders['streamData']['name']; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php foreach($liveStreams as $key => $streamProviders): ?>
                    <div id = "stream-<?php echo $streamProviders['streamData']['name']; ?>" class = "well">
                        <?php if (count($streamProviders['channels']) > 0): ?>
                            <?php foreach($streamProviders['channels'] as $channel): ?>
                                <div class="mini-live-stream">
                                    <div>
                                        <a href = "/streamsUsers/view/<?php echo $streamProviders['streamData']['id']; ?>/<?php echo $channel->channel->login; ?>">
                                            <?php echo utilities::tokenTruncate(
                                                    $channel->title,
                                                    40
                                                )
                                            ?>
                                        </a>
                                        <div class = "label-container">
                                            <span class="label label-warning">
                                                <i class="icon-asterisk icon-white"></i>
                                                <?php echo $channel->meta_game; ?>
                                            </span>
                                            <span class="label label-info">
                                                <i class="icon-user icon-white"></i>
                                                <?php echo $channel->channel->login; ?>
                                            </span>
                                            <span class="label label-important">
                                                <i class="icon-eye-open icon-white"></i>
                                                <?php echo $channel->channel_count; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                        <div class="alert alert-error">
                            <strong>Oh snap!.</strong> There are no shows online. Try later!
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class = "row">
    <div class = "span8">
        <div class = "row">
            <div class = "span8">
                <div class = "page-header">
                    <h3>.: Latest News</h3>
                </div>
                <?php foreach($latestNews as $new): ?>
                <div class = "news-row">
                    <div class = "news-image pull-left">
                        <a href = "/news/view/<?php echo $new['News']['slug'] ?>"
                            title = "Click to read it">
                            <?php echo $this->element('responsiveImg', array('url' => $new['Games']['thumbnail'])); ?>
                        </a>
                    </div>
                    <div class = "news-title">
                        <h4>
                            <a href = "/news/view/<?php echo $new['News']['slug'] ?>"
                                title = "Click to read it">
                                <?php echo $new['News']['title'] ?>
                            </a>
                        </h4>
                    </div>
                    <div class = "news-details">
                        <?php echo $this->element('timeStampLabel', array(
                            'timestamp' => $new['News']['created'],
                            'format' => 'd/m/Y - H:i'
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
                            <?php echo $new['News']['description']; ?>
                        </p>
                    </div>
                    <div class = "clear"></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class = "row">
            <div class = "span8 galleries-home">
                <div class = "page-header">
                    <h3>.: Latest Galleries</h3>
                </div>
                <?php foreach ($latestGalleries as $gallery): ?>
                <div class = "gallery-content">
                    <h4 class = "gallery-name">
                        <a href = "/galleries/view/<?php echo $gallery['Gallery']['slug']; ?>">
                            <?php echo $gallery['Gallery']['name'] ?>
                        </a>
                    </h4>
                    <ul>
                        <?php foreach($gallery['Photos'] as $key => $photo): ?>
                        <?php
                            if ($key == 12){
                                break;
                            }
                        ?>
                        <li>
                            <div>
                                <a class = "fancybox" data-fancybox-type="ajax" href = "/photos/view/<?php echo $photo['id']; ?>" title = "<?php echo $photo['name']; ?>">
                                    <?php echo $this->element('responsiveImg', array(
                                        'url' => $photo['url'],
                                        'class' => 'enlarger'
                                    )); ?>
                                </a>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>
