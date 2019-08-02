<?php 
class StarterSite extends Timber\Site {
	/** Add timber support. */

	public function __construct() {
		// add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );

		parent::__construct();
	}
	/** This is where you can register custom post types. */
	public function register_post_types() {

	}
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies() {

	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		// $context['stuff'] = 'I am a value set in your functions.php file';
		// $context['notes'] = 'These values are available everytime you call Timber::context();';
		$context['menu'] = new \Timber\Menu( 'main-nav' );
		$context['footer_menu'] = new \Timber\Menu( 'footer-links' );
		
		// Use CustomMenu class to customise markup
		// $context['menu_1'] = new CustomMenu('main-nav-1'); 
		// $context['menu_2'] = new CustomMenu('main-nav-2');
		// $context['menu_3'] = new CustomMenu('main-nav-3');

		$context['site'] = $this;
		return $context;
	}


	public function theme_supports() {


	}

	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */

	// public function myfoo( $text ) {
	// 	$text .= ' bar!';
	// 	return $text;
	// }


	/****************************************
	* SCHEMA *
	http://www.longren.io/add-schema-org-markup-to-any-wordpress-theme/
	****************************************/

	public function html_schema() {

	    $schema = 'https://schema.org/';
	 
	    // Is single post
	    if( is_single() ) {
	        $type = "Article";
	    }

	    // Is blog home, archive or category
	    else if( is_home() || is_archive() || is_category() ) {
	        $type = "Blog";
	    }

	    // Is static front page
	    else if( is_front_page() ) {
	        $type = "Website";
	    }

	    // Is a general page
	     else {
	        $type = 'WebPage';
	    }
	 
	    return 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
	}
	

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig( $twig ) {

		$twig->addExtension( new Twig_Extension_StringLoader() );
		 
		// Add as external function
    	$twig->addFunction( new Timber\Twig_Function( 'get_current_template',  'get_current_template' ));
		
		// Add as filter
		$twig->addFilter( new Twig_SimpleFilter( 'html_schema', array( $this, 'html_schema' ) ) );

		// $twig->addFilter( new Twig_SimpleFilter( 'myfoo', array( $this, 'myfoo' ) ) );

		return $twig;
	}



}
