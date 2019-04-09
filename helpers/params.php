<?php
/*
 * @package     Joomill Maestro Template
 * @copyright   Copyright (c) Joomill.nl
 * @license     GNU General Public License version 3 or later
 */

// No direct access.
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

$config         = Factory::getConfig();
$sitename       = $config->get('sitename');

// Defaults
$app                = Factory::getApplication();
$doc                = Factory::getDocument();
$lang               = Factory::getLanguage();
$langTag            = $lang->getTag();
$user               = Factory::getUser();
$this->language     = $doc->language;
$langParts          = explode('-', $this->language);
$htmlLang           = reset($langParts);
$this->direction    = $doc->direction;
$option             = $app->input->getCmd('option');
$view               = $app->input->getCmd('view');
$layout             = $app->input->getCmd('layout');
$task               = $app->input->getCmd('task');
$itemid             = $app->input->getCmd('Itemid');

$homepagecomponent  = $this->params->get('homepagecomponent');
$backtotopshow      = $this->params->get('backtotopshow');
$analytics 			= $this->params->get('analytics');
$animatecss 		= $this->params->get('animatecss');

$toolbarcolor       = $this->params->get('toolbarcolor');
$toolbarfontcolor   = $this->params->get('toolbarfontcolor');
$toolbarwidth     	= $this->params->get('toolbarwidth');
$toolbarresponsive  = $this->params->get('toolbarresponsive');
if(!empty($toolbarresponsive)) { $toolbarresponsive  = join(' ', $this->params->get('toolbarresponsive')); }
$toolbarlmodulestyle    =  $this->params->get('toolbarlmodulestyle');
$toolbarrmodulestyle    =  $this->params->get('toolbarrmodulestyle');

$logoposition       = $this->params->get('logoposition');
$logobarcolor       = $this->params->get('logobarcolor');
$logobarwidth       = $this->params->get('logobarwidth');
$logobarpadding     = $this->params->get('logobarpadding');
$logobaralign       = $this->params->get('logobaralign');
$logomodulestyle    =  $this->params->get('logomodulestyle');

$navbarcolor        = $this->params->get('navbarcolor');
$navbarwidth   		= $this->params->get('navbarwidth');
$menutype  			= $this->params->get('menutype');
$menualign			= $this->params->get('menualign');
$stickymenu     	= $this->params->get('stickymenu');
$stickymenuoffset  	= $this->params->get('stickymenuoffset');

$slideshowcolor     = $this->params->get('slideshowcolor');
$slideshowfontcolor = $this->params->get('slideshowfontcolor');
$slideshowpadding   = $this->params->get('slideshowpadding');
$slideshowwidth     = $this->params->get('slideshowwidth');
$slideshowresponsive  = $this->params->get('slideshowresponsive');
if(!empty($slideshowresponsive)) { $slideshowresponsive = join(' ', $this->params->get('slideshowresponsive')); }
$slideshowmodulestyle    =  $this->params->get('slideshowmodulestyle');

$breadcrumbscolor   = $this->params->get('breadcrumbscolor');
$breadcrumbsfontcolor   = $this->params->get('breadcrumbsfontcolor');
$breadcrumbspadding = $this->params->get('breadcrumbspadding');
$breadcrumbswidth  	= $this->params->get('breadcrumbswidth');
$breadcrumbsresponsive  = $this->params->get('breadcrumbsresponsive');
if(!empty($breadcrumbsresponsive)) { $breadcrumbsresponsive = join(' ', $this->params->get('breadcrumbsresponsive')); }
$breadcrumbsmodulestyle    =  $this->params->get('breadcrumbsmodulestyle');

$topacolor     		= $this->params->get('topacolor');
$topafontcolor 		= $this->params->get('topafontcolor');
$topapadding   		= $this->params->get('topapadding');
$topawidth     		= $this->params->get('topawidth');
$toparesponsive     = $this->params->get('toparesponsive');
if(!empty($toparesponsive)) { $toparesponsive = join(' ', $this->params->get('toparesponsive')); }
$topamodulestyle    =  $this->params->get('topamodulestyle');

$topbcolor     		= $this->params->get('topbcolor');
$topbfontcolor 		= $this->params->get('topbfontcolor');
$topbpadding   		= $this->params->get('topbpadding');
$topbwidth     		= $this->params->get('topbwidth');
$topbresponsive     = $this->params->get('topbresponsive');
if(!empty($topbresponsive)) { $topbresponsive = join(' ', $this->params->get('topbresponsive')); }
$topbmodulestyle    =  $this->params->get('topbmodulestyle');

$topccolor     		= $this->params->get('topccolor');
$topcfontcolor 		= $this->params->get('topcfontcolor');
$topcpadding   		= $this->params->get('topcpadding');
$topcwidth     		= $this->params->get('topcwidth');
$topcresponsive     = $this->params->get('topcresponsive');
if(!empty($topcresponsive)) { $topcresponsive = join(' ', $this->params->get('topcresponsive')); }
$topcmodulestyle    =  $this->params->get('topcmodulestyle');

$topdcolor     		= $this->params->get('topdcolor');
$topdfontcolor 		= $this->params->get('topdfontcolor');
$topdpadding   		= $this->params->get('topdpadding');
$topdwidth     		= $this->params->get('topdwidth');
$topdresponsive  = $this->params->get('topdresponsive');
if(!empty($topdresponsive)) { $topdresponsive = join(' ', $this->params->get('topdresponsive')); }
$topdmodulestyle    =  $this->params->get('topdmodulestyle');

$mainbodycolor      = $this->params->get('mainbodycolor');
$mainbodyfontcolor  = $this->params->get('mainbodyfontcolor');
$mainbodypadding 	= $this->params->get('mainbodypadding');
$mainbodywidth 		= $this->params->get('mainbodywidth');
$leftwidth          = $this->params->get('leftwidth');
$rightwidth         = $this->params->get('rightwidth');
$leftresponsive  = $this->params->get('leftresponsive');
if(!empty($leftresponsive)) { $leftresponsive = join(' ', $this->params->get('leftresponsive')); }
$rightresponsive  = $this->params->get('rightresponsive');
if(!empty($rightresponsive)) { $rightresponsive = join(' ', $this->params->get('rightresponsive')); }
$contenttopresponsive  = $this->params->get('contenttopresponsive');
$contenttopmodulestyle    =  $this->params->get('contenttopmodulestyle');
if(!empty($contenttopresponsive)) { $contenttopresponsive = join(' ', $this->params->get('contenttopresponsive')); }
$contentbottomresponsive  = $this->params->get('contentbottomresponsive');
$contentbottommodulestyle    =  $this->params->get('contentbottommodulestyle');
if(!empty($contentbottomresponsive)) { $contentbottomresponsive = join(' ', $this->params->get('contentbottomresponsive')); }

$bottomacolor     	= $this->params->get('bottomacolor');
$bottomafontcolor   = $this->params->get('bottomafontcolor');
$bottomapadding   	= $this->params->get('bottomapadding');
$bottomawidth     	= $this->params->get('bottomawidth');
$bottomaresponsive  = $this->params->get('bottomaresponsive');
if(!empty($bottomaresponsive)) { $bottomaresponsive = join(' ', $this->params->get('bottomaresponsive')); }
$bottomamodulestyle    =  $this->params->get('bottomamodulestyle');

$bottombcolor     	= $this->params->get('bottombcolor');
$bottombfontcolor   = $this->params->get('bottombfontcolor');
$bottombpadding   	= $this->params->get('bottombpadding');
$bottombwidth     	= $this->params->get('bottombwidth');
$bottombresponsive  = $this->params->get('bottombresponsive');
if(!empty($bottombresponsive)) { $bottombresponsive  = join(' ', $this->params->get('bottombresponsive')); }
$bottombmodulestyle    =  $this->params->get('bottombmodulestyle');

$bottomccolor     	= $this->params->get('bottomccolor');
$bottomcfontcolor   = $this->params->get('bottomcfontcolor');
$bottomcpadding   	= $this->params->get('bottomcpadding');
$bottomcwidth     	= $this->params->get('bottomcwidth');
$bottomcresponsive  = $this->params->get('bottomcresponsive');
if(!empty($bottomcresponsive)) { $bottomcresponsive  = join(' ', $this->params->get('bottomcresponsive')); }
$bottomcmodulestyle    =  $this->params->get('bottomcmodulestyle');

$bottomdcolor     	= $this->params->get('bottomdcolor');
$bottomdfontcolor   = $this->params->get('bottomdfontcolor');
$bottomdpadding   	= $this->params->get('bottomdpadding');
$bottomdwidth     	= $this->params->get('bottomdwidth');
$bottomdresponsive  = $this->params->get('bottomdresponsive');
if(!empty($bottomdresponsive)) { $bottomdresponsive  = join(' ', $this->params->get('bottomdresponsive')); }
$bottomdmodulestyle    =  $this->params->get('bottomdmodulestyle');

$footermenucolor    = $this->params->get('footermenucolor');
$footermenufontcolor   = $this->params->get('footermenufontcolor');
$footermenupadding  = $this->params->get('footermenupadding');
$footermenuwidth    = $this->params->get('footermenuwidth');
$footermenuresponsive  = $this->params->get('footermenuresponsive');
if(!empty($footermenuresponsive)) { $footermenuresponsive = join(' ', $this->params->get('footermenuresponsive')); }
$footermenumodulestyle    =  $this->params->get('footermenumodulestyle');

$copyrightcolor    	= $this->params->get('copyrightcolor');
$copyrightfontcolor = $this->params->get('copyrightfontcolor');
$copyrightpadding  	= $this->params->get('copyrightpadding');
$copyrightwidth    	= $this->params->get('copyrightwidth');
$copyrightalign    	= $this->params->get('copyrightalign');
$copyrightmodulestyle    =  $this->params->get('copyrightmodulestyle');
