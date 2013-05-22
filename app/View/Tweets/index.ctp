<a href="http://twitter.com/teamquetzal" class="btn btn-info twitter-link" target="_blank">
    <img src="/img/social/Twitter.png" alt="Twitter">
    Siguenos
</a>
<div class="popover bottom">
    <div class="arrow"></div>
    <h3 class="popover-title">.:Latest Tweets</h3>
    <div class="popover-content">
        <?php foreach($tweets as $tweet): ?>
        <div class="tweet">
            <p>
                <?php echo $tweet->text; ?>
                <small><?php echo date('d/m/Y', strtotime($tweet->created_at)); ?></small>
            </p>
        </div>
        <?php endforeach; ?>
    </div>
</div>

