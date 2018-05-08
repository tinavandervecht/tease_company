<?php
defined('C5_EXECUTE') or die('Access Denied.');
$nh = Loader::helper('navigation');
?>

<h1 class="services_page_list_title">
    <img class="icon" src="<?php echo $this->getThemePath(); ?>/images/icons/heart-coral.svg" alt="icon">
    <em><strong><?php echo $controller->pageListTitle; ?></strong></em>
</h1>
<p>
    *** all prices are subject to tax ***
</p>
<?php foreach ($pages as $i => $page) : ?>
    <h2 class="service_title h1 text-primary clearfix"
     id="<?php echo str_replace(' ', '_', strtolower($page->getCollectionName())); ?>_section"
     >
        <em class="pull-left"><strong><?php echo $page->getCollectionName();  ?></strong></em>
        <?php if (! $page->getCollectionAttributeValue('page_links_to_parent_section')): ?>
            <a class="style_button pull-left" href="<?php echo $nh->getCollectionURL($page); ?>">Learn more</a>
        <?php endif; ?>
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
        <?php if($service->getCollectionName()) : ?>
            <div class="service_item">
                <div class="name">
                    <?php echo $service->getCollectionName();  ?>
                </div>
                <div class="breakline"></div>
                <div class="price">
                    $<?php echo $service->getAttribute('price'); ?>+
                </div>
            </div>
            <?php if($service->getCollectionDescription()) : ?>
            <p>
                <?php echo $service->getCollectionDescription(); ?>
            </p>
            <?php endif; ?>
        <?php else: ?>
            <br />
        <?php endif; ?>
    <?php endforeach; ?>
<?php endforeach; ?>
