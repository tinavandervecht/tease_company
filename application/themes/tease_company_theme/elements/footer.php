<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

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