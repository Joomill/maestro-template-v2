<?php
/*
 * @package     Joomill Maestro Template
 * @copyright   Copyright (c) Joomill.nl
 * @license     GNU General Public License version 3 or later
 */

// No direct access.
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

$config   	= Factory::getConfig();
$sitename   = $config->get('sitename');

// Defaults
$app  		= Factory::getApplication();

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');

// Getting params from template
$params 		= $app->getTemplate(true)->params;
$navcolor   	= $params->get('navcolor');
$navwidth      	= $params->get('navwidth');
$navposition 	= $params->get('navposition');
$menualign		= $params->get('menualign');
?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<title><?php echo $this->title; ?> <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></title>
	<meta charset="utf-8" />
	<meta name="robots" content="noindex, nofollow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/template.css" rel="stylesheet" />
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/fonts.css" rel="stylesheet" />
</head>

<body class="site <?php echo $option . ' view-' . $view . ($layout ? ' layout-' . $layout : ' no-layout') . ($task ? ' task-' . $task : ' no-task') . ($itemid ? ' itemid-' . $itemid : '') . ($this->direction === 'rtl' ? ' rtl' : ''); ?>">

	<!-- Body -->
	<div class="container">
	
		<h1 class="page-header"><?php echo $this->error->getCode(); ?> - <?php echo Text::_('JERROR_LAYOUT_PAGE_NOT_FOUND'); ?></h1>

		<div class="row well">
			<div id="content" class="col-md-12">
				<div>
					<p><strong><?php echo Text::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></strong></p>
					<p><?php echo Text::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></p>
					<ul>
						<li><?php echo Text::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
						<li><?php echo Text::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
						<li><?php echo Text::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
						<li><?php echo Text::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
					</ul>
				</div>
				<hr/>
				<a class="btn btn-primary btn-lg" href="<?php echo $this->baseurl; ?>/index.php"><?php echo Text::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?></a>
			
			</div>
		</div>													
				
		<p><?php echo Text::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>
			<?php echo $this->error->getCode(); ?> <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8');?>
	</div>
</div>

	<!-- Footer -->
	<div class="footer">
		<div class="container">
			<hr />
			<p>
				&copy; <?php echo date('Y'); ?> <?php echo $sitename; ?>
			</p>
		</div>
	</div>

</body>
</html>