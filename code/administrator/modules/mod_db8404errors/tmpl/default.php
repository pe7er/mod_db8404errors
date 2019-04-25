<?php
/**
 * @package     Mod_Db8404errors
 * @author      Peter Martin <joomla@db8.nl>
 * @copyright   Copyright (C) 2015-2019 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 * @link        www.db8.nl
 */

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

defined('_JEXEC') or die;

HTMLHelper::_('bootstrap.tooltip');
?>
<div class="row-striped">

	<?php if (count($list)) : ?>
		<?php foreach ($list as $i => $item) : ?>

			<?php $item->link = Route::_('index.php?option=com_redirect&task=link.edit&id=' . $item->id); ?>

			<?php $hits = (int) $item->hits; ?>
			<?php $hits_class = ($hits >= 25 ? 'important' : ($hits >= 10 ? 'warning' : ($hits >= 5 ? 'info' : ''))); ?>
			<div class="row-fluid">
				<div class="span9">
					<span class="badge badge-<?php echo $hits_class; ?> hasTooltip" title="<?php echo HTMLHelper::tooltipText('JGLOBAL_HITS'); ?>">
						<?php echo $item->hits; ?>
					</span>
					<strong class="row-title break-word">
						<?php if ($item->link) : ?>
							<a href="<?php echo $item->link; ?>">
								<?php echo str_replace(Uri::root(), '', rawurldecode($item->old_url)); ?>
							</a>
						<?php else : ?>
							<?php echo str_replace(Uri::root(), '', rawurldecode($item->old_url)); ?>
						<?php endif; ?>
					</strong>
				</div>
				<div class="span3">
					<span class="small">
						<i class="icon-calendar"></i>
						<?php echo HTMLHelper::_('date', $item->created_date, Text::_('DATE_FORMAT_LC4')); ?>
					</span>
				</div>
			</div>

		<?php endforeach; ?>

	<?php else : ?>

		<div class="row-fluid">
			<div class="span12">
				<div class="alert"><?php echo Text::_('MOD_DB8404ERRORS_NO_MATCHING_RESULTS'); ?></div>
			</div>
		</div>

	<?php endif; ?>

</div>
