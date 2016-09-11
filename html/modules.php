<?php
/**
 * @package     Joomla.Site
 * @subpackage  SmarterUI template for Joomla
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


/*
 * mapping towards UIkit Grid (10 grid system requires mapping for the 12 grid Bootstrap)
 */

    
function modChrome_smarterui($module, &$params, &$attribs)
{       
	$moduleTag      = $params->get('module_tag', 'div');
        $mysuffix = $params->get('moduleclass_sfx');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'));
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
        switch ($bootstrapSize) {
            case 1:
                $moduleClass    = "uk-width-1-10";
                break;
            case 2:
                $moduleClass    = "uk-width-1-6";
                break;
            case 3:
                $moduleClass    = "uk-width-medium-1-4";
                break;
            case 4:
                $moduleClass    = "uk-width-medium-1-3";
                break;
            case 5:
                $moduleClass    = "uk-width-medium-2-5";
                break;
            case 6:
                $moduleClass    = "uk-width-medium-1-2";
                break;
            case 7:
                $moduleClass    = "uk-width-medium-3-5";
                break;
             case 8:
                $moduleClass    = "uk-width-medium-2-3";
                break;
             case 9:
                $moduleClass    = "uk-width-medium-3-4";
                break;
             case 10:
                $moduleClass    = "uk-width-5-6";
                break;
             case 11:
                $moduleClass    = "uk-width-9-10";
                break;
             case 12:
                $moduleClass    = "uk-width-1-1";
                break;
            default:
                $moduleClass    = "uk-width-1-1";
                break;
        }
        
	if (!empty ($module->content)) : ?>
		<<?php echo $moduleTag; ?> class="moduletable <?php echo htmlspecialchars($mysuffix); ?> <?php echo $moduleClass; ?>">

		<?php if ((bool) $module->showtitle) :?>
			<<?php echo $headerTag; ?> class="<?php echo $params->get('header_class'); ?>"><?php echo $module->title; ?></<?php echo $headerTag; ?>>
		<?php endif; ?>

			<?php echo $module->content; ?>
		
		</<?php echo $moduleTag; ?>>

	<?php endif;
}


