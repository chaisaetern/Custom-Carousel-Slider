<?php
/**
 * 
 * Template Name: Home
 *
 * @package custompost
 */

get_header();
?>

<main id="main" class="container">
    <!-- Start of custom carousel -->
    <div class="carousel">
        <h1>What our customers say about us</h1>
        <div class="slider">
            <?php
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
            ?>
        </div>
        <div class="controls">
            <span class="arrow prev">
                <i class="material-icons">
                    keyboard_arrow_left
                </i>
            </span>
            <span class="arrow next">
                <i class="material-icons">
                    keyboard_arrow_right
                </i>
            </span>
            <section class="controls-2">
                <span class="ctrl play">
                    <i class="material-icons">
                        play_arrow
                    </i>
                    Play Slider
                </span>
                <span class="ctrl pause">
                    <i class="material-icons">
                        pause
                    </i>
                    Pause Slider
                </span>
            </section>
            <ul>
                <!-- Check count of existing sliders (reviews) -->
                <?php 
                    $count_posts = wp_count_posts('reviews');
                    $published_posts = $count_posts->publish;
                    for ($i = 0; $i < $published_posts; $i++) {
                        echo '<li class="selected"></li>';
                    } ?>
            </ul>
        </div>
    </div>
</main>

<?php
get_footer();
?>