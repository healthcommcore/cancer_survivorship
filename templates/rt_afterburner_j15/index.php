<?php
/**
 * @copyright	Copyright (C) 2005 - 2009 RocketTheme, LLC - All Rights Reserved.
 * @license		GNU/GPL, see LICENSE.php
**/
$mainframe = JFactory::getApplication();
defined( '_JEXEC' ) or die( 'Restricted access' );
define( 'YOURBASEPATH', dirname(__FILE__) );
define('HOME', 101);

$color_style			= $this->params->get("colorStyle", "dark");
$template_width 		= $this->params->get("templateWidth", "962");
$leftcolumn_width		= $this->params->get("leftcolumnWidth", "210");
$rightcolumn_width		= $this->params->get("rightcolumnWidth", "210");
$leftcolumn_color		= $this->params->get("leftcolumnColor", "color2");
$rightcolumn_color		= $this->params->get("rightcolumnColor", "color1");
$mootools_enabled       = ($this->params->get("mootools_enabled", 1)  == 0)?"false":"true";
$caption_enabled        = ($this->params->get("caption_enabled", 1)  == 0)?"false":"true";
$rockettheme_logo       = ($this->params->get("rocketthemeLogo", 1)  == 0)?"false":"true";

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />
<?php
$pageStyle = (JRequest::getVar('Itemid') == HOME ? 'home' : 'inside');
require(YOURBASEPATH . DS . "rt_utils.php");
?>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rt_afterburner_j15/css/<?php echo $color_style ?>.css" type="text/css" />
<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if lte IE 6]>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/rt_afterburner_j15/js/ie_suckerfish.js"></script>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rt_afterburner_j15/css/styles.ie.css" type="text/css" />
<![endif]-->
<!--[if lte IE 7]>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/rt_afterburner_j15/css/styles.ie7.css" type="text/css" />
<![endif]-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31548808-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>

<div id="main">
	    <header>
                <div id="wrapper" >
                <jdoc:include type="modules" name="search_nav" style="xhtml" />
                <jdoc:include type="modules" name="top" style="xhtml" />	
                    <a href="<?php echo $this->baseurl ?>"><span id="logo"></span></a>
                    <div class="header_steth_<?php echo $pageStyle ?>"></div>
                    	
                </div>
		</header>
        <div id="wrapper">
              <!--<div class="nav_steth_<?php echo $pageStyle ?>"></div>-->
             <div id="nav_deck">   
                <nav>
                    <jdoc:include type="modules" name="nav" style="none" />
                </nav>
			</div>
		<?php if ($this->countModules('showcase')) : ?>
		<div id="showcase" class="dp100">
			<div class="background"></div>
			<div class="foreground">
		    	<jdoc:include type="modules" name="showcase" style="none" />
		    </div>
		</div>
		<?php endif; ?>
		<jdoc:include type="modules" name="advertisement" style="xhtml" />
        <?php if ($this->countModules('home_buttons')) : ?>

                <jdoc:include type="modules" name="home_buttons" style="xhtml" />

        <?php endif; ?>
                <div id="main-content" class="<?php echo $col_mode; ?>">
                    <div id="colmask" class="ckl-<?php echo $leftcolumn_color; ?>">
                        <div id="colmid" class="cdr-<?php echo $rightcolumn_color; ?>">
                            <div id="colright">
                                <div id="col1wrap">
                                    <div id="col1pad">
                                        <div id="col1">
                                            <?php if ($this->countModules('breadcrumb')) : ?>
                                            <div class="breadcrumbs-pad">
                                                <jdoc:include type="modules" name="breadcrumb" />
                                            </div>
                                            <?php endif; ?>
                                            <?php if ($this->countModules('user1 or user2 or user3')) : ?>
                                            <div id="mainmods" class="spacer<?php echo $mainmod_width; ?>">
                                                <jdoc:include type="modules" name="user1" style="afterburner" />
                                                <jdoc:include type="modules" name="user2" style="afterburner" />
                                                <jdoc:include type="modules" name="user3" style="afterburner" />
                                            </div>
                                            <?php endif; ?>
                                            <?php if($pageStyle == 'home') echo "<div id='home_article'>"; ?>
                                                <jdoc:include type="component" />
                                            <?php if($pageStyle == 'home') echo "</div>"; ?>    
                                            <?php if ($this->countModules('user4 or user5 or user6')) : ?>
                                            <div id="mainmods2" class="spacer<?php echo $mainmod2_width; ?>">
                                                <jdoc:include type="modules" name="user4" style="afterburner" />
                                                <jdoc:include type="modules" name="user5" style="afterburner" />
                                                <jdoc:include type="modules" name="user6" style="afterburner" />
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($leftcolumn_width != 0) : ?>
                                <div id="col2" class="<?php echo $pageStyle; ?>">
                                    <jdoc:include type="modules" name="left" style="xhtml" />
                                </div>
                                <?php endif; ?>
                                <?php if ($rightcolumn_width != 0) : ?>
                                <div id="col3">
                                    <jdoc:include type="modules" name="right" style="xhtml" />
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php if ($this->countModules('user7 or user8 or user9')) : ?>
            <div id="mainmods3" class="spacer<?php echo $mainmod3_width; ?>">
                <jdoc:include type="modules" name="user7" style="afterburner" />
                <jdoc:include type="modules" name="user8" style="afterburner" />
                <jdoc:include type="modules" name="user9" style="afterburner" />
            </div>
            <?php endif; ?>
            
            
            </div><!-- end wrapper -->
            <footer>
            	<div id="wrapper">
                <?php if ($this->countModules('bottom')) : ?>
                <div id="footer">
                    <div class="footer-pad">
                        <jdoc:include type="modules" name="bottom" style="none" />
                    </div>
                </div>
                <?php endif; ?>
                <jdoc:include type="modules" name="footer" style="xhtml" />
                <jdoc:include type="modules" name="debug" style="none" />
                </div>
                <div class="clr"></div>
            </footer>
        </div>

</div>
</body>
</html>
