<?php
defined('C5_EXECUTE') or die("Access Denied."); ?>

<?php include('elements/header.php'); ?>

<section id="intro">
    <?php
        $a = new Area('Intro');
        $a->display($c);
    ?>
</section>

<?php include('elements/home/offer_overview.php'); ?>

<div class="clearfix">
    <section class="image_area">
        <button class="pinterest_btn" href="https://www.pinterest.com/pin/create/button/"
        data-pin-media="<?php echo BASE_URL . $this->getThemePath(); ?>/images/company_photos/DSC_4678.jpg">
            <span class="fa fa-pinterest fa-5x"></span>
        </button>
        <img src="<?php echo $this->getThemePath(); ?>/images/company_photos/DSC_4678.jpg" class="image">
    </section>
</div>

<?php include('elements/home/reviews.php'); ?>


<div class="images clearfix">
    <section class="image_area">
        <button class="pinterest_btn" href="https://www.pinterest.com/pin/create/button/"
        data-pin-media="<?php echo BASE_URL . $this->getThemePath(); ?>/images/company_photos/DSC_4738.jpg">
            <span class="fa fa-pinterest fa-5x"></span>
        </button>
        <img src="<?php echo $this->getThemePath(); ?>/images/company_photos/DSC_4738.jpg" class="image">
    </section>
    <section class="image_area">
        <button class="pinterest_btn" href="https://www.pinterest.com/pin/create/button/"
        data-pin-media="<?php echo BASE_URL . $this->getThemePath(); ?>/images/company_photos/DSC_4705.jpg">
            <span class="fa fa-pinterest fa-5x"></span>
        </button>
        <img src="<?php echo $this->getThemePath(); ?>/images/company_photos/DSC_4705.jpg" class="image">
    </section>
</div>

<?php include('elements/home/monthly_favourites.php'); ?>


<div class="clearfix">
    <section class="image_area">
        <button class="pinterest_btn" href="https://www.pinterest.com/pin/create/button/"
        data-pin-media="<?php echo BASE_URL . $this->getThemePath(); ?>/images/company_photos/DSC_4271.jpg">
            <span class="fa fa-pinterest fa-5x"></span>
        </button>
        <img src="<?php echo $this->getThemePath(); ?>/images/company_photos/DSC_4271.jpg" class="image">
    </section>
</div>

<section id="contact_messaging" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>
                    <div class="hidden-md hidden-lg">
                        <img class="icon" src="<?php echo $this->getThemePath(); ?>/images/icons/heart-peach.svg" alt="icon">
                        <img class="icon" src="<?php echo $this->getThemePath(); ?>/images/icons/cell-phone.svg" alt="icon">
                    </div>
                    <img class="icon p-r-2 hidden-xs hidden-sm" src="<?php echo $this->getThemePath(); ?>/images/icons/heart-peach.svg" alt="icon">
                    <a href="<?php echo DIR_REL . Page::getCollectionPathFromID(174); ?>"><em><u>book your appointment!</u></em></a>
                    <img class="icon p-l-2 p-t-4 hidden-xs hidden-sm" src="<?php echo $this->getThemePath(); ?>/images/icons/cell-phone.svg" alt="icon">
                </h2>
            </div>
        </div>
    </div>
</section>

<?php include('elements/footer.php'); ?>