<?php

/**
 * Theme Setup
 */
function logos_setup() {

	load_theme_textdomain( 'logos' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menu(
		'primary' , __( 'Main Fixed Menu',      'logos' )
	 );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	add_theme_support( 'custom-logo', array(
		'height'      => 68,
		'width'       => 233,
		'flex-height' => true,
	) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	//add_theme_support( 'customize-selective-refresh-widgets' );

    //add pictures to cathegories
    if ( ! class_exists( 'CT_TAX_META' ) ) {
        require (get_template_directory().'/tax_meta_class.php');
    }
        $CT_TAX_META = new CT_TAX_META();
        $CT_TAX_META ->taxonomy_name='kursy';
        $CT_TAX_META ->theme_slug='logos';
        $CT_TAX_META -> init();

    // add gallery support for gallery custom taxonomy
    if ( ! class_exists( 'BE_Gallery_Metabox' ) ) {
        require (get_template_directory().'/gallery-metabox.php');
    }
    $BE_Gallery_Metabox = new BE_Gallery_Metabox();
    $BE_Gallery_Metabox -> post_type= array('gallery');
}
add_action( 'after_setup_theme', 'logos_setup' );

/**
 * Theame customize func
 * @param $wp_customize
 */
function logos_customize_register($wp_customize){
    //social links section
    $wp_customize->add_section(
        'logos_social_options',
        array(
            'title'     => 'Social Link Options',
            'priority'  => 200
        )
    );

        //instagram
        $wp_customize->add_setting(
            'logos_link_instagram',
            array(
                'default'     => 'https://instagram.com'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'link_social_0',
                array(

                    'label'      => __( 'Instagram Link', 'logos' ),
                    'description' => __( 'Select default link for Instagram account', 'logos' ),
                    'section'    => 'logos_social_options',
                    'type' => 'text',
                    'settings'   => 'logos_link_instagram'
                )
            )
        );

        //youtube
        $wp_customize->add_setting(
            'logos_link_yo',
            array(
                'default'     => 'https://youtube.com/'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'link_social_1',
                array(

                    'label'      => __( 'Youtube Link', 'logos' ),
                    'description' => __( 'Select default link for Youtube account', 'logos' ),
                    'section'    => 'logos_social_options',
                    'type' => 'text',
                    'settings'   => 'logos_link_yo'
                )
            )
        );

        //facebook
        $wp_customize->add_setting(
            'logos_link_fb',
            array(
                'default'     => 'https://fb.me'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'link_social_2',
                array(

                    'label'      => __( 'Facebook Link', 'logos' ),
                    'description' => __( 'Select default link for Facebook account', 'logos' ),
                    'section'    => 'logos_social_options',
                    'type' => 'text',
                    'settings'   => 'logos_link_fb'
                )
            )
        );

        //google+
        $wp_customize->add_setting(
            'logos_link_gplus',
            array(
                'default'     => 'https://plus.google.com'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'link_social_3',
                array(

                    'label'      => __( 'Google+ Link', 'logos' ),
                    'description' => __( 'Select default link for Google+ account', 'logos' ),
                    'section'    => 'logos_social_options',
                    'type' => 'text',
                    'settings'   => 'logos_link_gplus'
                )
            )
        );

        //pinterest
        $wp_customize->add_setting(
            'logos_link_pi',
            array(
                'default'     => 'https://pinterest.com'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'link_social_4',
                array(

                    'label'      => __( 'Pinterest Link', 'logos' ),
                    'description' => __( 'Select default link for Pinterest account', 'logos' ),
                    'section'    => 'logos_social_options',
                    'type' => 'text',
                    'settings'   => 'logos_link_pi'
                )
            )
        );
    //pocket
    $wp_customize->add_setting(
        'logos_link_pock',
        array(
            'default'     => 'https://getpocket.com'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'link_social_5',
            array(

                'label'      => __( 'Pocket Link', 'logos' ),
                'description' => __( 'Select default link for Pocket account', 'logos' ),
                'section'    => 'logos_social_options',
                'type' => 'text',
                'settings'   => 'logos_link_pock'
            )
        )
    );
    //vk
    $wp_customize->add_setting(
        'logos_link_vk',
        array(
            'default'     => 'https://vk.com'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'link_social_6',
            array(

                'label'      => __( 'VK Link', 'logos' ),
                'description' => __( 'Select default link for VK account', 'logos' ),
                'section'    => 'logos_social_options',
                'type' => 'text',
                'settings'   => 'logos_link_vk'
            )
        )
    );
    //twitter
    $wp_customize->add_setting(
        'logos_link_tw',
        array(
            'default'     => 'https://twitter.com/'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'link_social_7',
            array(

                'label'      => __( 'Twitter Link', 'logos' ),
                'description' => __( 'Select default link for Twitter account', 'logos' ),
                'section'    => 'logos_social_options',
                'type' => 'text',
                'settings'   => 'logos_link_tw'
            )
        )
    );
    // header control section
    $wp_customize->add_section(
        'logos_header_options',
        array(
            'title'     => 'Header Options',
            'priority'  => 200
        )
    );

        //show wordpress checkbox
        $wp_customize->add_setting(
            'logos_add_wordpress_support_',
            array(
                'default'     => '1'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'logos_add_wordpress_support',
                array(

                    'label'      => __( 'Add wordpress header and footer support', 'logos' ),
                    'description' => __( 'This will include all wordpress css and js', 'logos' ),
                    'section'    => 'logos_header_options',
                    'type' => 'checkbox',
                    'settings'   => 'logos_add_wordpress_support_'
                )
            )
        );

        //show banner checkbox
        $wp_customize->add_setting(
            'logos_header_show_banner_',
            array(
                'default'     => '1'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'logos_header_show_banner',
                array(

                    'label'      => __( 'Show banner', 'logos' ),
                    'description' => __( 'Show banner in header or not', 'logos' ),
                    'section'    => 'logos_header_options',
                    'type' => 'checkbox',
                    'settings'   => 'logos_header_show_banner_'
                )
            )
        );

    // Google apiV3 Youtube key
    $wp_customize->add_setting(
        'logos_google_key',
        array(
            'default'     => 'Get key by this url https://developers.google.com/youtube/v3/docs/videos/list'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'logos_google',
            array(

                'label'      => __( 'Google API Key', 'logos' ),
                'description' => __( '', 'logos' ),
                'section'    => 'logos_header_options',
                'type' => 'text',
                'settings'   => 'logos_google_key'
            )
        )
    );

    // Google apiV3 Youtube Channel ID
    $wp_customize->add_setting(
        'logos_google_channel_id',
        array(
            'default'     => 'UCM_U7M7VXyvsG35D1sInE8g'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'logos_google_channel_id_',
            array(

                'label'      => __( 'Youtube channel ID', 'logos' ),
                'description' => __( '', 'logos' ),
                'section'    => 'logos_header_options',
                'type' => 'text',
                'settings'   => 'logos_google_channel_id'
            )
        )
    );

    // Google apiV3 Youtube Channel ID
    $wp_customize->add_setting(
        'logos_facebook_id',
        array(
            'default'     => '148589332000720'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'logos_facebook_',
            array(

                'label'      => __( 'Facebook ID', 'logos' ),
                'description' => __( 'http://lgs.lviv.ua: 148589332000720', 'logos' ),
                'section'    => 'logos_header_options',
                'type' => 'text',
                'settings'   => 'logos_facebook_id'
            )
        )
    );

        // phone number in header
        $wp_customize->add_setting(
            'logos_header_phone',
            array(
                'default'     => '(067) 990-37-93'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'logos_header_0',
                array(

                    'label'      => __( 'Phone number', 'logos' ),
                    'description' => __( 'Контактний номер телефону', 'logos' ),
                    'section'    => 'logos_header_options',
                    'type' => 'text',
                    'settings'   => 'logos_header_phone'
                )
            )
        );

        $wp_customize->add_setting(
            'logos_header_show_banner_url',
            array(
                'default'     => '/'
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'logos_header_show_banner_0',
                array(

                    'label'      => __( 'Посилання на новину', 'logos' ),
                    'description' => __( 'Посилання на новину', 'logos' ),
                    'section'    => 'logos_header_options',
                    'type' => 'text',
                    'settings'   => 'logos_header_show_banner_url'
                )
            )
        );


        $wp_customize->add_setting(
            'logos_header_show_banner_image_1',
            array(
                'default'     => ''
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'logos_header_show_banner_1',
                array(

                    'label'      => __( 'Заголовок новини', 'logos' ),
                    'description' => __( 'Заголовок новини', 'logos' ),
                    'section'    => 'logos_header_options',
                    'type' => 'text',
                    'settings'   => 'logos_header_show_banner_image_1'
                )
            )
        );

        $wp_customize->add_setting(
            'logos_header_show_banner_image_2',
            array(
                'default'     => ''
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'logos_header_show_banner_2',
                array(

                    'label'      => __( 'Текст для кнопки', 'logos' ),
                    'description' => __( 'Текст для кнопки', 'logos' ),
                    'section'    => 'logos_header_options',
                    'type' => 'text',
                    'settings'   => 'logos_header_show_banner_image_2'
                )
            )
        );

}
add_action('customize_register', 'logos_customize_register');

/**
 * Register Custom post
 * Slug=portfolio
 */
function logos_post_types() {

    //====================courses
    $labels = array(
        'name'                => __( 'Courses', 'logos' ),
        'singular_name'       => __( 'Courses', 'logos' ),
        'add_new'             => __( 'Add New', 'logos' ),
        'add_new_item'        => __( 'Add New Course', 'logos' ),
        'edit_item'           => __( 'Edit Course', 'logos' ),
        'new_item'            => __( 'New Course', 'logos' ),
        'all_items'           => __( 'All Courses', 'logos' ),
        'view_item'           => __( 'View Course', 'logos' ),
        'search_items'        => __( 'Search Courses', 'logos' ),
        'not_found'           => __( 'No Courses found', 'logos' ),
        'not_found_in_trash'  => __( 'No Courses found in Trash', 'logos' ),
        'menu_name'           => __( 'КУРСИ', 'logos' ),
    );

    $supports = array( 'title', 'editor' ,'thumbnail','tags');

    $slug = get_theme_mod( 'kursy_permalink' );
    $slug = ( empty( $slug ) ) ? 'kursy' : $slug;

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => $slug ),
        'capability_type'     => 'post',
        'has_archive'         => false,
        'hierarchical'        => false,
        'menu_position'       => null,
        'taxonomies' => array( '' ),
        'supports'            => $supports,
    );

    register_post_type( 'kursy', $args );
    register_taxonomy_for_object_type( 'post_tag', 'kursy');
    # Create the news categories custom taxonomy
    register_taxonomy( 'kursy', 'kursy', array(
        'label'        => 'Courses Categories',
        'labels'       => array(
            'menu_name' => __( 'Courses Categories', 'logos' )
        ),
        'rewrite'      => array(
            'slug' => 'kursy',
            'hierarchical' => true
        ),
        'hierarchical' => true,
        'show_in_menu' => true,// adding to custom menu manually
        'query_var' => true,
        'public'=>true
    ) );

    add_rewrite_tag( "%kursy%", '([^/]+)', "post_type=kursy&name=" );
    add_permastruct('kursy', 'kursy/%kursy%', array(
        'with_front'  => true,
        'paged'       => true,
        'ep_mask'     => EP_NONE,
        'feed'        => false,
        'forcomments' => false,
        'walk_dirs'   => false,
        'endpoints'   => false,
    ));


    if (!term_exists('kursy','kursy')) wp_insert_term('kursy','kursy',array(
        'description'=> 'Courses',
        'slug' => 'kursy'
    ));

    //====================Gallery
    $labels = array(
        'name'                => __( 'Why select us', 'logos' ),
        'singular_name'       => __( 'Why', 'logos' ),
        'add_new'             => __( 'Add New', 'logos' ),
        'add_new_item'        => __( 'Add New "Why us"', 'logos' ),
        'edit_item'           => __( 'Edit "Why us"', 'logos' ),
        'new_item'            => __( 'New "Why us"', 'logos' ),
        'all_items'           => __( 'All "Why us"', 'logos' ),
        'view_item'           => __( 'View "Why us"', 'logos' ),
        'search_items'        => __( 'Search "Why us"', 'logos' ),
        'not_found'           => __( 'No "Why us" found', 'logos' ),
        'not_found_in_trash'  => __( 'No "Why us" found in Trash', 'logos' ),
        'menu_name'           => __( 'Gallery', 'logos' ),
    );

    $supports = array( 'title', 'thumbnail');

    $slug = get_theme_mod( 'gallery_permalink' );
    $slug = ( empty( $slug ) ) ? 'gallery' : $slug;

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => $slug ),
        'capability_type'     => 'post',
        'has_archive'         => false,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => $supports,
    );

    register_post_type( 'gallery', $args );
    register_taxonomy( 'gallery', 'gallery', array(
        'label'        => 'Gallery Categories',
        'labels'       => array(
            'menu_name' => __( 'Gallery Categories', 'logos' )
        ),
        'rewrite'      => array(
            'slug' => 'galereya',//'gallery',
            'hierarchical' => false
        ),
        'hierarchical' => false,
        'show_in_menu' => false,// adding to custom menu manually
        'query_var' => true,
        'public'=>true
    ) );
    add_rewrite_tag( "%gallery%", '([^/]+)', "post_type=gallery&name=" );
    add_permastruct('gallery', 'galereya/%gallery%', array(
        'with_front'  => true,
        'paged'       => true,
        'ep_mask'     => EP_NONE,
        'feed'        => false,
        'forcomments' => false,
        'walk_dirs'   => false,
        'endpoints'   => false,
    ));
    if (!term_exists('gallery','gallery')) wp_insert_term('gallery','gallery',array(
        'description'=> 'Gallery',
        'slug' => 'galereya'//'gallery'
    ));
    //====================Our Team
    $labels = array(
        'name'                => __( 'Our team', 'logos' ),
        'singular_name'       => __( 'Team', 'logos' ),
        'add_new'             => __( 'Add New', 'logos' ),
        'add_new_item'        => __( 'Add New person to Team', 'logos' ),
        'edit_item'           => __( 'Edit person in Team', 'logos' ),
        'new_item'            => __( 'New person in Team', 'logos' ),
        'all_items'           => __( 'All Team members', 'logos' ),
        'view_item'           => __( 'View Team', 'logos' ),
        'search_items'        => __( 'Search Team', 'logos' ),
        'not_found'           => __( 'No person in Team found', 'logos' ),
        'not_found_in_trash'  => __( 'No person in Team found in Trash', 'logos' ),
        'menu_name'           => __( 'ВИКЛАДАЧІ', 'logos' ),
    );

    $supports = array( 'title', 'editor' ,'thumbnail','tags');

    $args = array(
        'labels'              => $labels,
        'taxonomies'          => array( 'team' ),

        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => false,
        'capability_type'     => 'post',
        'has_archive'         => false,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => $supports,
        'show_in_nav_menus'   => false,

    );

    register_post_type( 'team', $args );
    register_taxonomy_for_object_type( 'post_tag', 'team');

    register_taxonomy( 'team', 'team', array(
        'label'        => 'Team Categories',
        'labels'       => array(
            'menu_name' => __( 'Team Categories', 'logos' )
        ),
        'rewrite'      => array(
            'slug' => 'team',
            'hierarchical' => true
        ),
        'hierarchical' => false,
        'show_in_menu' => false,// adding to custom menu manually
        'query_var' => true,
        'public'=>true
    ) );

    add_rewrite_tag( "%team%", '([^/]+)', "post_type=team&name=" );
    add_permastruct('team', 'vykladachi/%team%', array(
        'with_front'  => true,
        'paged'       => true,
        'ep_mask'     => EP_NONE,
        'feed'        => false,
        'forcomments' => false,
        'walk_dirs'   => false,
        'endpoints'   => false,
    ));

    if (!term_exists('team','team')) wp_insert_term('team','team',array(
        'description'=> 'Team',
        'slug' => 'team'
    ));
    //====================Faq
    $labels = array(
        'name'                => __( 'Faq', 'logos' ),
        'singular_name'       => __( 'Faq', 'logos' ),
        'add_new'             => __( 'Add New', 'logos' ),
        'add_new_item'        => __( 'Add New Faq', 'logos' ),
        'edit_item'           => __( 'Edit Faq', 'logos' ),
        'new_item'            => __( 'New Faq', 'logos' ),
        'all_items'           => __( 'All Faq', 'logos' ),
        'view_item'           => __( 'View Faq', 'logos' ),
        'search_items'        => __( 'Search Faq', 'logos' ),
        'not_found'           => __( 'No Faq\'s found', 'logos' ),
        'not_found_in_trash'  => __( 'No Faq\'s found in Trash', 'logos' ),
        'menu_name'           => __( 'ПИТАННЯ ТА ВІДПОВІДІ', 'logos' ),
    );

    $supports = array( 'title', 'editor');

    $slug = get_theme_mod( 'faq' );
    $slug = ( empty( $slug ) ) ? 'faq' : $slug;

    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'publicly_queryable'  => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => $slug ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => $supports,
    );

    register_post_type( 'faq', $args );

    //====================main page courses
    $labels = array(
        'name'                => __( 'Complex Courses', 'logos' ),
        'singular_name'       => __( 'Courses', 'logos' ),
        'add_new'             => __( 'Add New', 'logos' ),
        'add_new_item'        => __( 'Add New Course', 'logos' ),
        'edit_item'           => __( 'Edit Course', 'logos' ),
        'new_item'            => __( 'New Course', 'logos' ),
        'all_items'           => __( 'All Courses', 'logos' ),
        'view_item'           => __( 'View Course', 'logos' ),
        'search_items'        => __( 'Search Courses', 'logos' ),
        'not_found'           => __( 'No Courses found', 'logos' ),
        'not_found_in_trash'  => __( 'No Courses found in Trash', 'logos' ),
        'menu_name'           => __( 'КОМПЛЕКСНІ КУРСИ,Main page', 'logos' ),
    );

    $supports = array( 'title', 'editor' ,'thumbnail');

    $slug = get_theme_mod( 'courses_urls_permalink' );
    $slug = ( empty( $slug ) ) ? 'courses_urls' : $slug;

    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'publicly_queryable'  => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => $slug ),
        'capability_type'     => 'post',
        'has_archive'         => false,
        'hierarchical'        => false,
        'menu_position'       => null,
        'taxonomies' => array( '' ),
        'supports'            => $supports,
    );

    register_post_type( 'courses_urls', $args );

}
add_action( 'init', 'logos_post_types' );


//================================================ Custom metaBox Team

function adding_custom_meta_boxes( $post_type, $post ) {
    //show metabox for team
    add_meta_box( 'meta-box-team', 'Team member profile', 'team_meta_box', 'team', 'advanced', 'high' );
    add_meta_box( 'meta-box-external_courses', 'External resource url', 'external_courses_meta_box', 'courses_urls', 'advanced', 'high' );
    add_meta_box( 'meta-box-courses', 'Courses', 'courses_meta_box', 'kursy', 'advanced', 'high' );
    add_meta_box( 'meta-box-courses-table', 'Schedule', 'courses_table_meta_box', 'kursy', 'advanced', 'high' );
    /*add_meta_box( 'meta-box-gallery' , 'Media Library', 'gallery_meta_box', 'gallery', 'advanced', 'high' );*/
}
add_action( 'add_meta_boxes', 'adding_custom_meta_boxes', 10, 2 );

function team_meta_box($post){

    wp_nonce_field( basename( __FILE__ ), 'team_meta_box_nonce' );
    ?>
    <div class='inside'>
        <h3><?php _e( 'Team member position', 'team_social' ); ?></h3>
        <p style="padding-left: 15px">
            <label for="position" style="width: 200px; padding-right: 15px;">Position:</label><input style="width: 80%" id="position" type="text" name="position" value="<?=get_post_meta( $post->ID, '_team_position', true )?>">
        </p>
        <h3><?php _e( 'Social Links for Team member', 'team_social' ); ?></h3>
        <p style="padding-left: 15px">
            <p><label for="fb" style="min-width: 20%; padding-right: 15px;">Facebook:</label><input style="width: 80%" id="fb" type="text" name="fb" value="<?=get_post_meta( $post->ID, '_team_social_fb', true )?>"></p>
            <p><label for="linked" style="min-width: 20%; padding-right: 15px;">LinkedIn:</label><input style="width: 80%" id="linked" type="text" name="linked" value="<?=get_post_meta( $post->ID, '_team_social_linked', true )?>"></p>
        </p>
    </div>
    <?
}
function team_save_meta_boxes_data( $post_id ){

    if ( !isset( $_POST['post_type'] ) || !wp_verify_nonce( $_POST['team_meta_box_nonce'], basename( __FILE__ ) ) ) {
        return;
    } elseif ( ! current_user_can( 'edit_post', $post_id ) ){
        return;
    }
    $args=array(
        "fb"=>FILTER_SANITIZE_STRING,
        "linked"=>FILTER_SANITIZE_STRING,
        "position"=>FILTER_SANITIZE_STRING
    );
    $arr=filter_input_array(INPUT_POST,$args,true);

    update_post_meta( $post_id, '_team_social_fb', $arr['fb'] );
    update_post_meta( $post_id, '_team_social_linked', $arr['linked'] );
    update_post_meta( $post_id, '_team_position', $arr['position'] );
}
add_action( 'save_post_team', 'team_save_meta_boxes_data', 10, 2 );

function external_courses_meta_box($post){

    wp_nonce_field( basename( __FILE__ ), 'external_courses_meta_box_nonce' );
    ?>
    <div class='inside'>
        <h3><?php _e( 'Link to external source', 'courses_urls' ); ?></h3>
        <p style="padding-left: 15px">
            <label for="position" style="width: 200px; padding-right: 15px;">Link:</label><input style="width: 80%" id="position" type="text" name="url" value="<?=get_post_meta( $post->ID, '_external_courses_url', true )?>">
        </p>

    </div>
    <?
}
function external_courses_save_meta_boxes_data( $post_id ){

    if ( !isset( $_POST['post_type'] ) || !wp_verify_nonce( $_POST['external_courses_meta_box_nonce'], basename( __FILE__ ) ) ) {
        return;
    } elseif ( ! current_user_can( 'edit_post', $post_id ) ){
        return;
    }
    $args=array(
        "url"=>FILTER_SANITIZE_STRING
    );
    $arr=filter_input_array(INPUT_POST,$args,true);

    update_post_meta( $post_id, '_external_courses_url', $arr['url'] );

}
add_action( 'save_post_courses_urls', 'external_courses_save_meta_boxes_data', 10, 2 );



function courses_meta_box($post){
    $post_meta=get_post_meta($post->ID);
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
    wp_nonce_field( basename( __FILE__ ), 'courses_meta_box_nonce' );
    ?>
    <div class='inside'>
        <h3><?php _e( 'ВАРТІСТЬ', 'courses' ); ?></h3>
        <p>
            <label for="price_num">КІЛЬКІСТЬ ЗАНЯТЬ:</label>
            <input id="price_num" type="text" name="price_num" value="<?=get_post_meta( $post->ID, '_courses_price_num', true )?>">
        </p>
        <p>
            <label for="price_hours">КІЛЬКІСТЬ АКАДЕМ. ГОДИН:</label>
            <input id="price_hours" type="text" name="price_hours" value="<?=get_post_meta( $post->ID, '_courses_price_hours', true )?>">
        </p>
        <p>
            <label for="price_individual">ЦІНА ІНДИВІДУАЛЬНОГО КУРСУ:</label>
            <input id="price_individual" type="text" name="price_individual" value="<?=get_post_meta( $post->ID, '_courses_price_individual', true )?>">
        </p>
        <p>
            <label for="price_group">ЦІНА ГРУПОВОГО КУРСУ:</label>
            <input id="price_group" type="text" name="price_group" value="<?=get_post_meta( $post->ID, '_courses_price_group', true )?>">
        </p>
        
    </div>
    <style>
        #meta-box-courses .inside p,
        .add_new_fiels .form_wrap {
            display: flex;
            flex-direction: column;
        }
        .form_wrap .wrap{
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .form_wrap .wrap input{
            width: 100%;
            margin-right: 20px;
        }
        .plus, .minus, .save,
        .plus_table, .minus_table, .save_table{
            padding: 4px 8px;
            text-decoration: none;
            border: none;
            border: 1px solid #ccc;
            border-radius: 2px;
            background: #f7f7f7;
            color: #0073aa;
            text-shadow: none;
            font-weight: 600;
            font-size: 13px;
            height: 20px;
            line-height: normal;
            cursor: pointer;
            outline: 0;
        }
        .plus:hover, .minus:hover, .save:hover,
        .plus_table:hover, .minus_table:hover, .save_table:hover{
            background: #0073aa;
            color: #f7f7f7;
        }
        .new_fields{
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;
            align-items: center;}
        .new_fields .minus{
            margin-right: 20px;
        }
        .added_fields.show_text{
            color: #0073aa ;
            background: #f0f0f0;
        }

    </style>
    <div class="add_new_fields">
        <h3 class="text-field">ПРОГРАМА НАВЧАННЯ</h3>
        <div class="form_wrap">
            <div class="wrap">
                <input type="text" name="program_title" value="<?=get_post_meta( $post->ID, '_courses_program_title', true )?>">
                <span class="plus">+</span>
            </div>
            <?php wp_editor(get_post_meta( $post->ID, '_courses_program_content', true ),'program_content');?>
        </div>
    </div>
    <?php
    try {
    foreach ($filtered as $value):?>
    <div class="added_fields" key1="<?=$value['key1']?>" key2="<?=$value['key2']?>">
        <div class="new_fields">
            <span class="minus" >-</span>
            <h3 class="text-field"><?=$value[0]?></h3>
        </div>
        
        <span class="show_text"><?=$value[1]?></span>
        
        <hr>
    </div>

    <?php endforeach;} catch(Exception $e) {}?>
    <script>
        $(document).ready(function(){
            $('.added_fields').each(function(){
                
                $(this).mouseover(function(){
                    if(!$(this).hasClass('show_text')) {
                        $(this).addClass('show_text');
                    } 
                });
                $(this).mouseout(function(){
                    if($(this).hasClass('show_text')) {
                        $(this).removeClass('show_text');
                    } 
                });
                //$(this).mouseout().removeClass('show_text');
            });
            
            $(document).on('click','.plus', function(){
                var content=tinyMCE.get('program_content');

                if(content!==null){
                    $('#program_content').val('');
                    content=tinyMCE.get('program_content').getContent();
                    tinyMCE.get('program_content').setContent('');
                } else {
                    content=$('#program_content').val();
                    $('#program_content').val('');
                }



                var message={
                    'action':'add_courses',
                    'post_id':<?=$post->ID?>,
                    'title_courses':$('input[name="program_title"]').val(),
                    'text_courses': content,
                    'courses_meta_box_nonce':$('#courses_meta_box_nonce').val(),
                    'post_type':''
                };
                $('input[name="program_title"]').val('');

                $.ajax({
                    url: '/wp-admin/admin-ajax.php', // point to server-side PHP script
                    dataType: 'JSON',  // what to expect back from the PHP script, if anything
                    cache: false,
                    data: message,
                    type: 'POST',
                    success: function (res)  {
                        try {
                            if (res.status==true){
                                $('.add_new_fields').after('' +
                                    '    <div class="added_fields" key1="'+res.data.key1+'" key2="'+res.data.key2+'">\n'+
                                    '        <div class="new_fields">\n' +
                                    '           <span class="minus" >-</span>\n' +
                                    '           <h3 class="text-field">'+res.data[0]+'</h3>\n' +
                                    '        </div>\n' +
                                    '        <span class="show_text">'+res.data[1]+'</span>\n' +
                                    '   <hr></div>\n' +
                                    '   ');


                            }
                        }
                        catch (e)
                        {
                            console.log('Nothing was found')
                        }
                    }
                });
            });
            $(document).on('click','.minus', function(){
                var message={
                    'action':'delete_courses',
                    'post_id':<?=$post->ID?>,
                    'key1':$(this).closest('.added_fiels').attr('key1'),
                    'key2':$(this).closest('.added_fiels').attr('key1'),
                    'courses_meta_box_nonce':$('#courses_meta_box_nonce').val(),
                    'post_type':''
                };
                var obj=$(this).closest('.added_fields');
                $.ajax({
                    url: '/wp-admin/admin-ajax.php', // point to server-side PHP script
                    dataType: 'JSON',  // what to expect back from the PHP script, if anything
                    cache: false,
                    data: message,
                    type: 'POST',
                    success: function (res)  {
                        try {
                            if (res.status==true){
                                obj.detach();
                            }
                        }
                        catch (e)
                        {
                            console.log('Nothing was found')
                        }
                    }
                });
            });
        });
    </script>
    <?php
}

function courses_table_meta_box($post){
    $post_meta=get_post_meta($post->ID);
    wp_nonce_field( basename( __FILE__ ), 'courses_meta_box_nonce' );
?>
<style>
    .courses_schedule table{
        width: 100%;
        border-spacing: 1px;
    }
    .courses_schedule table thead tr{
        background: #1D8BD1;
        color: #fff;
    }
    .courses_schedule table thead tr td{
        padding: 5px;
        text-align: center;
        width: 16%;
    }
    .courses_schedule table tbody tr td input{
        width: 100%;
    }
    .courses_schedule table tbody tr td{text-align: center;}
    tr.added_fields td {
        height: 20px;
        padding: 10px;
        border-bottom: 1px solid #1D8BD1;
    }

</style>
<div class="courses_schedule">
    <table>
        <thead>
            <tr>
                <td>Time</td>
                <td>Days</td>
                <td>Start</td>
                <td>Total Price</td>

                <td><span class="plus_table">Додати</span></td>
            </tr>
        </thead>
        <tbody>
        <?php
        try {foreach ($post_meta as $key=>$value):
            if (strpos($key,'_courses_course_')!==false):
                $data=json_decode($value[0],true);
            ?>
            <tr class="added_fields" key="<?=str_replace('_courses_course_','',$key)?>">
                <td><?=htmlspecialchars_decode($data[0])?></td>
                <td><?=htmlspecialchars_decode($data[1])?></td>
                <td><?=htmlspecialchars_decode($data[2])?></td>
                <td><?=htmlspecialchars_decode($data[3])?></td>

                <td><span class="minus_table">Видалити</span></td>
            </tr>
<?php  endif;endforeach;}catch (Exception $e) {} ?>
        </tbody>
    </table>

</div>
    <script>
            /**
             * Add new form fields
             */
            $(document).on('click','.plus_table', function(){

                    if ($('.edit_schedule').length==0)
                    $(this).closest('table').find('tbody').prepend('' +
                        '<tr class="edit_schedule">\n' +
                        '                <td><input class="course_0" placeholder="КОМПЛЕКСНИЙ КУРС JAVA"></td>\n' +
                        '                <td><input class="course_1" placeholder="КОМПЛЕКСНИЙ КУРС JAVA"></td>\n' +
                        '                <td><input class="course_2" placeholder="КОМПЛЕКСНИЙ КУРС JAVA"></td>\n' +
                        '                <td><input class="course_3" placeholder="КОМПЛЕКСНИЙ КУРС JAVA"></td>\n' +

                        '                <td><span class="save_table">Зберегти</span><span class="minus_table">Видалити</span></td>\n' +
                        '</tr>');
                });

            /**
             * Save user defibed fields ajax
             */
            $(document).on('click','.save_table', function(){
                var message={
                    'action':'add_courses_table',
                    'post_id':<?=$post->ID?>,
                    'course_0_':$('input.course_0').val(),
                    'course_1_':$('input.course_1').val(),
                    'course_2_':$('input.course_2').val(),
                    'course_3_':$('input.course_3').val(),

                    'courses_meta_box_nonce':$('#courses_meta_box_nonce').val(),
                    'post_type':''
                };
                var $obj=$(this).closest('tr');


                $.ajax({
                    url: '/wp-admin/admin-ajax.php', // point to server-side PHP script
                    dataType: 'JSON',  // what to expect back from the PHP script, if anything
                    cache: false,
                    data: message,
                    type: 'POST',
                    success: function (res)  { console.log(res);
                        try {
                            if (res.status==true){
                              $obj.after(' ' +
                                  '<tr class="added_fields" key="'+res.data["key_stamp"]+'">\n' +
                                  '                <td>'+$('input.course_0').val()+'</td>\n' +
                                  '                <td>'+$('input.course_1').val()+'</td>\n' +
                                  '                <td>'+$('input.course_2').val()+'</td>\n' +
                                  '                <td>'+$('input.course_3').val()+'</td>\n' +

                                  '                <td><span class="minus_table">Видалити</span></td>\n' +
                                  '</tr>');
                              $obj.detach();
                            }
                        }
                        catch (e)
                        {
                            console.log('Nothing was found')
                        }
                    }
                });
            });

            /**
             * Delete course table ajax
             */
            $(document).on('click','.minus_table', function(){
                if ($(this).closest('tr.edit_schedule').length>0) {
                    $(this).closest('tr.edit_schedule').detach();
                    return;
                }

                var message={
                    'action':'delete_courses_table',
                    'post_id':<?=$post->ID?>,
                    'key':$(this).closest('.added_fields').attr('key'),
                    'courses_meta_box_nonce':$('#courses_meta_box_nonce').val(),
                    'post_type':''
                };
                var obj=$(this).closest('.added_fields');
                $.ajax({
                    url: '/wp-admin/admin-ajax.php', // point to server-side PHP script
                    dataType: 'JSON',  // what to expect back from the PHP script, if anything
                    cache: false,
                    data: message,
                    type: 'POST',
                    success: function (res)  {
                        try {
                            if (res.status==true){
                                obj.detach();
                            }
                        }
                        catch (e)
                        {
                            console.log('Nothing was found')
                        }
                    }
                });

        });
    </script>
<?php
}

/**
 * Save Post data
 * @param $post_id
 * @return array|void
 */
function courses_save_meta_boxes_data( $post_id ){

    if ( !isset( $_POST['post_type'] ) || !wp_verify_nonce( $_POST['courses_meta_box_nonce'], basename( __FILE__ ) ) ) {
        return;
    } elseif ( ! current_user_can( 'edit_post', $post_id ) ){
        return;
    }
    $args=array(
        "price_num"=>FILTER_SANITIZE_STRING,
        "price_hours"=>FILTER_SANITIZE_STRING,
        "price_individual"=>FILTER_SANITIZE_STRING,
        "price_group"=>FILTER_SANITIZE_STRING,
        "title_courses"=>FILTER_SANITIZE_STRING,
        "text_courses"=>FILTER_UNSAFE_RAW,
        "course_0_"=>FILTER_SANITIZE_SPECIAL_CHARS,
        "course_1_"=>FILTER_SANITIZE_SPECIAL_CHARS,
        "course_2_"=>FILTER_SANITIZE_SPECIAL_CHARS,
        "course_3_"=>FILTER_SANITIZE_SPECIAL_CHARS,
        "course_4_"=>FILTER_SANITIZE_SPECIAL_CHARS,

    );
    $arr=filter_input_array(INPUT_POST,$args,true);
    $key_timestamp=time();
    $result=array(
            'key1'=>'title_courses'.$key_timestamp,
            'key2'=>'text_courses'.$key_timestamp,
            'key_stamp'=>$key_timestamp,
            "0"=>$arr['title_courses'],
            "1"=>$arr['text_courses']);
    $arr[$result['key1']]=$arr['title_courses'];
    unset($arr['title_courses']);
    $arr[$result['key2']]=$arr['text_courses'];
    unset($arr['text_courses']);

        $json_encoded=array();
    foreach ($arr as $key=>$value)
    {
        if ((strpos($key,'course_')!==false)&&(!is_null($arr[$key]))) {
            $json_encoded[]=$arr[$key];
            unset($arr[$key]);}
    }
    if (count($json_encoded)>0)
    $arr['course_'.$key_timestamp]=json_encode($json_encoded, JSON_UNESCAPED_UNICODE);
    foreach ($arr as $key=>$value) if (!is_null($value))
    update_post_meta( $post_id, '_courses_'.$key, $value );
    return $result;
}
add_action( 'save_post_kursy', 'courses_save_meta_boxes_data', 10, 2 );
function courses_add(){
    $post_id=filter_input(INPUT_POST,'post_id',FILTER_VALIDATE_INT);
    if ($post_id)
    $result=courses_save_meta_boxes_data($post_id);
    echo json_encode(array('status'=>true,'data'=>$result));
    die();

}
add_action('wp_ajax_add_courses', 'courses_add');
function courses_delete(){

    $args=array(
        "post_id"=>FILTER_VALIDATE_INT,
        "key1"=>FILTER_SANITIZE_STRING,
        "key2"=>FILTER_SANITIZE_STRING,
    );
    $arr=filter_input_array(INPUT_POST,$args,true);


    if ( !isset( $_POST['post_type'] ) || !wp_verify_nonce( $_POST['courses_meta_box_nonce'], basename( __FILE__ ) ) ) {
        return;
    } elseif ( ! current_user_can( 'edit_post', $arr['post_id'] ) ){
        return;
    }


    delete_post_meta( $arr['post_id'], $arr['key1'] );
    delete_post_meta( $arr['post_id'], $arr['key2'] );
    echo json_encode(array('status'=>true));
    die();
}
add_action('wp_ajax_delete_courses', 'courses_delete');

function courses_table_add(){
    $post_id=filter_input(INPUT_POST,'post_id',FILTER_VALIDATE_INT);
    if ($post_id)
        $result=courses_save_meta_boxes_data($post_id);
    echo json_encode(array('status'=>true,'data'=>$result));
    die();

}
add_action('wp_ajax_add_courses_table', 'courses_table_add');
function courses_table_delete(){

    $args=array(
        "post_id"=>FILTER_VALIDATE_INT,
        "key"=>FILTER_SANITIZE_STRING

    );
    $arr=filter_input_array(INPUT_POST,$args,true);


    if ( !isset( $_POST['post_type'] ) || !wp_verify_nonce( $_POST['courses_meta_box_nonce'], basename( __FILE__ ) ) ) {
        return;
    } elseif ( ! current_user_can( 'edit_post', $arr['post_id'] ) ){
        return;
    }


    delete_post_meta( $arr['post_id'], '_courses_course_'.$arr['key'] );

    echo json_encode(array('status'=>true,'data'=>'Ok'));
    die();
}
add_action('wp_ajax_delete_courses_table', 'courses_table_delete');

function Schedule_Shortcode(){

    $result=array();
    try {
        foreach (get_posts(array( 'numberposts' => -1,'post_type' => 'kursy')) as $obj){

            foreach (get_post_meta($obj->ID) as $key=>$value){
                if (strpos($key,'_courses_course_')!==false)
                    $data[]=json_decode($value[0],true);
            }
            $result[]=array(
                    'post_id'=>$obj->ID,
                    'post_title'=>$obj->post_title,
                    'meta'=>$data
            );
            unset ($data);
        }

    }
    catch (Exception $e) { var_dump($e);}

    ?>

    <div class="select-title">
        <select id="type">
            <option value="">Всі курси</option>
            <option value="java.lviv.ua">КОМПЛЕКСНИЙ КУРС JAVA</option>
            <option value="sqa.lviv.ua">КОМПЛЕКСНИЙ КУРС ТЕСТУВАННЯ</option>
            <option value="frontend.lviv.ua">КОМПЛЕКСНИЙ КУРС WEB DEVELOPER</option>
            <option value="hr.lviv.ua">КОМПЛЕКСНИЙ КУРС HR</option>
            <option value="wma.lviv.ua">КОМПЛЕКСНИЙ КУРС WEB MARKETING</option>
            <?php
                foreach ($result as $value):
                    if (count($value['meta'])>0):?>
                    <option value="<?=$value['post_id']?>"><?=$value['post_title']?></option>
                <?php endif;endforeach;?>


        </select>
    </div>
    <div class="wrap_directions">

        <table id="java.lviv.ua" class="courses_schedule">
            <caption>
                <a class="course_link" href="http://java.lviv.ua">КОМПЛЕКСНИЙ КУРС JAVA</a>
            </caption>
            <thead>
            <tr>
                <td>Час</td>
                <td>Дні</td>
                <td>Початок</td>
                <td>Вартість</td>
                <td></td>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td>16.00 – 17.30</td>
                    <td>ПН – СР – ПТ</td>
                    <td>19.03.2018</td>
                    <td><del style="color:red!important">15 000 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-30%)</strong></td>
                    <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
                </tr>

                <tr>
                    <td>17.30 – 19.00</td>
                    <td>ПН – СР – ПТ</td>
                    <td>19.03.2018</td>
                    <td><del style="color:red!important">15 000 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-30%)</strong></td>
                    <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
                </tr>

                <tr>
                    <td>19.00 – 20.30</td>
                    <td>ПН – СР – ПТ</td>
                    <td>19.03.2018</td>
                    <td><del style="color:red!important">15 000 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-30%)</strong></td>
                    <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
                </tr>

                <tr>
                    <td>20.30 – 22.00</td>
                    <td>ПН – СР – ПТ</td>
                    <td>19.03.2018</td>
                    <td><del style="color:red!important">15 000 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-30%)</strong></td>
                    <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
                </tr>

                <tr>
                    <td>19.00 – 22.00</td>
                    <td>ВТ – ЧТ</td>
                    <td>20.03.2018</td>
                    <td><del style="color:red!important">15 000 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-30%)</strong></td>
                    <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
                </tr>

                <tr>
                    <td>16.00 – 19.00</td>
                    <td>ВТ – ЧТ</td>
                    <td>20.03.2018</td>
                    <td><del style="color:red!important">15 000 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-30%)</strong></td>
                    <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
                </tr>
            </tbody>
        </table>

        <table id="sqa.lviv.ua" class="courses_schedule">
            <caption>
                <a class="course_link" href="http://sqa.lviv.ua">КОМПЛЕКСНИЙ КУРС ТЕСТУВАННЯ</a>
            </caption>
            <thead>
            <tr>
                <td>Час</td>
                <td>Дні</td>
                <td>Початок</td>
                <td>Вартість</td>
                <td></td>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>16.00 – 17.30</td>
                <td>ПН – СР – ПТ</td>
                <td>19.03.2018</td>
                <td><del style="color:red!important">15 000 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-30%)</strong></td>
                <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
            </tr>

            <tr>
                <td>17.30 – 19.00</td>
                <td>ПН – СР – ПТ</td>
                <td>19.03.2018</td>
                <td><del style="color:red!important">15 000 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-30%)</strong></td>
                <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
            </tr>

            <tr>
                <td>19.00 – 20.30</td>
                <td>ПН – СР – ПТ</td>
                <td>19.03.2018</td>
                <td><del style="color:red!important">15 000 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-30%)</strong></td>
                <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
            </tr>

            <tr>
                <td>20.30 – 22.00</td>
                <td>ПН – СР – ПТ</td>
                <td>19.03.2018</td>
                <td><del style="color:red!important">15 000 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-30%)</strong></td>
                <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
            </tr>

            <tr>
                <td>19.00 – 22.00</td>
                <td>ВТ – ЧТ</td>
                <td>20.03.2018</td>
                <td><del style="color:red!important">15 000 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-30%)</strong></td>
                <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
            </tr>

            <tr>
                <td>10.30-13.30</td>
                <td>СБ-НД</td>
                <td>24.03.2018</td>
                <td><del style="color:red!important">15 000 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-30%)</strong></td>
                <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
            </tr>
            </tbody>
        </table>

        <table id="frontend.lviv.ua" class="courses_schedule">
            <caption>
                <a class="course_link" href="http://frontend.lviv.ua">КОМПЛЕКСНИЙ КУРС WEB DEVELOPER</a>
            </caption>
            <thead>
            <tr>
                <td>Час</td>
                <td>Дні</td>
                <td>Початок</td>
                <td>Вартість</td>
                <td></td>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>16.00 – 17.30</td>
                <td>ПН – СР – ПТ</td>
                <td>19.03.2018</td>
                <td><del style="color:red!important">15 000 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-30%)</strong></td>
                <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
            </tr>

            <tr>
                <td>19.00-20.30</td>
                <td>ПН – СР – ПТ</td>
                <td>19.03.2018</td>
                <td><del style="color:red!important">15 000 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-30%)</strong></td>
                <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
            </tr>

            <tr>
                <td>20.30-22.00</td>
                <td>ПН – СР – ПТ</td>
                <td>19.03.2018</td>
                <td><del style="color:red!important">15 000 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-30%)</strong></td>
                <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
            </tr>

            <tr>
                <td>16.00-19.00</td>
                <td>ВТ-ЧТ</td>
                <td>20.03.2018</td>
                <td><del style="color:red!important">15 000 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-30%)</strong></td>
                <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
            </tr>

            <tr>
                <td>19.00-22.00</td>
                <td>ВТ – ЧТ</td>
                <td>20.03.2018</td>
                <td><del style="color:red!important">15 000 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-30%)</strong></td>
                <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
            </tr>
            </tbody>
        </table>

        <table id="hr.lviv.ua" class="courses_schedule">
            <caption>
                <a class="course_link" href="http://hr.lviv.ua">КОМПЛЕКСНИЙ КУРС HR</a>
            </caption>
            <thead>
            <tr>
                <td>Час</td>
                <td>Дні</td>
                <td>Початок</td>
                <td>Вартість</td>
                <td></td>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>19:00 – 21:00</td>
                <td>ВТ – ЧТ</td>
                <td>30.01.2018</td>
                <td><del style="color:red!important">11 200 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-15%)</strong></td>
                <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
            </tr>

            </tbody>
        </table>

        <table id="wma.lviv.ua" class="courses_schedule">
            <caption>
                <a class="course_link" href="http://wma.lviv.ua">КОМПЛЕКСНИЙ КУРС WEB MARKETING</a>
            </caption>
            <thead>
            <tr>
                <td>Час</td>
                <td>Дні</td>
                <td>Початок</td>
                <td>Вартість</td>
                <td></td>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>19:00 – 21:00</td>
                <td>ВТ – ЧТ</td>
                <td>30.01.2018</td>
                <td><del style="color:red!important">11 200 грн.</del><br><strong>10 500 грн.</strong><strong style="color:red!important"> (-15%)</strong></td>
                <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
            </tr>

            </tbody>
        </table>
    <?php
    foreach ($result as $value):
        if (count($value['meta'])>0):?>
        <table id="<?=$value['post_id']?>" class="courses_schedule">
            <caption>
                <a class="course_link" href="<?=get_permalink($value['post_id'])?>"><?=$value['post_title']?></a>
            </caption>
            <thead>
            <tr>
                <td>Час</td>
                <td>Дні</td>
                <td>Початок</td>
                <td>Вартість</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <?php foreach($value['meta'] as $meta_value):?>
            <tr>
                <td><?=htmlspecialchars_decode($meta_value[0])?></td>
                <td><?=htmlspecialchars_decode($meta_value[1])?></td>
                <td><?=htmlspecialchars_decode($meta_value[2])?></td>
                <td><?=htmlspecialchars_decode($meta_value[3])?></td>
                <td><a href="javascript:void(0);" class="online_write course_link">Онлайн запис</a></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    <?php endif;endforeach;?>
        <table class="courses_schedule_mob">

        </table>
    </div>
    <script>
        try {
            window.onload = function(){
                $(document).on('change', '.select-title', function () {
                   location.href='#'+$('.select-title select').val();
                 });
            }

        } catch (e) {console.log(e);}
    </script>
    <?php
}
add_shortcode( 'Show_Schedule_Page', 'Schedule_Shortcode' );

function Prices_Shortcode(){
    try{
    //get categories
    $cat=GetCategoriesByTaxonomy('kursy');
        foreach ($cat as $key=>$value) {
            //get posts in category
            $posts_set=GetPostsByTaxonomy('kursy', $value->slug, 'kursy', false);

            $cat[$key]=array_merge((array)$value,array('posts'=>$posts_set));
        }

foreach ($cat as $value) {
?>

    <div class="wrap_directions">
        <table class="course_price"><caption><a class="course_link" href="#"><?=$value['name']?></a></caption>
            <thead>
            <tr>
                <td>Назва курсу</td>
                <td>Кількість занять</td>
                <td>Кількість академ. годин</td>
                <td>Вартість навчання в групі</td>
                <td>Вартість індивідуального навчання</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
<?php  foreach ($value['posts'] as $posts_array): ?>
            <tr>
                <td><a class="link-lang" href="<?=get_permalink($posts_array['ID'])?>"><?=$posts_array['post_title']?></a></td>
                <td><?=get_post_meta( $posts_array['ID'], '_courses_price_num', true )?></td>
                <td><?=get_post_meta( $posts_array['ID'], '_courses_price_hours', true )?></td>
                <td><?=get_post_meta( $posts_array['ID'], '_courses_price_individual', true )?></td>
                <td><?=get_post_meta( $posts_array['ID'], '_courses_price_group', true )?></td>
                <td><a class="online_write course_link">Онлайн запис</a></td>
            </tr>
<?php endforeach;?>
            </tbody>
        </table>
    </div>
    <?php }
    } catch(Exception $e) {}
}
add_shortcode( 'Show_Prices_Page', 'Prices_Shortcode' );
//================================================ End Custom metaBox Team

/**
 * Return posts with 'portfolio' slug
 * @return array
 */
function logos_get_portfolio(){
    $the_slug = 'portfolio';
    $args = array(

        'post_type'   => $the_slug,
        'post_status' => 'publish'
    );
    $result_posts=get_posts($args);
    if (count($result_posts)>0)
        foreach ($result_posts as $value){
            $value=(array)$value;
            $attachement=array_shift (get_attached_media( 'image' , $value['ID'] ));
            $result[]=array_merge($value,array('sumbnail'=>$attachement->guid));
        }
return $result;
}

//================================================ Email Form

/*function logos_register_guest_session()
{
    if( !session_id() )
    {
        session_start();
        setcookie('guest','guest',time()+60*60*24,'/','logos.net',false,false);
    }
}
add_action('init', 'register_guest_session');

function logos_mail_action_callback() {

    if ((!isset($_COOKIE['guest']))||($_COOKIE['guest']!='guest')) die();
    $nonce=filter_input(INPUT_POST,'nonce',FILTER_SANITIZE_STRING);

    if (($nonce)&&(!is_null($nonce))){
        //Set session. to prevent double message sending

        $args=array(
            (md5('name').$nonce)=>FILTER_SANITIZE_STRING,
            (md5('email').$nonce)=>FILTER_VALIDATE_EMAIL,
            (md5('comment').$nonce)=>FILTER_SANITIZE_STRING
        );
        $arr=filter_input_array(INPUT_POST,$args);

        //Email is wrong
        if (!$arr[(md5('email').$nonce)]) die();

        // Name too short
        if (intval($arr[md5('name').$nonce])>1) die();

        $headers = 'From: '.$arr[md5('name').$nonce].' <'.$arr[md5('email').$nonce].">\r\n" .
            'Reply-To: '.$arr[md5('email').$nonce]. "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if (strlen($arr[md5('comment').$nonce])>1){
            mail(get_theme_mod('logos_email','webmaster@logos.net'),'Contact form',$arr[md5('comment').$nonce],$headers);}
        setcookie('guest','true',time()+60*60*24,'/','logos.net',false,false);
            echo json_encode(array('status'=>'true'));
            }

   die();
}
add_action('wp_ajax_feedback', 'logos_mail_action_callback');
add_action('wp_ajax_nopriv_feedback', 'logos_mail_action_callback');*/

function recent_posts($the_slug= 'post',$number_of_posts=1005000,$add_thumbnail=true,$thumbnail_size='full'){

    $args = array(
        'order' => 'DESC',
        'orderby' => 'post_date',
        'numberposts' => $number_of_posts,
        'post_type'   => $the_slug,
        'post_status' => 'publish'
    );
    $result_posts=get_posts($args);
    if (count($result_posts)>0)
        foreach ($result_posts as $value){
            $value=(array)$value;

            if ($add_thumbnail) {
                $meta=get_metadata('post',$value['ID'],'_thumbnail_id',true);
                $thumb=image_downsize($meta,$thumbnail_size);
                $meta=(($thumb)?$thumb[0]:wp_get_attachment_url($meta));
                $result[]=array_merge($value,array('thumbnail'=>((!$meta)?'':$meta)));
            }
            else  $result[]=$value;
        }
    return $result;

}

/**
 * Get similar posts by tags from given post
 * @param int $post_id=get_the_id
 * @param $tags=get_the_tags
 * @return array
 */
function similar_posts($post_id=0,$tags){

$result=array();
foreach ($tags as $obj)
    $result[]=$obj->term_id;
$args = array(
    'order' => 'ASC',
    'orderby' => 'post_date',
    'numberposts' => 100500,
    'post_type'   => 'kursy',
    'post_status' => 'publish',
    'tag'=>explode(',',$result),
    'exclude'=>$post_id
);
    $result=array();
    $result_posts=get_posts($args);
    if (count($result_posts)>0)
        foreach ($result_posts as $value){
            $value=(array)$value;
            $meta=get_metadata('post',$value['ID'],'_thumbnail_id',true);
            $meta=wp_get_attachment_url($meta);
            $result[]=array_merge($value,array('thumbnail'=>((!$meta)?'':$meta)));

        }
    return $result;

}

function GetPostIdByTag($tag){
    $args = array(
        'numberposts' => 1,
        'tag'=>filter_var($tag,FILTER_SANITIZE_STRING),
        'post_type'   => 'kursy',
    );

    $posts = get_posts( $args );

}

/**
 * Get list of categories with images
 * @param string $taxonomy
 * @return array|bool|int|WP_Error
 */
function GetCategoriesByTaxonomy($taxonomy='category')
{

    $categories = get_terms(array('taxonomy' => $taxonomy, 'hide_empty' => false));
    if (is_wp_error($categories)) return false;
    if (count($categories) > 0) {
        foreach ($categories as $key => $obj) {
            $obj = (array)$obj;
            $obj['thumbnail'] = GetImageByCategory($obj["term_id"],'category-image-id','medium');
           // $obj['main_thumbnail'] = GetImageByCategory($obj["term_id"],'category-image-id-2');
            $obj['url']=get_term_link($obj["term_id"]);
            if (($obj['count']==0)&&(filter_var($obj["description"], FILTER_VALIDATE_URL)===false)) unset ($categories[$key]); //the same as 'hide_empty' => true
            else
            $categories[$key] = (object)$obj;
        }
    } else return false;
   return $categories;
}

function GetPostsByTaxonomy($taxonomy='category',$sub_cat='',$post_type='post',$add_thumbnail='false')
{

   $result_posts = get_posts(
        array(
            'posts_per_page' => 100500,
            'post_type' => $post_type,
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'field'    => 'slug',
                    'terms' => $sub_cat,
                )
            )
        )
    );

    if (count($result_posts)>0)
        foreach ($result_posts as $value){
            $value=(array)$value;
            $meta=get_metadata('post',$value['ID'],'_thumbnail_id',true);
            $meta=wp_get_attachment_url($meta);
            if ($add_thumbnail)
                  $result[]=array_merge($value,array('thumbnail'=>((!$meta)?'':$meta)));
            else  $result[]=$value;
        }
    return $result;
}

function GetImageByCategory($category_id=0,$key='category-image-id',$image_size='full'){
    $image_id = get_term_meta ( $category_id, $key, true );
    if ( $image_id )
        return image_downsize( $image_id ,$image_size)[0];
    else return false;
}

function LoadCustomClass()
{
    global $wp_query;
    switch ($wp_query->post->ID){
        case '125': return 'prices'; break;
        case '123': return 'schedule'; break;
        case '127': return 'our_vacancies white_fon'; break;
        case '159': return 'contact_page'; break;
        case '185': return 'reviews_page';break;
        default: return 'new'; break;
    }

}

function GetYoutubeVideos($token=false){

    $query = array(
        'key' =>get_theme_mod('logos_google_key', ''),
        'channelId'=>get_theme_mod('logos_google_channel_id', ''),
        'part'=>'snippet',      //full video data
        'order'=>'date',        //order by date
        'maxResults'=>10        //max result in set
    );
    if ($token)
        $query['pageToken']=$token;
    $url = 'https://www.googleapis.com/youtube/v3/search?'.http_build_query($query);

    try {
        $curl_connection = curl_init($url);
        curl_setopt($curl_connection, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_connection, CURLOPT_REFERER, get_home_url());

        //Data are stored in $data
        $data = json_decode(curl_exec($curl_connection), true);
        curl_close($curl_connection);
    } catch(Exception $e) {
        return false;
    }

    return $data;

}

function ShowReviews(){
   $youtube=GetYoutubeVideos();
    ?>
    <div class="wrap_tab">
        <ul class="tab_head">
            <li tab="1" class="active">youtube</li>
            <li tab="2">fb</li>
        </ul>
        <div class="tab_content">
            <div class="tab tab1 active">
                <div class="wrap_reviews" token="<?=$youtube["nextPageToken"]?>">
                <?php try {
                if($youtube)
                    foreach ($youtube["items"] as $items):?>

                    <a href="https://youtu.be/<?=$items["id"]["videoId"]?>" youtube="<?=$items["id"]["videoId"]?>">
                        <img src="<?=$items["snippet"]["thumbnails"]["high"]["url"]?>" alt="<?=$items["snippet"]["title"]?>">
                    </a>

                        <?php endforeach; }
                        catch (Exception $e) {echo 'Oops, Something wrong';}?>
                </div>
                <div class="wrap_button">
                    <button href="#" class="show_more">Показати більше</button>
                </div>
            </div>
            <div class="tab tab2">
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = 'https://connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v2.11&appId=<?=get_theme_mod('logos_facebook_id', '')?>';
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                <div class="fb-comments" data-href="http://lgs.lviv.ua/" data-width="100%" data-numposts="20"></div>
        </div>
    </div>
    <script>
    $(document).on('click','.show_more',function(){
        var message={
            'action':'loadreview',
            'token':$('.wrap_reviews').attr("token")
        }

        $.ajax({
            url: '/wp-admin/admin-ajax.php', // point to server-side PHP script
            dataType: 'JSON',  // what to expect back from the PHP script, if anything
            cache: false,
            data: message,
            type: 'POST',
            success: function (res)  {
                try {
                    if (res.status==true){
                        $('.wrap_reviews').attr("token",res.data.nextPageToken);
                        for (var prop in res.data.items){
                               var result='<a href="https://youtu.be/'+res.data.items[prop].id.videoId+'" ' +
                                    'youtube="'+res.data.items[prop].id.videoId+'">\n' +
                                    '                        <img src="'+res.data.items[prop].snippet.thumbnails.high.url+'" ' +
                                    'alt="'+res.data.items[prop].snippet.title+'">\n' +
                                    '      </a>';
                            $('.wrap_reviews').append(result);
                        }
                    }
                }
                catch (e)
                {
                    console.log('Nothing was found')
                }
            },
            error: function(e){console.log(e);}
        });
    });
    </script>
<?php
}
add_shortcode( 'Show_Youtube_Videos', 'ShowReviews' );

function review_load_action_callback() {
        $args=array(
            'token'=>FILTER_SANITIZE_STRING
        );
        $arr=filter_input_array(INPUT_POST,$args,true);
        echo json_encode(
                array(
                    'status'=>true,
                    'data'=>GetYoutubeVideos($arr['token'])
                )
        );
        die();
}
add_action('wp_ajax_loadreview', 'review_load_action_callback');
add_action('wp_ajax_nopriv_loadreview', 'review_load_action_callback');