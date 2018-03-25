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
            <?php if ($page->getAttribute('avatar')): ?>
                <div class="avatar has_image"
                    style="background-image:url(<?php echo $page->getAttribute('avatar')->getVersion()->getRelativePath(); ?>);">
                </div>
            <?php else: ?>
                <div class="avatar"></div>
            <?php endif; ?>
            <em><?php echo $page->getCollectionName();  ?></em>
            <br />
            <small><?php echo $page->getAttribute('job_title'); ?></small>
        </a>
    </div>
<?php endforeach; ?>
