<?php defined('C5_EXECUTE') or die("Access Denied.");
$c = Page::getCurrentPage();
if ($c->isEditMode()) :
    $loc = Localization::getInstance();
    $loc->pushActiveContext(Localization::CONTEXT_UI);
    ?>
    <div class="ccm-edit-mode-disabled-item" style="<?php echo isset($width) ? "width: $width;" : '' ?><?php echo isset($height) ? "height: $height;" : '' ?>">
        <i style="font-size:40px; margin-bottom:20px; display:block;" class="fa fa-picture-o" aria-hidden="true"></i>
        <div style="padding: 40px 0px 40px 0px"><?php echo t('Image Slider disabled in edit mode.')?>
			<div style="margin-top: 15px; font-size:9px;">
				<i class="fa fa-circle" aria-hidden="true"></i>
				<?php if (count($rows) > 0) { ?>
					<?php foreach (array_slice($rows, 1) as $row) { ?>
						<i class="fa fa-circle-thin" aria-hidden="true"></i>
						<?php }
					}
				?>
			</div>
        </div>
    </div>
    <?php
    $loc->popActiveContext();
else : ?>
<h1 class="gallery_list_title"><strong><em>gallery</em></strong></h1>
<div class="gallery_list_slider">
    <?php foreach (array_chunk($rows, 6) as $group) : ?>
        <div>
            <?php foreach (array_chunk($group, 3) as $subGroup) : ?>
                <div class="row">
                    <?php foreach($subGroup as $slide) : ?>
                        <div class="col-md-4">
                            <?php $f = File::getByID($slide['fID']); ?>
                            <?php if (is_object($f)) : ?>
                                <div class="gallery_item" style="background:url(<?php echo BASE_URL . Core::make('html/image', array($f, false))->getTag()->src; ?>)">
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
