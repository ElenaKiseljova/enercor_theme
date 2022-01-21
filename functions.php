<?php 
  /* enercor */
  
  add_action('wp_enqueue_scripts', 'enercor_styles', 3);
  add_action('wp_enqueue_scripts', 'enercor_scripts', 5);
  
  // Styles theme
  function enercor_styles () {
    wp_enqueue_style('enercor-style', get_stylesheet_uri());
    wp_enqueue_style('swiper-style', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css');
  }

  // Scripts theme
  function enercor_scripts () {
    if (!is_404()) {      
      wp_enqueue_script('tween-max-script', get_template_directory_uri() . '/assets/js/tween-max.min.js', $deps = array(), $ver = null, $in_footer = true );
      wp_enqueue_script('swiper-script', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', $deps = array(), $ver = null, $in_footer = true );
    }    

    wp_enqueue_script('cursor-script', get_template_directory_uri() . '/assets/js/cursor.js', $deps = array(), $ver = null, $in_footer = true );

    wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/script.min.js', $deps = array(), $ver = null, $in_footer = true );
    
    // wp_enqueue_script('form-script', get_template_directory_uri() . '/assets/js/form.js', $deps = array('jquery'), $ver = null, $in_footer = true );

    // // AJAX
    // $args = array(
    //   'url' => admin_url('admin-ajax.php'),
    //   'nonce' => wp_create_nonce('form.js_nonce'),
    // );

    // wp_localize_script( 'form-script', 'enercor_ajax', $args);   
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
      add_image_size( 'front_main_bg', 1440, 906, false);
      add_image_size( 'front_projects_bg', 1440, 885, false);

      add_image_size( 'project_page', 1440, 900, false);
      add_image_size( 'project_archive', 432, 238, true);
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
          'menu_position'       => 20,
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
          'menu_position'       => 18,
          'menu_icon'           => 'dashicons-schedule',
          //'capability_type'   => 'post',
          //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
          //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
          'hierarchical'        => false,
          'supports'            => ['title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
          'taxonomies'          => ['services'],
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
          'publicly_queryable'    => false, // равен аргументу public
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
    // link attributes
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    
    $class_link = '';
    if ($args->theme_location === 'top_menu') {
      $class = 'header__link';
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
  ********  //Отправка письма на мейл
  =============================================== */

  // add_action('wp_ajax_enercor_sendmail', 'enercor_sendmail');
  // add_action('wp_ajax_nopriv_enercor_sendmail', 'enercor_sendmail');

  // function enercor_sendmail () {
  //   check_ajax_referer('form.js_nonce', 'security');

  //   if (isset($_POST['phone']) && empty($_POST['phone'])) {
  //     $response = [
  //       'name' => 'phone',
  //       'error' => 'Укажите телефон'
  //     ];
      
  //     wp_send_json_error( $response );
  
  //     wp_die();
  //   }
    
  //   if (isset($_POST['name']) && empty($_POST['name'])) {   
  //     $response = [
  //       'name' => 'name',
  //       'error' => 'Укажите имя'
  //     ];
      
  //     wp_send_json_error( $response );
  
  //     wp_die();
  //   }
    
  //   $contactSubject = isset($_POST['subject']) ? esc_html( $_POST['subject'] ) : 'Обратный звонок';
  //   $contactName = isset($_POST['name']) ? ('<p><b>Имя - </b> ' . esc_html( $_POST['name'] ) . '</p>') : '';
  //   $contactPhone = isset($_POST['phone']) ? ('<p><b>Телефон - </b> ' . esc_html( $_POST['phone'] ) . '</p>') : '';
  //   $contactCourse = isset($_POST['course']) ? ('<p><b>Курс - </b> ' . esc_html( $_POST['course'] ) . '</p>') : '';
    
  //   $contactMail = $contactName . $contactPhone . $contactCourse;

  //   $dev_mail = 'e.a.kiseljova@gmail.com'; // для проверки
    
  //   $to = (isset($_POST['mailto']) && !empty($_POST['mailto'])) ? 
  //     [esc_html( $_POST['mailto'] ), $dev_mail] : 
  //     ((get_option('admin_email') !== $dev_mail) ? 
  //     [get_option('admin_email'), $dev_mail] : 
  //     get_option('admin_email'));
      
  //   $site_name = 'From: ' . get_bloginfo( 'name' ) . ' <' . get_option('admin_email') . '>';

  //   // удалим фильтры, которые могут изменять заголовок $headers
  //   remove_all_filters( 'wp_mail_from' );
  //   remove_all_filters( 'wp_mail_from_name' );

  //   $headers = array(
  //     $site_name,
  //     'content-type: text/html',
  //   );

  //   wp_mail( $to, $contactSubject, $contactMail, $headers );

  //   $response = [
  //     'post' => $_POST,
  //     'mail' => $contactMail,
  //     'mailto' => $to
  //   ];

  //   wp_send_json_success($response);

  //   wp_die();
  // }
?>