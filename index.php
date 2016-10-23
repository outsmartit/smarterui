
<?php
defined('_JEXEC') or die;
/* =====================================================================
  SmarterUI Template: Based on getUI kit for Joomla
  Author:   Diederik
  Version:  1.0
  Created:  July 2015
  Copyright:  Diederik www.outsmartit.be - (C) 2015 - All rights reserved
  Licenses: GNU/GPL v3 or later http://www.gnu.org/licenses/gpl-3.0.html
  /* ===================================================================== */

// Load template framework 
include_once JPATH_THEMES . '/' . $this->template . '/getParameters.php';
?>
<!DOCTYPE html>
<!--[if IE 8]>
        <html class="no-js lt-ie9" lang="en" > 
<![endif]-->
<!--[if gt IE 8]>
<!--> <html class="no-js" lang="en" > <!--<![endif]-->

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <link rel="apple-touch-icon" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/apple-touch-icon.png">
    <jdoc:include type="head" />
    <?php
    //$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/normalize.css');
    $doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/uikit.min.css');
    $doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/smarterui.css');
    $doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/components/tooltip.min.css');
    if ($customCSS != -1) {
        $doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/' . $customCSS);
    }
    ?>

    <!--adding jquery and javascript --> 
    <?php
    $doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/vendor/modernizr.js');
    JHtml::_('jquery.framework');
    if (!$unsetBootstrap == 0) {
        unset($doc->_scripts[JURI::root(true) . '/media/jui/js/bootstrap.min.js']);
    }
    ?>
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


    <?php if ($setWidth != $defaultWidth) : ?>
        <style>
            .uk-container{
                max-width: <?php echo $setWidth ?><?php echo $widthUnit ?>;
            }
        </style>
    <?php endif; ?>
</head>
<body class="<?php
if ($active) : echo $active->alias;
endif;
$smartpull = '';
?>">
    <div class="uk-container uk-container-center uk-margin-bottom">
        <div class="uk-grid">
            <?php if ($this->countModules('lang-sel')) : ?>
                <div class="uk-width-medium-1-4 uk-push-3-4">
                    <jdoc:include type="modules" name="lang-sel" /> 
                </div>
                <?php $smartpull = "uk-pull-1-4"; ?>
            <?php endif; ?>
            <?php if ($this->countModules('above-nav')) : ?>
                <div class="uk-width-medium-3-4 <?php echo $smartpull; ?>">
                    <jdoc:include type="modules" name="above-nav"  />  
                </div>

            <?php endif; ?>
        </div>

        <?php if ($this->countModules('nav')) : ?>
            <!--add the menu -->
            <jdoc:include type="modules" name="nav"    />          
        <?php endif; ?>
        <?php if ($fullslide == 1): echo '</div>'; ?><?php endif ?>
        <!--  full screen slideshow -->
        <?php if ($this->countModules('top')) : ?>
            <section class="smarttop">
                <div class="uk-grid">
                    <!--toprow-->
                    <jdoc:include type="modules" name="top" style="smarterui" />
                </div>  
            </section> 
        <?php endif; ?>
        <!-- full screen slide -->
        <?php if ($fullslide == 1): echo '<div class="uk-container uk-container-center uk-margin-bottom">' ?><?php endif ?>
        <?php if ($this->countModules('above')) : ?>
            <!-- <div class="wrapper">  -->
            <section class="smartabove">
                <div class="uk-grid">
                    <!--aboverow-->
                    <jdoc:include type="modules" name="above" style="smarterui" />
                </div>
            </section>
            <!--</div>-->
        <?php endif; ?>

        <div class="uk-grid uk-margin-top">
            <!--mainrow-->
            <?php if ($this->countModules('left')) : ?>
                <section class="uk-width-<?php echo $leftWidth ?>-10">
                    <!--left-row-->
                    <jdoc:include type="modules" name="left" style="smarterui" />
                </section>
            <?php endif; ?>
            <div class="uk-width-<?php echo $mainwidth ?>-10">
                <!--mainrow-->
                <?php if ($this->countModules('above-content')) : ?>
                    <div class="above-content">
                        <!--above-content-->
                        <jdoc:include type="modules" name="above-content" style="smarterui" />
                    </div>
                <?php endif; ?>            

                <?php if ($this->countModules('breadcrumbs')) : ?>
                    <div class="breadcrumbs-row">
                        <div class="wrapper">
                            <div class="uk-width-1-1">
                                <jdoc:include type="modules" name="breadcrumbs" style="none" />
                            </div>
                        </div>
                    </div>
                <?php endif; ?> 
                <!-- Main content of the page -->
                <jdoc:include type="message" />  
                <jdoc:include type="component" />

                <?php if ($this->countModules('below-content')) : ?>
                    <section class="below-content">
                        <!--below-content-->
                        <jdoc:include type="modules" name="below-content" style="smarterui" />
                    </section>
                <?php endif; ?>
            </div>
            <?php if ($this->countModules('right')) : ?>
                <section class="uk-width-<?php echo $rightWidth ?>-10">
                    <!--right-row-->
                    <jdoc:include type="modules" name="right" style="smarterui" />
                </section>
            <?php endif; ?>
        </div>

        <?php if ($this->countModules('below')) : ?>

            <div class="uk-margin-top">        
                <section>
                    <div class="uk-grid">
                        <!--belowrow-->
                        <jdoc:include type="modules" name="below" style="smarterui" />
                    </div>
                </section>
            </div>

        <?php endif; ?>

        <?php if ($this->countModules('bottom')) : ?>
            <section class="smartbottom">
                <div class="uk-grid">
                    <!--bottomrow-->
                    <jdoc:include type="modules" name="bottom" style="smarterui" />
                </div>
            </section> 
        <?php endif; ?>

        <?php if ($this->countModules('footer')) : ?>

            <section class="smartfooter" >
                <div class="uk-grid uk-margin-large-top">
                    <!--footerrow-->
                    <jdoc:include type="modules" name="footer" style="smarterui" />
                </div>
            </section>         

        <?php endif; ?>
        <jdoc:include type="modules" name="debug" />
        <footer>
            <div class="uk-grid uk-margin-large-top">

                <div class="uk-width-1-1">
                    <?php if ($social > 0) : ?>
                        <ul class="social uk-float-left">
                            <?php if ($twitterLink != "") : ?>
                                <li><a href="<?php echo ($twitterLink); ?>" title="<?php echo ($twitter); ?>" target="_blank"><i class="uk-icon-twitter large"></i></a></li>
                            <?php endif; ?>
                            <?php if ($dribbbleLink != "") : ?>
                                <li><a href="<?php echo ($dribbbleLink); ?>" title="<?php echo ($dribbble); ?>" target="_blank"><i class="uk-icon-dribble large"></i></a></li>
                            <?php endif; ?>
                            <?php if ($facebookLink != "") : ?>
                                <li><a class="facebook" href="<?php echo ($facebookLink); ?>" title="<?php echo ($facebook); ?>" target="_blank"><i class="uk-icon-facebook-f large"></i></a></li>
                            <?php endif; ?>
                            <?php if ($googleplusLink != "") : ?>
                                <li><a href="<?php echo ($googleplusLink); ?>" title="<?php echo ($googleplus); ?>" target="_blank"><i class="uk-icon-google-plus large"></i></a></li>
                            <?php endif; ?>
                            <?php if ($linkedinLink != "") : ?>
                                <li><a href="<?php echo ($linkedinLink); ?>" title="<?php echo ($linkedin); ?>" target="_blank"><i class="uk-icon-linkedin large"></i></a></li>
                            <?php endif; ?>
                            <?php if ($githubLink != "") : ?>
                                <li><a href="<?php echo ($githubLink); ?>" title="<?php echo ($github); ?>" target="_blank"><i class="uk-icon-github large"></i></a></li>
                            <?php endif; ?>
                        </ul>

                        <div class= "uk-float-right">
                            <a href="#">Back to top <i class="uk-icon-chevron-up"></i></a>
                        </div>
                    <?php endif; ?>
                </div>


            </div>
            <div class="uk-grid">
                <div class="uk-width-medium-1-1 uk-text-center">
                    <small>
                        <?php if ($disclaimer == 1 && $disclaimerlink) : ?>
                            <a href="<?php echo $disclaimerlink; ?>"><?php echo JText::_("TPL_SMARTERUI_DISCLAIMER"); ?></a><br/>
                        <?php endif; ?>
                        &copy; <?php echo date("Y"); ?> 
                        <?php echo htmlspecialchars($app->getCfg('sitename')); ?>
                    </small>
                </div>
            </div>
        </footer>

        <?php
        $doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/getUIkit/uikit.min.js');
        $doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/getUIkit/components/tooltip.min.js');
        if ($stickyTopMenu) {
            $doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/getUIkit/components/sticky.min.js');
        }
        ?>       

<!--[if lte IE 8]>  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/respond.js"></script> <![endif]-->

        <?php if ($analytics != "UA-XXXXX-X") : ?>            
            <script>
                (function (i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                            m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m);
                })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                ga('create', '<?php echo htmlspecialchars($analytics); ?>', 'auto');
                ga('send', 'pageview');

            </script>
        <?php endif; ?>
        <noscript>JavaScript is unavailable or disabled; so you are probably going to miss out on a few things. Everything should still work, but with a little less pzazz!</noscript>
    </div>
</body>
</html>
