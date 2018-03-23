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
</head>

<body class="<?php echo $c->getPageWrapperClass()?>">
    <header id="header">
        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 text-center">
                        <div class="logo_icon">
                            <img src="/images/logos/icon.svg" alt="Tease + Company Logo" />
                        </div>
                    </div>
                    <div class="col-md-2 text-right">
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
    </header>