<?php
get_header();

?>
    <div class="breadcrumb">
        <a class="main_page" href="/">
            <span>Головна</span>
        </a>
        <span class="separator"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
        <a class="curent_page" href="/tags">
            <span>Tags</span>
        </a>
        <span class="separator"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
        <a class="curent_page" href="/tags/<?=single_tag_title();?>">
            <span><?=single_tag_title();?></span>
        </a>

    </div>

    <section class="directions_of_training">
        <div class="block_title">
            <h2>НАПРЯМИ НАВЧАННЯ</h2>
        </div>
        <div class="wrap_directions">

            <?php
            global $query_string;
            $cat=similar_posts(0,$query_string);
            try{
                foreach ($cat as $value):?> <div class="cours_block">
                    <a href="<?=get_permalink($value['ID'])?>">
                        <img src="<?=($value["thumbnail"]=='')?esc_url(get_template_directory_uri()).'/img/comp-gears.png':$value["thumbnail"]?>" alt="">
                        <span><?=$value["post_title"]?></span>
                    </a></div>
                <?php endforeach;} catch(Exception $e){} unset($cat,$obj);?>
        </div>
    </section>
<?php
get_footer();
?>