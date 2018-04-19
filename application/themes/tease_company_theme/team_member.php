<?php
defined('C5_EXECUTE') or die("Access Denied.");

$this->inc('elements/header.php');
$page = Page::getCurrentPage();
?>

<section id="team_member_overview" class="section_padding _top large_line_height">
    <div class="container">
        <div class="row">
            <div class="<?php echo $page->getAttribute('avatar') ? 'col-sm-7 col-sm-push-5 p-l-0' : 'col-md-12'; ?> large_line_height match_height">
                <div class="team_member_overview">
                    <div class="content p-l-4 p-r-4 p-b-1">
                        <h1><em><strong><?php echo $page->getCollectionName(); ?></strong></em></h1>
                        <h2><em><?php echo $page->getAttribute('job_title'); ?></em></h2>
                        <p>
                            <?php echo $page->getCollectionDescription(); ?>
                        </p>
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
                    </div>
                </div>
            </div>
            <?php if ($page->getAttribute('avatar')): ?>
                <div class="col-sm-5 col-sm-pull-7 p-r-0 match_height align_image_bottom">
                    <img class="icon" src="<?php echo $this->getThemePath(); ?>/images/icons/heart-pink.svg" alt="icon">
                    <img class="member_avatar" src="<?php echo $page->getAttribute('avatar')->getVersion()->getRelativePath(); ?>" />
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="p-b-10">
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
