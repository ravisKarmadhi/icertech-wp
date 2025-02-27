<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$curious_includes = [
  'lib/assets.php',  // Scripts and stylesheets
  'lib/extras.php',  // Custom functions
  'lib/setup.php',   // Theme setup
  'lib/titles.php',  // Page titles
  'lib/wrapper.php'  // Theme wrapper class
];

foreach ($curious_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function mytheme_add_woocommerce_support()
{
  add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

if (function_exists('acf_add_options_page')) {

  acf_add_options_page(
    array(
      'page_title' => 'Header',
      'menu_title' => 'Header',
      'menu_slug' => 'header-options',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
  acf_add_options_page(
    array(
      'page_title' => 'Footer',
      'menu_title' => 'Footer',
      'menu_slug' => 'footer-options',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
}

// Post Handlebar
add_action( 'wp_ajax_get_post_ajax', 'getpostAJAX' );
add_action( 'wp_ajax_nopriv_get_post_ajax', 'getpostAJAX' );

function getpostAJAX()
{
    $postQuery = isset($_POST['post_main']) ? sanitize_text_field($_POST['post_main']) : '';
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

    $args_cat = [
      'post_type' => 'post',
      'posts_per_page' => 12,
      'post_status' => 'publish',
      'orderby' => 'date',
      'order' => 'DESC',
      'paged' => $paged
    ];
    if ($postQuery != 'all') {
      $tax_query = [
          [
              'taxonomy' => 'category',
              'field' => 'slug',
              'terms' => explode(',', $postQuery),
          ],
      ];
      $args_cat['tax_query'] = $tax_query;
  }
    $master_insight = new WP_Query($args_cat);
    if ($master_insight->have_posts()) :
        while ($master_insight->have_posts()) : $master_insight->the_post();

            $id = get_the_ID();
            $callback['data'][] = array(
                'title' => get_the_title(),               
                'content' => get_the_excerpt(),
                'link' => get_the_permalink($id),
                'image' => get_the_post_thumbnail_url( $id ),
                'current' =>  $term_value[0]->name,
            );

        endwhile;
        $callback['pagination'] = array(
          'current_page' => $paged,
          'total_pages' => $master_insight->max_num_pages,
      );
    else: 
      $callback['data'] = [];
      $callback['pagination'] = array(
          'current_page' => $paged,
          'total_pages' => 0,
      );  
      endif;

    echo json_encode($callback);

    wp_die();
}


function code_for_cart()
{ ?>
<div class="xoo-wsc-container h-100">
  <div class="offcanvas-body h-100 d-flex flex-column justify-content-between">
    <div>
      <div class="red-hat font16 fw-medium leading16 text-139cd5 heading dpb-5">
      Shopping Cart</div>
      <div class="basket-product-group">
            <?php if (!empty(WC()->cart->get_cart())) :
                foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) :
                  $product = $cart_item['data'];
                  $product_id = $cart_item['product_id'];
                  $variation_id = $cart_item['variation_id'];
                  $subtotal = WC()->cart->get_product_subtotal($product, $cart_item['quantity']);
                  $link = $product->get_permalink($cart_item);
                  $quantity = $cart_item['quantity'];
                  $name = get_the_title($product_id);
                  $av = get_field('available_for_immediate_collection_or_delivery',$product_id);
                  $product_type = $product->get_type();
                  $variation_price = WC()->cart->get_product_price( $product );
                  if ($product_type === 'variation') {
                      $variation = new WC_Product_Variation($variation_id);
                     $image_tag = get_field_object($variation_id,'image')['url'];
                      $variation_attributes = $variation->get_variation_attributes();
                      $variation_name = implode(', ', array_values($variation_attributes));
                      
                  } else {
                      $image_tag = get_the_post_thumbnail_url($product_id);
                  } ?>
  
                <div class="d-flex col-12 align-items-center flex-column flex-lg-row dpt-25 dpb-25 basket-col" data-key="<?php echo $cart_item_key; ?>">
                    <div class="d-flex w-100 align-items-center">
                      <div class="col-3">
                          <div class="basket-image radius5 overflow-hidden"> 
                              <img src="<?php echo get_the_post_thumbnail_url($product_id); ?>" class="h-100" alt="">
                          </div>
                      </div>
                      <div class="col-10">
                          <div class="red-hat font16 fw-medium leading24 text-139cd5"><?php echo get_the_title($product_id); ?></div>
                         <?php if ($product_type === 'variation'): ?>
                          <div class="red-hat font16 fw-medium leading16 text-139cd5"><?php echo $quantity; ?> × <?php echo $variation_price; ?></div>
                          <?php else: ?>
                          <div class="red-hat font16 fw-medium leading16 text-139cd5"><?php echo $quantity; ?> × <?php echo $variation_price; ?></div>
                            <?php endif; ?>
                          <?php if (!empty($variation_id)) : ?>
                                  <div class="varation">
                                  <?php if (!empty($variation_name)) : ?>
                                <div class="mont-medium font9 leading20 text-black">Variation: <?php echo $variation_name; ?></div>
                            <?php endif; ?>
                                    <?php echo $image_tag; ?>
                                  </div>
                                <?php endif; ?>
                      </div>
                    </div>
                    <div class="col-lg-2 col-12 tmt-20 remove-cart-item d-flex justify-content-end align-items-center" data-cart_item_key="<?php echo $cart_item_key; ?>">
                        <a href="javascript:void(0)" class="text-decoration-none bg-292929 text-white basket-btn mont-semibold font11 leading20 space0_28 res-w-100 text-uppercase radius5 transition d-inline-flex align-items-center justify-content-center ">
                        <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" data-svg="close-icon"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></a>
                    </div>
                </div>
          <?php endforeach; ?>
          </div>
        </div>
      <div class="basket-bottom-fixed position-sticky start-0 bg-white dpt-10">
        <div class="d-flex justify-content-between align-items-center">
          <div class="red-hat font16 fw-bold leading16 text-013945">Subtotal:</div>
          <div class="red-hat font16 fw-bold leading16 text-139cd5"><?php echo wc_price(WC()->cart->get_subtotal()); ?></div>
        </div>
        <a href="<?php echo get_home_url(); ?>/cart"
        class="btnA shooping-cart-btn w-100 d-inline-flex align-items-center justify-content-center rounded-pill font18 fw-medium text-decoration-none res-w-100 transition text-uppercase dmt-10">View cart</a>
        <a href="<?php echo get_home_url(); ?>/checkout"
        class="btnA shooping-cart-btn w-100 d-inline-flex align-items-center justify-content-center rounded-pill font18 fw-medium text-decoration-none res-w-100 transition text-uppercase dmb-10 dmt-10">CHECKOUT</a>
      </div>
          <?php else : ?>
            <div class="d-flex flex-column justify-content-center align-items-center dpt-45 offcanvas-empty-cart">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96 96">
                  <rect width="96" height="96" style="fill:none"></rect>
                  <path d="M36.29,40.52l5.27,5.35L53.34,34.26,65.13,45.87l5.27-5.35L58.69,29,70.4,17.48l-5.27-5.34L53.34,23.74,41.56,12.14l-5.27,5.34L48,29ZM78.51,72.45c-.22,0-.43,0-.64,0v-.16h-47L30.14,68H84.27L92,30.72l-22.6-3-1,7.44,14.61,2L78.17,60.54H28.81L23.19,29,37.26,31l1.1-7.42L21.8,21.17,18.5,2.61H2.33v7.5h9.89L23.34,72.63A10.41,10.41,0,1,0,35.66,82.86a10.27,10.27,0,0,0-.46-3H68.55a10.27,10.27,0,0,0-.46,3A10.42,10.42,0,1,0,78.51,72.45ZM25.24,85.78a2.92,2.92,0,1,1,2.92-2.92A2.92,2.92,0,0,1,25.24,85.78Zm53.27,0a2.92,2.92,0,1,1,2.91-2.92A2.92,2.92,0,0,1,78.51,85.78Z"></path>
                </svg>
              <div class="text-center dmt-15 dmb-15 red-hat font16">No products in the cart.</div>
              <a href="<?php echo get_home_url(); ?>/shop" class="btnA shooping-cart-btn d-inline-flex align-items-center justify-content-center rounded-pill font16 fw-medium text-decoration-none transition w-fit">Return To Shop</a>
            </div>
            </div>
        </div>
          <?php endif; ?>
      
  </div>
</div>
<?php }
add_action('wp_ajax_custom_ajax_add_to_cart', 'custom_ajax_add_to_cart');
add_action('wp_ajax_nopriv_custom_ajax_add_to_cart', 'custom_ajax_add_to_cart');

function custom_ajax_add_to_cart()
{
  if (isset($_POST['product_id'])) {
    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);

    $added_to_cart = WC()->cart->add_to_cart($product_id, $quantity);

    if ($added_to_cart) {
      code_for_cart();
    } else {
      code_for_cart();
    }
  }
  wp_die();
}

add_action('wp_ajax_custom_ajax_remove_cart_item', 'custom_ajax_remove_cart_item');
add_action('wp_ajax_nopriv_custom_ajax_remove_cart_item', 'custom_ajax_remove_cart_item');

function custom_ajax_remove_cart_item()
{
  if (isset($_POST['cart_item_key'])) {
    $cart_item_key = sanitize_text_field($_POST['cart_item_key']);

    WC()->cart->remove_cart_item($cart_item_key);

    code_for_cart();
  }
  wp_die();
}

add_action('init', 'create_solution_post_type');
function create_solution_post_type()
{

  $supports = array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'page-attributes');
  $item_name = 'solution';
  $plural_name = 'solutions';
  $singular_name = 'solution';

  register_post_type(
    $item_name,
    array(
      'labels' => array(
        'name' => __(ucfirst($plural_name)),
        'singular_name' => __(ucfirst($singular_name)),
        'add_new' => 'Add new ' . $singular_name,
        'add_new_item' => 'Add new ' . $singular_name,
        'edit_item' => ' Edit' . $singular_name,
        'new_item' => 'New ' . $singular_name,
        'all_items' => 'All ' . $plural_name,
        'view_item' => 'View ' . $plural_name,
        'search_items' => 'Search ' . $plural_name,
      ),
      'public' => true,
      'has_archive' => true,

      'supports' => $supports,
    )
  );
  flush_rewrite_rules();
}

function my_taxonomies_solution_type()
{
  $plural_name = 'solution Type';
  $singular_name = 'solution type';

  $labels = array(
    'name' => _x($singular_name, 'taxonomy general name'),
    'singular_name' => _x($singular_name . ' Category', 'taxonomy singular name'),
    'search_items' => __('Search ' . $singular_name . ' Categories'),
    'all_items' => __('All ' . $singular_name . ' Categories'),
    'parent_item' => __('Parent ' . $singular_name . ' Category'),
    'parent_item_colon' => __('Parent ' . $singular_name . ' Category:'),
    'edit_item' => __('Edit ' . $singular_name . ' Category'),
    'update_item' => __('Update ' . $singular_name . ' Category'),
    'add_new_item' => __('Add New ' . $singular_name . ' Category'),
    'new_item_name' => __('New ' . $singular_name . ' Category'),
    'menu_name' => __('' . $singular_name . ' Categories'),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy('solution-type', 'solution', $args);
}
add_action('init', 'my_taxonomies_solution_type', 0);

function fetch_products() {
  // Ensure the `ids` parameter is set
  if (isset($_POST['ids'])) {
      global $wpdb;

      // Get the comma-separated IDs from the request
      $ids = sanitize_text_field($_POST['ids']);
      $ids_array = explode(',', $ids);

      // Prepare the query with placeholders
      $placeholders = implode(',', array_fill(0, count($ids_array), '%d'));
      $query = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}products WHERE id IN ($placeholders)", $ids_array);

      // Fetch product data
      $products = $wpdb->get_results($query);

      if ($products) {
          // Output product details
          foreach ($products as $product) {
              echo "<div>";
              echo "<img src='" . esc_url($product->image) . "' alt='" . esc_attr($product->name) . "' style='width: 100px; height: auto;'/>";
              echo "<div>Product Name: " . esc_html($product->name) . "</div>";
              echo "<div>Price: $" . esc_html($product->price) . "</div>";
              echo "</div>";
          }
      } else {
          echo "No products found.";
      }
  } else {
      echo "No IDs received.";
  }
  wp_die(); // Required to properly terminate the AJAX request
}

function enqueue_block_ui_script() {
  wp_enqueue_script('jquery-blockUI', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_block_ui_script');

function enqueue_custom_scripts() {
  wp_enqueue_script('custom-script', get_template_directory_uri() . '/custom-script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

 add_filter( 'wc_add_to_cart_message_html', 'custom_add_to_cart_message_html', 10, 2 );



 add_filter( 'wc_stripe_upe_params', function ( $stripe_params ) {

	// Affects block checkout
	$stripe_params['blocksAppearance'] = (object) [ 'theme' => 'stripe' ];

	// Affects shortcode checkout
	$stripe_params['appearance'] = (object) [ 'theme' => 'stripe'	];
	
	return $stripe_params;
} );