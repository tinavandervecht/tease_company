<?php
defined('C5_EXECUTE') or die("Access Denied."); ?>

<?php include('elements/header.php'); ?>

<div class="large_line_height">
    <?php include('elements/intro.php'); ?>
</div>

<div class="clearfix">
    <section class="image_area">
        <button class="pinterest_btn" href="https://www.pinterest.com/pin/create/button/"
        data-pin-media="<?php echo $this->getThemePath(); ?>/images/company_photos/DSC_4494.jpg">
            <span class="fa fa-pinterest fa-5x"></span>
        </button>
        <img src="<?php echo $this->getThemePath(); ?>/images/company_photos/DSC_4494.jpg" class="image">
    </section>
</div>

<?php include('elements/about/philosophy.php'); ?>

<div class="clearfix">
    <section class="image_area">
        <button class="pinterest_btn" href="https://www.pinterest.com/pin/create/button/"
        data-pin-media="<?php echo $this->getThemePath(); ?>/images/company_photos/DSC_4816.jpg">
            <span class="fa fa-pinterest fa-5x"></span>
        </button>
        <img src="<?php echo $this->getThemePath(); ?>/images/company_photos/DSC_4816.jpg" class="image">
    </section>
    <section class="image_area">
        <button class="pinterest_btn" href="https://www.pinterest.com/pin/create/button/"
        data-pin-media="<?php echo $this->getThemePath(); ?>/images/company_photos/DSC_4916.jpg">
            <span class="fa fa-pinterest fa-5x"></span>
        </button>
        <img src="<?php echo $this->getThemePath(); ?>/images/company_photos/DSC_4916.jpg" class="image">
    </section>
</div>

<?php include('elements/about/team.php'); ?>

<div class="clearfix">
    <section class="image_area">
        <button class="pinterest_btn" href="https://www.pinterest.com/pin/create/button/"
        data-pin-media="<?php echo $this->getThemePath(); ?>/images/company_photos/DSC_4456.jpg">
            <span class="fa fa-pinterest fa-5x"></span>
        </button>
        <img src="<?php echo $this->getThemePath(); ?>/images/company_photos/DSC_4456.jpg" class="image">
    </section>
</div>

<section id="contact_messaging" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>
                    <img class="icon p-r-2" src="<?php echo $this->getThemePath(); ?>/images/icons/heart-peach.svg" alt="icon">
                    <a href="<?php echo DIR_REL . Page::getCollectionPathFromID(174); ?>"><em><u>say hello!</u></em></a>
                    <img class="icon p-l-2 p-t-4" src="<?php echo $this->getThemePath(); ?>/images/icons/cell-phone.svg" alt="icon">
                </h2>
            </div>
        </div>
    </div>
</section>

<?php include('elements/footer.php'); ?>