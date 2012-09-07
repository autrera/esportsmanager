<?php
    // echo "<pre>";
    // print_r($tweets);
    // echo "</pre>";
?>
<h3>.: Latest Tweets</h3>
<?php foreach($tweets as $tweet): ?>
<div class="row tweet">
    <div class="span4">
        <div class="row">
            <div class="span4 text">
                <p><?php echo $tweet->text; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="span4 date">
                <p><small><?php echo date('d/m/Y', strtotime($tweet->created_at)); ?></small></p>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
