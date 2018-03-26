<section id="monthly_favourites" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><em>our monthly favourites</em></h2>
            </div>
        </div>
        <?php
            $pl = new PageList();
            $pl->filterByParentID(176);
            $pl->sortByDisplayOrder();
            $teamMembers = $pl->get();
        ?>

        <div class="monthly_favourites_slider">
            <?php foreach($teamMembers as $i => $teamMember):
                $pl = new PageList();
                $pl->filterByParentID($teamMember->getCollectionID());
                $pl->filterByName('Monthly Favourite', true);
                $monthlyFavourites = $pl->get();

                if (! empty($monthlyFavourites)) :
                    $pl = new PageList();
                    $pl->filterByParentID($monthlyFavourites[0]->getCollectionID());
                    $pl->sortByPublicDateDescending();
                    $monthlyFavourite = $pl->get();
                    
                    if (! empty($monthlyFavourite)) :
                        $monthlyFavourite = $monthlyFavourite[0];
                    ?>
                        <div>
                            <div class="favourite <?php echo $i % 2 == 0 ? 'first_item' : 'second_item'; ?>">
                                <div class="description large_line_height">
                                    <h2>
                                        <em><?php echo $monthlyFavourite->getCollectionName(); ?></em>
                                        <small class="pull-right">$<?php echo $monthlyFavourite->getAttribute('price'); ?></small>
                                    </h2>
                                    <p>
                                        <?php echo $monthlyFavourite->getAttribute('type'); ?>
                                    </p>
                                    <?php if ($monthlyFavourite->getAttribute('short_description')) : ?>
                                        <p>
                                            "<?php echo $monthlyFavourite->getAttribute('short_description'); ?>"
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div class="avatar">
                                    <img src="<?php echo $monthlyFavourite->getAttribute('avatar')->getVersion()->getRelativePath(); ?>" alt="<?php echo $monthlyFavourite->getCollectionName(); ?>" />
                                </div>
                                <div class="member_information">
                                    <h2><em><u><a href="<?php echo $teamMember->cPath; ?>"><?php echo $monthlyFavourite->getAttribute('member_name'); ?></a></u>'s fave</em></h2>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>