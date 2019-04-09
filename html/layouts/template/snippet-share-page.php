<?php
defined('JPATH_BASE') or die;
$url = JURI::current();
$title = $displayData['item']->title;
$title = str_replace('&', 'and', $title);
$title = str_replace('| ', '', $title);
$inline = isset($displayData['inline']) ? $displayData['inline'] : false;
?>

<?php if ($displayData['title'] && !$inline) : ?>
<p class="article-meta-label"><?php echo $displayData['title']; ?></p>
<?php endif; ?>
<ul class="list-inline share-buttons">
	<?php if ($inline) : ?>
        <li class="share-title">
	        <?php echo $displayData['title']; ?>
        </li>
    <?php endif;?>
	<?php if ($displayData['twitter'] == "1") : ?>
		<li class="share-twitter">
			<a href="https://twitter.com/intent/tweet?url=<?php echo $url; ?>
				<?php if ($displayData['twitterhandler']) : ?>&via=<?php echo $displayData['twitterhandler']; ?><?php endif; ?>
				&text=<?php echo $title; ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=400');return false;">
                <i class="fab fa-twitter-square" aria-hidden="true"></i>
			</a>
		</li>
	<?php endif; ?>

	<?php if ($displayData['facebook'] == "1") : ?>
		<li class="share-facebook">
			<a href="http://www.facebook.com/sharer.php?u=<?php echo $url; ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=400');return false;">
                <i class="fab fa-facebook-square" aria-hidden="true"></i>
			</a>
		</li>
	<?php endif; ?>

	<?php if ($displayData['linkedin'] == "1") : ?>
        <li class="share-linkedin">
            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo $title; ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=400');return false;">
                <i class="fab fa-linkedin" aria-hidden="true"></i>
            </a>
        </li>
	<?php endif; ?>

	<?php if ($displayData['google'] == "1") : ?>
		<li class="share-google">
			<a href="https://plus.google.com/share?url=<?php echo $url; ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=400');return false;">
                <i class="fab fa-google-plus-square" aria-hidden="true"></i>
			</a>
		</li>
	<?php endif; ?>

	<?php if ($displayData['email'] == "1") : ?>
		<li class="share-email">
			<a href="mailto:?subject=<?php echo $title; ?>&amp;body=Titel: <?php echo $title; ?> <br/> URL:<?php echo $url; ?>">
                <i class="fas fa-envelope-square" aria-hidden="true"></i>
			</a>
		</li>
	<?php endif; ?>

	<?php if ($displayData['whatsapp'] == "1") : ?>
        <li class="share-whatsapp">
			<?php $mobile_agents = '!(tablet|pad|mobile|phone|symbian|android|ipod|ios|blackberry|webos)!i';
			if (preg_match($mobile_agents, $_SERVER['HTTP_USER_AGENT'])) {?>
                <a  target="_blank" href="https://api.whatsapp.com/send?text=<?php echo $title; ?>%20<?php echo $url; ?>">
                    <i class="fab fa-whatsapp-square" aria-hidden="true"></i>
                </a>
			<?php } else { ?>
                <a  target="_blank" href="https://web.whatsapp.com/send?text=<?php echo $title; ?>%20<?php echo $url; ?>">
                    <i class="fab fa-whatsapp-square" aria-hidden="true"></i>
                </a>
			<?php } ?>
        </li>
	<?php endif; ?>

	<?php if ($displayData['qrcode'] == "1") : ?>
		<li class="share-qrcode">
			<a href="https://chart.googleapis.com/chart?cht=qr&chs=350x350&chld=L&choe=UTF-8&chl=<?php echo $url; ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=400');return false;">
                  <i class="far fa-qrcode"></i>
                </span>
			</a>
		</li>
	<?php endif; ?>
	
</ul>