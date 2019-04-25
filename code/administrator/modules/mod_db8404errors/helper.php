<?php
/**
 * @package     Mod_Db8404errors
 * @author      Peter Martin <joomla@db8.nl>
 * @copyright   Copyright (C) 2015-2019 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 * @link        www.db8.nl
 */

use Joomla\CMS\Factory;

defined('_JEXEC') or die;

/**
 * Helper for mod_db8_404errors
 *
 * @since 1.0.0
 */
abstract class ModDb8404errorsHelper
{
	/**
	 * Gets a list of 404 Errors from Redirect Manager
	 *
	 * @param   array $params Parameters
	 *
	 * @return mixed
	 */
	public static function getItems(&$params)
	{
		$db    = Factory::getDbo();
		$query = $db->getQuery(true);
		$query->select(
			array(
				$db->quoteName('a.id'),
				$db->quoteName('a.old_url'),
				$db->quoteName('a.new_url'),
				$db->quoteName('a.referer'),
				$db->quoteName('a.hits'),
				$db->quoteName('a.published'),
				$db->quoteName('a.created_date')
			)
		)
			->from(
				$db->quoteName('#__redirect_links', 'a')
			);

		if ($params->get('show') < 3)
		{
			$query->where(
				$db->quoteName('a.published') . ' = ' . $params->get('show')
			);
		}

		$query->order(
			$db->escape(
				$params->get('ordering', 'a.hits')
			)
			. ' ' . $db->escape(
				$params->get('direction', 'DESC')
			)
		);
		$db->setQuery(
			$query, 0, intval(
				$params->get('count', 5)
			)
		);
		$list = $db->loadObjectList();

		return $list;
	}
}

