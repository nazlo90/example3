<?php
get_header();
?>
<div class="breadcrumb">
    <a class="main_page" href="/">
        <span>Головна</span>
    </a>
    <span class="separator"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
    <a class="curent_page" href="/<?=$wp_query->query_vars["category_name"]?>">
        <span>Галарея</span>
    </a>
</div>

<section class="wrap_gallery">
    <div class="block_title ">
        <h2>ГАЛЕРЕЯ</h2>
    </div>
    <ul>

            <?php
            $cat=recent_posts('gallery',100500,true,'medium');
            if (count($cat)>0):
                foreach ($cat as $value):
                    if ($value['thumbnail']!=''):?>
        <li>
                    <a href="/<?=$wp_query->query_vars["category_name"]?>/<?=$value["post_name"]?>">
                        <img src="<?=$value['thumbnail']?>" alt="">
                        <span><?=$value["post_title"]?></span>
                    </a>
        </li>
                <?php endif;endforeach;endif;unset($cat,$value);?>

    </ul>

</section>

<?php
get_footer();
?>
