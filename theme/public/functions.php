<?php

require_once __DIR__.'/vendor/autoload.php';

$timber = new Timber\Timber();
$timmy = new Timmy\Timmy();

if (!class_exists('Timber')) {
    add_action('admin_notices', function () {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="'.esc_url(admin_url('plugins.php#timber')).'">'.esc_url(admin_url('plugins.php')).'</a></p></div>';
    });
    add_filter('template_include', function ($template) {
        return '<h1>No Timber</h1>';
    });

    return;
}
/*
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array('templates', 'views');
/*
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;
/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php").
 */
class RelationshipsInternational extends Timber\Site
{
    /** Add timber support. */
    public function __construct()
    {
        add_action('after_setup_theme', array($this, 'theme_supports'));
        add_filter('timber_context', array($this, 'add_to_context'));
        add_filter('timmy/sizes', array($this, 'timmy_sizes'));
        add_action('init', array($this, 'register_post_types'));
        add_action('init', array($this, 'register_advanced_custom_fields'));
        add_action('init', array($this, 'register_taxonomies'));
        add_action('admin_enqueue_scripts', array( $this, 'load_admin_scripts' ));
        add_action('wp_enqueue_scripts', array( $this, 'load_scripts' ));
        add_filter('get_twig', array($this, 'add_to_twig'));
        add_action( 'init', function() {
          remove_post_type_support( 'post', 'editor' );
          remove_post_type_support( 'page', 'editor' );
        }, 99);
	
        parent::__construct();
    }

    public function theme_supports()
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );
        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support(
            'post-formats',
            array(
                'aside',
                'image',
                'video',
                'quote',
                'link',
                'gallery',
                'audio',
            )
        );
        add_theme_support('menus');
    }

    /** This is where you add some context
     *
     * @param string $context context['this'] Being the Twig's {{ this }}
     */
    public function add_to_context($context)
    {
        $context['menus'] = array(new Timber\Menu('English'), new Timber\Menu('Nederlands'));
        
        $context['site'] = $this;

        $context['locale'] = get_locale();

        $args = array(
          'post_type' => 'blogarticle'
        );
        $context['blog_articles'] = Timber::get_posts($args);

        $args = array(
          'post_type' => 'mediaarticle',
          'posts_per_page=5' => 5
        );
        $context['media_articles'] = Timber::get_posts($args);

        return $context;
    }

    public function timmy_sizes($sizes)
    {
        return array(
            'preview' => array(
                'resize' => array(240),
                'sizes' => '240px',
                'oversize' => array(
                  'allow' => false,
                  'style_attr' => false,
                ),
            ),
            'small-30vw' => array(
              'resize' => array(600),
              'srcset' => array(0.5, 2, 3),
              'sizes' => '30vw',
              'oversize' => array(
                  'allow' => false,
                  'style_attr' => false,
              ),
            ),
            'portrait-30vw' => array(
                'resize' => array(600, 800),
                'srcset' => array(0.5, 2, 3),
                'sizes' => '30vw',
                'oversize' => array(
                    'allow' => false,
                    'style_attr' => false,
                ),
            ),
            'portrait-50vw' => array(
                'resize' => array(800, 1200),
                'srcset' => array(0.5, 2, 3),
                'sizes' => '(min-width: 640px) 50vw, 100vw',
                'oversize' => array(
                    'allow' => false,
                    'style_attr' => false,
                ),
            ),
            'landscape-100vw' => array(
                'resize' => array(1600, 1066),
                'srcset' => array(0.5, 2, 3),
                'sizes' => '100vw',
                'oversize' => array(
                    'allow' => false,
                    'style_attr' => false,
                ),
            ),
        );
    }

    /** This is where you can register custom post types. */
    public function register_post_types()
    {
        require get_template_directory() . '/includes/post-types.php';
    }

    public function register_advanced_custom_fields()
    {
        require get_template_directory() . '/includes/advanced-custom-fields.php';
    }

    /** This is where you can register custom taxonomies. */
    public function register_taxonomies()
    {
    }

    public function load_scripts()
    {
        wp_enqueue_style('theme', get_template_directory_uri() . '/css/theme.css');
        wp_enqueue_style('fonts', get_template_directory_uri() . '/css/fonts.css');
        wp_enqueue_script('theme', get_template_directory_uri() . '/js/theme.js', array(), '1.0.0', true);
        wp_enqueue_script('head', get_template_directory_uri() . '/js/head.js', array(), '1.0.0', false);
    }

    public function load_admin_scripts()
    {
        wp_enqueue_style('admin', get_template_directory_uri() .'/css/admin.css', array(), false, 'all');
    }

    /** This is where you can add your own functions to twig.
     *
     * @param string $twig get extension
     */
    public function add_to_twig($twig)
    {
        $twig->addExtension(new Twig_Extension_StringLoader());
        $twig->addFilter(new Twig_SimpleFilter('limit_words', array($this, 'limit_words')));
        $twig->addFilter(new Twig_SimpleFilter('get_post_lang', array($this, 'get_post_lang')));

        return $twig;
    }

    /** This Would return 'foo bar!'.
     *
     * @param string $text being 'foo', then returned 'foo bar!'
     */
    public function limit_words($text)
    {
      $limit = 50;
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }

    public function get_post_lang($post_id)
    {

      $lang = pll_get_post_language($post_id, 'locale');

      return $lang;
    }
}
new RelationshipsInternational();
