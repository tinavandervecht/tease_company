<?php  defined('C5_EXECUTE') or die(_("Access Denied."));

$navItems = $controller->getNavItems();
$c = Page::getCurrentPage();

foreach ($navItems as $ni) {
    $classes = array();

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
    <ul class="list-inline text-center">
        <?php foreach ($firsthalf as $i => $ni) : ?>
            <li>
                <a
                    title="<?php echo $ni->name; ?>"
                    href="<?php echo $ni->url; ?>"
                    classes="<?php echo $ni->classes; ?>"
                >
                    <?php echo $ni->name; ?>
                </a>
            </li>
        <?php endforeach; ?>
        <li>
            <a
                title="Tease + Company"
                href="/"
                classes="logo"
            >
                <img src="/logos/text.svg" alt="Tease + Company" />
            </a>
        </li>
        <?php foreach ($secondhalf as $i => $ni) : ?>
            <li>
                <a
                    title="<?php echo $ni->name; ?>"
                    href="<?php echo $ni->url; ?>"
                    classes="<?php echo $ni->classes; ?>"
                >
                    <?php echo $ni->name; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
