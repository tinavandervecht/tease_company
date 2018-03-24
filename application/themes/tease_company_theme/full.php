<?php
defined('C5_EXECUTE') or die("Access Denied.");

$this->inc('elements/header.php');
?>

<main class="section_padding large_line_height">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $a = new Area('Main');
                $a->display($c);
                ?>
            </div>
        </div>
    </div>
</main>

<?php
$this->inc('elements/footer.php');
