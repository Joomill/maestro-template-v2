<?php
/*
 * @package     Joomill Maestro Template
 * @copyright   Copyright (c) Joomill.nl
 * @license     GNU General Public License version 3 or later
 */

defined('JPATH_PLATFORM') or die;
JFormHelper::loadFieldClass('list');

/**
 * Extends Joomla! Form Fields, adding possibility to select a google font to render content
 */
class JFormFieldJMFonts extends JFormFieldList
{
	/**
	 * @var string
	 */
	protected $type = 'JMFonts';

	/**
	 * Function to call the gfonts api
	 * @method getFonts
	 *
	 * @return array
	 */

	public static function getFonts() {
			$fonts = @file_get_contents(JPATH_ROOT . '/templates/maestro/elements/gfonts.json');
			$fonts = json_decode($fonts);
			$list = array();

			foreach ($fonts->items as $item) {
				if (!empty($item->family)) {
					$list[] = array(
						'family'  => $item->family,
						'variant' => $item->variants
					);
				}
			}

			$application = JFactory::getApplication();

			return $list;

		return array();
	}

	/**
	 * we don't need to call the api every time, we store the results in cache
	 * @method getOptions
	 *
	 * @return object
	 */
	public function getOptions() {
		$fonts = JFormFieldJMFonts::getFonts();

		foreach ($fonts as $font)
		{
			$url       = str_replace(' ', '+', $font['family']) . ':' . implode(',', $font['variant']);
			$options[] = JHtml::_('select.option', $url, $font['family']);
		}

		return $options;
	}
}