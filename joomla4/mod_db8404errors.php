<?php
/**
 * @package     mod_db8404errors
 * @author      Peter Martin, https://db8.nl
 * @copyright   Copyright (C) 2015-2022 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

defined('_JEXEC') or die;

use Db8\Module\Db8404errors\Administrator\Helper\ErrorHelper;
use Joomla\CMS\Helper\ModuleHelper;

$list = ErrorHelper::getItems($params);

require ModuleHelper::getLayoutPath('mod_db8404errors', $params->get('layout', 'default'));
