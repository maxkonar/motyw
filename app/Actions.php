<?php

namespace App;

class Actions {
    public function init() {
        add_action('wp_enqueue_scripts', [$this, 'registerStyles']);
        add_action('wp_enqueue_scripts', [$this, 'registerScripts']);
        add_action('init', [$this, 'registerMenus']);
        add_action('acf/init', [$this, 'registerBlocks']);
    }

    public function registerStyles() {
       
        //wp_enqueue_style('case-studies-block-styles', get_template_directory_uri() . '/blocks/case-studies/style.css');
        wp_enqueue_style('main', get_template_directory_uri() . '/dist/style.min.css', [], null, 'all');
    }

    public function registerScripts() {
        //wp_enqueue_script('case-studies-block-scripts', get_template_directory_uri() . '/blocks/case-studies/scripts.js');
        wp_enqueue_script('jquery');
        wp_enqueue_script('main', get_template_directory_uri() . '/dist/main.min.js', ['jquery'], null, true);
        
    }

    public function registerMenus() {
        register_nav_menus(array(
            'primary' => esc_html__( 'Primary Menu', 'case-studies' ),
            'footer' => esc_html__( 'Footer Menu', 'case-studies' ),
        ));
    }

    public function registerBlocks() {
        acf_register_block_type(array(
            'name' => 'case-studies',
            'title' => esc_html__('Case Studies', 'case-studies'),
            'description' => 'Case Studies block',
            'render_template' => 'blocks/case-studies/case-studies.php',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => array('case studies', 'case', 'studies'),
        ));
    }
}

