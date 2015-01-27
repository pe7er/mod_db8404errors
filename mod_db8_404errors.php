<?php
/**
 * @package     mod_db8_404errors
 * @author      Peter Martin, www.db8.nl
 * @copyright   Copyright (C) 2015 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */
defined('_JEXEC') or die;

// Include dependencies.
require_once __DIR__ . '/helper.php';

// Get module data.
$list = ModDb8404errorsHelper::getItems($params);

// Render the module
require JModuleHelper::getLayoutPath('mod_db8_404errors', $params->get('layout', 'default'));
