<?php
$term=get_term_by('slug',$wp_query->query_vars["name"],'kursy'); //var_dump($term);
get_header();
?>
    <div class="breadcrumb">
        <a class="main_page" href="/">
            <span>Головна</span>
        </a>
        <span class="separator"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
        <a class="curent_page" href="/kursy">
            <span>Курси</span>
        </a>
        <span class="separator"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
        <a class="curent_page" href="/kursy/<?=$wp_query->query_vars["name"]?>">
            <span><?=$term->name?></span>
        </a>

    </div>

    <section class="directions_of_training">
        <div class="block_title">
            <h2>НАПРЯМИ НАВЧАННЯ</h2>
        </div>
        <div class="wrap_directions">
            <?php

            $cat=GetPostsByTaxonomy('kursy',$wp_query->query_vars["name"],'kursy',true);
            if (count($cat)>0):
                foreach ($cat as $value):?>
                <div class="cours_block">
                    <a href="/kursy/<?=$value['post_name']?>">
                        <img src="<?=$value['thumbnail']?>" alt="">
                        <span><?=$value["post_title"]?></span>
                    </a>
                </div>
                <?php endforeach;endif;unset($cat,$obj);?>
        </div>
    </section>
<?php
get_footer();
?>