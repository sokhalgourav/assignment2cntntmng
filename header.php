<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <!-- add our CSS -->
     <link rel="stylesheet" href="<?php echo esc_url(home_url('wp-content/themes/COMP2109_Assignment_2/assignment_2_scenario_3/css/styles.css')); ?>">
</head>
<body <?php body_class(); ?>>
    <header class="default-header">
        <div>
            <a href="<?php echo esc_url(home_url()); ?>">
                <img src="<?php echo esc_url(home_url('wp-content/themes/COMP2109_Assignment_2/assignment_2_scenario_3/screenshot.png')) ?>" alt="header logo">
            </a>
        </div>
        <nav>
            <?php
                wp_nav_menu(array(
                    'menu'           =>  'main',
                    'theme_location' =>  '',
                    'depth'          =>  2,
                    'fallback_cb'    =>  false
                ));
            ?>
        </nav>
    </header>