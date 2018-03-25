<section id="monthly_favourites" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><em>our monthly favourites</em></h2>
            </div>
        </div>
        <?php
            $pl = new PageList();
            $pl->filterByParentID(203);
            $pl->sortByDisplayOrder();
            $pages = $pl->get();
        ?>

        <div class="monthly_favourites_slider">
            <?php foreach($pages as $i => $page): ?>
                <div>
                    <div class="favourite <?php echo $i % 2 == 0 ? 'first_item' : 'second_item'; ?>">
                        <div class="description large_line_height">
                            <h2>
                                <em><?php echo $page->getCollectionName(); ?></em>
                                <small class="pull-right">$<?php echo $page->getAttribute('price'); ?></small>
                            </h2>
                            <p>
                                <?php echo $page->getAttribute('type'); ?>
                            </p>
                            <?php if ($page->getAttribute('short_description')) : ?>
                                <p>
                                    "<?php echo $page->getAttribute('short_description'); ?>"
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="avatar">
                            <img src="<?php echo $page->getAttribute('avatar')->getVersion()->getRelativePath(); ?>" alt="<?php echo $page->getCollectionName(); ?>" />
                        </div>
                        <div class="member_information">
                            <h2><em><u><?php echo $page->getAttribute('member_name'); ?></u>'s fave</em></h2>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>