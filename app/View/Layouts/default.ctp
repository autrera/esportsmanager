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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset('ISO-8859-1'); ?>
    <meta property="og:title" content="Team Quetzal"/> 
    <meta property="og:type" content="sports_team"/> 
    <meta property="og:image" content="http://a2.sphotos.ak.fbcdn.net/hphotos-ak-ash4/385529_326799320670213_361217214_n.jpg"/> 
    <meta property="og:url" content="http://www.teamquetzal.com"/> 
    <meta property="og:site_name" content="QuetziWeb"/> 
    <meta property="og:admins" content="110378193995"/> 
	<title>
		<?php 
            echo __('Team Quetzal - Mexican Professional Gaming Franchise: '); 
        ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->css('default');
        echo $this->Html->css('jquery.fancybox');
        echo $this->Html->css('jquery.fancybox-buttons');
        echo $this->Html->css('jquery.fancybox-thumbs');
        // echo $this->Html->meta('icon', 'favicon.ico'); 
		echo $scripts_for_layout;
	?>
    <link href="/favicon.ico" type="image/x-icon" rel="shortcut icon" />
</head>
<body>
    <div id="fb-root"></div>
	<?php
        echo $this->Html->script('facebook');
		echo $this->Html->script('jquery');
        echo $this->Html->script('jquery.fancybox.pack');
        echo $this->Html->script('jquery.fancybox-buttons');
        echo $this->Html->script('jquery.fancybox-media');
        echo $this->Html->script('jquery.fancybox-thumbs');
		echo $this->Html->script('bootstrap');
        echo $this->Html->script('initializers');
	?>
	<div id="container">
        <div id = "header">
            <div class = "container">
                <div class = "row">
                    <div class = "span4 header-logo">
                        <div class = "header-logo">
                            <h1>Bienvenidos</h1>
                        </div>
                    </div>
                    <div class = "span4 header-main-sponsor">
                        <div class = "main-sponsor">
                        </div>
                    </div>
                    <?php if ($authUser): ?>
                    <div class = "span4">
                        <div class = "pull-right">
                            <h2>
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
                            </h2>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class = "cont-login-header span4 pull-right">
                        <div class = "pull-right">
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
                <div class="quetzilogo">
                    <img src="/img/quetzilogo.png" alt="TeamQuetzal">
                </div>
            </div>
            <div id = "main-container-border" class = "container">
                <div id = "main-container" class = "container">
                    <div class="navbar">
                        <div class="navbar-inner">
                            <div class="container">
                                <ul class = "nav">
                                    <li>
                                        <a href="/">
                                            <i class="icon-home icon-white"></i> 
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/teams">
                                            <i class="icon-home icon-white"></i> 
                                            Teams
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/news">
                                            <i class="icon-folder-open icon-white"></i> 
                                            News
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/videos">
                                            <i class="icon-film icon-white"></i> 
                                            Videos
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/streamsUsers">
                                            <i class="icon-facetime-video icon-white"></i>
                                            Streams
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/galleries">
                                            <i class = "icon-th icon-white"></i> 
                                            Galleries
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/miscellaneous">
                                            <i class = "icon-cog icon-white"></i> 
                                            Misc
                                        </a>
                                    </li>
                                </ul>
                            </div>
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
</body>
</html>