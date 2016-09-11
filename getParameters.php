<?php

defined('_JEXEC') or die;
/* =====================================================================
  Template: SmarterUI - Based on getuikit.com - for Joomla
  Author:   Diederik
  Version:  1.0
  Created:  August 2015
  Copyright:  Diederik Bulteel - (C) 2014 - All rights reserved
  Licenses: GNU/GPL v3 or later http://www.gnu.org/licenses/gpl-3.0.html
  DBAD License http://philsturgeon.co.uk/code/dbad-license
  Credits: Code taken from the following:
  Seth Warburton  - https://github.com/nternetinspired/OneWeb
  Antony Doyle    - https://github.com/antonydoyle/siegeengine2
  /* ===================================================================== */

// Define shortcuts for template parameters
$setGeneratorTag = $this->params->get('setGeneratorTag');
$analytics = $this->params->get('analytics');
$customCSS = $this->params->get('customCSS');
$defaultWidth = '';
$setWidth = $this->params->get('setWidth');
$widthUnit = $this->params->get('widthUnit');
$stickyTopMenu = $this->params->get('stickyTopMenu');
$unsetBootstrap = $this->params->get('unsetBootstrap');
$menuleft = $this->params->get('menuleft');
$menulogo = $this->params->get('logo_in_menu');

$twitter = $this->params->get('twitter');
$twitterLink = $this->params->get('twitterLink');
$dribbble = $this->params->get('dribbble');
$dribbbleLink = $this->params->get('dribbbleLink');
$facebook = $this->params->get('facebook');
$facebookLink = $this->params->get('facebookLink');
$googleplus = $this->params->get('googleplus');
$googleplusLink = $this->params->get('googleplusLink');
$github = $this->params->get('github');
$githubLink = $this->params->get('githubLink');
$linkedin = $this->params->get('linkedin');
$linkedinLink = $this->params->get('linkedinLink');
$logo = $this->params->get('logo');
$sitetitle = $this->params->get('sitetitle');
$sitedescription = $this->params->get('sitedescription');
$disclaimer=$this->params->get('disclaimer');
$disclaimerlink =$this->params->get('disclaimerlink');
$fullslide = $this->params->get('fullslide');
$active = JFactory::getApplication()->getMenu()->getActive();

// Do we have social links?
$social = ($linkedinLink ? 1 : 0) + ($twitterLink ? 1 : 0) + ($dribbbleLink ? 1 : 0) + ($facebookLink ? 1 : 0) + ($googleplusLink ? 1 : 0) + ($githubLink ? 1 : 0);

if ($this->countModules('right') == 0) {
    $rightwidth = 0;
} else {
    $rightwidth = (int) ($this->params->get('rightwidth'));
}
if ($this->countModules('left') == 0) {
    $leftwidth = 0;
} else {
    $leftwidth = (int) ($this->params->get('leftwidth'));
}

$colcount = $rightwidth + $leftwidth;
$coltotal = 10 - $colcount;

//put to medium, so the columns will stack on small screens
$mainwidth = 'medium-' . $coltotal;
$rightWidth = 'medium-' . $rightwidth;
$leftWidth = 'medium-' . $leftwidth;


#----------------------------- Construct Code Snippets-----------------------------#
// GPL code taken from Construct template framework by Matt Thomas http://construct-framework.com/
// To enable use of site configuration
$app = JFactory::getApplication();
$pageParams = $app->getParams();
$sitename = $app->getCfg('sitename');
if ($sitetitle) {
    $site_id = $sitetitle;
} else {
    $site_id = $sitename;
}

// Returns a reference to the global document object
$doc = JFactory::getDocument();

// Define relative path to the current template directory
$template = 'templates/' . $this->template;

// Change generator tag
$this->setGenerator($setGeneratorTag);


