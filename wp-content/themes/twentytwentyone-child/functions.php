<?php
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
   	//wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('parent-style')  );
}
require_once 'custom-elementor.php';

function load_admin_scripts(){  
    wp_enqueue_style("gridster-style", "https://cdn.rawgit.com/ducksboard/gridster.js/master/dist/jquery.gridster.min.css", false);
    wp_enqueue_script("jquery-gridster", "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js", false);
    wp_enqueue_script("gridster-script", "https://cdn.rawgit.com/ducksboard/gridster.js/master/dist/jquery.gridster.min.js", false);

    wp_enqueue_script("jquery", "https://code.jquery.com/jquery-1.12.4.js", false);
    wp_enqueue_script("jquery-ui", "https://code.jquery.com/ui/1.12.1/jquery-ui.js", false);
   
    wp_register_style( 'jquery-ui-css', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );
    wp_enqueue_style('jquery-ui-css');

    wp_enqueue_script("gridster-script-extra", "https://cdn.rawgit.com/ducksboard/gridster.js/master/dist/jquery.gridster.with-extras.min.js", false);

}

add_action("admin_enqueue_scripts", "load_admin_scripts");

add_filter( 'woocommerce_email_recipient_new_order', 'shop_manager_email_recipient', 10, 2 );

function shop_manager_email_recipient( $recipient, $order ) {

    foreach( WC()->cart->get_cart() as $cart_item_key => $cart_item ){

        $post_obj    = get_post( $cart_item['product_id'] ); // The WP_Post object
        if($post_obj){
            $recipient = $post_obj->post_author;
        }
        
    }

  return $recipient;
}


function function_add_author_cwpa() {
    if ( post_type_exists( 'product' ) ) {
        add_post_type_support( 'product', 'author' );
    }
}
add_action('init', 'function_add_author_cwpa', 999 );

add_action('rest_api_init', function() {
    
  register_rest_route( 'product/v3', '/all-products',array(
                'methods'  => WP_REST_Server::READABLE,
                'callback' => 'custom_api_get_all_posts_callback',
    ));
});


function custom_api_get_all_posts_callback( $request ) {
    // Initialize the array that will receive the posts' data. 
    $posts_data = array();
    // Receive and set the page parameter from the $request for pagination purposes
    $paged = $request->get_param( 'page' );
    $paged = ( isset( $paged ) || ! ( empty( $paged ) ) ) ? $paged : 1; 
    // Get the posts using the 'post' and 'news' post types
  
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'paged' => $paged,
    );

    $loop = new WP_Query( $args );

    while ( $loop->have_posts() ) : $loop->the_post();
        global $product;
        $id = $product->ID; 
        $post_thumbnail = ( has_post_thumbnail( $id ) ) ? get_the_post_thumbnail_url( $id ) : null;

        $posts_data[] = (object) array( 
            'ID' => get_the_ID(), 
            'title' => get_the_title(),
            'author' => get_author_name(),
            'stock_quantity' => $product->get_stock_quantity(),
        );
    endwhile;
    echo json_encode($posts_data);
    wp_reset_query();

} 

function filter_woocommerce_api_product_response( $product_data, $product, $fields, $this_server ) { 
    $product_data['vendor_id'] = get_post_field( 'post_author', $product->id);
    $product_data['vendor_name'] = get_the_author_meta( 'display_name', $product_data['vendor_id']);
        return $product_data; 
};      
add_filter( 'woocommerce_api_product_response', 'filter_woocommerce_api_product_response', 10, 4 ); 

// add_filter('wpmu_validate_user_signup', 'skip_email_exist');
// function skip_email_exist($result){
//     if(isset($result['errors']->errors['user_email']) && ($key = array_search(__('Sorry, that email address is already used!'), $result['errors']->errors['user_email'])) !== false) {
//         unset($result['errors']->errors['user_email'][$key]);
//         if (empty($result['errors']->errors['user_email'])) unset($result['errors']->errors['user_email']);
//     }
//     define( 'WP_IMPORTING', 'SKIP_EMAIL_EXIST' );
//     return $result;
// }

add_filter('pre_user_email', 'skip_email_exist');
function skip_email_exist($user_email){
    define( 'WP_IMPORTING', 'SKIP_EMAIL_EXIST' );
    return $user_email;
}


add_action('woocommerce_product_options_general_product_data', 'woocommerce_product_custom_fields');
// Save Fields
add_action('woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save');
function woocommerce_product_custom_fields()
{
    global $woocommerce, $post;
    echo '<div class="product_custom_field">';
    // Custom Product Text Field
    woocommerce_wp_text_input(
        array(
            'id' => '_custom_product_text_field',
            'placeholder' => 'Custom Product Text Field',
            'label' => __('Custom Product Text Field', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
    echo '</div>';
}

function woocommerce_product_custom_fields_save($post_id){
    // Custom Product Text Field
    $woocommerce_custom_product_text_field = $_POST['_custom_product_text_field'];
    if (!empty($woocommerce_custom_product_text_field))
        update_post_meta($post_id, '_custom_product_text_field', esc_attr($woocommerce_custom_product_text_field));
}

add_action( 'wp_ajax_nopriv_custom_demo_frm', 'custom_demo_frm' );
add_action( 'wp_ajax_custom_demo_frm', 'custom_demo_frm' );
function custom_demo_frm(){
global $wpdb;

//echo $_POST["fname"];

//die;

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$message = $_POST["message"];

$tableName = 'wp_custom_form';
$insert_row = $wpdb->insert( 
                $tableName, 
                array( 
                    'fname' => $fname, 
                    'lname' => $lname, 
                    'email' => $email, 
                    'phone' => $phone,
                    'message' => $message, 
                )
            );
// if row inserted in table
if($insert_row){
    echo json_encode(array('res'=>true, 'message'=>__('New row has been inserted.')));
}else{
    echo json_encode(array('res'=>false, 'message'=>__('Something went wrong. Please try again later.')));
}
wp_die();
}

function cf7_custom_url_check( $result, $url) {
  if ($result){

    $regex='/(ftp|http|https):\/\/?(?:www\.)?linkedin.com(\w+:{0,1}\w*@)?(\S+)(:([0-9])+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/';  
    if (!preg_match($regex,$url))
       
        $result=FALSE;
    }
  return $result;
}
add_filter( 'wpcf7_is_url', 'cf7_custom_url_check', 10, 2 );


function wpb_demo_shortcode() { 
 
global $post;
if ( is_page() ) :

    echo '<div class="page-dropdown">';
    $parent_pages = get_pages('parent='.$post->post_parent.'' ); 

    //echo "<pre>"; print_r($parent_pages);

    if($parent_pages){
        echo "Parent:";
        echo "<select id='customparentpages' name='customparentpages[]' onchange='location = this.value;'>";
        echo "<option value='0'>None</option>";
        foreach ( $parent_pages as $page ) {
                if($page->ID == $post->ID){
                    echo "<option value='".get_permalink( $page->ID )."' selected='selected'>{$page->post_title}</option>";
                }else{
                    echo "<option value='".get_permalink( $page->ID )."'>{$page->post_title}</option>";
                }
                
            }
        echo "</select><br />";
    }
        
    $chil_pages = get_pages('parent='.$post->ID.'&echo=0' ); 


   //echo "<pre>"; print_r($chil_pages);

    if($chil_pages){
        echo "Child:";
        echo "<select id='customchildpages' name='customchildpages[]' onchange='location = this.value;'>";
        echo "<option value='0'>None</option>";
        foreach ( $chil_pages as $page ) {

            if($page->ID == $post->ID){
                 echo "<option value='".get_permalink( $page->ID )."' selected='selected'>{$page->post_title}</option>";
             }  else {
                 echo "<option value='".get_permalink( $page->ID )."'>{$page->post_title}</option>";
             } 
           
        }
            echo "</select><br />";
    }

    echo '</div>';

endif;
} 


// register shortcode
add_shortcode('greeting', 'wpb_demo_shortcode'); 

add_action('wp_ajax_user_fronted_change_password', 'user_fronted_change_password');
add_action('wp_ajax_nopriv_user_fronted_change_password', 'user_fronted_change_password');

function user_fronted_change_password() {
       
    global $current_user;
        
        $password = sanitize_text_field($_POST['new_password']);
       
        $userdata = array(
            'ID'        =>  $current_user->ID,
            'user_pass' =>  $password
        ); 
        $user_id = wp_update_user($userdata);
        if($user_id == $current_user->ID){
            update_user_meta($current_user->ID, 'user_front_changepass_status', 1);
            echo 'success!';
           
        } else {
            echo 'error';
        }  
    
    // Always exit to avoid further execution
    exit();
}



// function custom_order_before_calculate_totals($and_taxes, $order ) {
//     // The loop to get the order items which are WC_Order_Item_Product objects since WC 3+
//     // loop all products and calculate total deposit
//     $total_deposit = 0;
//     foreach( $order->get_items() as $item_id => $item ) {
//         // get the WC_Product object
//         $product = $item->get_product();

//         // get the quantity
//         $product_quantity = $item->get_quantity();

//         // get the deposit amount
//         $deposit = $product->get_attribute('deposit') * $product_quantity;

//         // sum of deposits from all products
//         $total_deposit += $deposit;
//     }


//     // update the Deposit fee if it exists
//     $deposit_fee_exists = false;
//     foreach( $order->get_fees() as $item_id => $item_fee ) {
//         $fee_name = $item_fee->get_name();

//         if ( $fee_name == 'Deposit' ) {
//             $item_fee->set_tax_status('none'); // no tax on deposit
//             $item_fee->set_total($total_deposit);
//             $deposit_fee_exists = true;
//             break;
//         }
//     }

//     // if there isn't an existing deposit fee then add it
//     if ( $total_deposit > 0 && !$deposit_fee_exists ) {
//         // Get a new instance of the WC_Order_Item_Fee Object
//         $item_fee = new WC_Order_Item_Fee();

//         $item_fee->set_name( "Deposit" ); // Generic fee name
//         $item_fee->set_amount( $total_deposit ); // Fee amount
//         $item_fee->set_tax_status( 'none' ); // or 'none'
//         $item_fee->set_total( $total_deposit ); // Fee amount

//         // Add Fee item to the order
//         $order->add_item( $item_fee );
//     }
// }
// add_action( 'woocommerce_order_before_calculate_totals', "custom_order_before_calculate_totals", 10, 3);

// add_filter('woocommerce_login_redirect', 'wpse125952_redirect_to_request', 50, 3); 
// function wpse125952_redirect_to_request($redirect_to, $requested_redirect_to, $user){
// //is there a user to check?
//        if ($requested_redirect_to == admin_url()) {
//            if (isset($user->roles) && is_array($user->roles)) {
//                //check for admins
//                if (in_array('vendor6', $user->roles)) {
//                    // redirect them to the default place
//                    $redirect_to = get_permalink(wcmp_vendor_dashboard_page_id());
//                }
//            }
//        }
//        return $redirect_to;
// }


function meta_box_markup($object)
{
    wp_nonce_field(basename(__FILE__), 'page-builder');

    ?>
        <a href="javascript:add_widget();">Add Box</a>
        <br>

        <div style="background-color: grey; width: 750px;" class="gridster">
            <ul></ul>
        </div>

        <input type="text" name="complete_layout_data" id="complete_layout_data" style="display: none">

        <?php wp_editor("", "gridster_edit", array("tinymce" => false)); ?> <br><a href="javascript:save_edit();">Save Content</a>

        <script type="text/javascript">
            var gridster = null;
            var currently_editing = null;
            var saved_data = <?php echo json_encode(get_post_meta($object->ID, 'complete_layout_data', true)); ?>;

            $(function(){
                $(".gridster ul").gridster({
                    widget_base_dimensions: [200, 200],
                    resize: {
                        enabled: true,
                        stop: save,
                        axes: ['x']
                    },
                    draggable: {
                        stop: save
                    },
                    serialize_params: function($w, wgd){
                        var obj = {col: wgd.col, row: wgd.row, size_x: wgd.size_x, size_y: wgd.size_y, content: decodeURIComponent($w[0].getAttribute("data-content"))} ;
                        return obj;
                    }
                });

                gridster = $(".gridster ul").gridster().data('gridster');

                saved_data = JSON.parse(saved_data);

                for(var iii = 0; iii < saved_data.length; iii++){                    
                    gridster.add_widget('<li style="background-color: black; list-style: none;" data-content='+encodeURIComponent(saved_data[iii].content)+'><button onclick="remove_widget(event);">Remove Box</button><button onclick="edit(event);">Edit</button></li>', saved_data[iii].size_x, saved_data[iii].size_y);     
                }

                save();
            });

            function add_widget(){
                gridster.add_widget('<li style="background-color: black; list-style: none;" data-content=""><button onclick="remove_widget(event);">Remove Box</button><button onclick="edit(event);">Edit</button></li>', 1, 1);
                save();
            }

            function remove_widget(e){
                e.srcElement.parentNode.setAttribute("id", "remove_box");
                gridster.remove_widget($('.gridster li#remove_box'));
                save();
                e.preventDefault();
            }

            function edit(e){
                currently_editing = e.srcElement.parentNode;
                document.getElementById("gridster_edit").value = decodeURIComponent(e.srcElement.parentNode.getAttribute("data-content"));
                e.preventDefault();
            }

            function save_edit(e){
                currently_editing.setAttribute("data-content", encodeURIComponent(document.getElementById("gridster_edit").value));
                save();
            }

            function save(){
                var json_str = JSON.stringify(gridster.serialize());
                document.getElementById("complete_layout_data").value = json_str;
            }
        </script>
    <?php
}

function my_custom_meta_box()
{
    add_meta_box("page-builder", "Page Builder", "meta_box_markup", "page", "normal", "default", null);
}
add_action("add_meta_boxes", "my_custom_meta_box");

function save_my_custom_meta_box($post_id,  $post, $update){
    if (!isset($_POST["page-builder"]) || !wp_verify_nonce($_POST["page-builder"], basename(__FILE__)))
      return $post_id;
     
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return;


    $complete_layout_data = "";
    if(isset($_POST["complete_layout_data"]))
    {
        $complete_layout_data = $_POST["complete_layout_data"];
    }
    else
    {
        $complete_layout_data = "";
    }
    update_post_meta($post_id, "complete_layout_data", $complete_layout_data);
}

add_action("save_post", "save_my_custom_meta_box", 10, 3);

function page_builder_content_filter($content)
{
    global $post;
    if("page" == get_post_type())
    {
        $builder_content = json_decode(get_post_meta($post->ID, 'complete_layout_data', true));

        $current_row = 0;
        if (is_array($builder_content) || is_object($builder_content)){
        foreach($builder_content as $key => $value){
            $con = $value->content;
            $col = $value->col;
            $row = $value->row;
            $size_x = $value->size_x;

            if($row == $current_row)
            {
                $content = $content . "";

                if($size_x == 1)
                {
                    $content = $content . "<div class='gridster-box gridster-box-width-one'>";
                }
                else if($size_x == 2)
                {
                    $content = $content . "<div class='gridster-box gridster-box-width-two'>";
                }
                else if($size_x == 3)
                {
                    $content = $content . "<div class='gridster-box gridster-box-width-three'>";
                }

                $content = $content . $con . "</div>";
            }
            else
            {
                if($current_row != 0)
                {
                    $content = $content . "<div class='clear'></div></div>";   
                }

                $content = $content . "<div class='gridster-box-holder'>";
                $current_row = $row;

                if($size_x == 1)
                {
                    $content = $content . "<div class='gridster-box gridster-box-width-one'>";
                }
                else if($size_x == 2)
                {
                    $content = $content . "<div class='gridster-box gridster-box-width-two'>";
                }
                else if($size_x == 3)
                {
                    $content = $content . "<div class='gridster-box gridster-box-width-three'>";
                }

                $content = $content . $con . "</div>";
            }
        }
    }

        $content = $content . "</div>";
    }

    return $content;
}

add_filter("the_content", "page_builder_content_filter");

function frontend_inline_css() {
   
    $custom_css = "
        .gridster-box-holder{
        }
        .gridster-box{
            display: inline-block;
            float: left;
        }
        .gridster-box-width-one{
            width: 33%;
        }
        .gridster-box-width-two{
            width: 66%;
        }
        .gridster-box-width-three{
            width: 99%;
        }
        .clear{clear: both;}
        @media only screen and (min-width: 320px) and (max-width: 768px) {
            .gridster-box{
                display: block;
                float: none;
            }
            .gridster-box-width-one{
                width: 100%;
            }
            .gridster-box-width-two{
                width: 100%;
            }
            .gridster-box-width-three{
                width: 100%;
            }  
        }
        ";

    echo "<style>".$custom_css."</style>";
}
add_action("wp_footer", "frontend_inline_css");


function demo_settings_page()
{
    add_settings_section("section", "Section", null, "demo");
    add_settings_field("demo-file", "Demo File", "demo_file_display", "demo", "section");  
    register_setting("section", "demo-file", "handle_file_upload");
}

function handle_file_upload($option)
{
  if(!empty($_FILES["demo-file"]["tmp_name"]))
  {
    $urls = wp_handle_upload($_FILES["demo-file"], array('test_form' => FALSE));
    $temp = $urls["url"];
    return $temp;  
  }
 
  return $option;
}

function demo_file_display()
{
   ?>
        <input type="file" name="demo-file" />
        <?php echo get_option('demo-file'); ?>
   <?php
}

add_action("admin_init", "demo_settings_page");

function demo_page()
{
  ?>
      <div class="wrap">
         <h1>Demo</h1>
 
         <form method="post" action="options.php">
            <?php
               settings_fields("section");
 
               do_settings_sections("demo");
                 
               submit_button();
            ?>
         </form>
      </div>
   <?php
}

function menu_item()
{
  add_submenu_page("options-general.php", "Demo", "Demo", "manage_options", "demo", "demo_page");
}
 
add_action("admin_menu", "menu_item");


function example_add_dashboard_widgets()
{
    wp_add_dashboard_widget( 'example_dashboard_widget', 'Example Dashboard Widget', 'example_dashboard_widget_function' );
   

    global $wp_meta_boxes;

    $my_widget = $wp_meta_boxes['dashboard']['normal']['core']['example_dashboard_widget'];
    unset($wp_meta_boxes['dashboard']['normal']['core']['example_dashboard_widget']);
    $wp_meta_boxes['dashboard']['side']['core']['example_dashboard_widget'] = $my_widget;
}
 
function example_dashboard_widget_function(){echo "test";}
 
add_action("wp_dashboard_setup", "example_add_dashboard_widgets");

 