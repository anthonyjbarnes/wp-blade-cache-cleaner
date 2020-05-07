<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://bants.dev
 * @since      1.0.0
 *
 * @package    Blade_Cache_Cleaner
 * @subpackage Blade_Cache_Cleaner/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Blade_Cache_Cleaner
 * @subpackage Blade_Cache_Cleaner/admin
 * @author     Anthony Barnes <anthonyjbarnes@gmail.com>
 */
class Blade_Cache_Cleaner_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Blade_Cache_Cleaner_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Blade_Cache_Cleaner_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/blade-cache-cleaner-admin.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Blade_Cache_Cleaner_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Blade_Cache_Cleaner_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/blade-cache-cleaner-admin.js', array( 'jquery' ), $this->version, false);
    }

    /**
     * Register the button on the Admin Bar to clear cache
     * @param $admin_bar
     */
    public function addNavButtons($admin_bar)
    {

        $admin_bar->add_menu(array(
            'id'    => 'clear-blade-cache',
            'title' => 'Clear Blade Cache',
            'href'  => '#',
            'meta'  => array(
                'title' => __('My Item'),
                'class' => 'clear-blade-cache'
            ),

        ));
        $admin_bar->add_menu(array(
            'id'    => 'my-sub-item',
            'parent' => 'my-item',
            'title' => 'My Sub Menu Item',
            'href'  => '#',
            'meta'  => array(
                'title' => __('My Sub Menu Item'),
                'target' => '_blank',
                'class' => 'my_menu_item_class'
            ),
        ));
    }


    public function DeleteFiles($target)
    {
        if (is_dir($target)) {
            $files = glob($target . '*', GLOB_MARK); //GLOB_MARK adds a slash to directories returned

            foreach ($files as $file) {
                self::DeleteFiles($file);
            }

            rmdir($target);
        } elseif (is_file($target)) {
            unlink($target);
        }
    }
}
