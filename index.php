<?php
/*
 * @package     Joomill Maestro Template
 * @copyright   Copyright (c) Joomill.nl
 * @license     GNU General Public License version 3 or later
 */

// No direct access.
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

// Load Maestro Template Helper
require_once JPATH_THEMES . '/' . $this->template . '/helpers/helper.php';

MaestroHelper::setMetadata();
MaestroHelper::unloadCss();
MaestroHelper::unloadJs();
MaestroHelper::loadCss();
MaestroHelper::loadJs();
MaestroHelper::localstorageFont();
?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <jdoc:include type="head" />
    <script src="https://kit.fontawesome.com/<?php echo $fontawesome; ?>.js" crossorigin="anonymous"></script>
</head>

<body class="<?php echo MaestroHelper::getBodySuffix(); ?>" role="document">
<?php echo MaestroHelper::getAnalytics() ?>

<?php if (($this->countModules('toolbar-l')) | ($this->countModules('toolbar-r'))) : ?>
    <!-- Toolbar -->
    <div id="toolbar" class="toolbar <?php echo $toolbarcolor. " " .$toolbarfontcolor. " " .$toolbarresponsive; ?>">
        <div class="<?php echo $toolbarwidth; ?>">
            <div class="toolbar-l">
                <jdoc:include type="modules" name="toolbar-l" style="<?php echo $toolbarlmodulestyle; ?>" />
            </div>
            <div class="toolbar-r">
                <jdoc:include type="modules" name="toolbar-r" style="<?php echo $toolbarrmodulestyle; ?>" />
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($logoposition == 'logobar') :?>
    <!-- Logobar -->
    <div id="logobar" class="logobar <?php echo $logobarcolor. " " .$logobarpadding; ?> text-<?php echo $logobaralign; ?> clearfix">
        <div class="<?php echo $logobarwidth; ?>">
            <a class="logo" href="<?php echo $this->baseurl; ?>">
                <jdoc:include type="modules" name="logo" style="<?php echo $logomodulestyle; ?>"/>
            </a>
        </div>
    </div>
<?php endif; ?>

<!-- Navigation bar -->
<div class="nav-wrapper">
    <nav id="navbar" class="navbar navbar-default <?php echo $navbarcolor; ?>" role="navigation" <?php if ($stickymenu) : ?> data-spy="affix" data-offset-top="<?php echo $stickymenuoffset; ?>"<?php endif; ?>>
        <div class="<?php echo $navbarwidth; ?>">

            <div class="navbar-collapse-btn navbar-header navbar-logo">
				<?php if ($menutype == 'collapse') :?>
                    <!-- Navbar Collapse Button -->
                    <button type="button" class="navbar-toggle collapse-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
				<?php endif; ?>

				<?php if ($menutype == 'fullscreen') :?>
                    <!-- Fullscreen Button -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="modal"
                            data-target="#navbar-fullscreen" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
				<?php endif; ?>

				<?php if ($menutype == 'offcanvas') :?>
                    <!-- Offcanvas Button -->
                    <button type="button" class="navbar-toggle offcanvas-toggle pull-right" data-toggle="offcanvas"
                            data-target="#navbar-offcanvas" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
				<?php endif; ?>

				<?php if ($logoposition == 'navbar') :?>
                    <!-- Logo -->
                    <a class="logo" href="<?php echo $this->baseurl; ?>">
                        <jdoc:include type="modules" name="logo" style="<?php echo $logomodulestyle; ?>"/>
                    </a>
				<?php endif; ?>
            </div>

            <!-- Navbar Desktop -->
            <div class="navbar-desktop navbar-<?php echo $menualign; ?>">
                <jdoc:include type="modules" name="navbar" style="notitle"/>
            </div>

			<?php if ($menutype == 'collapse') :?>
            <!-- Navbar Collapse -->
            <div id="navbar-collapse" class="collapse navbar-collapse">
                <div class="navbar-mobile">
                    <jdoc:include type="modules" name="mobilemenu-top" style="notitle"/>
                    <jdoc:include type="modules" name="mobilemenu" style="notitle"/>
	                <?php if (!$this->countModules('mobilemenu')): ?>
                        <jdoc:include type="modules" name="navbar" style="notitle"/>
	                <?php endif; ?>
                    <jdoc:include type="modules" name="mobilemenu-bottom" style="notitle"/>
                </div>
            </div>
				<?php endif; ?>

				<?php if ($menutype == 'fullscreen') :?>
                    <!-- Fullscreen Collapse -->
            <div class="modal fade fullscreen" id="navbar-fullscreen"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" >
                            <button type="button" class="close btn btn-link" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
                            <div class="modal-title text-center"><span class="sr-only">main navigation</span></div>
                        </div>
                        <div class="modal-body text-center">
                            <jdoc:include type="modules" name="mobilemenu-top" style="notitle"/>
                            <jdoc:include type="modules" name="mobilemenu" style="notitle"/>
	                        <?php if (!$this->countModules('mobilemenu')): ?>
                                <jdoc:include type="modules" name="navbar" style="notitle"/>
	                        <?php endif; ?>
                            <jdoc:include type="modules" name="mobilemenu-bottom" style="notitle"/>
                        </div>
                    </div>
                </div>
            </div>
			<?php endif; ?>

			<?php if ($menutype == 'offcanvas') :?>
            <div id="navbar-offcanvas" class="navbar-offcanvas navbar-offcanvas-touch navbar-offcanvas-left">
                <div>
                    <jdoc:include type="modules" name="mobilemenu-top" style="notitle"/>
                    <jdoc:include type="modules" name="mobilemenu" style="notitle"/>
	                <?php if (!$this->countModules('mobilemenu')): ?>
                        <jdoc:include type="modules" name="navbar" style="notitle"/>
	                <?php endif; ?>
                    <jdoc:include type="modules" name="mobilemenu-bottom" style="notitle"/>
                </div>
            </div>
			<?php endif; ?>

        </div>
    </nav>
</div>

<main class="main">

	<?php if ($this->countModules('slideshow')): ?>
    <!-- Slideshow -->
    <div id="slideshow" class="slideshow text-center <?php echo $slideshowcolor. " " .$slideshowfontcolor. " " .$slideshowpadding. " " .$slideshowresponsive; ?> clearfix">
        <div class="<?php echo $slideshowwidth; ?>">
            <jdoc:include type="modules" name="slideshow" style="<?php echo $slideshowmodulestyle; ?>" />
        </div>
    </div>
	<?php endif; ?>

	<?php if ($this->countModules('breadcrumbs')): ?>
    <!-- Breadcrumbs -->
    <div id="breadcrumbs" class="breadcrumbs <?php echo $breadcrumbscolor. " " .$breadcrumbsfontcolor. " " .$breadcrumbspadding. " " .$breadcrumbsresponsive; ?>clearfix">
        <div class="<?php echo $breadcrumbswidth; ?>">
            <jdoc:include type="modules" name="breadcrumbs" style="<?php echo $breadcrumbsmodulestyle; ?>"/>
        </div>
    </div>
	<?php endif; ?>

	<?php if ($this->countModules('top-a')): ?>
    <!-- Top-A -->
    <div id="top-a" class="top-a <?php echo $topacolor. " " .$topafontcolor. " " .$topapadding. " " .$toparesponsive; ?> clearfix">
        <div class="<?php echo $topawidth; ?>">
            <jdoc:include type="modules" name="top-a" style="<?php echo $topamodulestyle; ?>" />
        </div>
    </div>
	<?php endif; ?>

	<?php if ($this->countModules('top-b')): ?>
    <!-- Top-B -->
    <div id="top-b" class="top-b <?php echo $topbcolor. " " .$topbfontcolor. " " .$topbpadding. " " .$topbresponsive; ?> clearfix">
        <div class="<?php echo $topbwidth; ?>">
            <jdoc:include type="modules" name="top-b" style="<?php echo $topbmodulestyle; ?>" />
        </div>
    </div>
	<?php endif; ?>

	<?php if ($this->countModules('top-c')): ?>
    <!-- Top-C -->
    <div id="top-c" class="top-c <?php echo $topccolor. " " .$topcfontcolor. " " .$topcpadding. " " .$topcresponsive; ?> clearfix">
        <div class="<?php echo $topcwidth; ?>">
            <jdoc:include type="modules" name="top-c" style="<?php echo $topcmodulestyle; ?>" />
        </div>
    </div>
	<?php endif; ?>

	<?php if ($this->countModules('top-d')): ?>
    <!-- Top-D -->
    <div id="top-d" class="top-d <?php echo $topdcolor. " " .$topdfontcolor. " " .$topdpadding. " " .$topdresponsive; ?> clearfix">
			<div class="<?php echo $topdwidth; ?>">
				<jdoc:include type="modules" name="top-d" style="<?php echo $topdmodulestyle; ?>" />
			</div>
		</div>
		<?php endif; ?>

		<div id="mainbody" class="mainbody <?php echo $mainbodycolor. " " .$mainbodyfontcolor. " " .$mainbodypadding; ?> clearfix">
    <div class="<?php echo $mainbodywidth; ?>">
        <div class="row">

			<?php if ($this->countModules('left')): ?>
                <!-- Sidebar Left -->
                <div id="left" class="sidebar-left col-md-<?php echo $leftwidth. " " .$leftresponsive; ?>">
                    <jdoc:include type="modules" name="left" style="standard" />
                </div>
			<?php endif; ?>

            <!-- Content block -->
            <div id="content" class="col-md-<?php echo $componentwidth;?>">
                <div id="message-component">
                    <jdoc:include type="message" />
                </div>

				<?php if ($this->countModules('content-top')): ?>
                    <!-- Content Top -->
                    <div id="content-top" class="content-top <?php echo $contenttopresponsive; ?>">
                        <jdoc:include type="modules" name="content-top" style="<?php echo $contenttopmodulestyle; ?>" />
                    </div>
				<?php endif; ?>

				<?php
				$app = Factory::getApplication();
				$menu = $app->getMenu();
				$lang = Factory::getLanguage();

				if ($homepagecomponent){ // show on all pages ?>
                    <div id="content-area">
                        <jdoc:include type="component" />
                    </div>
				<?php } else {
					if ($menu->getActive() !== $menu->getDefault($lang->getTag())) { // show on all pages but not the homepage ?>
                        <div id="content-area">
                            <jdoc:include type="component" />
                        </div>
						<?php
					}
				}
				?>

				<?php if ($this->countModules('content-bottom')): ?>
                    <!-- Content Bottom -->
                    <div id="content-bottom" class="content-bottom <?php echo $contentbottomresponsive; ?>">
                        <jdoc:include type="modules" name="content-bottom" style="<?php echo $contentbottommodulestyle; ?>" />
                    </div>
				<?php endif; ?>

            </div>

			<?php if ($this->countModules('right')): ?>
                <!-- Sidebar Right -->
                <div id="right" class="sidebar-right col-md-<?php echo $rightwidth. " " .$rightresponsive; ?>">
                    <jdoc:include type="modules" name="right" style="standard" />
                </div>
			<?php endif; ?>
        </div>
    </div>
    </div>

	<?php if ($this->countModules('bottom-a')): ?>
    <!-- Bottom-A -->
    <div id="bottom-a" class="bottom-a <?php echo $bottomacolor. " " .$bottomafontcolor. " " .$bottomapadding. " " .$bottomaresponsive; ?> clearfix">
        <div class="<?php echo $bottomawidth; ?>">
            <jdoc:include type="modules" name="bottom-a" style="<?php echo $bottomamodulestyle; ?>" />
        </div>
    </div>
	<?php endif; ?>

	<?php if ($this->countModules('bottom-b')): ?>
    <!-- Bottom-B -->
    <div id="bottom-b" class="bottom-b <?php echo $bottombcolor. " " .$bottombfontcolor. " " .$bottombpadding. " " .$bottombresponsive; ?> clearfix">
        <div class="<?php echo $bottombwidth; ?>">
            <jdoc:include type="modules" name="bottom-b" style="<?php echo $bottombmodulestyle; ?>" />
        </div>
    </div>
	<?php endif; ?>

	<?php if ($this->countModules('bottom-c')): ?>
    <!-- Bottom-C -->
    <div id="bottom-c" class="bottom-c <?php echo $bottomccolor. " " .$bottomcfontcolor. " " .$bottomcpadding. " " .$bottomcresponsive; ?> clearfix">
        <div class="<?php echo $bottomcwidth; ?>">
            <jdoc:include type="modules" name="bottom-c" style="<?php echo $bottomcmodulestyle; ?>" />
        </div>
    </div>
	<?php endif; ?>

	<?php if ($this->countModules('bottom-d')): ?>
    <!-- Bottom-D -->
    <div id="bottom-d" class="bottom-d <?php echo $bottomdcolor. " " .$bottomdfontcolor. " " .$bottomdpadding. " " .$bottomdresponsive; ?> clearfix">
        <div class="<?php echo $bottomdwidth; ?>">
            <jdoc:include type="modules" name="bottom-d" style="<?php echo $bottomdmodulestyle; ?>" />
        </div>
    </div>
	<?php endif; ?>
</main>

<!-- Footer -->
<footer>

	<?php if ($this->countModules('footer-menu')): ?>
        <!-- Footer Menu -->
        <div id="footer-menu" class="footer-menu <?php echo $footermenucolor. " " .$footermenufontcolor. " " .$footermenupadding. " " .$footermenuresponsive; ?> clearfix">
            <div class="<?php echo $footermenuwidth; ?>">
                <jdoc:include type="modules" name="footer-menu" style="<?php echo $footermenumodulestyle; ?>" />
            </div>
        </div>
	<?php endif; ?>

    <!-- Copyright -->
    <div id="copyright" class="copyright <?php echo $copyrightcolor. " " .$copyrightfontcolor. " " .$copyrightpadding; ?> clearfix">
        <div class="<?php echo $copyrightwidth; ?> text-<?php echo $copyrightalign; ?>">
            <jdoc:include type="modules" name="copyright" style="<?php echo $copyrightmodulestyle; ?>" />
            <jdoc:include type="modules" name="cookies" style="notitle" />
        </div>
    </div>
</footer>

<jdoc:include type="modules" name="debug" style="notitle" />

<?php if ($backtotopshow){ ?>
    <!-- Back to Top Button -->
    <a id="back-to-top" href="#" class="back-to-top btn btn-primary btn-sm" role="button"><i class="fas fa-angle-up"></i></a>

    <script>
        // Javascript for Scroll to Top function
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 300) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });
            // scroll body to 0px on click
            $('#back-to-top').click(function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });

        });
    </script>

<?php } ?>

<?php if ($animatecss){ ?>
    <!-- Animated CSS on Scroll -->
    <script>
        new WOW().init();
    </script>
<?php } ?>

</body>
</html>