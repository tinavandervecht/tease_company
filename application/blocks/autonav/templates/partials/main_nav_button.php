<li class="<?php echo $ni->classes; ?>"
    data-page-id="<?php echo $ni->cID; ?>"
>
    <?php if($ni->cObj->getAttribute('disable_linking') || $ni->hasSubmenu): ?>
        <button
            type="button"
        >
            <?php echo $ni->name; ?>
        </button>
    <?php else: ?>
        <a
            title="<?php echo $ni->name; ?>"
            href="<?php echo $ni->url; ?>"
            target="<?php echo $ni->target; ?>"
        >
            <?php echo $ni->name; ?>
        </a>
    <?php endif; ?>
    <?php if ($ni->hasSubmenu) : ?>
        <div id="sub_nav_<?php echo $ni->cID; ?>"
            class="sub-nav <?php echo $ni->cID === '176' ? 'team_nav' : 'default_nav' ?>"
        >
            <div class="after"></div>
            <div class="before"></div>
            <div class="container">
                <div class="sub_nav_slider">
                    <?php if(! $ni->cObj->getAttribute('disable_linking')) : ?>
                        <div>
                            <a
                                href="<?php echo $ni->url; ?>"
                                class="sub_nav_item"
                            >
                                <em>All</em>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php
                        $bt = BlockType::getByHandle('page_list');
                        $bt->controller->cParentID = $ni->cID;
                        $bt->controller->truncateSummaries = 'true';
                        $bt->controller->paginate = 'false';
                        $bt->controller->orderBy = 'display_asc';
                        $bt->render($ni->cID === '176'
                            ? 'templates/team_sub_nav'
                            : 'templates/sub_site_nav');
                    ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</li>