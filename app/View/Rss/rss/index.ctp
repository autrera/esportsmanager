<?php
// You should import Sanitize
App::uses('Sanitize', 'Utility');

$this->set('channelData', array(
    'title' => __("TeamQuetzal"),
    'link' => $this->Html->url('/', true),
    'description' => __("Most recent activity in teamquetzal.com"),
    'language' => 'es-mx'
));

foreach ($latestPosts as $post) {
    $postTime = strtotime($post['Post']['created']);

    $postLink = array(
        'controller' => 'posts',
        'action' => 'view',
        $post['Post']['slug']
    );

    // This is the part where we clean the body text for output as the description
    // of the rss item, this needs to have only text to make sure the feed validates
    $bodyText = preg_replace('=\(.*?\)=is', '', $post['Post']['content']);
    $bodyText = $this->Text->stripLinks($bodyText);
    $bodyText = Sanitize::stripAll($bodyText);
    $bodyText = $this->Text->truncate($bodyText, 400, array(
        'ending' => '...',
        'exact'  => true,
        'html'   => true,
    ));

    echo  $this->Rss->item(array(), array(
        'title' => $post['Post']['title'],
        'link' => $postLink,
        'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
        'description' => $bodyText,
        'pubDate' => $post['Post']['created']
    ));
}

foreach ($latestNews as $news) {
    $newsTime = strtotime($news['News']['created']);

    $newsLink = array(
        'controller' => 'news',
        'action' => 'view',
        $news['News']['slug']
    );

    // This is the part where we clean the body text for output as the description
    // of the rss item, this needs to have only text to make sure the feed validates
    $bodyText = preg_replace('=\(.*?\)=is', '', $news['News']['content']);
    $bodyText = $this->Text->stripLinks($bodyText);
    $bodyText = Sanitize::stripAll($bodyText);
    $bodyText = $this->Text->truncate($bodyText, 400, array(
        'ending' => '...',
        'exact'  => true,
        'html'   => true,
    ));

    echo  $this->Rss->item(array(), array(
        'title' => $news['News']['title'],
        'link' => $newsLink,
        'guid' => array('url' => $newsLink, 'isPermaLink' => 'true'),
        'description' => $bodyText,
        'pubDate' => $news['News']['created']
    ));
}

foreach ($latestVideos as $video) {
    $videoTime = strtotime($video['Video']['created']);

    $videoLink = array(
        'controller' => 'videos',
        'action' => 'view',
        $video['Video']['slug']
    );

    // This is the part where we clean the body text for output as the description
    // of the rss item, this needs to have only text to make sure the feed validates
    $bodyText = preg_replace('=\(.*?\)=is', '', $video['Video']['url']);
    $bodyText = $this->Text->stripLinks($bodyText);
    $bodyText = Sanitize::stripAll($bodyText);
    $bodyText = $this->Text->truncate($bodyText, 400, array(
        'ending' => '...',
        'exact'  => true,
        'html'   => true,
    ));

    echo  $this->Rss->item(array(), array(
        'title' => $video['Video']['name'],
        'link' => $videoLink,
        'guid' => array('url' => $videoLink, 'isPermaLink' => 'true'),
        'description' => $bodyText,
        'pubDate' => $video['Video']['created']
    ));
}

?>