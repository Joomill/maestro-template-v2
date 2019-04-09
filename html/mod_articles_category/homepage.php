<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>


<div class="latest-news row">

	<?php foreach ($list as $item) :
		$images   = json_decode($item->images);
	?>

	<div class="block col-md-4">
		<div class="news-item">
			<a href="<?php echo $item->link; ?>">
				<div class="news-item-image">
					<img src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>">
				</div>
			</a>

				<div class="news-item-content">
					<div class="news-item-title">
						<a href="<?php echo $item->link; ?>">
							<h4 class="news-item-title text-truncate"><?php echo(substr($item->title, 0, 80)).''; ?></h4>
						</a>
					</div>
					
					<div class="date-meta">
						<span><?= JHtml::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC3')); ?></span>
					</div>
					
					<?php if ($params->get('show_introtext')) : ?>
						<div class="news-item-introtext">
							<?php echo $item->displayIntrotext; ?>
						</div>
					<?php endif; ?>
					
					<div class="news-item-readmore">
						<a href="<?php echo $item->link; ?>" class="btn btn-primary">
							Lees meer
						</a>
					</div>
					
				</div>
		</div>
	</div>

	<?php endforeach; ?>
</div>
