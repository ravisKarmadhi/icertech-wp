<?php
$newsletter_heading = get_field('newsletter_heading', 'option');
$white_logo = get_field('white_logo', 'option');
$address = get_field('address', 'option');
$email = get_field('email', 'option');
$phone_number = get_field('phone_number', 'option');
$last_link = get_field('last_link', 'option');
$social_media = get_field('social_media', 'option');
$left_bottom_content = get_field('left_bottom_content', 'option');
$bottom_image = get_field('bottom_image', 'option');
$footer_color = get_field('footer_color');
?>


<div id="custom-alert"
  style="display:none; position:fixed; top:20%; left:50%; transform:translate(-50%, -50%); z-index:1000; padding:30px 20px 25px; background-color:#38b48b; color:white; border-radius:5px; text-align:center;overflow:hidden;">
  <span id="alert-message"></span>
  <button id="close-alert" class="border-0 bg-transparent" style="position:absolute; top:5px;right:5px;"><img
      src="<?php echo get_home_url(); ?>/wp-content/uploads/2025/02/close-icon-gray.svg" alt=""></button>
</div>
<style>
  #custom-alert {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    font-family: Arial, sans-serif;
  }

  #custom-alert:after {
    content: '';
    position: absolute;
    left: 0;
    width: 100%;
    background-color: #2d906f;
    bottom: 0;
    height: 6px;
    animation: animate 4s;
  }

  #close-alert img {
    filter: brightness(0) invert(1);
  }

  @keyframes animate {
    0% {
      transform: translateX(0%);
    }

    100% {
      transform: translateX(-100%);
    }
  }

  /* #custom-alert.custom-alert-active:after {
    width: 100%;
  } */
  /* #close-alert:hover {
    background-color: #f44336;
    color: white;
  } */
</style>
<footer class="footer <?php echo $footer_color == 'gray' ? 'gray-footer' : ''; ?>">
  <div class="container">
    <div class="position-relative z-3">
      <div
        class="bg-139cd5 radius30 px-lg-5 px-3 dpt-60 dpb-60 tpt-30 tpb-30 d-flex flex-wrap align-items-center justify-content-between w-100 sign-up-menu">
        <div class="red-hat font32 text-white col-lg-4 col-10 text-lg-start text-center fw-medium res-font20 tmb-15">
          <?php echo $newsletter_heading; ?>
        </div>
        <div
          class="d-flex col-lg-8 col-12 align-items-center justify-content-lg-end justify-content-center master-newsletter">
          <?php echo do_shortcode('[contact-form-7 id="458f707" title="News Letter"]'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-013945 footer-section">
    <div class="container">
      <div class="d-flex flex-wrap  dpt-190 dpb-80 tpt-170 tpb-30">
        <div class="col-lg-7 col-12">
          <div class="footer-logo tmb-20">
            <a href="<?php echo get_home_url(); ?>">
              <img src="<?php echo $white_logo['url']; ?>" alt="" class="w-100">
            </a>
          </div>
        </div>
        <div class="col-lg-5 col-12">
          <div class="d-flex flex-wrap">
            <div class="col-lg-6 col-12 tmb-60">
              <?php if (!empty($address)):
                $target = $address['target'] == "_blank" ? "_blank" : "" ?>
                <a href="<?php echo $address["url"] ?>" target="<?php echo $target; ?>"
                  class="text-decoration-none d-inline-block red-hat font18 text-white col-10 dmb-15">
                  <?php echo $address["title"]; ?>
                </a>
              <?php endif; ?>
              <?php if (!empty($email)): ?>
                <a href="mailto:<?php echo $email; ?>"
                  class="text-decoration-none d-inline-block red-hat font18 text-white"><?php echo $email; ?></a>
              <?php endif; ?>
              <?php if (!empty($phone_number)): ?>
                <div class="red-hat font18 text-white">
                  Tel:
                  <a href="tel:<?php echo $phone_number; ?>"
                    class="text-decoration-none d-inline-block red-hat font18 text-white"><?php echo $phone_number; ?></a>
                <?php endif; ?>
                </div>
            </div>
            <?php if (!empty($last_link['links'])): ?>
              <div class="col-lg-6 col-12 order-2 order-lg-0">
                <div class="red-hat font18 text-white"><?php echo $last_link['heading']; ?></div>
                <ul class="list-none ps-0 mb-0 footer-links">
                  <?php foreach ($last_link['links'] as $links):
                    if (!empty($links['link']['url'])):
                      $target = ($links['link']['url'] == '_blank') ? "_blank" : "";
                  ?>
                      <li class="d-flex">
                        <a href="<?php echo $links['link']['url']; ?>" target="<?php echo $target; ?>"
                          class="text-decoration-none d-inline-block red-hat font18 text-white transition">
                          <?php echo $links['link']['title']; ?>
                        </a>
                      </li>
                  <?php
                    endif;
                  endforeach; ?>
                </ul>
              </div>
            <?php endif;
            if (!empty($social_media)):
            ?>
              <div class="col-12 dmt-45 tmt-0 tmb-30">
                <ul class="list-none ps-0 mb-0 d-flex align-items-center footer-social-media">
                  <?php foreach ($social_media as $social_media_custom):
                    if (!empty($social_media_custom['link']['url'])):
                      $target_1 = ($social_media_custom['link']['target'] == '') ? "" : "_blank";
                  ?>
                      <li class="d-flex me-4">
                        <a href="<?php echo $social_media_custom['link']['url']; ?>" target="<?php echo $target_1; ?>"
                          class="social-icon  text-decoration-none d-inline-flex align-items-center red-hat font15 text-white">
                          <img src="<?php echo $social_media_custom['icon']['url']; ?>" alt=""
                            class="me-2 h-100"><?php echo $social_media_custom['link']['title']; ?>
                        </a>
                      </li>
                  <?php endif;
                  endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="dmt-55 w-100 d-flex flex-wrap">
          <?php if (!empty($left_bottom_content)): ?>
            <div contenteditable="false" class="red-hat font18 text-white col-lg-7 col-12">
              <?php echo $left_bottom_content; ?>
            </div>
          <?php endif;
          if (!empty($bottom_image)):
          ?>
            <div class="col-12 col-lg-5 d-flex flex-wrap align-items-center tmt-25">
              <?php foreach ($bottom_image as $bottom_image_custom): ?>
                <div class="col-lg-4 footer-brandlogo me-2 mb-3">
                  <img src="<?php echo $bottom_image_custom['image']['url']; ?>" alt="" class="w-100 h-100">
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>