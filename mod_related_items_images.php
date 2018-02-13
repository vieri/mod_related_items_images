<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_related_items_images
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the related items functions only once
JLoader::register('ModRelatedItemsHelper', __DIR__ . '/helper.php');

$cacheparams = new stdClass;
$cacheparams->cachemode = 'safeuri';
$cacheparams->class = 'ModRelatedItemsHelper';
$cacheparams->method = 'getList';
$cacheparams->methodparams = $params;
$cacheparams->modeparams = array('id' => 'int', 'Itemid' => 'int');

$items = JModuleHelper::moduleCache($module, $params, $cacheparams);

if (!count($items))
{
	return;
}

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
$layout = $params->get('layout', 'default');
switch((int)$params->get('framework', 1))
{
    case 2: $layout .= '_bootstrap2'; break;
}

require JModuleHelper::getLayoutPath('mod_related_items_images', $params->get('layout', 'default'));
