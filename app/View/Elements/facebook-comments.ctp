<?php
    App::uses('utilities', 'Lib');
    $url = utilities::getUrl();
?>
<div class = "row">
    <div class = "span8">
        <div class="fb-comments" data-href="<?php echo $url; ?>" data-num-posts="5" data-width="600"></div> 
    </div>
</div>
