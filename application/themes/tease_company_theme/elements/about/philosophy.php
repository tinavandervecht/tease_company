<section id="philosophy" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <section class="image_area">
                    <div class="image" style="background:url('<?php echo $this->getThemePath(); ?>/images/placeholder.png')"></div>
                </section>
            </div>
            <div class="col-md-8">
                <?php
                    $a = new Area('Philosophy');
                    $a->display($c);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <?php
                    $a = new Area('Clients and Growing');
                    $a->display($c);
                ?>
            </div>
            <div class="col-md-4">
                <section class="image_area">
                    <div class="image" style="background:url('<?php echo $this->getThemePath(); ?>/images/placeholder.png')"></div>
                </section>
            </div>
        </div>
    </div>
</section>