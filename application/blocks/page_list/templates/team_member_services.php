<?php
defined('C5_EXECUTE') or die('Access Denied.'); ?>

<h1>
    <span class="icon-heart text-primary"></span>
    <em><strong><?php echo $controller->pageListTitle; ?></strong></em>
</h1>
<?php foreach ($pages as $i => $page) : ?>
    <h2 class="service_title h1">
        <em><strong><?php echo $page->getCollectionName();  ?></strong></em>
    </h2>

    <?php
        $pl = new PageList();
        $pl->filterByParentID($page->getCollectionID());
        $pl->sortByDisplayOrder();
        $services = $pl->get();
    ?>

    <?php foreach (array_chunk($services, 3) as $group): ?>
        <div class="row">
            <?php foreach($group as $service): ?>
                <div class="col-md-4 col-sm-6">
                    <div class="member_service_item text-center">
                        <div class="icon">
                            <div class="price">
                                $<?php echo $service->getAttribute('price'); ?>
                            </div>
                        </div>
                        <div class="name">
                            <?php echo $service->getCollectionName();  ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>
