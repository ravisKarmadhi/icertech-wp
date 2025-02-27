<?php $term = get_queried_object();
$extra_description = get_field('extra_description', $term);
$our_range = get_field('our_range', $term);
?>

<?php $posts_array = get_posts(
array(
    'posts_per_page' => -1,
    'post_type' => 'solution',
    'orderby' => 'ID',
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'solution-type',
            'field' => 'term_id',
            'terms' => get_queried_object_id(),
        )
    )
)
);
?>
<main>
        <!-- hero-section -->

        <section class="home-hero-section position-relative">
            <img src="/wp-content/uploads/2025/02/hero-img.jpg" class="w-100 h-100 object-cover" alt="">
            <div class="home-hero-content position-absolute w-100">
                <div class="container">
                    <div class="col-lg-7 col-12 mx-auto px-2 px-lg-0 d-flex align-items-center h-100 justify-content-center">
                        <div class="red-hat font48 res-font30 text-013945 fw-medium text-center home-hero-title">
                            <?php echo $term->description; ?>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="bg-img position-absolute z-2 w-100 bottom-0 h-100">
                <div class="position-relative range-bg-layer d-flex align-items-end h-100 dpb-80 tpb-50">
                    <div class="container px-p-0">
                        <div class="range-card-title w-100 z-3 p-initial">
                            <?php if(!empty($our_range['button']['url'])): $target = ($our_range['button']['target'] == '') ? "" : "_blank"; ?>
                                <div class="d-flex justify-content-center">
                                    <a href="<?php echo $our_range['button']['url']; ?>" target="<?php echo  $target;?>"
                                    class="btnA bg-013945-btn d-inline-flex align-items-center justify-content-center rounded-pill font18 fw-medium text-decoration-none transition"><?php echo $our_range['button']['title']; ?></a>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($our_range['heading'])): ?>
                            <div class="font40 res-font28 fw-medium text-white text-center dpt-130 tpt-85"><?php echo $our_range['heading']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php // if(!empty($extra_description)): ?>
         <!-- center-content-section -->
         <!-- <section class="center-content-section position-relative w-100">
            <div class="bg-img w-100 d-flex justify-content-center">
                <img src="/wp-content/uploads/2024/08/center-content.png" class="h-100 object-cover" alt="">
            </div>
            <div class="bg-white dpt-100 dpb-100 tpt-50 tpb-50">
                <div class="container">
                    <div class="font32 res-font18 fw-medium col-lg-10 px-lg-5 mx-auto text-center"><?php echo $extra_description; ?> </div>
                </div>
            </div>
        </section> -->
        <?php // endif; ?>
        <?php if(!empty($our_range['items'])): 
            $our_range_arrow_bottom = $our_range['arrow_bottom'];
            $range_clss = ($our_range_arrow_bottom == 'yes') ? "arrow-bottom" : "";
        ?>
        <!-- range-card-section  -->
        <section class="range-card-section w-100 position-relative <?php echo $range_clss; ?>">
            <!-- <div class="container px-p-0">
                <div class="position-relative range-bg-layer dpt-270 tpt-100">
                    <div class="bg-img position-absolute top-0 z-2 w-100">
                        <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2024/09/range-card-section-bg.png" class="w-100 h-100" alt="">
                    </div>
                    <div class="position-absolute range-card-title top-0 w-100 dmt-90 tmt-0 z-3 p-initial">
                    <?php if(!empty($our_range['button']['url'])):
                     $target = ($our_range['button']['target'] == '') ? "" : "_blank";   
                    ?>
                    <div class="d-flex justify-content-center">
                        <a href="<?php echo $our_range['button']['url']; ?>" target="<?php echo  $target;?>"
                            class="btnA bg-013945-btn d-inline-flex align-items-center justify-content-center rounded-pill red-hat font18 fw-medium text-decoration-none transition"><?php echo $our_range['button']['title']; ?></a>
                    </div>
                    <?php endif; ?>
                        <div class="font40 res-font28 fw-medium text-white text-center dpt-60 tpt-20"><?php echo $our_range['heading']; ?></div>
                    </div>
                </div>
            </div> -->
            <div class="bg-139cd5 dpb-40 tpb-60">
                <div class="container">                    
                    <div class="row flex-column flex-lg-row">
                        <?php foreach($our_range['items'] as $our_range_items): ?>
                        <div class="col-lg-4 col-12 tmt-20"> 
                            <a href="<?php echo $our_range_items['link']['url']; ?>"
                                class="range-card w-100 text-decoration-none position-relative transition d-inline-flex justify-content-center text-center align-items-center">
                                <div class="w-100 h-100 d-flex flex-column justify-content-end">
                                    <div
                                        class="range-card-hover transition d-flex flex-column align-items-center justify-content-end">
                                        <div class="range-card-img">
                                            <img src="<?php echo $our_range_items['image']['url']; ?>" class="" alt="">
                                        </div>
                                        <!-- <div class="shadow-img w-100 d-flex align-items-center justify-content-center">
                                            <img src="/wp-content/uploads/2024/08/shadow.svg" class="transition" alt="">
                                        </div> -->
                                    </div>
                                    <div class="font30 res-font18 fw-medium text-white fw-medium dmt-15 tmt-5">
                                    <?php echo $our_range_items['heading']; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <div class="spacing dmb-60"></div>
            <?php 
            foreach ($posts_array as $post_data) :
          $id = $post_data->ID;
          $background_color_class = get_field('background_color_class',$post_data->ID);
          $box = get_field('icon_content',$post_data->ID);
          $button = get_field('button',$post_data->ID);
          $class_color = '';
          if($background_color_class == 'green'):
            $class_color = "bg-4aa882";
          elseif($background_color_class == 'greengra'):
            $class_color = "bg-gradient-layer";
          elseif($background_color_class == 'purple'):
            $class_color = "bg-59407a";
          elseif($background_color_class == 'orange'):
            $class_color = "bg-df5e34";
            elseif ($background_color_class == 'blue'):
                $class_color = "bg-139cd5";
          endif;
            ?>
        <!-- our-range-inner-section  -->
        <section class="our-range-inner-section">
            <div class="container">
                <div class="our-range-inner-box <?php echo $class_color; ?> radius30">
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="col-lg-5 col-12 d-flex justify-content-center align-items-center">
                            <div class="our-range-inner-img">
                                <img src="<?php echo get_the_post_thumbnail_url($id); ?>" class="" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 ms-auto col-12 px-3 px-lg-5">
                            <div class="red-hat font40 res-font28 text-white fw-medium dmb-20"><?php echo $post_data->post_title; ?></div>
                            <div class="red-hat font22 text-white fw-normal dmb-40">
                                <div class="dmb-15"><?php echo $post_data->post_excerpt; ?></div>
                            </div>
                            <?php if(!empty($box)): ?>
                                  <div class="our-range-inner-icon d-flex flex-wrap me-lg-5 dpt-40 dmb-40">
                                    <?php foreach($box as $box_custom): ?>
                                      <div class="col-lg-3 col-6 pe-lg-3">
                                          <div class="box-icons dmb-30">
                                              <img src="<?php echo $box_custom['icon']['url']; ?>" class="h-100"
                                                  alt="">
                                          </div>
                                          <div class="font18 fw-normal text-white"><?php echo $box_custom['heading'] ; ?></div>
                                      </div>
                                    <?php endforeach; ?>
                                  </div>
                                  <?php endif; ?>
                                  <div class="d-flex flex-wrap">
                                      <a href="<?php echo get_permalink($id); ?>"
                                          class="btnA white-border-btn d-inline-flex align-items-center justify-content-center rounded-pill font18 fw-medium text-decoration-none transition res-w-100 me-lg-5 tmb-30">Learn
                                          More</a>
                                      <a href="javascript:void(0)" data-id="<?php echo $id; ?>" data-name="<?php echo $post_data->post_title; ?>" data-image="<?php echo get_the_post_thumbnail_url($id); ?>"
                                          class="add-btn btnA white-border-btn d-inline-flex align-items-center justify-content-center rounded-pill font18 fw-medium text-decoration-none transition res-w-100">Order Sample</a>
                                  </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="spacing dmb-35"></div>
        <?php endforeach; ?>


        <div class="spacing dmb-40 d-inline-block w-100"></div>

    </main>