<?php
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
                        <h4><?php echo $featuredNew['News']['title']; ?></h4>
                        <p>
                            <?php echo $featuredNew['News']['description']; ?>
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
                        <h3>Latest Videos</h3>
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
                        <h4>
                            <i class="icon-play"></i>
                            <a href = "/videos/view/<?php echo $video['Video']['id']; ?>">
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
<hr>
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
                        <img src = "<?php echo $new['Games']['thumbnail'] ?>" >
                    </div>
                    <div class = "news-title">
                        <h3>
                            <?php echo $new['News']['title']; ?>
                        </h3>
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
            <div class = "span8">
                <div class = "page-header">
                    <h1>.: Latest Galleries</h1>
                </div>
                <?php foreach ($latestGalleries as $gallery): ?>
                <div class = "gallery-content">
                    <h2 class = "gallery-name">
                        <a href = "/galleries/view/<?php echo $gallery['Gallery']['id']; ?>">
                            <?php echo $gallery['Gallery']['name'] ?>
                        </a>
                    </h2>
                    <ul class ="thumbnails">
                        <?php foreach($gallery['Photos'] as $key => $photo): ?>
                        <?php
                            if ($key == 8){
                                break;
                            }
                        ?>
                        <li class = "span1">
                            <div class = "thumbnail">
                                <a href = "/photos/view/<?php echo $photo['id']; ?>" title = "<?php echo $photo['name']; ?>">
                                    <img src = "<?php echo $photo['url'] ?>" >
                                </a>
                                <h5>
                                    <a href = "/photos/view/<?php echo $photo['id']; ?>">
                                        <?php echo $photo['name']; ?>
                                    </a>
                                </h5>
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
