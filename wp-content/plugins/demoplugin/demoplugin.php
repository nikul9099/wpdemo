<?php
/*
Plugin Name: Demo Plugin
Plugin URI: http://return-true.com/
Description: A Fake Plugin To Show OOP Techniques
Version: 1.0
Author: Paul Robinson
Author URI: http://return-true.com
*/


Class FakePlugin {
    
    public function __construct() {
        add_action( 'admin_menu', array($this, 'setup_admin_menu') );
    }

    public function setup_admin_menu() {
        add_menu_page( 'My Demo Plugin', 'Demo Plugin', 'activate_plugins', 'my-super-awesome-plugin', array($this, 'admin_page') );
    }

    public function admin_page() {
        $html = <<< HEREDOC
<p>This is some content, it will appear on the page.</p>
HEREDOC;

        echo $html;
    }

}

$FakePlugin = new FakePlugin();