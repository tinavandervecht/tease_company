<?php
defined('C5_EXECUTE') or die("Access Denied."); ?>

<?php include('elements/header.php'); ?>

<div class="large_line_height">
    <?php include('elements/intro.php'); ?>
</div>


<section class="image_area">
    <div class="image" style="background:url('<?php echo $this->getThemePath(); ?>/images/placeholder.png')"></div>
</section>

<?php include('elements/about/philosophy.php'); ?>

<section class="image_area">
    <div class="image" style="background:url('<?php echo $this->getThemePath(); ?>/images/placeholder.png')"></div>
    <div class="image" style="background:url('<?php echo $this->getThemePath(); ?>/images/placeholder.png')"></div>
</section>

<?php include('elements/about/team.php'); ?>

<section class="image_area">
    <div class="image" style="background:url('<?php echo $this->getThemePath(); ?>/images/placeholder.png')"></div>
</section>

<section id="contact_messaging" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2><a href="<?php echo DIR_REL . Page::getCollectionPathFromID(174); ?>"><em><u>say hello!</u></em></a></h2>
            </div>
        </div>
    </div>
</section>

<?php include('elements/footer.php'); ?>