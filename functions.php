<?php 
  /* enercor */
  
  add_action('wp_enqueue_scripts', 'enercor_styles', 3);
  add_action('wp_enqueue_scripts', 'enercor_scripts', 5);
  
  // Styles theme
  function enercor_styles () {
    wp_enqueue_style('swiper-style', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css');
    wp_enqueue_style('enercor-style', get_stylesheet_uri());    
  }

  // Scripts theme
  function enercor_scripts () {
    if (!is_404()) {      
      wp_enqueue_script('tween-max-script', get_template_directory_uri() . '/assets/js/tween-max.min.js', $deps = array(), $ver = null, $in_footer = true );
      wp_enqueue_script('swiper-script', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', $deps = array(), $ver = null, $in_footer = true );
    }    

    wp_enqueue_script('cursor-script', get_template_directory_uri() . '/assets/js/cursor.js', $deps = array(), $ver = null, $in_footer = true );

    wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/script.js', $deps = array(), $ver = null, $in_footer = true );
    
    wp_enqueue_script('additional-script', get_template_directory_uri() . '/assets/js/additional.js', $deps = array('jquery'), $ver = null, $in_footer = true );
  
    // AJAX
    $args = array(
      'url' => admin_url('admin-ajax.php'),
      'nonce' => wp_create_nonce('additional-script.js_nonce'),
    );

    wp_localize_script( 'additional-script', 'enercor_ajax', $args);  
  }

  add_action( 'after_setup_theme', 'enercor_after_setup_theme_function' );

  if (!function_exists('enercor_after_setup_theme_function')) :
    function enercor_after_setup_theme_function () {
      load_theme_textdomain('enercor', get_template_directory() . '/languages');

      /* ==============================================
      ********  //Миниатюрки
      =============================================== */
      add_theme_support( 'post-thumbnails' );

      /* ==============================================
      ********  //Title
      =============================================== */
      add_theme_support('title-tag');
      
      /* ==============================================
      ********  //Лого
      =============================================== */
      add_theme_support( 'custom-logo' );
      
      /* ==============================================
      ********  //Меню
      =============================================== */
      register_nav_menu( 'top_menu', 'Навигация в шапке сайта' );
      
      register_nav_menu( 'bottom_menu', 'Навигация в подвале сайта' );

      register_nav_menu( 'social', 'Социальные сети' );
      
      /* ==============================================
      ********  //Размеры картирок
      =============================================== */
      add_image_size( 'main_bg', 1440, 900, false);
      add_image_size( 'main_bg_half', 1440, 450, true);

      add_image_size( 'front_projects_bg', 1440, 885, false);

      add_image_size( 'project_archive', 432, 238, true);      

      add_image_size( 'stage', 1328, 447, false);   

      add_image_size( 'archive_member_photo', 402, 486, false); 
    }
  endif;
  
  // Init
  add_action( 'init', 'enercor_init_function' );
  
  if (!function_exists('enercor_init_function')) :
    function enercor_init_function () {
      /* ==============================================
      ********  //Регистрация кастомных типов постов
      =============================================== */
      function register_custom_post_types () {
        // Команда
        register_post_type( 'team', [
          'label'  => null,
          'labels' => [
            'name'               => 'Команда', // основное название для типа записи
            'singular_name'      => 'Член команды', // название для одной записи этого типа
            'add_new'            => 'Добавить члена команды', // для добавления новой записи
            'add_new_item'       => 'Добавление члена команды', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование члена команды', // для редактирования типа записи
            'new_item'           => 'Новый член команды', // текст новой записи
            'view_item'          => 'Показать члена команды', // для просмотра записи этого типа.
            'search_items'       => 'Искать члена команды', // для поиска по этим типам записи
            'not_found'          => 'Член команды не найден', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Член команды не найден в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Команда', // название меню
          ],
          'description'         => 'Это наша команда',
          'public'              => true,
          'publicly_queryable'  => true, // зависит от public
          'exclude_from_search' => true, // зависит от public
          'show_ui'             => true, // зависит от public
          'show_in_nav_menus'   => true, // зависит от public
          'show_in_menu'        => true, // показывать ли в меню адмнки
          'show_in_admin_bar'   => true, // зависит от show_in_menu
          'show_in_rest'        => true, // добавить в REST API. C WP 4.7
          'rest_base'           => null, // $post_type. C WP 4.7
          'menu_position'       => 21,
          'menu_icon'           => 'dashicons-groups',
          //'capability_type'   => 'post',
          //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
          //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
          'hierarchical'        => false,
          'supports'            => ['title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
          'taxonomies'          => ['cities'],
          'has_archive'         => true,
          'rewrite'             => true,
          'query_var'           => true,
        ] );

        // Проекты
        register_post_type( 'projects', [
          'label'  => null,
          'labels' => [
            'name'               => 'Проекты', // основное название для типа записи
            'singular_name'      => 'Проект', // название для одной записи этого типа
            'add_new'            => 'Добавить проект', // для добавления новой записи
            'add_new_item'       => 'Добавление проекта', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование проекта', // для редактирования типа записи
            'new_item'           => 'Новый проект', // текст новой записи
            'view_item'          => 'Показать проект', // для просмотра записи этого типа.
            'search_items'       => 'Искать проект', // для поиска по этим типам записи
            'not_found'          => 'Проект не найден', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Проект не найден в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Проекты', // название меню
          ],
          'description'         => 'Это наши проекты',
          'public'              => true,
          'publicly_queryable'  => true, // зависит от public
          'exclude_from_search' => true, // зависит от public
          'show_ui'             => true, // зависит от public
          'show_in_nav_menus'   => true, // зависит от public
          'show_in_menu'        => true, // показывать ли в меню адмнки
          'show_in_admin_bar'   => true, // зависит от show_in_menu
          'show_in_rest'        => true, // добавить в REST API. C WP 4.7
          'rest_base'           => null, // $post_type. C WP 4.7
          'menu_position'       => 20,
          'menu_icon'           => 'dashicons-schedule',
          //'capability_type'   => 'post',
          //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
          //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
          'hierarchical'        => false,
          'supports'            => ['title', 'editor', 'page-attributes', 'custom-fields', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
          'taxonomies'          => ['services'],
          'has_archive'         => true,
          'rewrite'             => true,
          'query_var'           => true,
        ] );

        // Публикации
        register_post_type( 'publications', [
          'label'  => null,
          'labels' => [
            'name'               => 'Публикации', // основное название для типа записи
            'singular_name'      => 'Публикация', // название для одной записи этого типа
            'add_new'            => 'Добавить публикацию', // для добавления новой записи
            'add_new_item'       => 'Добавление публикации', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование публикации', // для редактирования типа записи
            'new_item'           => 'Новая публикация', // текст новой записи
            'view_item'          => 'Показать публикацию', // для просмотра записи этого типа.
            'search_items'       => 'Искать публикацию', // для поиска по этим типам записи
            'not_found'          => 'Публикация не найдена', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Публикация не найдена в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Публикации', // название меню
          ],
          'description'         => 'Это наши публикации',
          'public'              => false,
          'publicly_queryable'  => false, // зависит от public
          'exclude_from_search' => false, // зависит от public
          'show_ui'             => true, // зависит от public
          'show_in_nav_menus'   => true, // зависит от public
          'show_in_menu'        => true, // показывать ли в меню адмнки
          'show_in_admin_bar'   => true, // зависит от show_in_menu
          'show_in_rest'        => true, // добавить в REST API. C WP 4.7
          'rest_base'           => null, // $post_type. C WP 4.7
          'menu_position'       => 19,
          'menu_icon'           => 'dashicons-media-document',
          //'capability_type'   => 'post',
          //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
          //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
          'hierarchical'        => false,
          'supports'            => ['title', 'editor' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
          'taxonomies'          => ['publications-category'],
          'has_archive'         => true,
          'rewrite'             => true,
          'query_var'           => true,
        ] );
      }   
      
      register_custom_post_types();
      
      /* ==============================================
      ********  //Регистрация кастомных таксономий 
      =============================================== */
      function register_custom_taxonomy () {
        // Города
        register_taxonomy( 'cities', [ 'team' ], [ 
          'label'                 => '', // определяется параметром $labels->name
          'labels'                => [
            'name'              => 'Города',
            'singular_name'     => 'Город',
            'search_items'      => 'Найти город',
            'all_items'         => 'Все города',
            'view_item '        => 'Посмотреть город',
            'parent_item'       => 'Родительский город',
            'parent_item_colon' => 'Родительский город:',
            'edit_item'         => 'Редактировать город',
            'update_item'       => 'Обновить город',
            'add_new_item'      => 'Добавить новый город',
            'new_item_name'     => 'Название нового города',
            'menu_name'         => 'Города',
          ],
          'description'           => 'Города, в которых есть представители фирмы', // описание таксономии
          'public'                => false,
          'publicly_queryable'    => false, // равен аргументу public
          // 'show_in_nav_menus'     => true, // равен аргументу public
          'show_ui'               => true, // равен аргументу public
           'show_in_menu'          => true, // равен аргументу show_ui
          // 'show_tagcloud'         => true, // равен аргументу show_ui
          // 'show_in_quick_edit'    => null, // равен аргументу show_ui
          'hierarchical'          => false,
      
          'rewrite'               => true,
          //'query_var'             => $taxonomy, // название параметра запроса
          // 'capabilities'          => array(),
          // 'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
          // 'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
          'show_in_rest'          => true, // добавить в REST API
          // 'rest_base'             => null, // $taxonomy
          // '_builtin'              => false,
          //'update_count_callback' => '_update_post_term_count',
        ] );

        // Специальные знания
        register_taxonomy( 'expertise', [ 'team' ], [ 
          'label'                 => '', // определяется параметром $labels->name
          'labels'                => [
            'name'              => 'Специальные знания',
            'singular_name'     => 'Специальные знания',
            'search_items'      => 'Найти Специальные знания',
            'all_items'         => 'Все Специальные знания',
            'view_item '        => 'Посмотреть Специальные знания',
            'parent_item'       => 'Родительское Специальное знание',
            'parent_item_colon' => 'Родительское Специальное знание:',
            'edit_item'         => 'Редактировать Специальное знание',
            'update_item'       => 'Обновить Специальное знание',
            'add_new_item'      => 'Добавить новое Специальное знание',
            'new_item_name'     => 'Название нового Специального знания',
            'menu_name'         => 'Специальные знания',
          ],
          'description'           => 'Специальные знания, которыми обладают члены нашей команды', // описание таксономии
          'public'                => false,
          'publicly_queryable'    => false, // равен аргументу public
          // 'show_in_nav_menus'     => true, // равен аргументу public
          'show_ui'               => true, // равен аргументу public
           'show_in_menu'          => true, // равен аргументу show_ui
          // 'show_tagcloud'         => true, // равен аргументу show_ui
          // 'show_in_quick_edit'    => null, // равен аргументу show_ui
          'hierarchical'          => false,
      
          'rewrite'               => true,
          //'query_var'             => $taxonomy, // название параметра запроса
          // 'capabilities'          => array(),
          // 'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
          // 'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
          'show_in_rest'          => true, // добавить в REST API
          // 'rest_base'             => null, // $taxonomy
          // '_builtin'              => false,
          //'update_count_callback' => '_update_post_term_count',
        ] );

        // Услуги
        register_taxonomy( 'services', [ 'projects' ], [
          'label'                 => '', // определяется параметром $labels->name
          'labels'                => [
            'name'              => 'Услуги',
            'singular_name'     => 'Услуга',
            'search_items'      => 'Найти услугу',
            'all_items'         => 'Все услуги',
            'view_item '        => 'Посмотреть услугу',
            'parent_item'       => 'Родительская услуга',
            'parent_item_colon' => 'Родительская услуга:',
            'edit_item'         => 'Редактировать услугу',
            'update_item'       => 'Обновить услугу',
            'add_new_item'      => 'Добавить новую услугу',
            'new_item_name'     => 'Название новой услуги',
            'menu_name'         => 'Услуги',
          ],
          'description'           => 'Услуги, предоставляемые нашей фирмой', // описание таксономии
          'public'                => true,
          'publicly_queryable'    => true, // равен аргументу public
          // 'show_in_nav_menus'     => true, // равен аргументу public
          'show_ui'               => true, // равен аргументу public
           'show_in_menu'          => true, // равен аргументу show_ui
          // 'show_tagcloud'         => true, // равен аргументу show_ui
          // 'show_in_quick_edit'    => null, // равен аргументу show_ui
          'hierarchical'          => true,
          'rewrite'               => true,
          //'query_var'             => $taxonomy, // название параметра запроса
          // 'capabilities'          => array(),
          // 'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
          // 'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
          'show_in_rest'          => true, // добавить в REST API
          // 'rest_base'             => null, // $taxonomy
          // '_builtin'              => false,
          //'update_count_callback' => '_update_post_term_count',
        ] );

        // Категории публикаций
        register_taxonomy( 'publications-category', [ 'publications' ], [
          'label'                 => '', // определяется параметром $labels->name
          'labels'                => [
            'name'              => 'Категории',
            'singular_name'     => 'Категория',
            'search_items'      => 'Найти категорию',
            'all_items'         => 'Все категории',
            'view_item '        => 'Посмотреть категорию',
            'parent_item'       => 'Родительская услуга',
            'parent_item_colon' => 'Родительская категория:',
            'edit_item'         => 'Редактировать категорию',
            'update_item'       => 'Обновить категорию',
            'add_new_item'      => 'Добавить новую категорию',
            'new_item_name'     => 'Название новой категории',
            'menu_name'         => 'Категории',
          ],
          'description'           => 'Категории публикаций', // описание таксономии
          'public'                => true,
          'publicly_queryable'    => true, // равен аргументу public
          // 'show_in_nav_menus'     => true, // равен аргументу public
          'show_ui'               => true, // равен аргументу public
           'show_in_menu'          => true, // равен аргументу show_ui
          // 'show_tagcloud'         => true, // равен аргументу show_ui
          // 'show_in_quick_edit'    => null, // равен аргументу show_ui
          'hierarchical'          => true,
          'rewrite'               => true,
          //'query_var'             => $taxonomy, // название параметра запроса
          // 'capabilities'          => array(),
          // 'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
          // 'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
          'show_in_rest'          => true, // добавить в REST API
          // 'rest_base'             => null, // $taxonomy
          // '_builtin'              => false,
          //'update_count_callback' => '_update_post_term_count',
        ] );
      }   
    
      register_custom_taxonomy();
    }  
  endif;
  
  /* ==============================================
  ********  //Класс для ссылок меню
  =============================================== */
  add_filter( 'walker_nav_menu_start_el', 'enercor_filter_link_nav_menu', 10, 4 );
  function enercor_filter_link_nav_menu( $item_output, $item, $depth, $args ) {
    $is_black_menu = false;

    if (is_post_type_archive( 'team' )) {
      $archive_team_page_id = get_field( 'archive_team', 'option' );

      $theme_color_mode_menu = get_field( 'theme_color_mode_menu', $archive_team_page_id );
    } else if ( is_singular( 'team' ) ) {
      $is_black_menu = true;
    } else {
      $theme_color_mode_menu = get_field( 'theme_color_mode_menu' );
    }

    if ($theme_color_mode_menu && $theme_color_mode_menu === 'black') {
      $is_black_menu = true;
    }

    // link attributes
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    
    $class_link = '';
    if ($args->theme_location === 'top_menu') {
      $class = $is_black_menu ? 'header__link header__link--black' : 'header__link';
    }
    
    if ($args->theme_location === 'bottom_menu') {
      $class = 'footer__navigation-pages-link';
    }

    if ($args->theme_location === 'social') {
      $class = 'footer__social-network-link';
    }
    
    $attributes .= ' class="' . $class . '"';
    
    // create link html
    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . $item->title . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

  	return $item_output;
  }
  
  /* ==============================================
  ********  //Класс для пунктов меню
  =============================================== */
  add_filter( 'nav_menu_css_class', 'enercor_change_menu_item_css_classes', 10, 4 );
  function enercor_change_menu_item_css_classes( $classes, $item, $args, $depth ) {
  	if( $args->theme_location === 'top_menu' ){
  		$classes[] = 'header__item';
  	}
    
    if( $args->theme_location === 'bottom_menu' ){
  		$classes[] = 'footer__navigation-pages-item';
  	}

    if ($args->theme_location === 'social') {
      $classes[] = 'footer__social-network-item';
    }

  	return $classes;
  }

  /* ==============================================
  ********  //Класс форм
  =============================================== */
  add_filter( 'wpcf7_form_class_attr', 'filter_cf7_class' );

  function filter_cf7_class( $class ){
    $class .= ' contact__form';

    return $class;
  }

  /* ==============================================
  ********  //ACF для архива
  =============================================== */

  add_action('init', 'mindbase_create_acf_pages');

  function mindbase_create_acf_pages() {
    if(function_exists('acf_add_options_page')) {
      acf_add_options_page(array(
        'page_title' 	=> 'Страницы для Архивов',
        'menu_title'	=> 'Страницы для Архивов',
        'menu_slug' 	=> 'pages-for-archives',
        'capability'	=> 'edit_posts',
        'icon_url' => 'dashicons-archive',
        'position' => 22,
        'redirect'		=> false,
      ));
    }    
  }
  
  /* ==============================================
  ********  //Список проектов
  =============================================== */
  add_action('wp_ajax_enercor_projects_list', 'enercor_projects_list');
  add_action('wp_ajax_nopriv_enercor_projects_list', 'enercor_projects_list');

  function enercor_projects_list () {
    check_ajax_referer('additional-script.js_nonce', 'security');

    try {
      $term_id = (int) $_POST['term_id'];
      $posts_per_page = (int) $_POST['posts_per_page'];
      $paged = (int) $_POST['paged'];

      $response = [
        'post' => $_POST,
      ];

      ob_start();

      $show_more = enercor_projects_list_items_html( $term_id, $posts_per_page, $paged );
  
      $response['content'] = ob_get_contents();
      $response['show_more'] = $show_more;
  
      ob_clean();
  
      wp_send_json_success( $response );
    } catch (Throwable $th) {
      wp_send_json_error( $th );
    }    
  }

  function enercor_projects_list_html() {
      
    ?>
      <div class="swiper international-project">
        <div class="swiper-wrapper" id="international-project-ajax">
          <?php 
            $show_more = enercor_projects_list_items_html(-1, 6, 1); 
          ?>
        </div>
      </div>
      
    <?php

    enercor_projects_more_button_html($show_more['visibility']);
  }

  function enercor_projects_list_items_html ( $term_id, $posts_per_page = 6, $paged = 1 ) { 
    $show_more = [
      'next_page' => $paged + 1,
      'visibility' => false,
    ];

    $args = array(
      'post_type' => 'projects',
      'post_status' => 'publish',
      'order' => 'ASC',
      'orderby' => 'menu_order',
      'posts_per_page' => $posts_per_page,
      'paged' => $paged,
    );

    if ((int) $term_id !== -1) {
      $args['tax_query'] = array(
        array(
        'taxonomy' => 'services',
        'field' => 'term_id',
        'terms' => (int) $term_id,
        )
      );
    }

    $query = new WP_Query( $args ); 

    if ( $query->have_posts() ) {
      $max_num_pages = (int) $query->max_num_pages;

      if ($max_num_pages > $paged) {
        $show_more['visibility'] = true;
      }

      while ( $query->have_posts() ) {
        $query->the_post();

        get_template_part( 'template-parts/projects/project' );
      }    

      wp_reset_postdata();
    } else {
      ?>
  
        <p class="completed-projects__slide-title">
          <?php 
            _e( 'Projects not found', 'gagarin' );
          ?>
        </p>
        
      <?php
    } 

    return $show_more;
  } 

  function enercor_projects_more_button_html ( $show = false, $term_id = -1, $paged = 2 ) {
    $completed = get_field( 'completed', 'option' );
    $button = $completed['button']; 
    
    if ( $button && !empty($button) && $show ) {
      ?>
        <button class="completed-projects__btn completed-projects__btn--show-more" data-paged="<?= $paged; ?>" data-term-id="<?= $term_id; ?>">
          <?= $button; ?>
        </button>
      <?php
    }
  }
?>