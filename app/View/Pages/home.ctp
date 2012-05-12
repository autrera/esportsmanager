<div class = "row">
    <div class = "span8">
        <div id="myCarousel" class="carousel">
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="active item">
                    <img src = "img/slider/slide-1.jpg" 
                        alt = "">
                    <div class = "carousel-caption">
                        <h4>Bienvenidos a Quetzal</h4>
                        <p>Recomiendanos o muere!</p>
                    </div>
                </div>
                <div class="item">
                  <img src = "img/slider/slide-2.jpg" 
                    alt = "">
                </div>
                <div class="item">
                  <img src = "img/slider/slide-3.jpg" 
                    alt = "">
                </div>
                <div class="item">
                  <img src = "img/slider/slide-4.jpg" 
                    alt = "">
                </div>
                <div class="item">
                  <img src = "img/slider/slide-5.jpg" 
                    alt = "">
                </div>
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
                        href = "#" >
                        More
                        <i class="icon-chevron-right icon-white"></i>
                    </a>
                    <iframe width="290" height="190" src="http://www.youtube.com/embed/WsNJ4_5l8oI" frameborder="0" allowfullscreen></iframe>
                    <h5>Thumbnail label</h5>
                    <div class = "caption">
                        <h4>
                            <i class="icon-play"></i>
                            <a href = "#">
                                Thumbnail label
                            </a>
                        </h4>
                        <h4>
                            <i class="icon-play"></i>
                            <a href = "#">
                                Thumbnail label
                            </a>
                        </h4>
                        <h4>
                            <i class="icon-play"></i>
                            <a href = "#">
                                Thumbnail label
                            </a>
                        </h4>
                        <h4>
                            <i class="icon-play"></i>
                            <a href = "#">
                                Thumbnail label
                            </a>
                        </h4>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class = "row">
    <div class = "span4">
        <div class = "latest-matches">
            <div class="module-header">
                <h3>Latest Matches</h3>
            </div>
            <a class = "view-more btn btn-mini btn-primary"
                href = "#" >
                More
                <i class="icon-chevron-right icon-white"></i>
            </a>
            <?php for ($i = 1; $i <= 5; $i++): ?>
            <?php $class = ($i%2==0)? 'even' : ''; ?>
            <div class = "match-row <?php echo $class; ?>">
                <span class = "game-logo">
                    <img src = "img/game-icons/cs.png" />
                </span>
                <span class = "home-team">
                    Quetzal.CSS
                </span>
                <span class = "score winner-score">
                    16
                </span>
                - 
                <span class = "score loser-score">
                    14
                </span>
                <span class = "away-team">
                    VisitorTeam
                </span>
            </div>
            <?php endfor; ?>
        </div>
    </div>
    <div class = "span4">
        <div class = "latest-blogs">
            <div class = "module-header">
                <h3>Latest Blogs</h3>
            </div>
            <a class = "view-more btn btn-mini btn-primary"
                href = "#" >
                More
                <i class="icon-chevron-right icon-white"></i>
            </a>
            <?php for ($i = 1; $i <= 3; $i++): ?>
            <?php $class = ($i%2==0)? 'even' : ''; ?>
            <div class = "blog-row <?php echo $class; ?>">
                <h4 class = "blog-title">
                    Nombre random de un blog
                </h4>
                <div class = "blog-info">
                    <span class="label label-inverse">
                        <i class="icon-eye-open icon-white"></i>
                        9999
                    </span>
                    <span class="label label-inverse">
                        <i class="icon-calendar icon-white"></i>
                        31/02/2012
                    </span>
                    <span class="label label-info">
                        <i class="icon-user icon-white"></i>
                        Kugel
                    </span>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
    <div class = "span4">
        <div class = "live-streams">
            <div class="module-header">
                <h3>Live Streams</h3>
            </div>
            <a class = "view-more btn btn-mini btn-primary"
                href = "#" >
                More
                <i class="icon-chevron-right icon-white"></i>
            </a>
            <?php for ($i = 0; $i < 5; $i++): ?>
            <div class = "stream-row">
                <div class = "stream-game-logo pull-left">
                    <span class = "game-logo">
                        <img src = "img/game-icons/sc2.png" />
                    </span>
                </div>
                <div class = "stream-details">
                    <h4 class = "stream-title">
                        Nombre del stream
                        <span class="pull-right label label-info">
                            <i class="icon-eye-open icon-white"></i>
                            9999
                        </span>
                    </h4>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</div>
<hr>
<div class = "row">
    <div class = "span8">
        <?php for($i = 0; $i < 5; $i++): ?>
        <div class = "news-row">
            <div class = "news-image pull-left">
                <img src = "img/news/bastion_OST_small.jpg" >
            </div>
            <div class = "news-tag pull-right">
                &nbsp;
            </div>
            <div class = "news-title">
                <h3>
                    Titulo de la noticia asi bien chido
                </h3>
            </div>
            <div class = "news-details">
                <span class="label label-inverse">
                    <i class="icon-comment icon-white"></i>
                    9999
                </span>
                <span class="label label-inverse">
                    <i class="icon-calendar icon-white"></i>
                    31/02/2012
                </span>
                <span class="label label-info">
                    <i class="icon-user icon-white"></i>
                    Kugel
                </span>
            </div>
            <div class = "news-content">
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
                </p>
            </div>
            <div class = "clear"></div>
        </div>
        <?php endfor; ?>
    </div>
    <div class = "span4">
        <div class = "row">
            <div class = "span4">
                <script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
                <script language = "javascript" type = "text/javascript" 
                    src = "js/twitter.js" >
                </script>
            </div>
        </div>
        <hr>
        <div class = "row">
            <div class = "span4">
                <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fteamquetzal&amp;width=300&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:258px;" allowTransparency="true"></iframe>
            </div>
        </div>
        <hr>
        <div class = "row">
            <div class = "span4 lateral-sponsor">
                <img src = "img/sponsors/amd-logo.jpg">
            </div>
        </div>
        <hr>
        <div class = "row">
            <div class = "span4 lateral-sponsor">
                <img src = "img/sponsors/intel-logo.jpg">
            </div>
        </div>
    </div>
</div>
