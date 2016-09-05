<?php

    # Load custom CSS

    add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
    function my_theme_enqueue_styles() {
            wp_enqueue_style( 'tau-style', get_template_directory_uri() . '/style.css' );
    }

    # Indicate that we do not provide a title on our own
    # https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/

    function theme_slug_setup() {
       add_theme_support( 'title-tag' );
    }

    add_action( 'after_setup_theme', 'theme_slug_setup' );

    # Get rid of emoji injection in head

    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );

    # Load custom fonts

    function hook_fonts() {
        $output = <<<FONTS
            <link href='https://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=Share+Tech+Mono' rel='stylesheet' type='text/css'>
FONTS;

        echo $output;
    }

    add_action('wp_head','hook_fonts');

    # Custom read-more link text

    function modify_read_more_link() {
            return '<a class="more-link" href="' . get_permalink() . '">Read more</a>';
    }

?>
