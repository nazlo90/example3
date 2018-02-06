<?php
//prototypedev_register_guest_session();
get_header();
//speed optimization
$template_url=esc_url(get_template_directory_uri());

the_post();
?>
<div class="breadcrumb">
    <a class="main_page" href="/">
        <span>Головна</span>
    </a>
    <span class="separator"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
    <a class="curent_page" href="/novyny">
        <span>Новини</span>
    </a>
    <span class="separator"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
    <a class="curent_page" href="<?=get_the_permalink()?>">
        <span><?=esc_html( get_the_title() )?></span>
    </a>
</div>

<section class="new">
    <div class="wrap_directions">
        <section class="post_body">
            <div class="new_banner">
                <img src="<?=get_the_post_thumbnail_url()?>" alt="" >
            </div>
            <?=the_content()?>
        </section>

        <a href="http://java.lviv.ua" target="_blank"><img src="<?=$template_url?>/img/to-become-a-programmer.jpg" alt="" class="banner" /></a>
        <a href="http://frontend.lviv.ua/" target="_blank"><img src="<?=$template_url?>/img/fontend.jpg" alt="" class="banner" /></a>
        <a href="http://sqa.lviv.ua" target="_blank"><img src="<?=$template_url?>/img/sqa-lviv-1.jpg" alt="" class="banner" /></a>
        <a href="http://hr.lviv.ua" target="_blank"><img src="<?=$template_url?>/img/970-x-250-copy-copy.jpg" alt="" class="banner" /></a>
        <a href="http://wma.lviv.ua" target="_blank"><img src="<?=$template_url?>/img/wma-big.jpg" alt="" class="banner" /></a>
        <a href="http://itenglish.lviv.ua" target="_blank"><img src="<?=$template_url?>/img/english-banner.jpg" alt="" class="banner" /></a>
        <a href="http://lgs-kids.lviv.ua" target="_blank"><img src="<?=$template_url?>/img/lgs-kids.jpg" alt="" class="banner" /></a>
        <div class="video_wrap">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/5r_dYy7FoAI" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
        </div>
        <div class="social_links">
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
            <ul class="socials">
                <li class="fb">
                    <a class="a2a_button_facebook" target="_blank">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        Facebook
                    </a>
                </li>

                <li class="tw">
                    <a class="a2a_button_twitter" target="_blank">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        Twitter
                    </a>
                </li>
                <li class="gp">
                    <a class="a2a_button_google_plus" target="_blank">
                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                        Google+
                    </a>
                </li>

                <li class="pin">
                    <a class="a2a_button_pinterest" target="_blank">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                        Pinterest
                    </a>
                </li>

                <li class="pock">
                    <a class="a2a_button_pocket" target="_blank">
                        <i class="fa fa-get-pocket" aria-hidden="true"></i>
                        Pocket
                    </a>
                </li>


                <script async src="https://static.addtoany.com/menu/page.js"></script>
                <!-- AddToAny END -->
            </ul>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>