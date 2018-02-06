<?php
get_header();
?>
<div class="breadcrumb">
    <a class="main_page" href="/">
        <span>Головна</span>
    </a>
    <span class="separator"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
    <a class="curent_page" href="/<?=$wp_query->query_vars["category_name"]?>">
        <span>Курси</span>
    </a>

</div>

<section class="directions_of_training">
    <div class="block_title">
        <h2>Курси</h2>
    </div>
    <div class="wrap_directions">
        <?php
        $cat=GetCategoriesByTaxonomy('kursy');

        if (count($cat)>0):
            foreach ($cat as $obj):?><div class="cours_block">
                <?php if (filter_var($obj->description, FILTER_VALIDATE_URL)){?>
                <a href="<?=$obj->description?>">
                <?php }
                else {?>
                <a href="/<?=$wp_query->query_vars["category_name"]?>/<?=$obj->slug?>"><?php }?>
                    <img src="<?=$obj->thumbnail?>" alt="">
                    <span><?=$obj->name?></span>
                </a></div>
            <?php endforeach;endif;unset($cat,$obj);?>
    </div>
</section>
<?php
get_footer();
?>
