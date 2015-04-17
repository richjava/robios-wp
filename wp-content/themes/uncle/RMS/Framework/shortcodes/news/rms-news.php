<!--<div class="vc_row wpb_row vc_row-fluid">
	<div class="vc_col-sm-4 wpb_column vc_column_container ">
		<div class="wpb_wrapper">
			<h4 style="margin: ; width: 100%; color: ; font-size: ;">Quickly &nbsp; <i class="fa fa-rocket text-color"></i> &nbsp; Qualitatively Work</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ornare sem sit amet mauris bibendum, ac fringilla quam eleifend. Praesent elit tellus, venenatis in lorem ac, porta accumsan sapien. Cras malesuada feugiat .</p>
		</div> 
	</div> 

	<div class="vc_col-sm-4 wpb_column vc_column_container ">
		<div class="wpb_wrapper">
			<h4 style="margin: ; width: 100%; color: ; font-size: ;">Large portfolio of &nbsp; <i class="fa fa-suitcase text-color"></i> &nbsp; works</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ornare sem sit amet mauris bibendum, ac fringilla quam eleifend. Praesent elit tellus, venenatis in lorem ac, porta accumsan sapien. Cras malesuada feugiat .</p>
		</div> 
	</div> 

	<div class="vc_col-sm-4 wpb_column vc_column_container ">
		<div class="wpb_wrapper">
			<h4 style="margin: ; width: 100%; color: ; font-size: ;">10 years of successful  &nbsp; <i class="fa fa-trophy text-color"></i> &nbsp; business</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ornare sem sit amet mauris bibendum, ac fringilla quam eleifend. Praesent elit tellus, venenatis in lorem ac, porta accumsan sapien. Cras malesuada feugiat .</p>
		</div> 
	</div> 
</div>-->
<?php
function news($atts)
{
    extract(shortcode_atts(array(
        'no_of_posts'       => '4'
    ), $atts));
    
    $team_return = '';
    
        $args1 = array(
            'post_type'         => array('news'),
            'post_status'       => array('publish'),
            'posts_per_page'    => $no_of_posts,
            'orderby'           => 'date',
            'order'             => 'DESC'
        );
        
        query_posts($args1);
        if(have_posts())
        {
//			$team_return .= 
//					'<p>
//						<a id="news-prev" href=""><i class="fa fa-chevron-left icon arrow-next outline attached"></i></a>
//						<a id="news-next" href=""><i class="fa fa-chevron-right icon arrow-prev outline attached"></i></a>
//					</p>';
//            $team_return .= '<div class="list_carousel"><ul id="news-slider">';
            $team_return .= '<div class="vc_row wpb_row vc_row-fluid">';
            while(have_posts())
            {
                the_post();
                $des1 = get_post_meta(get_the_ID(), 'designation', TRUE);
				if($des1 != '')
				{
					$desig = $des1;
				}
				else
				{
					$desig = '';
				}
				if(has_post_thumbnail( get_the_ID() ))
				{
					$team_thumb = get_the_post_thumbnail(get_the_ID(), 'news_thumb');
				}
				else
				{
					$team_thumb = '<img src="http://placehold.it/360x270" alt="Reorder">';
				}
                                $team_return .='<div class="vc_col-sm-4 wpb_column vc_column_container ">
		<div class="wpb_wrapper">
			<h4 style="margin: ; width: 100%; color: ; font-size: ;">'.get_the_title().'</h4><p>'.substr(get_the_content(), 0, 150).'</p>
                            <a href="#" class="arrow-link" style="width: 100%; float: left;">Read More  </a>
		</div> 
	</div>';
//			   $team_return .='
//				<li class="news-item">
//					<i>'.$team_thumb.'</i>
//					<p></p>
//					<h4>'.get_the_title().'</h4>
//					<p></p>
//					<p>'.substr(get_the_content(), 0, 150).'</p>
//					<h4 class="text-subtitle">From <b>'.$desig.'</b></h4>
//					<ul>';
//						$fa = get_post_meta(get_the_ID(), 'twitter', true); if($fa != '') { 
//							$team_return .='<li>'.$fa.'</li>';
//						} 
//						$gp = get_post_meta(get_the_ID(), 'linkedin', true); if($gp != '') { 
//							$team_return .='<li>'.$gp.'</li>';
//						}
//						$tw = get_post_meta(get_the_ID(), 'google', true); if($tw != '') { 
//							$team_return .='<li>'.$tw.'</li>';
//						}
//					$team_return .='</ul>
//					<p><a href="#" class="button outline">Order service</a></p>
//				</li>';
            }
			//$team_return .= '</ul></div>';
            $team_return .= '</div>';
			
        }
        else
        {
            $team_return .= '<div class="col-lg-12 text-center">';
                $team_return .= '<h1 class="common_main_heading">Please Insert Some <span>News</span> First.</h1>';
            $team_return .= '</div>';
        }
        wp_reset_query();
    
    
    return $team_return;
}
add_shortcode( "rms-news", "news" );