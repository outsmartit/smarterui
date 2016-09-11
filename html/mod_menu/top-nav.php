<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu adapted for UIkit (dropdown for mobile)
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
// Note. It is important to remove spaces between elements.
$sitetitle = $app->getTemplate($myparams = true)->params->get('sitetitle');
$logo = $app->getTemplate($myparams = true)->params->get('logo');
$sitedescription = $app->getTemplate($myparams = true)->params->get('sitedescription');
$mob_menu = $app->getTemplate($myparams = true)->params->get('mobilemenu');
$menuleft = $app->getTemplate($myparams = true)->params->get('menuleft');
$menulogo = $app->getTemplate($myparams = true)->params->get('logo_in_menu');
$navbarclass = "uk-navbar-flip";
if ($menuleft){
$navbarclass = "uk-navbar";}
?>
<nav class="uk-navbar uk-margin-bottom uk-margin-top">
<?php if($menulogo) : ?>
    <a class="uk-navbar-brand uk-hidden-small" href="#">
        <?php if ($logo) : ?>
            <img src="<?php echo JUri::root() ?>/<?php echo htmlspecialchars($logo); ?>" 
                 title="<?php echo htmlspecialchars($sitetitle); ?> " alt="<?php echo htmlspecialchars($sitedescription); ?>"/>
             <?php else : ?>
                 <?php echo $site_title; ?> 
             <?php endif; ?>
    </a>
    <?php endif; ?>
    <div class="<?php echo $navbarclass; ?> uk-hidden-small">
        <ul class="uk-navbar-nav uk-hidden-small menu<?php echo $class_sfx; ?>"<?php
        $tag = '';
        if ($params->get('tag_id') != null) {
            $tag = $params->get('tag_id') . '';
            echo ' id="' . $tag . '"';
        }
        ?>>
                <?php
                foreach ($list as $i => &$item) :
                    $ui_suffix = '';
                    $class = 'item-' . $item->id;
                    if ($item->id == $active_id) {
                        $class .= ' current';
                    }

                    if (in_array($item->id, $path)) {
                        $class .= ' active';
                    } elseif ($item->type == 'alias') {
                        $aliasToId = $item->params->get('aliasoptions');
                        if (count($path) > 0 && $aliasToId == $path[count($path) - 1]) {
                            $class .= ' active';
                        } elseif (in_array($aliasToId, $path)) {
                            $class .= ' alias-parent-active';
                        }
                    }
                    if ($item->deeper) {
                        $class .= 'deeper has-dropdown';
                    }
                    if ($item->deeper) {
                        $class .= ' deeper';
                    }

                    if ($item->parent) {
                        $class .= ' uk-parent';
                        $ui_suffix = ' data-uk-dropdown';
                    }

                    if (!empty($class)) {
                        $class = ' class="' . trim($class) . '"';
                    }

                    echo '<li' . $class . $ui_suffix . '>';

                    // Render the menu item.
                    //default.php will render heading via default_heading.php
                    switch ($item->type) :
                        case 'separator':
                        case 'url':
                        case 'component':
                        case 'heading':
                            require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
                            break;

                        default:
                            require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
                            break;
                    endswitch;

                    // The next item is deeper.
                    if ($item->deeper) {
                        echo '<div class="uk-dropdown uk-dropdown-navbar">
            <ul class="uk-nav uk-nav-navbar">';
                    }
                    // The next item is shallower.
                    elseif ($item->shallower) {
                        echo '</li>';
                        echo str_repeat('</ul></div></li>', $item->level_diff);
                    }
                    // The next item is on the same level.
                    else {
                        echo '</li>';
                    }
                endforeach;
                ?></ul>
    </div>
    <ul class="uk-navbar-nav uk-visible-small">
        <li class="uk-parent" data-uk-dropdown="{mode:'click'}">
            <!-- creating the drop down menu -->
            <a href="#" class="uk-navbar-toggle uk-visible-small"></a>
            
            <div class="uk-dropdown">
                
                    <ul class="uk-nav uk-nav-navbar">
                        <?php
                        foreach ($list as $i => &$item) :
                            $ui_suffix = '';
                            $class = 'item-' . $item->id;
                            if ($item->id == $active_id) {
                                $class .= ' current';
                            }

                            if (in_array($item->id, $path)) {
                                $class .= ' active';
                            } elseif ($item->type == 'alias') {
                                $aliasToId = $item->params->get('aliasoptions');
                                if (count($path) > 0 && $aliasToId == $path[count($path) - 1]) {
                                    $class .= ' active';
                                } elseif (in_array($aliasToId, $path)) {
                                    $class .= ' alias-parent-active';
                                }
                            }
                            if ($item->deeper) {
                                $class .= 'deeper';
                            }
                            if ($item->deeper) {
                                $class .= ' deeper';
                            }

                            if ($item->parent) {
                                $class .= ' uk-parent';
                                //$ui_suffix = ' data-uk-dropdown';
                            }

                            if (!empty($class)) {
                                $class = ' class="' . trim($class) . '"';
                            }

                            echo '<li' . $class . $ui_suffix . '>';

                            // Render the menu item.
                            //default.php will render heading via default_heading.php
                            switch ($item->type) :
                                case 'separator':
                                case 'url':
                                case 'component':
                                case 'heading':
                                    require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
                                    break;

                                default:
                                    require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
                                    break;
                            endswitch;

                            // The next item is deeper.
                            if ($item->deeper) {
                                echo '<ul class="uk-nav-sub">';
                            }
                            // The next item is shallower.
                            elseif ($item->shallower) {
                                echo '</li>';
                                echo str_repeat('</ul></li>', $item->level_diff);
                            }
                            // The next item is on the same level.
                            else {
                                echo '</li>';
                            }
                        endforeach;
                        ?>
                    </ul>
                
            </div>
        </li>
    </ul>
</nav> 