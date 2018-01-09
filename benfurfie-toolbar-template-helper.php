<?php

namespace BenFurfie\ToolbarTemplateHelper;

/**
 * A simple plugin that outputs the current template to the toolbar.
 * 
 * Plugin Name: Toolbar Template Helper
 * Description: A simple plugin that outputs the current template to the toolbar.
 * Version: 0.1.0
 * Author: Ben Furfie
 * License: Proprietary
 * Textdomain: textlocal-landing-pages
 * 
 * @package wordpress
 * @subpackage benfurfie-toolbar-template-helper
 * @author Ben Furfie
 * @license proprietary
 * @copyright Copyright © 2018 Ben Furfie
 */

defined('ABSPATH') or die('You cannot access this page directly.');

/**
 * Add helper to the toolbar.
 * 
 * @since 0.1.0
 */

function addTemplateHelperToToolbar()
{

    /**
     * Call the template global;
     * 
     * @since 0.1.0
     */

    global $template;

    /**
     * Call the wp_admin_bar global;
     * 
     * @since 0.1.0
     */

    global $wp_admin_bar;
    
    /**
     * Create the variable $template_name and set it to the value of the template.
     * 
     * @since 0.1.0
     */

    $template_name = basename($template);

    /**
     * Create $args array and set values.
     * 
     * @since 0.1.0
     */

    $args = array(
        'id' => 'toolbar_template_helper',
        'title' => 'Current Page Template: ' . $template_name,
        'meta' => array(
            'class' => 'toolbar-template-helper'
        )
    );

    /**
     * Add $args to the toolbar as a new node.
     * 
     * @since 0.1.0
     */

    $wp_admin_bar->add_node( $args );

}
/**
 * Only load if the user is in the control panel.
 * 
 * @since 0.1.0
 */
if( ! is_admin())
{
    add_action('admin_bar_menu', 'BenFurfie\ToolbarTemplateHelper\addTemplateHelperToToolbar', 100);
}

/**
 * Add custom admin styles to prevent the hover effect on the node.
 * 
 * @since 0.1.0
 */

function addCustomAdminStyles()
{
    wp_enqueue_style('toolbar-helper', plugins_url('css/toolbar-helper.css', __FILE__) );
}
add_action('wp_enqueue_scripts', 'BenFurfie\ToolbarTemplateHelper\addCustomAdminStyles');