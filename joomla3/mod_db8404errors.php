<?php
/**
 * @package     mod_db8404errors
 * @author      Peter Martin, https://db8.nl
 * @copyright   Copyright (C) 2015-2022 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

use Joomla\CMS\Helper\ModuleHelper;

defined('_JEXEC') or die;

require_once __DIR__ . '/helper.php';

$list = ModDb8404errorsHelper::getItems($params);

require ModuleHelper::getLayoutPath('mod_db8404errors', $params->get('layout', 'default'));
