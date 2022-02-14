<?php

namespace Faisal\Academy\Admin;

/**
 * The Menu handler class
 */
class Menu {

    public $addressbook;

    /**
     * Initialize the class
     */
    function __construct( $addressbook ) {
        $this->addressbook = $addressbook;

        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
    }

    /**
     * Register admin menu
     *
     * @return void
     */
    public function admin_menu() {
        $parent_slug = 'faisal-academy';
        $capability = 'manage_options';

        add_menu_page( __( 'faisal Academy', 'faisal-academy' ), __( 'Academy', 'faisal-academy' ), $capability, $parent_slug, [ $this->addressbook, 'plugin_page' ], 'dashicons-welcome-learn-more' );
        add_submenu_page( $parent_slug, __( 'Address Book', 'faisal-academy' ), __( 'Address Book', 'faisal-academy' ), $capability, $parent_slug, [ $this->addressbook, 'plugin_page' ] );
        add_submenu_page( $parent_slug, __( 'Settings', 'faisal-academy' ), __( 'Settings', 'faisal-academy' ), $capability, 'faisal-academy-settings', [ $this, 'settings_page' ] );
    }

    /**
     * Handles the settings page
     *
     * @return void
     */
    public function settings_page() {
        echo 'Settings Page';
    }
}