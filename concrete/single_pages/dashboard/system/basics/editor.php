<?php defined('C5_EXECUTE') or die("Access Denied.");?>
<form method="post" class="ccm-dashboard-content-form" action="<?=$view->action('submit')?>">
	<?=$this->controller->token->output('submit')?>
	<fieldset>
		<label class="control-label"><?=t('concrete5 Extensions')?></label>
		<div class="checkbox">
			<label>
				<?=$form->checkbox('enable_filemanager', 1, $filemanager)?> <?=t('Enable file selection from file manager.')?>
			</label>
		</div>
		<div class="checkbox">
			<label>
				<?=$form->checkbox('enable_sitemap', 1, $sitemap)?> <?=t('Enable page selection from sitemap.')?>
			</label>
		</div>
	</fieldset>
	<fieldset>
		<label class="control-label"><?=t('Editor Plugins')?></label>
		<?php
		foreach ($plugins as $key => $plugin) {
			if (!in_array($key, $selected_hidden)) {
		?>
		<div class="checkbox">
			<label>
				<?=$form->checkbox('plugin[]', $key, $manager->isSelected($key))?> <?=$plugin->getName()?>
			</label>
		</div>
		<?php
			}
		}
		?>
	</fieldset>
	<div class="ccm-dashboard-form-actions-wrapper">
		<div class="ccm-dashboard-form-actions">
			<button class="pull-right btn btn-primary" type="submit" ><?=t('Save')?></button>
		</div>
	</div>
</form>
