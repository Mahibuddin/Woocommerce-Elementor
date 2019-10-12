



<?php


$q = new WP_Query( array(
    'posts_per_page' => 10, 
    'post_type' => 'product',
    'post__in' => $settings['p_ids'],
));





foreach($settings['step_three_products'] as $p_three) {
    $thumb_id = get_term_meta( $p_three, 'thumbnail_id', true );
    $term_img = wp_get_attachment_image_url(  $thumb_id, 'medium' );
    $info = get_term($p_three, 'product_cat');

    $html .= '<div class="'.$columns_markup.' ">';

        if(!empty($thumb_id)) {
            $html .= '<div class="cat-img cat-img-bg" style="background-image:url('.$term_img.')"></div>';  
        } else {
            $html .= '<div class="cat-no-thumb"><p>No thumbnail</p></div>';
        }
        
        $html .='

       
    </div>';
}