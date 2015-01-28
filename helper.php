<?php
/**
 * @package     mod_db8_404errors
 * @author      Peter Martin, www.db8.nl
 * @copyright   Copyright (C) 2015 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

defined('_JEXEC') or die;

/**
 * Helper for mod_db8_404errors
 */
abstract class ModDb8404errorsHelper
{
    /**
     * Gets a list of 404 Errors from Redirect Manager
     */
    public static function getItems(&$params)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('a.id, a.old_url, a.new_url, a.referer, a.hits, a.published, a.created_date');
        $query->from('#__redirect_links AS a');
        if ($params->get('show') < 3) {
            $query->where('a.published = ' . $params->get('show'));
        }
        $query->order($db->escape($params->get('ordering', 'a.hits')) . ' ' . $db->escape($params->get('direction', 'DESC')));
        $db->setQuery($query, 0, intval($params->get('count', 5)));
        $list = $db->loadObjectList();

        return $list;
    }
}

