<?php
defined('C5_EXECUTE') or die('Access Denied.'); ?>

<?php foreach ($pages as $i => $page) : ?>
    <li>
        <a
            href="<?php echo $nh->getLinkToCollection($page); ?>"
        >
            <?php echo $page->getCollectionName();  ?>
        </a>
    </li>
<?php endforeach; ?>
