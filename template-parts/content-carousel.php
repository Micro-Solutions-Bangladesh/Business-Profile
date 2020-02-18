<?php
/**
 * Template part for displaying slider or featured image in singular pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-profile
 */
?>
<?php
    $business_profile_carousel_indicators = array();
    $business_profile_carousel_item = array();
    $business_profile_carousel_control = array();
    $business_profile_counter = 0;

    if( is_front_page() && !is_home() ) {
        $business_profile_image1 = get_theme_mod( 'business_profile_home_carousel_image1' );
        if( $business_profile_image1 ) {
            $business_profile_carousel_indicators[] = sprintf(
                '<li data-target="#carouselHome" data-slide-to="%s" class="active"></li>',
                $business_profile_counter
            );

            $business_profile_carousel_item_caption = '';
            $business_profile_carousel_item[] = sprintf(
                '<div class="carousel-item active">%s %s</div>',
                business_profile_attachment_url_to_post_thumbnail($business_profile_image1),
                $business_profile_carousel_item_caption
            );

            $business_profile_counter++;
        }

        $business_profile_image2 = get_theme_mod( 'business_profile_home_carousel_image2' );
        if( $business_profile_image2 ) {
            $business_profile_carousel_indicators[] = sprintf(
                '<li data-target="#carouselHome" data-slide-to="%s"></li>',
                $business_profile_counter
            );
            
            $business_profile_carousel_item[] = sprintf(
                '<div class="carousel-item">%s %s</div>',
                business_profile_attachment_url_to_post_thumbnail($business_profile_image2),
                ''
            );
            $business_profile_counter++;
        }

        $business_profile_image3 = get_theme_mod( 'business_profile_home_carousel_image3' );
        if( $business_profile_image3 ) {
            $business_profile_carousel_indicators[] = sprintf(
                '<li data-target="#carouselHome" data-slide-to="%s"></li>',
                $business_profile_counter
            );
            
            $business_profile_carousel_item[] = sprintf(
                '<div class="carousel-item">%s %s</div>',
                business_profile_attachment_url_to_post_thumbnail($business_profile_image3),
                ''
            );
            $business_profile_counter++;
        }

        $business_profile_carousel_control[] = '<a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a>';

        $business_profile_carousel_control[] = '<a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>';
    }
    
    if( is_page() && has_post_thumbnail() ) {
        $business_profile_carousel_item[] = sprintf(
            '<div class="carousel-item active">%s</div>',
            get_the_post_thumbnail()
        );
        
        $business_profile_counter++;
    }

    if( $business_profile_counter > 0 ) {
?>
    <div class="home-carousel">
        <div class="container">
            <div class="row">
                <div id="carouselHome" class="carousel slide" data-ride="carousel">
                    <?php if( !empty($business_profile_carousel_indicators) ): ?>
                    <ol class="carousel-indicators">
                        <?php echo implode("", $business_profile_carousel_indicators); ?>
                    </ol>
                    <?php endif; ?>
                    <div class="carousel-inner">
                        <?php echo implode("", $business_profile_carousel_item); ?>
                    </div>
                    <?php if( $business_profile_counter > 1 ): ?>
                        <?php echo implode("", $business_profile_carousel_control); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php
    }
?>
