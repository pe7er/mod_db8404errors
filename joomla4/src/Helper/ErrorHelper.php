<?php
/**
 * @package     mod_db8404errors
 * @author      Peter Martin, https://db8.nl
 * @copyright   Copyright (C) 2015-2022 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

namespace Db8\Module\Db8404errors\Administrator\Helper;

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;

/**
 * Helper for mod_db8_404errors
 *
 * @since 1.4.0
 */
abstract class ErrorHelper
{
    /**
     * Gets a list of 404 Errors from Redirect Manager
     *
     * @param array $params Parameters
     *
     * @return  mixed
     * @since   1.4.0
     */
    public static function getItems(&$params)
    {
        $db = Factory::getContainer()->get('DatabaseDriver');
        $query = $db->getQuery(true)
            ->select(
                $db->quoteName(
                    [
                        'id',
                        'old_url',
                        'new_url',
                        'referer',
                        'hits',
                        'published',
                        'created_date'
                    ]
                )
            )
            ->from(
                $db->quoteName('#__redirect_links')
            );

        if ($params->get('show') < 3) {
            $query->where(
                $db->quoteName('published') . ' = ' . $params->get('show')
            );
        }

        $query->order(
            $db->escape(
                $params->get('ordering', 'hits')
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

        return $db->loadObjectList();
    }
}
