<?php
/**
 * Implements hook_form_system_theme_settings_alter()
 */
function porto_form_system_theme_settings_alter(&$form, &$form_state) {
  
  // Main settings wrapper
  $form['options'] = array(
    '#type' => 'vertical_tabs',
    '#default_tab' => 'defaults',
    '#weight' => '-10',
    '#attached' => array(
      'css' => array(drupal_get_path('theme', 'porto') . '/css/theme-settings.css'),
    ),
  );
  
  // Default Drupal Settings    
  $form['options']['drupal_default_settings'] = array(
		'#type' => 'fieldset',
		'#title' => t('Drupal Core Settings'),
	);
	
	  // "Toggle Display" 
		$form['options']['drupal_default_settings']['theme_settings'] = $form['theme_settings'];
		
		// "Unset default Toggle Display settings" 
		unset($form['theme_settings']);
		
		// "Logo Image Settings" 
		$form['options']['drupal_default_settings']['logo'] = $form['logo'];
		
		// "Unset default Logo Image Settings" 
		unset($form['logo']);
		
		// "Shortcut Icon Settings" 
		$form['options']['drupal_default_settings']['favicon'] = $form['favicon'];   
		
		// "Unset default Shortcut Icon Settings" 
		unset($form['favicon']);
  
  // General
  $form['options']['general'] = array(
    '#type' => 'fieldset',
    '#title' => t('General'),
  );
            
    // Breadcrumbs
    $form['options']['general']['breadcrumbs'] = array(
      '#type' => 'checkbox',
      '#title' => t('Breadcrumbs'),
      '#default_value' => theme_get_setting('breadcrumbs'),
    );
    
    // Sticky Header
    $form['options']['general']['sticky_header'] = array(
      '#type' => 'checkbox',
      '#title' => t('Sticky Header'),
      '#default_value' => theme_get_setting('sticky_header'),
    );
    
  // Color
  $form['options']['color'] = array(
    '#type' => 'fieldset',
    '#title' => t('Color'),
  );  
  
    // Custom Background Color
    $form['options']['color']['skin_color'] =array(
      '#type' => 'jquery_colorpicker',
	    '#title' => t('Color Scheme'),
	    '#default_value' => theme_get_setting('skin_color'),
    ); 
    
  // Layout
  $form['options']['layout'] = array(
    '#type' => 'fieldset',
    '#title' => t('Layout'),
  );  
  
    // Site Layout
    $form['options']['layout']['site_layout'] = array(
      '#type' => 'select',
      '#title' => t('Body Layout'),
      '#default_value' => theme_get_setting('site_layout'),
      '#options' => array(
        'wide' => t('Wide (default)'),
        'boxed' => t('Boxed'),
      ),
    );
    
  //Background
    $form['options']['layout']['background'] = array(
      '#type' => 'fieldset',
      '#title' => '<h3 class="options_heading">Background</h3>',
      '#states' => array (
          'visible' => array(
            'select[name=site_layout]' => array('value' => 'boxed')
          )
        )
    );
    
    // Body Background 
    $form['options']['layout']['background']['body_background'] = array(
      '#type' => 'select',
      '#title' => t('Body Background'),
      '#default_value' => theme_get_setting('body_background'),
      '#options' => array(
        'porto_backgrounds' => t('Background Image (default)'),
        'custom_background_color' => t('Background Color'),
      ),
    );
    
    // Porto Background Choices
    $form['options']['layout']['background']['background_select'] = array(
      '#type' => 'radios',
      '#title' => t('Select a background pattern:'),
      '#default_value' => theme_get_setting('background_select'),
      '#options' => array(
        'az_subtle' => 'item',
        'blizzard' => 'item',
        'bright_squares' => 'item',
        'denim' => 'item',
        'fancy_deboss' => 'item',
        'gray_jean' => 'item',
        'honey_im_subtle' => 'item',
        'linen' => 'item',
        'pw_maze_white' => 'item',
        'random_grey_variations' => 'item',
        'skin_side_up' => 'item',
        'stitched_wool' => 'item',
        'straws' => 'item',
        'subtle_grunge' => 'item',
        'textured_stripes' => 'item',
        'wild_oliva' => 'item',
        'worn_dots' => 'item',
      ),
      '#states' => array (
          'visible' => array(
            'select[name=body_background]' => array('value' => 'porto_backgrounds')
          )
        )
      );  
    
      // Custom Background Color
      $form['options']['layout']['background']['body_background_color'] =array(
        '#type' => 'jquery_colorpicker',
		    '#title' => t('Body Background Color'),
		    '#default_value' => theme_get_setting('body_background_color'),
	      '#states' => array (
	        'visible' => array(
	          'select[name=body_background]' => array('value' => 'custom_background_color')
	        )
        )
      );   
      
      // Portfolio Columns
      $form['options']['layout']['portfolio_columns'] = array(
        '#type' => 'select',
        '#title' => t('Portfolio Columns'),
        '#default_value' => theme_get_setting('portfolio_columns'),
        '#options' => array(
          'span6' => 'Two',
          'span4' => 'Three',
          'span3' => 'Four (default)',
        ),
      ); 
      
	    // Blog Image
	    $form['options']['layout']['blog_image'] = array(
	      '#type' => 'select',
	      '#title' => t('Blog View Image Size'),
	      '#default_value' => theme_get_setting('blog_image'),
	      '#options' => array(
	        'full' => t('Full (default)'),
	        'medium' => t('Medium'),
	      ),
	    );
    
  // CSS
  $form['options']['css'] = array(
    '#type' => 'fieldset',
    '#title' => t('CSS'),
  );
  
    // User CSS
      $form['options']['css']['user_css'] = array(
        '#type' => 'textarea',
        '#title' => t('Add your own CSS'),
        '#default_value' => theme_get_setting('user_css'),
      ); 
        
  // Twitter
  $form['options']['twitter'] = array(
    '#type' => 'fieldset',
    '#title' => t('Twitter API'),
  );    
  
     // Twitter App Consumer Key
    $form['options']['twitter']['twitter_app_consumer_key'] =array(
      '#type' => 'textfield',
      '#title' => t('Twitter App Consumer Key'),
      '#default_value' => theme_get_setting('twitter_app_consumer_key'),
      '#states' => array (
        'invisible' => array(
          'input[name="enable_twitter_feed"]' => array('checked' => FALSE)
        )
      )
    );
    
    // Twitter App Consumer Secret
    $form['options']['twitter']['twitter_app_consumer_secret'] =array(
      '#type' => 'textfield',
      '#title' => t('Twitter App Consumer Secret'),
      '#default_value' => theme_get_setting('twitter_app_consumer_secret'),
      '#states' => array (
        'invisible' => array(
          'input[name="enable_twitter_feed"]' => array('checked' => FALSE)
        )
      )
    );
    
    // Twitter App Access Token
    $form['options']['twitter']['twitter_app_access_token'] =array(
      '#type' => 'textfield',
      '#title' => t('Twitter App Access Token'),
      '#default_value' => theme_get_setting('twitter_app_access_token'),
      '#states' => array (
        'invisible' => array(
          'input[name="enable_twitter_feed"]' => array('checked' => FALSE)
        )
      )
    );
    
    // Twitter App Access Token Secret
    $form['options']['twitter']['twitter_app_access_secret'] =array(
      '#type' => 'textfield',
      '#title' => t('Twitter App Access Token Secret'),
      '#default_value' => theme_get_setting('twitter_app_access_secret'),
      '#states' => array (
        'invisible' => array(
          'input[name="enable_twitter_feed"]' => array('checked' => FALSE)
        )
      )
    );
    
  // Footer
  $form['options']['footer'] = array(
    '#type' => 'fieldset',
    '#title' => t('Footer'),
  );
  
    // Footer Ribbon
    $form['options']['footer']['ribbon'] = array(
      '#type' => 'checkbox',
      '#title' => t('Footer Ribbon'),
      '#default_value' => theme_get_setting('ribbon'),
    );
  
    // Footer Ribbon Text
      $form['options']['footer']['ribbon_text'] = array(
        '#type' => 'textfield',
        '#title' => t('Footer Ribbon Text'),
        '#default_value' => theme_get_setting('ribbon_text'),
      );   
    
}
?>