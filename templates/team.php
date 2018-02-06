<?php
get_header();
?>
<div class="breadcrumb">
    <a class="main_page" href="/">
        <span>Головна</span>
    </a>
    <span class="separator"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
    <a class="curent_page" href="/<?=$wp_query->query_vars["category_name"]?>">
        <span>Викладачі</span>
    </a>

</div>

<section class="our_teachers white_fon">
    <div class="block_title">
        <h2>ВИКЛАДАЧІ</h2>
    </div>

    <div class="wrap_directions">
        <?php
        $news=recent_posts('team',100500,true);

        if (count($news)>0)
        foreach ($news as $value):
        $meta=get_post_meta($value['ID'],'',false);

        ?>
        <div class="teacher_block">
            <div>
                <img src="<?=$value['thumbnail']?>" class="face_teacher" alt="">
                <div class="info">
                    <h4><?=$value["post_title"]?></h4>
                    <span class="teacher_skills"><?=(!empty($meta["_team_position"][0]))?filter_var($meta["_team_position"][0],FILTER_SANITIZE_STRING):' '?></span>
                    <span class="teaches_courses">
							Курс:
                        <?php
                        $tags=wp_get_post_tags($value['ID'],array('fields'=>'all') );
                        foreach ($tags as $key=>$tags):?>
                            <a href="<?=get_tag_link($tags->term_id)?>"><?=$tags->name?></a><?=($key===end($tags))?'':','?>
                        <?php endforeach; ?>
						</span>
                    <ul class="socials">
                        <?php if(!empty($meta["_team_social_linked"][0])):?>
                            <li>
                                <a href="<?=$meta["_team_social_linked"][0]?>">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                        <?endif;?>
                        <?php if(!empty($meta["_team_social_fb"][0])):?>
                            <li>
                                <a href="<?=$meta["_team_social_fb"][0]?>">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        <?endif;?>
                    </ul>
                    <span class="about_teacher">
							<?=$value["post_content"]?>
					</span>
                </div>
            </div>
            <span class="about">Детальніше про викладача ›</span>
        </div>
        <?php endforeach; unset($news);?>


    </div>
</section>
<?php
get_footer();
?>
