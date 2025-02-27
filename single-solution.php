<?php
$background_color_class = get_field('background_color_class');
$class_color = '';
if ($background_color_class == 'green'):
  $class_color = "green-shape";
elseif ($background_color_class == 'greengra'):
  $class_color = "greengra-shape";
elseif ($background_color_class == 'purple'):
  $class_color = "bg-59407a";
elseif ($background_color_class == 'orange'):
  $class_color = "bg-df5e34";
elseif ($background_color_class == 'blue'):
  $class_color = "bg-139cd5";
endif;
?>
<!-- hero-section -->
<section class="home-hero-section box-hero-section hero-section position-relative <?php echo $class_color; ?>">
  <img src="/wp-content/uploads/2025/02/enviro-hero-img.png" class="w-100 h-100 object-cover" alt="">
  <div class="home-hero-content position-absolute w-100 text-center dpt-200 z-3">
    <div class="font48 res-font30 fw-medium text-013945 d-flex align-items-center h-100 justify-content-center"><?php the_title(); ?></div>
  </div>
  </div>
  <div class="bg-img position-absolute z-2 w-100 bottom-0 h-100">
    <div class="red-box-img h-100 d-flex align-items-end justify-content-center dpb-70">
      <img src="<?php echo get_the_post_thumbnail_url($id); ?>" class=" res-w-100" alt="">
    </div>
</section>
<?php include('templates/home.php'); ?>