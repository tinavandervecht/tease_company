<section id="offer_overview" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 p-r-0 match_height">
                <?php
                    $a = new Area('Offer Title');
                    $a->display($c);
                ?>
                <div class="row">
                    <div class="col-md-6 left-column">
                        <?php
                            $a = new Area('Offer Left Column');
                            $a->display($c);
                        ?>
                    </div>
                    <div class="col-md-6 right-column">
                        <?php
                            $a = new Area('Offer Right Column');
                            $a->display($c);
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4 match_height align_image_bottom">
                <img class="icon" src="<?php echo $this->getThemePath(); ?>/images/icons/star-navy.svg" alt="icon" />
                <img src="<?php echo $this->getThemePath(); ?>/images/company_photos/DSC_4849.jpg" />
            </div>
        </div>
    </div>
</section>
