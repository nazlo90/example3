<?php
$menu_id=get_nav_menu_locations();
if (array_key_exists('primary',$menu_id)) $menu_id=$menu_id['primary'];
$menu=wp_get_nav_menu_items($menu_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?=bloginfo( 'name' )?></title>
    <meta name="keywords" content="" />
    <meta name="description" content="<?=bloginfo('description')?>" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="http://prototypedev.net">
    <link rel="icon" type="image/png" href="<?=(has_site_icon())?get_site_icon_url():esc_url( get_template_directory_uri() ).'/img/logo.png'?>">
    <link href="<?=esc_url( get_template_directory_uri() )?>/css/style.css" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?=esc_url( get_template_directory_uri() )?>/css/owl.carousel.min.css">
    <link href="<?=esc_url( get_template_directory_uri() )?>/css/media.css" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel=stylesheet href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700%7CRoboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic%3Alatin-ext%2Cvietnamese%2Cgreek%2Ccyrillic-ext%2Cgreek-ext%2Clatin%2Ccyrillic&subset=latin,cyrillic"/>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
    <?php if(get_theme_mod('logos_add_wordpress_support_','')) wp_head(); ?>
    <script src="<?=esc_url( get_template_directory_uri() )?>/js/jquery-1.10.2.min.js"></script>
</head>

<body class="<?=(!is_front_page())?'single_page':''?>">
    <a href="body" class="step_up"></a>

    <div class="social_fixed">
        <a href="<?=get_theme_mod('logos_link_fb','/')?>" target="_blank">
            <img src="<?=esc_url( get_template_directory_uri() )?>/img/fb-sm-ic.png" alt="" >
        </a>
        <a href="<?=get_theme_mod('logos_link_yo','/')?>" target="_blank">
            <img src="<?=esc_url( get_template_directory_uri() )?>/img/yt-sm.PNG" alt="" >
        </a>
        <a href="<?=get_theme_mod('logos_link_gplus','/')?>" target="_blank">
            <img src="<?=esc_url( get_template_directory_uri() )?>/img/gp-sm-ic.png" alt="">
        </a>
        <a href="<?=get_theme_mod('logos_link_instagram','/')?>" target="_blank">
            <img src="<?=esc_url( get_template_directory_uri() )?>/img/inst-sm-ic.png" alt="" >
        </a>
        <a href="<?=get_theme_mod('logos_link_pi','/')?>" target="_blank">
            <img src="<?=esc_url( get_template_directory_uri() )?>/img/pinterest-fixed-icon.PNG" alt="" >
        </a>
    </div>
    <div class="fixed_menu">
        <ul>
            <?php if ($menu) foreach($menu as $obj):?>
                <li>
                    <a href="<?=$obj->url?>"><?=strtoupper($obj->title)?></a>
                </li>
            <? endforeach; ?>
        </ul>
    </div>

    <?if(get_theme_mod('logos_header_show_banner_','')):?>
        <header>
            <span><?=get_theme_mod('logos_header_show_banner_image_1', '')?></span>
            <a href="<?=get_theme_mod('logos_header_show_banner_url','')?>"  class="more_details">
                <?=get_theme_mod('logos_header_show_banner_image_2', '')?>
            </a>
        </header>
    <?php endif ?>
    <section class="banner">
        <?php if(is_front_page()):?>
            <div class="back_fon">
                <div style="background: url(<?=esc_url( get_template_directory_uri() )?>/img/123.jpg) no-repeat"></div>
            </div>
        <?php endif;?>
        <div class="top_menu">
            <div class="wrap_forlogo">
                <div>
                    <a href="/"><img src="<?=(get_theme_mod( 'custom_logo')=='')?esc_url( get_template_directory_uri() ).'/img/logo.png':wp_get_attachment_image_url(get_theme_mod( 'custom_logo' ),'full','full' )?>" ></a>
                </div>
                <div class="mobil_button">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <nav>
                <!-- opened -->
                <ul class="">
                    <?php if ($menu) foreach($menu as $obj):?>
                        <li>
                            <a href="<?=$obj->url?>"><?=strtoupper($obj->title)?></a>
                        </li>
                    <? endforeach; ?>

                </ul>
                <span class="telphone">
                 <i class="fa fa-phone" aria-hidden="true"></i>
                 <?=get_theme_mod( 'logos_header_phone')?>
             </span>
         </nav>
     </div>
     <?php if(is_front_page()):?>
        <div class="banner_content">
            <h2>
                LOGOS IT ACADEMY
            </h2>
            <h4>Навчайся з кращими!</h4>
            <ul>
                <li class="blue_btn">
                    <a href="/courses">Перелік курсів</a>
                </li>
                <li class="green_btn">
                    <a href="javascript:void(0);" class="online_write">Онлайн запис</a>
                </li>
            </ul>
        </div>
    <?php endif;?>
</section>