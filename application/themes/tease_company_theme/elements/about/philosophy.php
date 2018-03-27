<section id="philosophy" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-5 p-r-0 match_height align_image_bottom">
                <img class="icon" src="<?php echo $this->getThemePath(); ?>/images/icons/heart-peach.svg" alt="icon">
                <div class="image_wrapper">
                    <button class="pinterest_btn" href="https://www.pinterest.com/pin/create/button/"
                        data-pin-media="<?php echo $this->getThemePath(); ?>/images/company_photos/hair.jpg">
                        <span class="fa fa-pinterest fa-5x"></span>
                    </button>
                    <img src="<?php echo $this->getThemePath(); ?>/images/company_photos/hair.png"/>
                </div>
            </div>
            <div class="col-md-7 p-l-0 large_line_height match_height">
                <div class="philosophy_overview match_height">
                    <div class="content p-l-5 p-r-5 p-b-3 p-t-3">
                        <?php
                            $a = new Area('Philosophy');
                            $a->display($c);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="clients p-l-6 p-r-6 p-b-4 p-t-4">
                    <div class="number_of_clients">
                        <?php
                            $a = new Area('Number of Clients');
                            $a->display($c);
                        ?>
                    </div>
                    <?php
                        $a = new Area('Clients Text');
                        $a->display($c);
                    ?>
                </div>
            </div>
            <div class="col-md-6 align_image_bottom">
                <div class="image_wrapper">
                    <button class="pinterest_btn" href="https://www.pinterest.com/pin/create/button/"
                    data-pin-media="<?php echo $this->getThemePath(); ?>/images/company_photos/wedding_photo.jpg">
                        <span class="fa fa-pinterest fa-5x"></span>
                    </button>
                    <img src="<?php echo $this->getThemePath(); ?>/images/company_photos/wedding_photo.jpg"/>
                </div>
            </div>
        </div>
    </div>
</section>