<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<?php
$u = new User;
?>

<!DOCTYPE html>
<html lang="<?php echo Localization::activeLanguage() ?>">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <?php Loader::element('header_required'); ?>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'/>
    <link href="https://fonts.googleapis.com/css?family=Assistant" rel="stylesheet">
    <link href="<?php echo $this->getThemePath(); ?>/css/slick.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->getThemePath(); ?>/css/app.css" rel="stylesheet" type="text/css"/>

    <script>
        if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
            var msViewportStyle = document.createElement('style');
            msViewportStyle.appendChild(
                document.createTextNode(
                    '@-ms-viewport{width:auto!important}'
                )
            );
            document.querySelector('head').appendChild(msViewportStyle);
        }
    </script>
    <script type="text/javascript">
        var BASE_URL = "<?php echo BASE_URL; ?>";
        var CCM_THEME_PATH = "<?php echo $this->getThemePath(); ?>";
        var CCM_LOGGED_IN = <?php if($u->isLoggedIn()) : ?> true <?php else : ?> false <?php endif; ?>;
        var PAGE_ID = "<?php echo $c->getCollectionID(); ?>";
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWEKqRmvJ7h5x3R0yP7jYKnN4qHz5UzD4&v=3&libraries=geometry"></script>
</head>


<body>
    <div id="main" class="<?php echo $c->getPageWrapperClass()?>">
    <div class="overlay"></div>
    <header id="header">
        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="mobile_nav_button hidden-md hidden-lg fa fa-navicon fa-lg"></div>
                        <div class="logo_icon">
                            <img src="<?php echo $this->getThemePath(); ?>/images/logos/icon.svg" alt="Tease + Company Logo" />
                        </div>
                        <div class="social_icons">
                            <a href="" target="_blank">
                                <span class="fa fa-instagram fa-lg"></span>
                            </a>
                            <a href="" target="_blank">
                                <span class="fa fa-facebook fa-lg"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden-xs hidden-sm">
            <?php
                $bt = BlockType::getByHandle('autonav');
                $bt->controller->displayPages = 'top';
                $bt->controller->displayPagesCID = '';
                $bt->controller->orderBy = 'display_asc';
                $bt->controller->displaySubPages = 'all';
                $bt->controller->displaySubPageLevels = 'all';
                $bt->controller->displaySubPageLevelsNum = '';
                $bt->render('templates/site_nav');
            ?>
        </div>
        <div class="hidden-md hidden-lg">
            <?php
                $bt = BlockType::getByHandle('autonav');
                $bt->controller->displayPages = 'top';
                $bt->controller->displayPagesCID = '';
                $bt->controller->orderBy = 'display_asc';
                $bt->controller->displaySubPages = 'all';
                $bt->controller->displaySubPageLevels = 'custom';
                $bt->controller->displaySubPageLevelsNum = '1';
                $bt->render('templates/mobile_site_nav');
            ?>
        </div>
    </header>
    <div id="now_booking">
        <?php
            $a = new GlobalArea('Now Booking');
            $a->setBlockWrapperStart('<div class="now_booking_wrapper">');
            $a->setBlockWrapperEnd('</div>');
            $a->display();
        ?>
    </div>