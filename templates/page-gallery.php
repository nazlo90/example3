<?php
get_header();
the_post();
$images=get_attached_media('image',get_the_id());
?>

<div class="breadcrumb">
    <a class="main_page" href="/">
        <span>Головна</span>
    </a>
    <span class="separator"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
    <a class="curent_page" href="/galereya">
        <span>Галарея</span>
    </a>
    <span class="separator"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
    <a class="curent_page" href="<?=get_the_permalink()?>">
        <span><?=get_the_title()?></span>
    </a>

</div>

    <section class="wrap_gallery ">
        <div class="block_title ">
            <h2>ГАЛЕРЕЯ</h2>
        </div>

        <div class="back_to_gallery">
            <a href="/galereya" class="back">Назад до альбомів</a>
        </div>

        <ul class="gallery_events">
            <?php try {foreach ($images as $obj): ?>
            <li>
                <img src="<?=wp_get_attachment_image_src($obj->ID, 'medium')[0]?>" alt="" full="<?=wp_get_attachment_image_src($obj->ID, 'full')[0]?>">
            </li>
        <?php endforeach;} catch (Exception $e) {} ?>
        </ul>

    </section>

<?php
get_footer();
?>