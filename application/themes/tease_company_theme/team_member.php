<?php
defined('C5_EXECUTE') or die("Access Denied.");

$this->inc('elements/header.php');
$page = Page::getCurrentPage();
?>

<section id="team_member_overview" class="section_padding _top large_line_height">
    <div class="container">
        <div class="row">
            <div class="col-md-12 overview_wrapper">
                <div class="overview_content">
                    <?php if ($page->getAttribute('avatar')): ?>
                        <div class="avatar">
                            <div class="image_wrapper">
                                <img class="icon" src="<?php echo $this->getThemePath(); ?>/images/icons/heart-pink.svg" alt="icon">
                                <img class="member_avatar" src="<?php echo $page->getAttribute('avatar')->getVersion()->getRelativePath(); ?>" />
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="team_member_overview">
                        <div class="content p-l-4 p-r-4 p-b-1 p-t-1">
                            <h1><em><strong><?php echo $page->getCollectionName(); ?></strong></em></h1>
                            <h2><em><?php echo $page->getAttribute('job_title'); ?></em></h2>
                            <div class="p-b-2">
                                <ul class="list-inline">
                                    <?php if($page->getAttribute('instagram_url')): ?>
                                        <li>
                                            <a target="_blank" href="<?php echo $page->getAttribute('instagram_url'); ?>">
                                                <span class="fa fa-instagram fa-lg"></span>
                                            </a>
                                        </li>
                                    <?php endif;?>
                                    <?php if($page->getAttribute('facebook_url')): ?>
                                        <li>
                                            <a target="_blank" href="<?php echo $page->getAttribute('facebook_url'); ?>">
                                                <span class="fa fa-facebook fa-lg"></span>
                                            </a>
                                        </li>
                                    <?php endif;?>
                                </ul>
                                <?php if($page->getAttribute('service_link')): ?>
                                    <a href="<?php echo $page->getAttribute('service_link'); ?>" class="service_link">View Services</a>
                                <?php endif; ?>
                            </div>
                            <?php echo $page->getAttribute('wysiwyg_description'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="p-b-10 p-t-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                    $a = new Area('Member Content');
                    $a->display($c);
                ?>
            </div>
        </div>
    </div>
</section>
<?php
$this->inc('elements/footer.php');
