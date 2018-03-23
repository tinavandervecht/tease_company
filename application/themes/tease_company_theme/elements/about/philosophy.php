<section id="philosophy" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4 p-r-0 match_height align_image_bottom">
                <img src="<?php echo $this->getThemePath(); ?>/images/placeholder.png"/>
            </div>
            <div class="col-md-8 p-l-0 large_line_height match_height">
                <div class="philosophy_overview">
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
            <div class="col-md-8">
                <div class="content p-l-5 p-r-5 p-b-3 p-t-3">
                    <?php
                        $a = new Area('Clients and Growing');
                        $a->display($c);
                    ?>
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