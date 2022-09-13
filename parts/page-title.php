<?php //veni vidi codi 

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


if (is_page()) {
    
    $disable_page_breadcrumbs = get_field('disable_page_breadcrumbs',get_the_ID());
    if ($disable_page_breadcrumbs === true) {
        ?>
        <section class="page-title-line section"></section> 
        <?php
        return ;
    }
} else if(is_category() || is_archive()) {
    ?>
    <section class="page-title-line section"></section> 
    <?php
    return ;
}


if (is_category()) {
    $title = single_cat_title('', false);
} elseif (is_search()) {
    $title =  'Search: <span class="color-primary">' . esc_attr(get_search_query()) . '</span>';
} elseif (is_404()) {
    $title = 'Page Not Found';
    $title = '404';
} else {
    $title = get_field('header_title');
    if (empty($title)) {
        $title = get_the_title();
    } // end if 
} // end if 
if (empty($title)) {
    $title = get_the_title();
    /* $title_arr = explode(' ', $title);
    foreach ($title_arr as $key => $value) {
        if ($key % 2 !=0) {
            $title_arr[$key] = '<strong>'.$value.'</strong>';
        } // end if 
    } // end foreach 
    $title = implode(' ', $title_arr); */
} // end if 

?>

<section class="section page-title ">
    <div class="page-title-container">
        <div class="row">
            <div class="columns small-12 page-title-content">
                <div class="bradcrums-container">
                    <?php
                    custom_breadcrumbs();
                    ?>
                </div>
                <?php
               /*  if (!is_singular('post')) {
                ?>
                    <h2 class="fz64 "><?php
                                        echo $title;
                                        ?></h1>

                    <?php
                } // end if */
                    ?>
            </div>
        </div>
    </div>
</section>