<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_related_items
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$colum = 4;
switch($params->get('count'))
{
    case 1: $colum = 12; break;
    case 2: $colum = 6; break;
    case 3: $colum = 4; break;
    case 4: $colum = 3; break;
    default: $colum = 4;
}

?>

<div class="row <?php echo $moduleclass_sfx; ?>">
	<?php foreach ($items as $item) : ?>
		<div class="col-xs-12 col-sm-6 col-md-<?php echo $colum; ?> col-lg-<?php echo $colum; ?>" itemscope itemtype="https://schema.org/Article">
			<?php if($params->get('show_image') != 'off'): ?>
                <?php
                $images = json_decode($item->images);
                $image = $images->image_intro;
                $alt = $images->image_intro_alt ? $images->image_intro_alt : $item->title;
                if($params->get('show_image') == 'fulltext')
                {
                    $image = $images->image_fulltext;
                    $alt = $images->image_fulltext_alt ? $images->image_fulltext_alt : $item->title;
                }
                ?>
                <?php if($params->get('link_image')): ?>
                    <a href="<?php echo $item->route; ?>" itemprop="url">
                        <img class="img-responsive center-block" data-src="<?php echo $image; ?>" src="<?php echo $image; ?>" alt="<?php echo $alt; ?>">
                    </a>
                <?php else: ?>
                    <img class="img-responsive center-block" data-src="<?php echo $image; ?>" src="<?php echo $image; ?>" alt="<?php echo $alt; ?>">
                <?php endif; ?>
            <?php endif; ?>
			<?php if($params->get('show_title')): ?>
				<a href="<?php echo $item->route; ?>" itemprop="ulr">
					<h4 class="text-center"><?php echo $item->title; ?></h4>
				</a>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>