<?php
/*
  * Template Name: News Open
*/
$current = get_the_terms( get_the_ID(),'category'); 
?>

<section class="news-open-hero px-lg-5 dmt-200" data-aos="fade-up" data-aos-duration="1000">
  <div class="position-relative h-100 px-lg-5">
      <div class="news-open-img w-100 h-100 position-relative radius30 overflow-hidden res-no-radius">
          <img src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php the_title(); ?>" class="h-100 w-100 object-cover">
          <div class="news-open-content position-absolute top-center w-100 px-lg-5 px-4 text-center red-hat font40 fw-medium text-white res-font28">
              <?php the_title(); ?>
          </div>
      </div>
  </div>
</section>

<?php $date = get_the_date('F j, Y'); ?>
<section class="hero-bottom-content position-relative">
  <div class="container">
      <div class="bg-139cd5 rounded-pill p-4 d-flex flex-wrap align-items-center justify-content-lg-between justify-content-center">
          <div class="d-flex flex-wrap flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
              <div class="red-hat font20 fw-medium text-white me-lg-3 order-lg-0 order-1"><?php echo $date; ?></div>
              <div class="red-hat font20 fw-medium text-013945"><?php echo $current[0]->name; ?></div>
          </div>
          <div class="d-flex align-items-center justify-content-lg-end justify-content-center res-w-100 tmt-10">
              <div class="red-hat font20 fw-medium text-white me-4">Share</div>
              <?php echo do_shortcode('[ssba url=”http://simplesharebuttons.xn--com-9o0a title=”Simple Share Buttons”]'); ?>
          </div>
      </div>
  </div>
</section>
<section class="news-open-content dpt-100 dpb-100 tpt-60" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
    <?php $page_builder = get_field('page_builder');
    if (have_rows('page_builder')):
        while (have_rows('page_builder')): the_row();
            if (get_row_layout() == 'content'): ?>
            <?php if(!empty(get_sub_field('content'))): ?>
        <div class="red-hat font22 text-013945 dmb-15">
            <?php echo get_sub_field('content'); ?>
        </div>
        <?php endif; ?>
        <?php elseif (get_row_layout() == 'image_content'): 
            $image_clss = (!empty(get_sub_field('image'))) ? 'col-lg-10':''?>
        <div class="d-flex flex-wrap">
            <div class="<?php echo $image_clss ?>">
                <?php if(!empty(get_sub_field('content'))): ?>
                <div class="red-hat font22 text-013945 dmb-15">
                <?php echo get_sub_field('content'); ?>
                </div>
                <?php endif; ?>
            </div>
            <?php if(!empty(get_sub_field('image'))): ?>
            <div class="post-content-img dmb-15 col-lg-2">
                <img src="<?php echo wp_get_attachment_image_url(get_sub_field('image'), 'large'); ?>" class="w-100" alt="">
            </div>
            <?php endif; ?>
        </div>
    <?php endif;
    endwhile;
endif; ?>
    </div>
</section>