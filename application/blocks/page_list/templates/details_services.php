<?php
defined('C5_EXECUTE') or die('Access Denied.');
?>

<h1 class="services_page_list_title">
    <img class="icon" src="<?php echo $this->getThemePath(); ?>/images/icons/heart-coral.svg" alt="icon">
    <em><strong><?php echo $controller->pageListTitle; ?></strong></em>
</h1>
<p>
    *** all prices are subject to tax ***
</p>
<?php foreach ($pages as $i => $page) : ?>
    <?php if($page->getCollectionName()) : ?>
        <div class="service_item detailed_services_item">
            <div class="name">
                <?php echo $page->getCollectionName();  ?>
            </div>
            <div class="breakline"></div>
            <div class="price">
                $<?php echo $page->getAttribute('price'); ?>+
            </div>
        </div>
        <?php if($page->getCollectionDescription()) : ?>
        <p>
            <?php echo $page->getCollectionDescription(); ?>
        </p>
        <?php endif; ?>
    <?php else: ?>
        <br />
    <?php endif; ?>
<?php endforeach; ?>
