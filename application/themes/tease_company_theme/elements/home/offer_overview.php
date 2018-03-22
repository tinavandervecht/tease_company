<section id="offer_overview" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
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
            <div class="col-md-4">
                <section class="image_area">
                    <div class="image" style="background:url('<?php echo $this->getThemePath(); ?>/images/placeholder.png')"></div>
                </section>
            </div>
        </div>
    </div>
</section>
