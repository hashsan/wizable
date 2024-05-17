<?php

function theme_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Widget Area', 'text_domain' ),
        'id' => 'main_widget',
        'description' => __( 'Widgets in this area will be shown on the main content area.', 'text_domain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '', // Nothing
        'after_title' => '',  // Nothing
    ) );
}
add_action( 'widgets_init', 'theme_widgets_init' );
