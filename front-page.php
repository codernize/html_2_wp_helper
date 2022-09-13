<?php 
require_once(dirname(__FILE__). DIRECTORY_SEPARATOR . '_core.php');
get_header( ) ;

// get_template_part( 'parts/content' ); // WP

// or ... 

?>
<main class="main-content">
    <?php 
    // get_template_part( 'parts/blocks/block', 'hero' );
    get_template_part( 'content/home', 'hero' );
    
    ?>
</main>
<?php

get_footer( );

