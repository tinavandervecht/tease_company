<?php
defined('C5_EXECUTE') or die('Access Denied.'); ?>

<h1>
    <span class="icon-heart text-primary"></span>
    <em><strong><?php echo $controller->pageListTitle; ?></strong></em>
</h1>
<?php foreach ($pages as $i => $page) : ?>
    <h2 class="service_title h1 text-primary">
        <em><strong><?php echo $page->getCollectionName();  ?></strong></em>
    </h2>

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
