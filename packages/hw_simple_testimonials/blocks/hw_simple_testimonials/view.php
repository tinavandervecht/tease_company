<?php       defined('C5_EXECUTE') or die("Access Denied."); ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 p-r-0 match_height align_image_bottom">
            <div class="image_wrapper">
                <img class="icon" src="<?php echo $this->getThemePath(); ?>/images/icons/heart-coral.svg" alt="icon" />
                <button class="pinterest_btn" href="https://www.pinterest.com/pin/create/button/"
                    data-pin-media="<?php echo $this->getThemePath(); ?>/images/company_photos/DSC_4764.jpg">
                    <span class="fa fa-pinterest fa-5x"></span>
                </button>
                <img class="review_img" src="<?php echo $this->getThemePath(); ?>/images/company_photos/DSC_4764.jpg" />
            </div>
        </div>
        <div class="col-md-8 p-l-0 match_height">
            <h2><strong><em>reviews</em></strong></h2>
            <div class="review_slider large_line_height">
                <?php foreach ($testimonialslist as $tl) : ?>
                    <div class="review">
                        <?php if(strlen($tl->author)>0 || strlen($tl->company)>0) : ?>
                            <span>
                                <?php echo t($tl->author)?>
                                <?php if(strlen($tl->company)>0) : ?>
                                    (<?php echo t($tl->company)?>)
                                <?php endif; ?>
                            </span>
                        <?php endif; ?>
                        <?php if(strlen($tl->created_at)>0) : ?>
                            <p>
                                <em><?php echo t($tl->created_at)?></em>
                            </p>
                        <?php endif; ?>
                        <?php if(strlen($tl->testimonial)>0) : ?>
                            <p>
                                <?php echo t($tl->testimonial)?>
                            </p>
                        <?php endif; ?>
                        <?php echo t($tl->extra) ?>
                    </div>
            	<?php endforeach; ?>
            </div>
        </div>
    </div>
</div>