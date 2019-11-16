<?php
/**
 * Template part for displaying slider or featured image in singular pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package businessprofile
 */
?>
<?php
    $carousel_indicators = array();
    $carousel_item = array();
    $carousel_control = array();
    $counter = 0;

    if( is_front_page() && !is_home() ) {
        
        $businessprofile_image1 = get_theme_mod( 'businessprofile_home_carousel_image1' );
        if( $businessprofile_image1 ) {
            $carousel_indicators[] = sprintf(
                '<li data-target="#carouselHome" data-slide-to="%s" class="active"></li>',
                $counter
            );

            // $carousel_item_caption = sprintf(
            //     '<div class="carousel-caption d-none d-md-block"><h5>%s</h5><p>%s</p></div>',
            //     "First slide label",
            //     "Nulla vitae elit libero, a pharetra augue mollis interdum."
            // );
            $carousel_item_caption = '';
            $carousel_item[] = sprintf(
                '<div class="carousel-item active">%s %s</div>',
                businessprofile_attachment_url_to_post_thumbnail($businessprofile_image1),
                $carousel_item_caption
            );

            $counter++;
        }

        $businessprofile_image2 = get_theme_mod( 'businessprofile_home_carousel_image2' );
        if( $businessprofile_image2 ) {
            $carousel_indicators[] = sprintf(
                '<li data-target="#carouselHome" data-slide-to="%s"></li>',
                $counter
            );
            
            $carousel_item[] = sprintf(
                '<div class="carousel-item">%s %s</div>',
                businessprofile_attachment_url_to_post_thumbnail($businessprofile_image2),
                ''
            );
            $counter++;
        }

        $businessprofile_image3 = get_theme_mod( 'businessprofile_home_carousel_image3' );
        if( $businessprofile_image3 ) {
            $carousel_indicators[] = sprintf(
                '<li data-target="#carouselHome" data-slide-to="%s"></li>',
                $counter
            );
            
            $carousel_item[] = sprintf(
                '<div class="carousel-item">%s %s</div>',
                businessprofile_attachment_url_to_post_thumbnail($businessprofile_image3),
                ''
            );
            $counter++;
        }

        $carousel_control[] = '<a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a>';

        $carousel_control[] = '<a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>';
    }
    
    if( is_page() && has_post_thumbnail() ) {
        $carousel_item[] = sprintf(
            '<div class="carousel-item active">%s</div>',
            get_the_post_thumbnail()
        );
        
        $counter++;
    }

    if( $counter > 0 ) {
?>
    <div class="home-carousel">
        <div class="container">
            <div class="row">
                <div id="carouselHome" class="carousel slide" data-ride="carousel">
                    <?php if( !empty($carousel_indicators) ): ?>
                    <ol class="carousel-indicators">
                        <?php echo implode("", $carousel_indicators); ?>
                    </ol>
                    <?php endif; ?>
                    <div class="carousel-inner">
                        <?php echo implode("", $carousel_item); ?>
                    </div>
                    <?php if( $counter > 1 ): ?>
                        <?php echo implode("", $carousel_control); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php
    }
?>
