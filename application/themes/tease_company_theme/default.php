<?php
defined('C5_EXECUTE') or die("Access Denied.");

$this->inc('elements/header.php');
?>

<main class="section_padding">
    <?php
        $a = new Area('Main');
        $a->enableGridContainer();
        $a->display($c);
    ?>
</main>

<?php
$this->inc('elements/footer.php');
