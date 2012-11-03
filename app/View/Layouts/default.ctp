<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::import('Lib', 'Footprint');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset('ISO-8859-1'); ?>
    <meta property="og:title" content="<?php echo $fb_title_for_layout; ?>"/>
    <meta property="og:description" content="<?php echo $fb_description_for_layout; ?>"/>
    <meta property="og:type" content="sports_team"/>
    <meta property="og:image" content="<?php echo $fb_image_for_layout; ?>"/>
    <meta property="og:url" content="<?php echo $fb_url_for_layout; ?>"/>
    <meta property="og:site_name" content="QuetziWeb"/>
	<title>
		<?php
            echo __('Team Quetzal - Mexican Professional Gaming Franchise: ');
        ?>
		<?php echo $title_for_layout; ?>
	</title>
        <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<?php
        echo Footprint::css('/css/default.css');
        echo $this->Html->css('jquery.fancybox');
        echo $this->Html->css('jquery.fancybox-buttons');
        echo $this->Html->css('jquery.fancybox-thumbs');
		echo $scripts_for_layout;
	?>
    <?php echo $this->Html->script('analytics'); ?>
</head>
<body>
	<div id="container">
        <div id = "header" class="navbar navbar-fixed-top">
            <div class = "container">
                <div class = "row">
                    <div class="span7 header-sponsors">
                        <a href="#"><img src="/img/sponsors/kingston.png" alt="Kingstone" /></a>
                        <a href="#"><img src="/img/sponsors/ea.png" alt="Electronic Arts" /></a>
                        <a href="#"><img src="/img/sponsors/origin.png" alt="Origin" /></a>
                    </div>
                    <?php if ($authUser): ?>
                    <div class = "span5">
                        <div class = "pull-right">
                            <h5>
                                Welcome!
                                <strong>
                                    <?php echo $authUser['nickname']; ?>
                                </strong>
                                <small>
                                    <a href = "/users/view/<?php echo $authUser['id']; ?>"
                                       class = "btn btn-primary btn-mini"
                                    >Panel</a>
                                    <a href = "/users/logout"
                                       class = "btn btn-danger btn-mini"
                                    >Logout</a>
                                </small>
                            </h5>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class = "cont-login-header span5 pull-right">
                        <div class = " btn-group pull-right">
                            <a href = "/users/login"
                                class = "btn btn-primary"
                            >
                                <i class="icon-user icon-white"></i>
                                Login
                            </a>
                            <a href = "/users/add"
                                class = "btn btn-warning"
                            >
                                <i class="icon-plus icon-white"></i>
                                Register
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div id = "background">
            <div class="container">
                <div class="row">
                    <div class="offset4">
                        <div class="quetzilogo ">
                            <img src="/img/logo.png" alt="TeamQuetzal">
                        </div>
                    </div>
                </div>
            </div>
            <div id = "main-container-border" class = "container">
                <div id = "main-container" class = "container">
                    <div class="navbar">
                        <div class="navbar-inner">
                            <ul class="nav">
                                <li>
                                    <a href="/">
                                        <i class="icon-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="/teams">
                                        <i class="icon-user"></i>
                                        Teams
                                    </a>
                                </li>
                                <li>
                                    <a href="/news">
                                        <i class="icon-folder-open"></i>
                                        News
                                    </a>
                                </li>
                                <li>
                                    <a href="/posts">
                                        <i class="icon-align-justify"></i>
                                        Posts
                                    </a>
                                </li>
                                <li>
                                    <a href="/videos">
                                        <i class="icon-film"></i>
                                        Videos
                                    </a>
                                </li>
                                <li>
                                    <a href="/streamsUsers">
                                        <i class="icon-facetime-video"></i>
                                        Streams
                                    </a>
                                </li>
                                <li>
                                    <a href="/galleries">
                                        <i class="icon-th"></i>
                                        Galleries
                                    </a>
                                </li>
                                <li>
                                    <a href="/miscellaneous">
                                        <i class="icon-cog"></i>
                                        Misc
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
					<?php echo $this->Session->flash(); ?>

					<?php echo $content_for_layout; ?>

				</div>
                <div class = "footer container">
                    <div class = "row">
                        <div class = "span12 credits">
                            Designed and Developed by <a href = "http://www.twitter.com/aldoutrera" target = "_blank">Aldo 'Kugel' Utrera</a>
                        </div>
						<?php // echo $this->element('sql_dump'); ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
    <div id="fb-root"></div>
    <?php echo Footprint::script('/js/require-jquery.min.js', array('data-main' => '/js/mainrequire.js')); ?>
    <script type='text/javascript' src='http://www.resrc.it/responsive.js'></script>
</body>
</html>
