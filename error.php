<?php
defined('_JEXEC') or die;
/* =====================================================================
  Gumber Template: Based on Foundation framework 5, Adapted for Joomla
  Author:   Diederik
  Version:  1.0
  Created:  January 2015
  Copyright:  Outsmartit.be - (C) 2015 - All rights reserved
  Licenses: GNU/GPL v3 or later http://www.gnu.org/licenses/gpl-3.0.html
  /* ===================================================================== */

// Load template parameters

$app = JFactory::getApplication();
$params = $app->getTemplate(true)->params;
$logo = $params->get('logo');
$customCSS = $params->get('customCSS');
$pageParams = $app->getParams();
$sitename = $app->getCfg('sitename');
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
    <jdoc:include type="head" />
    <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/uikit.min.css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/smarterui.css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/custom.css" />

    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <title><?php echo htmlspecialchars($params->get('sitetitle')); ?></title>
</head>
<body>
    <div class="uk-container uk-container-center uk-margin-bottom"">
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <?php $module = & JModuleHelper::getModule('menu'); ?>
                <?php echo JModuleHelper::renderModule($module); ?>
            </div>
        </div> 

        <div class="uk-grid">
            <div class="uk-width-medium-1-2">
                <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/uil-oops.jpg"/></div>
            <div class="uk-width-medium-1-2">
                <?php echo "<h2>Ooops,</h2> something went wrong.<br />  Please use the menu for correct navigation."; ?>
            </div>
        </div>

        <div class="footer-row">
            <div class="wrapper">
                <footer class="uk-grid">
                    <div class="moduletable uk-width-1-1 text-right">
                        <?php $module1 = JModuleHelper::getModule('custom', 'footer'); ?>
                        <?php echo JModuleHelper::renderModule($module1); ?>
                    </div>
                </footer>
            </div>
        </div>
        <div class="uk-grid">
            <div class="uk-width-1-1 uk-text-center">
                <small>&copy; <?php echo date("Y"); ?> <?php echo htmlspecialchars($sitename); ?></small>
            </div>
        </div>
    </div>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/vendor/jquery-2.1.0.min.js"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/getUIkit/uikit.min.js"></script>

</body>
</html>
