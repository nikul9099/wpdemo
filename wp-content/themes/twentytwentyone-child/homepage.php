<?php
/**
* Template Name: Homepage
*/
get_header(); 
?>
<?php 
// $taxonomyName = "category";
// $parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => false));   
// echo '<ul>';
// foreach ($parent_terms as $pterm) {
//     $terms = get_terms($taxonomyName, array('parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => false));
//     foreach ($terms as $term) {
//         echo '<li>'.$pterm->name.', <a href="' . get_term_link( $term->name, $taxonomyName ) . '">' . $term->name . '</a></li>';  
//         $childs = get_terms($taxonomyName, array('parent' => $term->term_id,'child_of' => $term->term_id, 'orderby' => 'slug', 'hide_empty' => false));
//         foreach($childs as $child){
//             echo '<li>'.$term->name.', <a href="' . get_term_link( $child->name, $taxonomyName ) . '">' . $child->name . '</a></li>';  
//         }
//     }
// }
// echo '</ul>';


?>

<?php echo do_shortcode('[greeting]'); 


$pagelist = get_pages('sort_column=menu_order&sort_order=asc');
$pages = array();
foreach ($pagelist as $page) {
$pages[] = $page->ID;
}

$current = array_search(get_the_ID(), $pages);
$prevID = $pages[$current-1];
$nextID = $pages[$current+1];
?>

<div class="navigation">
<?php if (!empty($prevID)) { ?>
<div class="alignleft">
<a href="<?php echo get_permalink($prevID); ?>"
title="<?php echo get_the_title($prevID); ?>">Previous</a>
</div>
<?php }
if (!empty($nextID)) { ?>
<div class="alignright">
<a href="<?php echo get_permalink($nextID); ?>"
title="<?php echo get_the_title($nextID); ?>">Next</a>
</div>
<?php } ?>
</div><!-- .navigation -->
<?php get_footer(); ?>