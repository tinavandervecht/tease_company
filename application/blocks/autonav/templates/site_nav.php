<?php  defined('C5_EXECUTE') or die(_("Access Denied."));

$navItems = $controller->getNavItems();
$mainPageCount = 0;

foreach ($navItems as $i => $ni) {
    if ($ni->level === 1) {
        $mainPageCount++;
    } else {
		unset($navItems[$i]);
    }

    $classes = array();
    if($ni->subDepth > -1) {
        $classes[] = 'sub-child';
    }

    if ($ni->isCurrent) {
        $classes[] = 'nav-selected';
    }

    if ($ni->inPath) {
        $classes[] = 'nav-path-selected';
    }

    if ($ni->hasSubmenu) {
        $classes[] = 'nav-has-dropdown';
    }

    $ni->classes = implode(" ", $classes);
}

$len = count($navItems);

$firsthalf = array_slice($navItems, 0, $len / 2);
$secondhalf = array_slice($navItems, $len / 2);
?>

<nav>
    <div class="container">
        <div class="main_nav row">
            <div class="col-md-5">
                <ul class="list-inline text-center nav_section">
                    <?php foreach ($firsthalf as $i => $ni) : ?>
                        <li class="<?php echo $ni->classes; ?>"
                            data-page-id="<?php echo $ni->cID; ?>"
                        >
                            <?php if($ni->cObj->getAttribute('disable_linking')): ?>
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
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-2 text-center">
                <a
                    title="Tease + Company"
                    href="/"
                    class="logo"
                >
                    <img src="<?php echo $this->getThemePath(); ?>/images/logos/text.svg" alt="Tease + Company" />
                </a>
            </div>
            <div class="col-md-5">
                <ul class="list-inline text-center nav_section">
                    <?php foreach ($secondhalf as $i => $ni) : ?>
                        <li class="<?php echo $ni->classes; ?>"
                            data-page-id="<?php echo $ni->cID; ?>"
                            >
                            <?php if($ni->cObj->getAttribute('disable_linking')): ?>
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
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
