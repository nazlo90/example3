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
        <a class="curent_page" href="<?=get_the_permalink()?>">
            <span><?=esc_html( get_the_title() )?></span>
        </a>

    </div>

    <section class="<?=LoadCustomClass()?>">
        <div class="block_title">
            <h2><?=esc_html( get_the_title() )?></h2>
        </div>
            <?=the_content()?>
    </section>

<?php get_footer(); ?>