
<!-- // Custom carousel for shortcode -->
<?php

    echo '<main id="main" class="container">';
        // <!-- Start of custom carousel -->
        echo '<div class="carousel">';

            echo '<h1>What our customers say about us</h1>';

            echo '<div class="slider">';

                    $args = array( 
                        'post_type' => 'Reviews',
                        'post_status' => 'publish',
                        'posts_per_page' => 10,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    );

                    $posts = new WP_Query( $args );

                    while ( $posts -> have_posts() ) : $posts -> the_post();

                        echo '<section class="reviews">';

                            if ( has_post_thumbnail() ) {

                                echo '<div class="reviews-profile">';

                                    echo '<div class="thumbnail-container">';
                                        the_post_thumbnail();
                                    echo '</div>';

                                    echo '<h4>';
                                        echo the_field('full_name');
                                    echo '</h4>';

                                    echo '<p>';
                                        echo the_field('company_title');
                                    echo '</p>';

                                echo '</div>';
                            }
                            
                            echo '<div class="reviews-text">';
                                the_content();
                                echo '<p class="name-attribution">';
                                    echo '— ';
                                    echo the_field('name_attribution');
                                echo '</p>';
                            echo '</div>';

                        echo '</section>';

                    endwhile;

                    wp_reset_query();
                
            echo '</div>';

            echo '<div class="controls">';

                echo '<span class="arrow prev">';

                    echo '<i class="material-icons">'; 
                    
                    ?>
                        keyboard_arrow_left
                    <?php
                    echo '</i>';

                echo '</span>';

                echo '<span class="arrow next">';
                    echo '<i class="material-icons">';
                    ?>
                        keyboard_arrow_right
                    <?php
                    echo '</i>';
                echo '</span>';
                echo '<section class="controls-2">';
                    echo '<span class="ctrl play">';
                        echo '<i class="material-icons">';
                        ?>
                            play_arrow
                        <?php
                        echo '</i>';
                        ?>
                        Play Slider
                        <?php
                    echo '</span>';
                    echo '<span class="ctrl pause">';
                        echo '<i class="material-icons">';
                        ?>
                            pause
                        <?php
                        echo '</i>';
                        ?>
                        Pause Slider
                        <?php
                    echo '</span>';
                echo '</section>';
                echo '<ul>';
                    // <!-- Check count of existing sliders (reviews) -->
                        $count_posts = wp_count_posts('reviews');
                        $published_posts = $count_posts->publish;
                        for ($i = 0; $i < $published_posts; $i++) {
                            echo '<li class="selected"></li>';
                        };
                        ?>
                        <?php
                echo '</ul>';
            echo '</div>';
        echo '</div>';
    echo '</main>';

?>