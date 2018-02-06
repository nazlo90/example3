<?php
get_header();
?>
<div class="breadcrumb">
    <a class="main_page" href="/">
        <span>Головна</span>
    </a>
    <span class="separator"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
    <a class="curent_page" href="/novyny">
        <span>Новини</span>
    </a>

</div>

<section class="news">
    <div class="block_title">
        <h2>новини</h2>
    </div>

    <div class="wrap_directions">

        <?php
        $news = recent_posts('post',1005000,true,$thumbnail_size='medium');
        try {
            foreach ($news as $value):?>

                <div class="news_block">
                    <div>
                        <img <?= ($value["thumbnail"] != '') ? '' : 'class="no_logo"' ?>
                                src="<?= ($value["thumbnail"] != '') ? $value["thumbnail"] : wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full', 'full') ?>"
                                alt="">
                        <ul>
                            <li>
                                <span class="day"><?= date('d', strtotime($value["post_date"])) ?></span>
                                <span class="mouns"><?= date_i18n('F', strtotime($value["post_date"])) ?></span>
                                <span class="year"><?= date('Y', strtotime($value["post_date"])) ?></span>
                            </li>

                            <li>
                                <h3><?= $value["post_title"] ?></h3>
                                <span>
                                         <?= preg_replace('/[\x00-\x1F\x7F]/u', '', substr(filter_var($value["post_content"], FILTER_SANITIZE_STRING), 0, 40)) ?>…
						        </span>
                            </li>
                        </ul>
                    </div>
                    <a href="<?= get_permalink($value["ID"]) ?>">
                        Детальніше ›
                    </a>
                </div>
            <?php endforeach;
        } catch (Exception $e) {
        }
        //clean memory
        unset($news);
        ?>
    </div>

    <!--    <div class="show_more">
            <a href="/">Усі новини</a>
        </div>-->
</section>

<?php
get_footer();
?>
