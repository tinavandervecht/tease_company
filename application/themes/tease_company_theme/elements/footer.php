<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<footer>
    <?php
        $json = file_get_contents('https://api.instagram.com/v1/users/self/media/recent/?access_token=3161985210.3859308.f07d425c9cdf4295a6b5a7f5ca13f498&count=20');
        $obj = json_decode($json);
    ?>

    <?php foreach($obj->data as $key => $item): ?>
        <div class="insta-img">
            <a href="<?php echo $item->link; ?>" target="_blank">
                <span class="insta-img"
                    style="background:url(<?php echo $item->images->standard_resolution->url; ?>)"
                >
                </span>
            </a>
        </div>
    <?php endforeach; ?>
</footer>

<?php View::element('footer_required'); ?>

<?php
$u = new User;
if(!$u->isLoggedIn() || $u->isLoggedIn() && !$u->superUser) : ?>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<?php endif; ?>
<script
    type="text/javascript"
    async defer
    src="//assets.pinterest.com/js/pinit.js"
></script>
<script type="text/javascript" src="<?php echo $this->getThemePath(); ?>/js/vendors/slick.js"></script>
<script type="text/javascript" src="<?php echo $this->getThemePath(); ?>/js/vendors/bootstrap-modal.min.js"></script>
<script type="text/javascript" src="<?php echo $this->getThemePath(); ?>/js/vendors/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo $this->getThemePath(); ?>/js/app.js"></script>
</div>
<?php if (isset($_SESSION['contact_form']['errors'])) : ?>
    <script>
        window.setTimeout(function() {
            <?php unset($_SESSION['contact_form']); ?>
        }, 5000);
    </script>
<?php endif; ?>
</body>
</html>