<?php
defined('C5_EXECUTE') or die('Access Denied.'); ?>

<?php foreach ($pages as $i => $page) : ?>
<?php if ($page->getCollectionAttributeValue('page_links_to_parent_section')) :
    $parent = Page::getByID($page->getCollectionParentID());
    $url = $nh->getLinkToCollection($parent) . '#' . str_replace(' ', '_', strtolower($page->getCollectionName()));
else :
    $url = $nh->getLinkToCollection($page);
endif; ?>
    <div>
        <a
            href="<?php echo $url; ?>"
            class="sub_nav_item"
        >
            <em><?php echo $page->getCollectionName();  ?></em>
        </a>
    </div>
<?php endforeach; ?>
