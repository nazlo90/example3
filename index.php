<?php
global $wp_query;
if      (is_front_page())        {load_template(get_template_directory().'/templates/front-page.php');}
elseif  (is_singular('post'))        {load_template(get_template_directory().'/templates/post.php');}
elseif  (is_singular('kursy'))        {
    load_template(get_template_directory().'/templates/page-courses.php');}
elseif  (is_singular('gallery'))        {
    load_template(get_template_directory().'/templates/page-gallery.php');}
elseif  (is_page())         {load_template(get_template_directory().'/templates/page.php');}
elseif  (is_category())      {load_template(get_template_directory().'/templates/news.php');}
elseif  (
    (!is_category())&&
    (!is_null(term_exists($wp_query->query_vars["category_name"])))){
    switch (term_exists($wp_query->query_vars["category_name"])) {
        case '39': {
            load_template(get_template_directory().'/templates/team.php');
            break;
        }
        case '38': {
            load_template(get_template_directory().'/templates/courses.php');
            break;
        }
        case '40': {

            load_template(get_template_directory().'/templates/gallery.php');
            break;
        }
        default:{
            $term=get_term_by('slug',$wp_query->query_vars["name"],'kursy');
            if ((!is_single())&&($wp_query->query_vars['post_type']=='kursy')&&($term)) {
                load_template(get_template_directory() . '/templates/courses-posts-list.php');
            }
            else load_template(get_template_directory() . '/templates/page-404.php');
        }
    }
}
else {
    switch (term_exists($wp_query->query_vars["category_name"])) {
        case '39': {
            load_template(get_template_directory().'/templates/team.php');
            break;
        }
        case '38': {
            load_template(get_template_directory().'/templates/courses.php');
            break;
        }
        case '40': {

            load_template(get_template_directory().'/templates/gallery.php');
            break;
        }
        default:{
            $term=get_term_by('slug',$wp_query->query_vars["name"],'kursy');
            if ((!is_single())&&($wp_query->query_vars['post_type']=='kursy')&&($term)) {
                load_template(get_template_directory() . '/templates/courses-posts-list.php');
            }
            else load_template(get_template_directory() . '/templates/page-404.php');
        }
    }
}
die();


