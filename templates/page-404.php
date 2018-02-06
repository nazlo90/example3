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
            <span><?=esc_html( get_the_title() )?>404 NOT FOUND</span>
        </a>
    </div>

    <section class="new not_found">
        <h1><strong>404</strong> NOT FOUND</h1>
        <h3>THE PAGE YOU TRY TO SEE CANNOT BE FOUND</h3>
    </section>

<?php get_footer(); ?>