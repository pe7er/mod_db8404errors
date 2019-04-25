<?php
/**
 * @package     Mod_Db8404errors
 * @author      Peter Martin <joomla@db8.nl>
 * @copyright   Copyright (C) 2015-2019 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 * @link        www.db8.nl
 */

use Joomla\CMS\Helper\ModuleHelper;

defined('_JEXEC') or die;

// Include dependencies.
require_once __DIR__ . '/helper.php';

// Get module data.
$list = ModDb8404errorsHelper::getItems($params);

// Render the module
require ModuleHelper::getLayoutPath('mod_db8404errors', $params->get('layout', 'default'));
