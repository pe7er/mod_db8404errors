<?php
/**
 * @package     mod_db8404errors
 * @author      Peter Martin, https://db8.nl
 * @copyright   Copyright (C) 2015-2022 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

$moduleId = str_replace(' ', '', $module->title) . $module->id;
?>
<table class="table" id="<?php echo str_replace(' ', '', $module->title) . $module->id; ?>">
    <caption class="visually-hidden"><?php echo $module->title; ?></caption>
    <thead>
    <tr>
        <th scope="col" class="w-60"><?php echo Text::_('JGLOBAL_TITLE'); ?></th>
        <th scope="col" class="w-20"><?php echo Text::_('MOD_DB8404ERRORS_FIELD_VALUE_ORDERING_404HITS'); ?></th>
        <th scope="col" class="w-20"><?php echo Text::_('JDATE'); ?></th>
    </tr>
    </thead>
    <tbody>

    <?php if (count($list)) : ?>
        <?php foreach ($list as $i => $item) : ?>

            <?php $item->link = Route::_('index.php?option=com_redirect&task=link.edit&id=' . $item->id); ?>

            <?php $hits = (int)$item->hits; ?>
            <?php $hits_class = ($hits >= 25 ? 'error' : ($hits >= 10 ? 'warning' : ($hits >= 5 ? 'info' : 'secondary'))); ?>
            <tr>
                <th scope="row">
                    <strong class="row-title break-word">
                        <?php if ($item->link) : ?>
                            <a href="<?php echo $item->link; ?>">
                                <?php echo str_replace(Uri::root(), '', rawurldecode($item->old_url)); ?>
                            </a>
                        <?php else : ?>
                            <?php echo str_replace(Uri::root(), '', rawurldecode($item->old_url)); ?>
                        <?php endif; ?>
                    </strong>
                </th>
                <td>
                    <span class="badge bg-<?php echo $hits_class; ?>"><?php echo $item->hits; ?></span>
                </td>
                <td>
                    <?php echo HTMLHelper::_('date', $item->created_date, Text::_('DATE_FORMAT_LC4')); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="3">
                <div class="alert"><?php echo Text::_('MOD_DB8404ERRORS_NO_MATCHING_RESULTS'); ?></div>
            </td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
