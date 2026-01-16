<?php
//about theme info
add_action( 'admin_menu', 'skt_barbecue_abouttheme' );
function skt_barbecue_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-barbecue'), esc_html__('About Theme', 'skt-barbecue'), 'edit_theme_options', 'skt_barbecue_guide', 'skt_barbecue_mostrar_guide');   
} 
//guidline for about theme
function skt_barbecue_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_html_e('Theme Information', 'skt-barbecue'); ?>
		   </div>
          <p><?php esc_html_e('SKT Barbeque WordPress theme can be used for barbeque restaurants, cafeterias, coffee shops, eateries, grilled dishes, smoky aromas, mouthwatering recipes, online reservations, tandoor, sigri, open air, roof top bistro, fine dining, chef special recipe, food blogger, ingredients, tasting menu, drink wine bar cellar, chinese, sushi, continental, italian, fast food, thai, pizza, tea, Japanese, burger, doughnut, cuisine, bakery, dairy, biscuit, korean, kitchen, fish, turkey, chicken, appetizer, soups, healthy eating lifestyle. It is a must-have for anyone looking to create a professional, modern, and stylish website for their food-related business. Appointment and online ordering compatible. WooCommerce and SEO compatible.','skt-barbecue'); ?></p>
          <a href="<?php echo esc_url(SKT_BARBECUE_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SKT_BARBECUE_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-barbecue'); ?></a> | 
				<a href="<?php echo esc_url(SKT_BARBECUE_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'skt-barbecue'); ?></a> | 
				<a href="<?php echo esc_url(SKT_BARBECUE_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-barbecue'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_BARBECUE_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>