<?php
function portfolio($atts)
{
    extract(shortcode_atts(array(
        'formate'          => '3',
        'number'           => '3'
    ), $atts));
    
    $return_portfolio = '';
    $pro = '';
    $pro .= '<div class="PortfolioGallery">';
        $filter_cat = array(
            'orderby'       => 'name',
            'order'         => 'ASC', 
            'hide_empty'    => 0,
            'hierarchical'  => 1,
            'taxonomy'      => 'portfolio'
        );
        $categories = get_categories( $filter_cat );
        $pro .= '<div class="portfolioFilter">';
        $pro .= '<ul style="margin-top: 40px;">';
        $pro .= '<li data-filter="*" class="current">All Categories</li>';
        foreach($categories as $cat)
        {
            $pro .= '<li data-filter=".'.$cat->term_id.'">'.$cat->cat_name.'</li>';
        }
        $pro .= '</ul>';
        $pro .= '</div>';
        
        $filter = array(
            'post_type'     => array('portfolio'),
            'post_status'   => array('publish'),
            'orderby'       => 'ID',
            'order'         => 'ASC',
            'posts_per_page'=> $number
        );
        query_posts($filter);
        if(have_posts())
        {
            $pro .= '<div class="portfolioContainer">';
            $i = 1;
            
            while(have_posts()): the_post();
                $ida = get_post_thumbnail_id( get_the_ID() );
                if(has_post_thumbnail())
                {
                    $thumgSmall = get_the_post_thumbnail(get_the_ID(), 'portfolio');
                    $thumgSmall1 = get_the_post_thumbnail(get_the_ID(), 'portfolio_square');
                }
                else
                {
                    $thumgSmall = '<img alt="" src="http://placehold.it/240x200" alt="ThemeOnLab"/>';
                    $thumgSmall1 = '<img alt="" src="http://placehold.it/340x340" alt="ThemeOnLab"/>';
                }
                $terms = get_the_terms(get_the_ID(), 'portfolio');
                if(is_array($terms))
                {
                    foreach ( $terms as $term ) 
                    {
                            $id = $term->term_id;
                    }
                }
                
                if($formate == 'Three-Column')
                {
                    $pro .= '<div class="four columns '.$id.'">';
                    $pro .= '<div class="portfolio-thumb">';
                    $pro .= '<a class="popup" href="'.wp_get_attachment_url($ida).'">';
                    $pro .= '<i>'.$thumgSmall.'</i></a>';
                    $pro .= '<b><a href="'.get_the_permalink().'">'.get_the_title().'</a></b>';
                    $pro .= '<em>'.get_the_content().'</em>';
                    $pro .= '</div>';
                    $pro .= '</div>';
                }
                elseif($formate == 'Four-Column')
                {
                    $pro .= '<div class="three columns '.$id.'">';
                    $pro .= '<div class="portfolio-thumb">';
                    $pro .= '<a class="popup" href="'.wp_get_attachment_url($ida).'"></a>';
                    $pro .= '<i>'.$thumgSmall.'</i>';
                    $pro .= '<b><a href="'.get_the_permalink().'">'.get_the_title().'</a></b>';
                    $pro .= '<em>'.get_the_content().'</em>';
                    $pro .= '</div>';
                    $pro .= '</div>';
                }
                elseif($formate == 'Six-Column')
                {
                    $pro .= '<div class="two columns '.$id.'">';
                    $pro .= '<div class="portfolio-thumb">';
                    $pro .= '<a class="popup" href="'.wp_get_attachment_url($ida).'"></a>';
                    $pro .= '<i>'.$thumgSmall.'</i>';
                    $pro .= '<b><a href="'.get_the_permalink().'">'.get_the_title().'</a></b>';
                    $pro .= '<em>'.get_the_content().'</em>';
                    $pro .= '</div>';
                    $pro .= '</div>';
                }
                
                $i++;
            endwhile;
            $pro .= '</div>';
        }
        else
        {
            $pro .= '<div class="row">';
            $pro .= '<h1 class="text-center">Insert Some Portfolio First</h1>';
            $pro .= '</div>';
        }
        
        $pro .= '</div>';
        
        wp_reset_query();
    return $pro;
}
add_shortcode( "rms-portfolio", "portfolio" );