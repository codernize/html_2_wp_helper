	<footer>
		<div class="row">
			
			<?php 
				$args = array(
					'theme_location'  => 'footer',
					// 'container'       => false, // Use false for no container, 'div' default
					'container_class' => 'columns footer-menu text-right small-only-text-center medium-6 medium-push-6',
					// 'container_id'    => '',
					'menu_class'      => 'inline-list ',
					// 'menu_id'         => '',
					'depth'           => 1,
					'echo'			  => false ,
				);
				$menu = wp_nav_menu($args);
				// play with $menu
				
				echo $menu; 
			?>
			<div class="columns copyright small-only-text-center medium-6 medium-pull-6">
				<p>© 2015 NewFire Media.</p>
			</div>

		</div>
	</footer>

    <script src="<?php bloginfo('template_url'); ?>/bower_components/jquery/dist/jquery.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/bower_components/foundation-sites/dist/foundation.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/app.js"></script>
  </body>
</html>
