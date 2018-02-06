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
    <a class="curent_page" href="/kursy">
        <span>Курси</span>
    </a>
    <span class="separator"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
    <a class="curent_page" href="<?=get_the_permalink()?>">
        <span><?=esc_html( get_the_title() )?></span>
    </a>

</div>

<section class="detailed_page">
    <div class="block_title">
        <h2><?=get_the_title()?></h2>
    </div>

    <div class="main_content">
        <img src="<?=wp_get_attachment_url(get_metadata('post',get_the_id(),'_thumbnail_id',true))?>" alt="">
        <div class="description">
            <?=get_the_content()?>
        </div>
    </div>

    <div class="block_title">
        <h2>ПРОГРАМА НАВЧАННЯ</h2>
    </div>

    <div class="program_content start_numbers">
<?php

$post_meta=get_post_meta(get_the_id());
$filtered = array();
try {
    foreach ($post_meta as $key => $value)
        if (preg_match('/_courses_title_courses\d/', $key))
            $filtered[] = array_merge(
                $value,
                $post_meta[str_replace('_courses_title_courses', '_courses_text_courses', $key)],
                array(
                    'key1' => $key,
                    'key2' => str_replace('_courses_title_courses', '_courses_text_courses', $key))

            );
} catch (Exception $e) {}

        try {
        foreach ($filtered as $value):?>
        <div class="program_info">
            <div class="program_numbers">1</div>
            <h3>
                <?=$value[0]?>
            </h3>
            <?=$value[1]?>
        </div>
<?php endforeach;}
catch (Exception $e) {}
?>
    </div>

    <div class="block_title">
        <h2>ВАРТІСТЬ</h2>
    </div>

    <ul class="numbers_line">
        <?if(intval(get_post_meta( get_the_id(), '_courses_price_num', true ))>0):?>
        <li>
            <span>КІЛЬКІСТЬ ЗАНЯТЬ</span>
            <img src="<?=$template_url?>/img/bool-icon1.png" alt="">
            <h2 class="numbers" value="<?=get_post_meta( get_the_id(), '_courses_price_num', true )?>"><?=get_post_meta( get_the_id(), '_courses_price_num', true )?></h2>
        </li>
        <?php endif;?>
        <?if(intval(get_post_meta( get_the_id(), '_courses_price_hours', true ))>0):?>
        <li>
            <span>КІЛЬКІСТЬ АКАДЕМ. ГОДИН</span>
            <img src="<?=$template_url?>/img/clock-2.png" alt="">
            <h2 class="numbers" value="<?=get_post_meta( get_the_id(), '_courses_price_hours', true )?>"><?=get_post_meta( get_the_id(), '_courses_price_hours', true )?></h2>
        </li>
        <?php endif;?>
        <?if(intval(get_post_meta( get_the_id(), '_courses_price_individual', true ))>0):?>
        <li>
            <span>ЦІНА ІНДИВІДУАЛЬНОГО КУРСУ</span>
            <img src="<?=$template_url?>/img/user2.png" alt="">
            <h2 class="numbers" value="<?=get_post_meta( get_the_id(), '_courses_price_individual', true )?>"><?=get_post_meta( get_the_id(), '_courses_price_individual', true )?></h2>
        </li>
        <?php endif;?>
        <?if(intval(get_post_meta( get_the_id(), '_courses_price_group', true ))>0):?>
        <li>
            <span>ЦІНА ГРУПОВОГО КУРСУ</span>
            <img src="<?=$template_url?>/img/users2.png" alt="">
            <h2 class="numbers" value="<?=get_post_meta( get_the_id(), '_courses_price_group', true )?>"><?=get_post_meta( get_the_id(), '_courses_price_group', true )?></h2>
        </li>
        <?php endif;?>
    </ul>

    <div class="block_title">
        <h2>ОНЛАЙН ЗАПИС</h2>
    </div>

    <div class="online_registration">
        <form action="">
            <input type="text" name="name" placeholder="Ваше ім'я">
            <input type="text" name="tel" placeholder="Ваш телефон">
            <input type="email" name="email" placeholder="Ваш e-mail">
            <select name="type_list">
                <option value="Виберіть тип курсу*">Виберіть тип курсу*</option>
                <option value="Індивідуальний">Індивідуальний</option>
                <option value="Груповий">Груповий</option>
            </select>
            <textarea   name="message" placeholder="Повідомлення"></textarea>
            <button class="send">Відправити</button>
        </form>
    </div>

    <div class="block_title">
        <h2>ДЕТАЛІ КУРСУ</h2>
    </div>

    <ul class="course_details">

        <li>
            <img src="<?=$template_url?>/img/clock-icon1.png" alt="">
            <span>
					Тривалість одного заняття 90 хв. (2 академічні години)
				</span>
        </li>

        <li>
            <img src="<?=$template_url?>/img/list-icon.png" alt="">
            <span>
					Можливе написання індивідуальної програми під Вас!
				</span>
        </li>

        <li>
            <img src="<?=$template_url?>/img/list2.png" alt="">
            <span>
					По закінченню курсу видається сертифікат.
				</span>
        </li>
    </ul>

    <ul class="list_links">
        <li class="blue_btn">
            <a href="/rozklad" class="">Розклад групових занять</a>
        </li>

        <li class="red_btn">
            <a href="javascript:void(0);" class="online_write">Онлайн запис</a>
        </li>
    </ul>
</section>

<section class="our_teachers ">
    <div class="block_title white_fon">
        <h2>ВИКЛАДАЧІ</h2>
    </div>

    <div class="owl-carousel slider_twoo owl-theme ">
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
                        </div>
                    </div>
                    <a href="" class="about">Детальніше про викладача ›</a>
                </div>
            <?php endforeach;
        unset($news,$tags, $value,$meta);?>

    </div>
</section>

<section class="similar_courses">

    <div class="block_title">
        <h2>ІНШІ СХОЖІ КУРСИ</h2>
    </div>
<?php $result=similar_posts(get_the_id(),get_the_tags()); ?>
    <div class="other_courses">
        <?php try {foreach ($result as $value):?>
        <a href="<?=get_post_permalink($value["ID"])?>">
            <img src="<?=($value["thumbnail"]=='')?$template_url.'/img/comp-gears.png':$value["thumbnail"]?>" alt="">
            <span><?=$value["post_name"]?></span>
        </a>
<?php endforeach;} catch(Exception $e){}?>
    </div>

</section>

<?php get_footer(); ?>