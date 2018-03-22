<?php
defined('C5_EXECUTE') or die("Access Denied."); ?>

<?php include('elements/header.php'); ?>

<section id="intro">
    <?php
        $a = new Area('Intro');
        $a->display($c);
    ?>
</section>

<section class="image_area">
    <div class="image" style="background:url('<?php echo $this->getThemePath(); ?>/images/placeholder.png')"></div>
</section>

<section class="image_area">
    <div class="image" style="background:url('<?php echo $this->getThemePath(); ?>/images/placeholder.png')"></div>
    <div class="image" style="background:url('<?php echo $this->getThemePath(); ?>/images/placeholder.png')"></div>
</section>

<section class="image_area">
    <div class="image" style="background:url('<?php echo $this->getThemePath(); ?>/images/placeholder.png')"></div>
</section>

<?php include('elements/footer.php'); ?>