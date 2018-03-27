<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<section class="section_padding large_line_height">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php $a = new Area('Main'); ?>
                <?php $a->display($c); ?>
                <br />
                <br />
                <a class="h3" href="<?=DIR_REL?>/"><?=t('Back to Home')?></a>
            </div>
        </div>
    </div>
</section>

