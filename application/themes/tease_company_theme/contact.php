<?php
defined('C5_EXECUTE') or die("Access Denied."); ?>

<?php include('elements/header.php'); ?>

<div id="map"></div>

<section class="section_padding _small large_line_height">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-push-8">
                <?php
                    $a = new Area('Contact Aside');
                    $a->display($c);
                ?>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-7 col-md-pull-5">
                <?php
                    $a = new Area('Main Contact');
                    $a->display($c);
                ?>
            </div>
        </div>
    </div>
</section>

<?php include('elements/footer.php'); ?>
