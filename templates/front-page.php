<?php
//prototypedev_register_guest_session();
get_header();
//speed optimization
$template_url=esc_url(get_template_directory_uri());
the_post();
?>
<section class="our_suggestions">
    <div class="block_title">
        <h2>НАШІ ПЕРЕВАГИ</h2>
    </div>
    <ul class="list">

        <li>
            <img src="<?=$template_url?>/img/hat-1.png" >
            <span>Максимально <b>доступне</b> навчання для кожного</span>
        </li>
        <li>
            <img src="<?=$template_url?>/img/glasses.png" >
            <span>Наші викладачі – <b>кваліфіковані</b> фахівці</span>
        </li>
        <li>
            <img src="<?=$template_url?>/img/book.png" >
            <span>Максимальна <strong>доступність</strong> навчальних матеріалів</span>
        </li>
        <li>
            <img src="<?=$template_url?>/img/users.png" >
            <span>Навчальні <strong>групи</strong> від 5 до 15 осіб</span>
        </li>
        <li>
            <img src="<?=$template_url?>/img/pencil-1.png" >
            <span>Перше заняття пробне та <strong>безкоштовне</strong></span>
        </li>
        <li>
            <img src="<?=$template_url?>/img/laptop.png" >
            <span>Сприятлива атмосфера і <strong>комфортні</strong> умови для навчання</span>
        </li>



    </ul>
</section>

<section class="complex_courses">
    <div class="block_title green_fon">
        <h2>КОМПЛЕКСНІ КУРСИ</h2>
    </div>
    <div class="owl-carousel slider_one  owl-theme">
        <?php
        $news=recent_posts('courses_urls',100500,true,'medium');

        if (count($news)>0)
            foreach ($news as $value):
                if ($value["post_status"]=="publish"):
                $meta=get_post_meta($value['ID'],'',false);

                ?>
        <div class="courses_block">
            <div>
                <img src="<?=$value['thumbnail']?>" >
                <span>
                    <?=filter_var($value["post_content"],FILTER_SANITIZE_STRING)?>
				</span>
            </div>
            <?php if (!empty($meta["_external_courses_url"][0])):?><a href="<?=$meta["_external_courses_url"][0]?>">детальніше</a><?php endif;?>
        </div>
            <?php endif; endforeach;
            unset($news ,$value,$meta);?>
    </div>
</section>

<section class="why_choose_us">
    <div class="block_title ">
        <h2>ЧОМУ ВАРТО ОБРАТИ НАС?</h2>
    </div>

    <ul>
        <li>
            <img src="<?=$template_url?>/img/case75-1.png" alt="">
        </li>
        <li>
            <h3>
                ПРАЦЕВЛАШТУВАННЯ
            </h3>
            <span>
					Гарантія працевлаштування найкращих випускників
				</span>
        </li>
    </ul>

    <ul>
        <li>
            <img src="<?=$template_url?>/img/play-75.png" alt="">
        </li>
        <li>
            <h3>
                ВІДЕОЗАПИС З КОЖНОГО ЗАНЯТТЯ
            </h3>
            <span>
					Пропустили заняття? З нами це не проблема! Отримуйте відеозапис та навчальні матеріали з кожного заняття!
				</span>
        </li>
    </ul>

    <ul>
        <li>
            <img src="<?=$template_url?>/img/user75.png" alt="">
        </li>
        <li>
            <h3>
                ПІДТРИМКА ВІД МЕНТОРІВ ПІСЛЯ ЗАКІНЧЕННЯ КУРСУ
            </h3>
            <span>
					Вступайте в Logos Family та отримуйте сапорт від наших менторів протягом півроку після закінчення курсу
				</span>
        </li>
    </ul>
</section>

<section class="directions_of_training">
    <div class="block_title">
        <h2>НАПРЯМИ НАВЧАННЯ</h2>
    </div>
    <div class="wrap_directions">
        <?php
        $cat=GetCategoriesByTaxonomy('kursy');
        if (count($cat)>0):
        foreach ($cat as $obj):?>
        <div class="cours_block">
             <?php if (filter_var($obj->description, FILTER_VALIDATE_URL)){?>
                <a href="<?=$obj->description?>">
                <?php }
                else {?>
            <a href="<?=$obj->url?>"> <?php } ?>
                <img src="<?=$obj->thumbnail?>" alt="">
                <span><?=$obj->name?></span>
            </a>
        </div>
        <?php endforeach;endif;unset($cat,$obj);?>

    </div>
</section>

<section class="our_teachers">
    <div class="block_title white_fon">
        <h2>ВИКЛАДАЧІ</h2>
    </div>

    <div class="owl-carousel slider_twoo owl-theme ">

        <?php
        $news=recent_posts('team',100500,true,'medium');

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
                        $tags=wp_get_post_tags($value['ID'],array('fields'=>'names') );
                        foreach ($tags as $key=>$tags):?>
							<a href="/tags/<?=$tags?>"><?=$tags?></a><?=($key===end($tags))?'':','?>
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
            <a href="/vykladachi" class="about">Детальніше про викладача <i class="fa fa-angle-right" aria-hidden="true"></i></a>
        </div>
        <?php endforeach;
        unset($news,$tags, $value,$meta);?>
    </div>
</section>

<section class="corporate_clients">
    <div class="block_title">
        <h2>КОРПОРАТИВНІ КЛІЄНТИ</h2>
    </div>

    <div class="owl-carousel slider_three  owl-theme ">
        <img src="<?=$template_url?>/img/leoni.png" alt="">
        <img src="<?=$template_url?>/img/llogo1-1.png" alt="">
        <img src="<?=$template_url?>/img/llogo1-1 (1).png" alt="">
        <img src="<?=$template_url?>/img/lllogo2.png" alt="">
        <img src="<?=$template_url?>/img/llogo3-1.png" alt="">
        <img src="<?=$template_url?>/img/llogo4.png" alt="">
        <img src="<?=$template_url?>/img/llogo5.png" alt="">
        <img src="<?=$template_url?>/img/llllogo66.png" alt="">
        <img src="<?=$template_url?>/img/llogo7.png" alt="">
        <img src="<?=$template_url?>/img/llogo8.png" alt="">

    </div>
</section>

<section class="questions_and_answers">
    <div class="block_title green_fon">
        <h2>Питання та відповіді</h2>
    </div>


    <div class="wrap_numb_list">
        <div class="left">
            <ol>
                <?php
                $news=recent_posts('faq',100500,false);
                if (count($news)>0)
                foreach (array_slice ($news,0,intdiv(count($news),2),true) as $value):?>
                <li class="number">
                    <?=$value["post_title"]?>
                </li>
                <li class="answer">
					<?=$value["post_content"]?>
				</li>
                <?php endforeach; ?>

            </ol>
        </div>

        <div class="right">
            <ol start="<?=intdiv(count($news),2)?>">
                <?php
                if (count($news)>0)
                foreach (array_slice ($news,intdiv(count($news),2),count($news)) as $value):?>
                <li class="">
                    <?=$value["post_title"]?>
                </li>
                <li class="answer">
					<?=$value["post_content"]?>
				</li>
                <?php endforeach;
                unset($news);?>
            </ol>
        </div>
    </div>
</section>

<section class="news">
    <div class="block_title">
        <h2>новини</h2>
    </div>

    <div class="owl-carousel slider_twoo owl-theme">
        <?php
        $news=recent_posts('post',9,true,'medium');
        if (count($news)>0)
            foreach ($news as $value):?>

        <div class="news_block">
            <div>
                <img src="<?=($value["thumbnail"]!='')?$value["thumbnail"]:esc_url( get_template_directory_uri() ).'/img/Cover-Image111-3-e1469714590129-570x321.png'?>" alt="">
                <ul>
                    <li>
                        <span class="day"><?=date('d',strtotime($value["post_date"]))?></span>
                        <span class="mouns"><?=date_i18n('F',strtotime($value["post_date"]))?></span>
                        <span class="year"><?=date('Y',strtotime($value["post_date"]))?></span>
                    </li>

                    <li>
                        <h3><?=$value["post_title"]?></h3>
                        <span>
                            <?= preg_replace('/[\x00-\x1F\x7F]/u', '',substr(filter_var($value["post_content"],FILTER_SANITIZE_STRING),0,40))?>…
						</span>
                    </li>
                </ul>
            </div>
            <a href="<?=get_permalink($value["ID"])?>">
                Детальніше <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </div>
        <?php endforeach;
        //clean memory
        unset($news);
        ?>

    </div>

    <div class="show_more">
        <a href="/news">Усі новини</a>
    </div>
</section>

<section class="promo_video">
    <div class="block_title white_fon">
        <h2>ВІДЕО</h2>
    </div>

    <h3>Promo Logos IT Academy in Lviv 2017</h3>
    <iframe class="start_numbers"  src="https://www.youtube.com/embed/5r_dYy7FoAI"  gesture="media" allow="encrypted-media" allowfullscreen></iframe>
</section>

<section class="about_us">
    <div class="block_title">
        <h2><?=strtoupper(the_title())?></h2>
    </div>

    <div class="block_text">
       <?=get_the_content()?>
    </div>

    <ul class="numbers_line">
        <li>
            <h2 class="numbers" value="5300">5300</h2>
            <img src="<?=$template_url?>/img/hat-with-line.png" alt="">
            <span>СТУДЕНТІВ</span>
        </li>

        <li>
            <h2 class="numbers" value="483">483</h2>
            <img src="<?=$template_url?>/img/users-line.png" alt="">
            <span>ГРУП</span>
        </li>

        <li>
            <h2 class="numbers" value="90">90</h2>
            <img src="<?=$template_url?>/img/copy-with-lines.png" alt="">
            <span>КУРСІВ</span>
        </li>

        <li>
            <h2 class="numbers" value="85">85</h2>
            <img src="<?=$template_url?>/img/user-with-line-1.png" alt="">
            <span>ВИКЛАДАЧІВ</span>
        </li>
    </ul>
</section>

<section class="group_photo">

    <?php
    $cat=recent_posts('gallery',12,true,'medium');
    if (count($cat)>0):
        foreach ($cat as $value):?>

            <?php if($value['thumbnail']!=''):?><img src="<?=$value['thumbnail']?>" alt="">

        <?php endif;endforeach;endif;unset($cat,$value);?>
</section>

<section class="reviews">
    <div class="block_title green_fon">
        <h2>ВІДГУКИ</h2>
    </div>
    <div class="owl-carousel slider_twoo owl-theme">

        <div class="reviews_block">
            <img src="<?=$template_url?>/img/review4.png" alt="">
            <h3>ОЛЯ ЄНДРУЩАК</h3>
            <span class="courses">Курс:
					<a href="">Java Developer</a>
				</span>
            <span class="text">
					Проходжу навчання на java developer в Logos IT Academy. Програмування ніколи не вчила і почала з “повного нуля”. На даний момент, сама роблю проект інтернет магазину – це величезний прогрес – за що вдячна нашому викладачу Роману. Ще плюс – якщо на занятті щось не встигла або не зрозуміла -“суботнік” – для мене))Задоволена курсами повністю, якщо буде можливість запишусь ще на англійську))
				</span>
        </div>

        <div class="reviews_block">
            <img src="<?=$template_url?>/img/review4.png" alt="">
            <h3>ОЛЯ ЄНДРУЩАК</h3>
            <span class="courses">Курс:
					<a href="">Java Developer</a>
				</span>
            <span class="text">
					Проходжу навчання на java developer в Logos IT Academy. Програмування ніколи не вчила і почала з “повного нуля”. На даний момент, сама роблю проект інтернет магазину – це величезний прогрес – за що вдячна нашому викладачу Роману. Ще плюс – якщо на занятті щось не встигла або не зрозуміла -“суботнік” – для мене))Задоволена курсами повністю, якщо буде можливість запишусь ще на англійську))
				</span>
        </div>

        <div class="reviews_block">
            <img src="<?=$template_url?>/img/review9.PNG" alt="">
            <h3>ОЛЬГА ПЕТРИШАК</h3>
            <span class="courses">Курс:
					<a href=""> Java Core</a>
				</span>
            <span class="text">
					Проходжу навчання на java developer в Logos IT Academy. Програмування ніколи не вчила і почала з “повного нуля”. На даний момент, сама роблю проект інтернет магазину – це величезний прогрес – за що вдячна нашому викладачу Роману. Ще плюс – якщо на занятті щось не встигла або не зрозуміла -“суботнік” – для мене))Задоволена курсами повністю, якщо буде можливість запишусь ще на англійську))
				</span>
        </div>

        <div class="reviews_block">
            <img src="<?=$template_url?>/img/review4.png" alt="">
            <h3>ОЛЯ ЄНДРУЩАК</h3>
            <span class="courses">Курс:
					<a href="">Java Developer</a>
				</span>
            <span class="text">
					Проходжу навчання на java developer в Logos IT Academy. Програмування ніколи не вчила і почала з “повного нуля”. На даний момент, сама роблю проект інтернет магазину – це величезний прогрес – за що вдячна нашому викладачу Роману. Ще плюс – якщо на занятті щось не встигла або не зрозуміла -“суботнік” – для мене))Задоволена курсами повністю, якщо буде можливість запишусь ще на англійську))
				</span>
        </div>
    </div>
    <div class="show_more">
        <a href="">Усі відгуки</a>
    </div>
</section>

<section class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2573.6024888720194!2d24.031017915709008!3d49.831135979394624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473add67a087981b%3A0x82084e3774e8423c!2z0LLRg9C70LjRhtGPINCG0LLQsNC90LAg0KTRgNCw0L3QutCwLCA2MSwg0JvRjNCy0ZbQsiwg0JvRjNCy0ZbQstGB0YzQutCwINC-0LHQu9Cw0YHRgtGM!5e0!3m2!1suk!2sua!4v1512597569078" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>

<?php get_footer(); ?>