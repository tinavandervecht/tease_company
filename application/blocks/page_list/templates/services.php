<?php
defined('C5_EXECUTE') or die('Access Denied.'); ?>

<h1 class="services_page_list_title">
    <img class="icon" src="<?php echo $this->getThemePath(); ?>/images/icons/heart-coral.svg" alt="icon">
    <em><strong><?php echo $controller->pageListTitle; ?></strong></em>
</h1>
<p>
    *** all prices are subject to tax ***
</p>
<?php foreach ($pages as $i => $page) : ?>
    <h2 class="service_title h1 text-primary"
     id="<?php echo str_replace(' ', '_', strtolower($page->getCollectionName())); ?>_section"
     >
        <em><strong><?php echo $page->getCollectionName();  ?></strong></em>
    </h2>
    <p>
        <?php echo $page->getCollectionDescription(); ?>
    </p>

    <?php
        $pl = new PageList();
        $pl->filterByParentID($page->getCollectionID());
        $pl->sortByDisplayOrder();
        $services = $pl->get();
    ?>

    <?php foreach ($services as $service): ?>
        <div class="service_item">
            <div class="name">
                <?php echo $service->getCollectionName();  ?>
            </div>
            <div class="breakline"></div>
            <div class="price">
                $<?php echo $service->getAttribute('price'); ?>+
            </div>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>
