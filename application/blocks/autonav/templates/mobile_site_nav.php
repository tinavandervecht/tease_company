<?php  defined('C5_EXECUTE') or die(_("Access Denied."));

$navItems = $controller->getNavItems();

foreach ($navItems as $i => $ni) {
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

$subMenuOpen = false;
?>

<nav class="mobile_nav_section">
    <span class="close_btn">
        <img src="<?php echo $this->getThemePath(); ?>/images/icons/menu-close.svg" alt="Close Menu" />
    </span>
    <ul>
        <li>
            <a
                title="Home"
                href="/"
            >
                Home
            </a>
        </li>
        <?php foreach ($navItems as $i => $ni) : ?>
            <?php if ($ni->cObj->getAttribute('page_links_to_parent_section')) :
                $parent = Page::getByID($ni->cObj->cParentID);
                $url = $parent->cPath . '#' . str_replace(' ', '-', strtolower($ni->name));
            else :
                $url = $ni->url;
            endif; ?>
            <?php if ($ni->level == 1 && $subMenuOpen) :
                $subMenuOpen = false;
            ?>
                </ul>
            <?php endif; ?>
            <li>
                <?php if($ni->cObj->getAttribute('disable_linking') || $ni->hasSubmenu): ?>
                    <button
                        type="button"
                        class="sub_menu_parent_item"
                    >
                        <?php echo $ni->name; ?>
                        <img src="<?php echo $this->getThemePath(); ?>/images/icons/menu-arrow.svg" class="sub_menu_arrow" />
                    </button>
                <?php else: ?>
                    <a
                        title="<?php echo $ni->name; ?>"
                        href="<?php echo $url; ?>"
                        target="<?php echo $ni->target; ?>"
                    >
                        <?php echo $ni->name; ?>
                    </a>
                <?php endif; ?>
                <?php if ($ni->hasSubmenu) :
                    $subMenuOpen = true;
                ?>
                    <ul class="sub_nav">
                    <?php if (! $ni->cObj->getAttribute('disable_linking')): ?>
                        <li>
                            <a
                                title="<?php echo $ni->name; ?>"
                                href="<?php echo $url; ?>"
                                target="<?php echo $ni->target; ?>"
                            >
                                All
                            </a>
                        </li>
                    <?php endif;?>
                <?php endif; ?>
                <?php if ($i == (end(array_keys($navItems))) && $subMenuOpen == true) :
                    $subMenuOpen = false;
                ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
