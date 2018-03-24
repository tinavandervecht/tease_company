<?php
defined('C5_EXECUTE') or die('Access Denied.');

$c = Page::getCurrentPage();

if ($c->isEditMode()) : ?>
    <div class="ccm-edit-mode-disabled-item" style="height: 200px">
        <div style="padding: 80px 0px 0px 0px"><?php echo 'External Form Block disabled in edit mode.'; ?></div>
    </div>
​
<?php
else : ?>
    <form name="contact_form" action="<?php echo $view->action('submit'); ?>" method="POST">
        <?php if (isset($_SESSION['contact_form']['errors'])) : ?>
            <p class="text-danger">
                <?php echo $_SESSION['contact_form']['error_msg']; ?>
            </p>
        <?php endif; ?>
        <fieldset>
            <legend class="sr-only">Contact Us</legend>
            <div class="form-group _name">
                <label for="name" class="sr-only">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="name" required="required" />
            </div>
            <div class="form-group _subject">
                <label for="subject" class="sr-only">subject</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="subject" required="required" />
            </div>
            <div class="form-group _message">
                <label for="message" class="sr-only">message</label>
                <textarea id="message" name="message" class="form-control" placeholder="how can we help you?" required="required" rows="7"></textarea>
            </div>
            <?php // Honeypot Input Field ?>
            <div class="form-group _website">
                <label for="website" class="sr-only">Website URL</label>
                <input type="text" class="form-control" id="website" name="website" placeholder="website" />
            </div>
        </fieldset>
        <button class="btn btn-primary pull-right" type="submit" title="Send">Send</button>
    </form>

<?php endif; ?>
