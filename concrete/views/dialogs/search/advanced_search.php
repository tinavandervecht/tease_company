<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<div class="ccm-ui ccm-search-fields-advanced-dialog">

    <?php echo Core::make('helper/concrete/ui')->tabs(array(
        array('fields', t('Filters'), true),
        array('columns', t('Customize Results'))
    ));?>

    <form class="ccm-search-fields ccm-search-fields-none" data-form="advanced-search" method="post" action="<?=$controller->getSubmitAction()?>">

    <div class="ccm-tab-content" id="ccm-tab-content-fields">

            <div class="form-group">
                <button class="btn btn-primary" type="button" data-button-action="add-field"><?=t('Add Field')?></button>
            </div>
            <!-- <hr/> -->
            <div data-container="search-fields" class="ccm-search-fields-advanced">

            </div>
    </div>

    <div class="ccm-tab-content" id="ccm-tab-content-columns">
        <?php
        print $customizeElement->render();
        ?>
    </div>
    </form>


    <div class="dialog-buttons">
        <button class="btn btn-default pull-left" data-dialog-action="cancel"><?=t('Cancel')?></button>
        <button type="button" onclick="$('form[data-form=advanced-search]').trigger('submit')" class="btn btn-primary pull-right"><?=t('Search')?></button>
        <?php if ($supportsSavedSearch) { ?>
            <button type="button" data-button-action="save-search-preset" class="btn btn-success pull-right"><?=t('Save as Search Preset')?></button>
        <?php } ?>
    </div>


</div>

<?php if ($supportsSavedSearch) { ?>
<div style="display: none">
    <div data-dialog="save-search-preset" class="ccm-ui">
        <form data-form="save-preset" action="<?=$controller->action('save_preset')?>" method="post">
            <div class="form-group">
                <?php $form = Core::make('helper/form'); ?>
                <?=$form->label('presetName', t('Name'))?>
                <?=$form->text('presetName')?>
            </div>
        </form>
        <div class="dialog-buttons">
            <button class="btn btn-default pull-left" onclick="jQuery.fn.dialog.closeTop()"><?=t('Cancel')?></button>
            <button class="btn btn-primary pull-right" data-button-action="save-search-preset-submit"><?=t('Save Preset')?></button>
        </div>
    </div>
</div>
<?php } ?>

<script type="text/template" data-template="search-field-row">
    <div class="ccm-search-fields-row">
        <select data-action="<?=$controller->getAddFieldAction()?>" name="field[]" class="ccm-search-choose-field form-control">
            <option value=""><?=t('** Select Field')?></option>
            <?php foreach($manager->getGroups() as $group) { ?>
                <optgroup label="<?=$group->getName()?>">
                    <?php foreach($group->getFields() as $field) { ?>
                        <option value="<?=$field->getKey()?>" <% if (typeof(field) != 'undefined' && field.key == '<?=$field->getKey()?>') { %> selected <% } %>><?=$field->getDisplayName()?></option>
                    <?php } ?>
                </optgroup>
            <?php } ?>
        </select>
        <div class="form-group"><% if (typeof(field) != 'undefined') { %><%=field.element%><% } %></div>
        <a data-search-remove="search-field" class="ccm-search-remove-field" href="#"><i class="fa fa-minus-circle"></i></a>
    </div>
</script>

<script type="text/json" data-template="default-query">
    <?=$defaultQuery?>
</script>
