<?php 
/*
 * @package     Joomill Maestro Template
 * @copyright   Copyright (c) Joomill.nl
 * @license     GNU General Public License version 3 or later
 */

// No direct access.
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;


$config   	= Factory::getConfig();
$sitename   = $config->get('sitename');

// Defaults
$app = Factory::getApplication();
$doc = Factory::getDocument();
$this->setGenerator(null);
?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta charset="utf-8" />
	<meta name="robots" content="noindex, nofollow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/template.css" rel="stylesheet" />
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/fonts.css" rel="stylesheet" />
</head>

<body>
  	<jdoc:include type="message" />
  	<br/><br/>
  	<div class="container">
  		<div class="col-md-6 col-md-offset-3">
	    	<?php if ($app->getCfg('offline_image')) { ?>
	    		<div class="offline_image text-center">
	      			<img src="<?php echo $app->getCfg('offline_image'); ?>" alt="<?php echo $app->getCfg('sitename'); ?>" />
	      			<br/><br/>
	      		</div>
	    	<?php } else { ?>
	    	<h1>
	      		<?php echo htmlspecialchars($app->getCfg('sitename')); ?>
	    	</h1>
			<?php } ?>

	    	<?php if ($app->getCfg('display_offline_message', 1) == 1 && str_replace(' ', '', $app->getCfg('offline_message')) != ''): ?>
				<div class="offline_message text-center"><?php echo $app->getCfg('offline_message'); ?><br/><br/></div>
	    	<?php elseif ($app->getCfg('display_offline_message', 1) == 2 && str_replace(' ', '', Text::_('JOFFLINE_MESSAGE')) != ''): ?>
				<div class="offline_message text-center"><?php echo Text::_('JOFFLINE_MESSAGE'); ?><br/><br/></div>
			<?php endif; ?>
	    
	    	<form action="<?php echo JRoute::_('index.php', true); ?>" method="post" name="login" id="form-login" class="well">
	      		<fieldset class="input">
	        		<p id="form-login-username">
	          			<label for="username"><?php echo Text::_('JGLOBAL_USERNAME'); ?></label><br />
	          			<input type="text" name="username" id="username" class="inputbox" alt="<?php echo Text::_('JGLOBAL_USERNAME'); ?>" size="18" />
	        		</p>
	        		
	        		<p id="form-login-password">
	          			<label for="passwd"><?php echo Text::_('JGLOBAL_PASSWORD'); ?></label><br />
	          			<input type="password" name="password" id="password" class="inputbox" alt="<?php echo Text::_('JGLOBAL_PASSWORD'); ?>" size="18" />
	        		</p>
	        
	        		<p id="form-login-remember">
	        			<input type="checkbox" name="remember" value="yes" alt="<?php echo Text::_('JGLOBAL_REMEMBER_ME'); ?>" id="remember" />
	          			<label for="remember"><?php echo Text::_('JGLOBAL_REMEMBER_ME'); ?></label>
	        		</p>
	        
	        		<p id="form-login-submit">
	          			<label>&nbsp;</label>
	          			<input type="submit" name="Submit" class="btn btn-primary" value="<?php echo Text::_('JLOGIN'); ?>" />
	        		</p>
	      		</fieldset>
	      
	      	<input type="hidden" name="option" value="com_users" />
	      	<input type="hidden" name="task" value="user.login" />
	      	<input type="hidden" name="return" value="<?php echo base64_encode(URI::base()); ?>" />
	      
	      	<?php echo HTMLHelper::_( 'form.token' ); ?>
	    	</form>
	  	</div>
  	</div>

</body>
</html>