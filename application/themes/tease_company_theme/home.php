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


<section class="image_area">
    <div class="image" style="background:url('<?php echo $this->getThemePath(); ?>/images/placeholder.png')"></div>
</section>

<?php include('elements/home/reviews.php'); ?>


<section class="image_area">
    <div class="image" style="background:url('<?php echo $this->getThemePath(); ?>/images/placeholder.png')"></div>
    <div class="image" style="background:url('<?php echo $this->getThemePath(); ?>/images/placeholder.png')"></div>
</section>

<?php include('elements/home/monthly_favourites.php'); ?>


<section class="image_area">
    <div class="image" style="background:url('<?php echo $this->getThemePath(); ?>/images/placeholder.png')"></div>
</section>

<section id="contact_messaging" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2><em><u>book your appointment!</u></em></h2>
            </div>
        </div>
    </div>
</section>

<?php include('elements/footer.php'); ?>