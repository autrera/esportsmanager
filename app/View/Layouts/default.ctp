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
	<title>
		<?php echo __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
    <link href="/css/bootstrap.less" rel="stylesheet/less"> 
	<?php
		// echo $this->Html->css('bootstrap', 'stylesheet/less');

		echo $this->Html->script('less');

		// echo $this->Html->meta('icon');

		echo $scripts_for_layout;
	?>
</head>
<body onload="prettyPrint()">
	<?php
		echo $this->Html->script('jquery');
		echo $this->Html->script('bootstrap');
	?>
	<div id="container">
        <div id = "background">
            <div id = "main-container-border" class = "container">
                <div id = "main-container" class = "container">
                    <div class = "row">
                        <div class = "span3 header-logo">
                            <div class = "header-logo">
                                Team Quetzal
                            </div>
                        </div>
                        <div class = "span3 header-main-sponsor">
                            <div class = "main-sponsor">
                                <img src = "/img/sponsors/logo_acteck.png">
                            </div>
                        </div>
                        <div class = "cont-login-header span5 pull-right">
                            <form class = "form-inline pull-right">
                                <input type = "text" class = "input-small" 
                                    placeholder = "Email">
                                <input type = "password" class = "input-small" 
                                    placeholder = "Password">
                                <button type = "submit" class = "btn btn-primary">
                                    Sign in
                                </button>
                                <button type = "submit" class = "btn btn-warning">
                                    Register
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="navbar">
                        <div class="navbar-inner">
                            <div class="container">
                                <ul class = "nav">
                                    <li class="active">
                                        <a href="#">
                                            <i class="icon-home icon-white"></i> 
                                            Home
                                        </a>
                                    </li>
                                    <li class="dropdown" id="menu1">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
                                            <i class = "icon-list-alt icon-white"></i> 
                                            Team
                                            <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#">
                                                    <span>
                                                        <img src = "/img/game-icons/cs.png">
                                                    </span>
                                                    CSS
                                                </a>
                                            </li>
                                            <li><a href="#">SC2</a></li>
                                            <li><a href="#">DOTA2</a></li>
                                        </ul>
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
                                        <a href="/streams">
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
                                        <a href="#">
                                            <i class = "icon-exclamation-sign icon-white"></i> 
                                            About
                                        </a>
                                    </li>
                                </ul>
                                <form class = "navbar-search pull-right" 
                                    action = "">
                                    <input type = "text" class = "search-query span2" placeholder = "Search">
                                    <span class="add-on">
                                        <i class="icon-search icon-white"></i>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>

					<?php echo $this->Session->flash(); ?>

					<?php echo $content_for_layout; ?>

				</div>
                <div class = "footer container">
                    <div class = "row">
                        <div class = "span12 credits">
                            Designed and Developed by <a href = "#">Kugel</a>
                        </div>
						<?php echo $this->element('sql_dump'); ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
</body>
</html>