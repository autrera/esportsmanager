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
                        <img src = "<?php echo $new['News']['banner']; ?>" >
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
                        <h2>Latest Videos</h2>
                    </div>
                    <a class = "view-more btn btn-mini btn-primary"
                        href = "/videos" >
                        More
                        <i class="icon-chevron-right icon-white"></i>
                    </a>
                    <iframe width="290" height="190" src="<?php echo $featuredVideo['Video']['url'] ; ?>" frameborder="0" allowfullscreen></iframe>
                    <h3><?php echo $featuredVideo['Video']['name']; ?></h3>
                    <div class = "caption">
                        <?php foreach($latestVideos as $video): ?>
                        <h4>
                            <i class="icon-play"></i>
                            <a href = "/videos/view/<?php echo $video['Video']['slug']; ?>">
                                <?php echo $video['Video']['name']; ?>
                            </a>
                        </h4>
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
            <div class = "span4">
                <div class = "latest-matches">
                    <h2>Latest Matches</h2>
                    <div class = "alert alert-info">
                        <strong>Coming Soon!</strong>
                    </div>
                </div>
            </div>
            <div class = "span4">
                <div class = "latest-blogs">
                    <h2>Latest Blogs</h2>
                    <div class = "alert alert-info">
                        <strong>Coming Soon!</strong>
                    </div>
                </div>
            </div>
            <div class = "span4">
                <div class = "live-streams">
                    <div class = "module-header">
                        <h2>Live Streams</h2>
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
                    <h1>.: Latest News</h1>
                </div>
                <?php foreach($latestNews as $new): ?>
                <div class = "news-row">
                    <div class = "news-image pull-left">
                        <a href = "/news/view/<?php echo $new['News']['slug'] ?>" 
                            title = "Click to read it">
                            <img src = "<?php echo $new['Games']['thumbnail'] ?>" >
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
                            'format' => 'd/m/Y - H:i'
                        )); ?>
                        <?php
                            echo $this->element('userLink', array(
                                'nickname' => $new['Users']['nickname'],
                                'user_id'  => $new['Users']['id'],
                            )); 
                        ?>
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
                    <h1>.: Latest Galleries</h1>
                </div>
                <?php foreach ($latestGalleries as $gallery): ?>
                <div class = "gallery-content">
                    <h2 class = "gallery-name">
                        <a href = "/galleries/view/<?php echo $gallery['Gallery']['slug']; ?>">
                            <?php echo $gallery['Gallery']['name'] ?>
                        </a>
                    </h2>
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
                                    <img class = "enlarger" src = "/files/view/<?php echo 'photos/' . $photo['id'] . '/120'; ?>" >
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
