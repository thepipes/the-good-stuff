<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'roots'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'roots'),
		'two' => __('Two', 'roots'),
		'three' => __('Three', 'roots'),
		'four' => __('Four', 'roots'),
		'five' => __('Five', 'roots')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'roots'),
		'two' => __('Pancake', 'roots'),
		'three' => __('Omelette', 'roots'),
		'four' => __('Crepe', 'roots'),
		'five' => __('Waffle', 'roots')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('General Settings', 'roots'),
		'type' => 'heading');


   /*
	$options[] = array(
		'name' => __('Input Text', 'roots'),
		'desc' => __('A text input field.', 'roots'),
		'id' => 'example_text',
		'std' => 'Default Value',
		'type' => 'text');

	$options[] = array(
		'name' => __('Textarea', 'roots'),
		'desc' => __('Textarea description.', 'roots'),
		'id' => 'example_textarea',
		'std' => 'Default Text',
		'type' => 'textarea');
  */
	$options[] = array(
		'name' => __('Development Mode', 'roots'),
		'desc' => __('Small Select Box.', 'roots'),
		'id' => 'development',
		'std' => 'NO',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => array('YES' => 'YES', 'NO' => 'NO'));

  $options[] = array(
    'name' => __('Production Version', 'roots'),
    'desc' => __('A mini text input field.', 'roots'),
    'id' => 'production_version',
    'std' => '',
    'class' => 'mini',
    'type' => 'text');

  $options[] = array(
    'name' => __('Google Analytics ID', 'roots'),
    'desc' => __('A mini text input field.', 'roots'),
    'id' => 'google_analytics_id',
    'std' => '',
    'class' => 'mini',
    'type' => 'text');

  $options[] = array(
    'name' => __('Homepage Header Background Image', 'roots'),
    'id' => 'homepage-header-bg',
    'type' => 'upload');
   /*
  $options[] = array(
    'name' => __('Social Media Settings', 'roots'),
    'type' => 'heading');

  $options[] = array(
    'name' => __('Facebook Share Icon', 'roots'),
    'id' => 'share-facebook',
    'type' => 'upload');

  $options[] = array(
    'name' => __('Twitter Share Icon', 'roots'),
    'id' => 'share-twitter',
    'type' => 'upload');

  $options[] = array(
    'name' => __('LinkedIn Share Icon', 'roots'),
    'id' => 'share-linkedin',
    'type' => 'upload');

  $options[] = array(
    'name' => __('Pinterest Share Icon', 'roots'),
    'id' => 'share-pinterest',
    'type' => 'upload');

  $options[] = array(
    'name' => __('Show Facebook Like Button', 'roots'),
    'desc' => __('Check this to show the button', 'roots'),
    'id' => 'facebook_like_button',
    'std' => '0',
    'type' => 'checkbox');
  /*
	$options[] = array(
		'name' => __('Input Select Wide', 'roots'),
		'desc' => __('A wider select box.', 'roots'),
		'id' => 'example_select_wide',
		'std' => 'two',
		'type' => 'select',
		'options' => $test_array);

	$options[] = array(
		'name' => __('Select a Category', 'roots'),
		'desc' => __('Passed an array of categories with cat_ID and cat_name', 'roots'),
		'id' => 'example_select_categories',
		'type' => 'select',
		'options' => $options_categories);

	$options[] = array(
		'name' => __('Select a Page', 'roots'),
		'desc' => __('Passed an pages with ID and post_title', 'roots'),
		'id' => 'example_select_pages',
		'type' => 'select',
		'options' => $options_pages);

	$options[] = array(
		'name' => __('Input Radio (one)', 'roots'),
		'desc' => __('Radio select with default options "one".', 'roots'),
		'id' => 'example_radio',
		'std' => 'one',
		'type' => 'radio',
		'options' => $test_array);

	$options[] = array(
		'name' => __('Example Info', 'roots'),
		'desc' => __('This is just some example information you can put in the panel.', 'roots'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Input Checkbox', 'roots'),
		'desc' => __('Example checkbox, defaults to true.', 'roots'),
		'id' => 'example_checkbox',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Advanced Settings', 'roots'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Check to Show a Hidden Text Input', 'roots'),
		'desc' => __('Click here and see what happens.', 'roots'),
		'id' => 'example_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Hidden Text Input', 'roots'),
		'desc' => __('This option is hidden unless activated by a checkbox click.', 'roots'),
		'id' => 'example_text_hidden',
		'std' => 'Hello',
		'class' => 'hidden',
		'type' => 'text');

	$options[] = array(
		'name' => __('Uploader Test', 'roots'),
		'desc' => __('This creates a full size uploader that previews the image.', 'roots'),
		'id' => 'example_uploader',
		'type' => 'upload');

	$options[] = array(
		'name' => "Example Image Selector",
		'desc' => "Images for layout.",
		'id' => "example_images",
		'std' => "2c-l-fixed",
		'type' => "images",
		'options' => array(
			'1col-fixed' => $imagepath . '1col.png',
			'2c-l-fixed' => $imagepath . '2cl.png',
			'2c-r-fixed' => $imagepath . '2cr.png')
	);

	$options[] = array(
		'name' =>  __('Example Background', 'roots'),
		'desc' => __('Change the background CSS.', 'roots'),
		'id' => 'example_background',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => __('Multicheck', 'roots'),
		'desc' => __('Multicheck description.', 'roots'),
		'id' => 'example_multicheck',
		'std' => $multicheck_defaults, // These items get checked by default
		'type' => 'multicheck',
		'options' => $multicheck_array);

	$options[] = array(
		'name' => __('Colorpicker', 'roots'),
		'desc' => __('No color selected by default.', 'roots'),
		'id' => 'example_colorpicker',
		'std' => '',
		'type' => 'color' );

	$options[] = array( 'name' => __('Typography', 'roots'),
		'desc' => __('Example typography.', 'roots'),
		'id' => "example_typography",
		'std' => $typography_defaults,
		'type' => 'typography' );

	$options[] = array(
		'name' => __('Custom Typography', 'roots'),
		'desc' => __('Custom typography options.', 'roots'),
		'id' => "custom_typography",
		'std' => $typography_defaults,
		'type' => 'typography',
		'options' => $typography_options );

	$options[] = array(
		'name' => __('Text Editor', 'roots'),
		'type' => 'heading' );
   */
	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */
  /*
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	$options[] = array(
		'name' => __('Default Text Editor', 'roots'),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'roots' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
   */
	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});

	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}

});
</script>

<?php
}