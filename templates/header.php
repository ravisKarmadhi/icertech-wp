<?php
$logo = get_field('white_logo', 'option');
$blackLogo = get_field('black_logo', 'option');
$menu = get_field('menu', 'option');
$top_bar = get_field('top_bar', 'option');
$header_color = get_field('header_color');
if ($header_color === "black") {
  $headerClass = "black-header";
}
?>
<!-- ========================= header ================ -->
<header class="header w-100 position-fixed top-0 start-0 <?php echo $headerClass; ?>">
  <div class="header-section w-100 position-relative">
    <div class="top-header bg-013945 dpt-10 dpb-10 w-100 transition">
      <div class="container px-p-0">
        <div class="d-flex justify-content-lg-between flex-column flex-lg-row">
          <?php if (!empty($top_bar['links'])): ?>
            <nav class="top-navigation px-p-p">
              <ul class="d-flex align-items-center justify-content-center h-100 list-none mb-0 px-0 nav">
                <?php foreach ($top_bar['links'] as $links):
                  if (!empty($links['link']['url'])):
                    $target = ($links['link']['target'] == '_blank') ? "_blank" : ""; ?>
                    <li class="me-xl-4 me-2 tpb-5">
                      <a href="<?php echo $links['link']['url']; ?>" target="<?php echo $target; ?>"
                        class="text-decoration-none red-hat font15 fw-medium"><?php echo $links['link']['title']; ?></a>
                    </li>
                  <?php endif; endforeach; ?>
              </ul>
            </nav>
          <?php endif; ?>
          <?php if (!empty($top_bar['button']['url'])):
            $target_1 = ($top_bar['button']['target'] == '_blank') ? "_blank" : ""; ?>
            <a href="<?php echo $top_bar['button']['url']; ?>" target="<?php echo $target_1; ?>"
              class="text-decoration-none d-inline-flex align-items-center justify-content-center red-hat font15 top-header-btn rounded-pill transition tgdfh">
              <?php echo $top_bar['button']['title']; ?>&nbsp;<span class="value-order"></span>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="nav-header dpt-30 dpb-30 position-relative w-100 p-initial">
      <div class="container">
        <div class="position-relative p-initial">
          <div class="row align-items-center flex-column flex-lg-row">
            <div class="col-lg-2 col-12 d-flex justify-content-between">
              <a href="<?php echo get_home_url(); ?>" class="d-inline-block header-logo">
                <img src="<?php echo esc_url($blackLogo['url']); ?>" class="w-100 white-logo" alt="">
                <img src="<?php echo esc_url($blackLogo['url']); ?>"
                  class="w-100 black-logo" alt="">
              </a>
              <div
                class="menu-toggle d-lg-none d-flex justify-content-end align-items-center w-100 position-relative">
                <svg class="burgar-menu">
                  <line x1="0" y1="50%" x2="100%" y2="50%" class="top" shape-rendering="crispEdges" />
                  <line x1="0" y1="50%" x2="100%" y2="50%" class="middle" shape-rendering="crispEdges" />
                  <line x1="0" y1="50%" x2="100%" y2="50%" class="bottom" shape-rendering="crispEdges" />
                </svg>
              </div>
            </div>
            <?php if (!empty($menu)): ?>
              <div class="col-lg-8 col-12 d-lg-flex d-none justify-content-lg-center">
                <nav class="navigation bg-white px-5 rounded-pill">
                  <ul class="d-flex mb-0 px-0 list-none nav">
                    <?php foreach ($menu as $key => $menu_custom):
                      if (!empty($menu_custom['links']['url'])):
                        $target_2 = ($menu_custom['links']['target'] == '_blank') ? "_blank" : "";
                        if ($menu_custom['select_sub_menu'] == 'tab'): $clss = ($key == '0') ? "active" : "";
                          if (!empty($menu_custom['tab'])): ?>
                            <li class="me-lg-4 mt-lg-3 mt-0 menu-item pb-lg-3 tpt-10 tpb-10 <?php echo $clss ?>">
                              <a href="<?php echo $menu_custom['links']['url']; ?>" target="<?php echo $target_2; ?>"
                                class="text-decoration-none red-hat font20 res-font18 fw-medium nav-header-a position-relative">
                                <?php echo $menu_custom['links']['title']; ?>
                              </a>
                              <div class="menu-arrow d-lg-none d-inline-block ms-2">
                                <img src="/wp-content/uploads/2025/02/header-arrow-1.svg" class="w-100 arrow-1" alt="">
                                <img src="/wp-content/uploads/2025/02/header-arrow2.svg" class="w-100 arrow-2" alt="">
                              </div>
                              <div class="mega-menu position-absolute start-0 w-100 tpt-0 tpb-0 p-initial">
                                <div class="bg-139cd5 res-bg-transparent radius30 dpt-15 dpb-15 px-3">
                                  <div class="header-tab-container">
                                    <div class="tab-menu">
                                      <div class="row flex-column flex-lg-row">
                                        <?php foreach ($menu_custom['tab'] as $key => $tab):
                                          $clss = ($key == '0') ? "active" : ""; ?>
                                          <div class="col-lg-4 col-12">
                                            <div class="d-flex">
                                              <a href="#"
                                                class="header-tab-item w-100 text-decoration-none d-inline-flex align-items-center justify-content-lg-center rounded-pill res-text-white red-hat font20 fw-medium <?php echo $clss; ?>"
                                                data-id="tab<?php echo $key; ?>">
                                                <?php echo $tab['heading']; ?>
                                                <div class="tab-arrow d-lg-none d-inline-block ms-2">
                                                  <img src="/wp-content/uploads/2025/02/header-arrow-1.svg"
                                                    class="w-100 tab-arrow1 transition" alt="">
                                                  <img src="/wp-content/uploads/2025/02/header-arrow2.svg"
                                                    class="w-100 tab-arrow2 transition" alt="">
                                                </div>
                                              </a>
                                            </div>
                                            <div class="header-tab-item<?php echo $key; ?> px-lg-0 ps-2"></div>
                                          </div>
                                        <?php endforeach; ?>
                                      </div>
                                    </div>
                                    <?php foreach ($menu_custom['tab'] as $key => $tab):
                                      $clss = ($key == '0') ? "tab-active" : "";
                                      if (!empty($tab)): ?>
                                        <div class="header-tab header-tab-data<?php echo $key; ?> <?php echo $clss; ?> tpt-10 dpb-10"
                                          data-id="tab<?php echo $key; ?>">
                                          <div class="row row15 flex-column flex-lg-row">
                                            <?php foreach ($tab['items'] as $items): ?>
                                              <div class="col-lg-4 col-12 dmt-30 tmt-10 overflow-hidden">
                                                <a href="<?php echo get_permalink($items->ID); ?>"
                                                  class="header-card radius15 text-decoration-none d-inline-flex align-items-center w-100 transition">
                                                  <div class="header-card-img col-lg-4 d-none d-lg-block me-1 ms-3 overflow-hidden">
                                                    <img src="<?php echo get_the_post_thumbnail_url($items->ID); ?>" alt=""
                                                      class="w-100 h-100 object-fit-contain">
                                                  </div>
                                                  <div class="red-hat font18 fw-medium text-013945 res-text-white col-lg-7">
                                                    <?php echo $items->post_title; ?>
                                                  </div>
                                                </a>
                                              </div>
                                            <?php endforeach; ?>
                                          </div>
                                        </div>
                                      <?php endif; endforeach; ?>
                                  </div>
                                </div>
                              </div>
                            </li>
                          <?php endif; elseif ($menu_custom['select_sub_menu'] == 'imagecontent'): ?>
                          <li class="me-lg-4 mt-lg-3 mt-0 menu-item pb-lg-3 tpt-10 tpb-10">
                            <a href="<?php echo $menu_custom['links']['url']; ?>" target="<?php echo $target_2; ?>"
                              class="text-decoration-none red-hat font20 res-font18 fw-medium nav-header-a position-relative">
                              <?php echo $menu_custom['links']['title']; ?>
                            </a>
                            <div class="menu-arrow d-lg-none d-inline-block ms-2">
                              <img src="/wp-content/uploads/2025/02/header-arrow-1.svg" class="w-100 arrow-1" alt="">
                              <img src="/wp-content/uploads/2025/02/header-arrow2.svg" class="w-100 arrow-2" alt="">
                            </div>
                            <div class="mega-menu position-absolute start-0 w-100 tpt-0 tpb-0 p-initial">
                              <div class="bg-139cd5 res-bg-transparent radius30 dpt-15 dpb-15 tpb-0 px-3 py-lg-3">
                                <div class="row flex-column flex-lg-row">
                                  <?php foreach ($menu_custom['image_content_link'] as $image_content_link):
                                    if (!empty($image_content_link['link']['url'])):
                                      $target_4 = ($image_content_link['link']['url'] == '_blank') ? "_blank" : ""; ?>
                                      <div class="col-lg-4 col-12">
                                        <a href="<?php echo $image_content_link['link']['url']; ?>"
                                          target="<?php echo $target_4; ?>"
                                          class="header-shop-card w-100 text-decoration-none position-relative transition d-inline-flex justify-content-lg-center text-lg-center align-items-center">
                                          <div class="w-100">
                                            <div
                                              class="shop-card-hover transition d-none d-lg-flex flex-column align-items-center justify-content-lg-end">
                                              <div class="header-shop-card-img">
                                                <img src="<?php echo $image_content_link['image']['url']; ?>" class="" alt="">
                                              </div>
                                              <div class="shadow-img w-100 d-flex align-items-center justify-content-center">
                                                <img src="/wp-content/uploads/2025/02/shadow.svg" class="transition" alt="">
                                              </div>
                                            </div>
                                            <div
                                              class="red-hat font30 res-font18 fw-medium leading24 text-white fw-medium dmt-15 tmt-5">
                                              <?php echo $image_content_link['heading']; ?>
                                            </div>
                                          </div>
                                        </a>
                                      </div>
                                    <?php endif; endforeach; ?>
                                </div>
                              </div>
                            </div>
                          </li>
                        <?php elseif ($menu_custom['select_sub_menu'] == 'nomenu'): ?>
                          <li class="me-lg-4 mt-lg-3 mt-0 menu-item pb-lg-3 tpt-10 tpb-10">
                            <a href="<?php echo $menu_custom['links']['url']; ?>" target="<?php echo $target_2; ?>"
                              class="text-decoration-none red-hat font20 res-font18 fw-medium nav-header-a position-relative">
                              <?php echo $menu_custom['links']['title']; ?>
                            </a>
                          </li>
                        <?php elseif ($menu_custom['select_sub_menu'] == 'submenu'): ?>
                          <li class="me-lg-4 mt-lg-3 mt-0 menu-item pb-lg-3 tpt-10 tpb-10">
                            <a href="<?php echo $menu_custom['links']['url']; ?>" target="<?php echo $target_2; ?>"
                              class="text-decoration-none red-hat font20 res-font18 fw-medium nav-header-a resource-a position-relative">
                              <?php echo $menu_custom['links']['title']; ?>
                            </a>
                            <div class="menu-arrow d-lg-none d-inline-block ms-2">
                              <img src="/wp-content/uploads/2025/02/header-arrow-1.svg" class="w-100 arrow-1" alt="">
                              <img src="/wp-content/uploads/2025/02/header-arrow2.svg" class="w-100 arrow-2" alt="">
                            </div>
                            <?php if (!empty($menu_custom['sub_menu_link'])): ?>
                              <div class="mega-menu resource-menu position-absolute tpt-0 tpb-0 p-initial">
                                <div class="bg-013945 res-bg-transparent radius30 dpt-15 dpb-15 tpt-10 tpb-10 px-3">
                                  <ul class="list-none mb-0 px-0 resource-navigation">
                                    <?php foreach ($menu_custom['sub_menu_link'] as $sub_menu_link):
                                      if (!empty($sub_menu_link['Link']['url'])):
                                        $target_3 = ($sub_menu_link['Link']['target'] == '_blank') ? "_blank" : ""; ?>
                                        <li class="dmb-20 tmb-10">
                                          <a href="<?php echo $sub_menu_link['Link']['url']; ?>" target="<?php echo $target_3; ?>"
                                            class="text-decoration-none red-hat font18 fw-normal res-text-white"><?php echo $sub_menu_link['Link']['title']; ?></a>
                                        </li>
                                      <?php endif; endforeach; ?>
                                  </ul>
                                </div>
                              </div>
                            <?php endif; ?>
                          </li>
                        <?php endif; endif; endforeach; ?>
                  </ul>
                </nav>
              </div>
            <?php endif; ?>
            <div class="col-lg-2 col-12">
              <div
                class="d-flex align-items-center justify-content-between justify-content-lg-end tmt-10 header-btn-end">
                <a href="<?php echo get_home_url(); ?>/my-account"
                  class="header-btn d-inline-flex align-items-center justify-content-center font16 fw-medium leading16 rounded-pill text-decoration-none me-3">
                  <img src="/wp-content/uploads/2025/02/my-acc-logo.svg" class="" alt="">
                </a>
                <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#basket1"
                  aria-controls="offcanvasRightLabel"
                  class="head-cart header-btn d-inline-flex align-items-center justify-content-center font16 fw-medium leading16 rounded-pill text-decoration-none">
                  <?php // echo wc_price(WC()->cart->get_subtotal()); ?><img
                    src="/wp-content/uploads/2025/02/basket.svg" class="" alt="">
                </a>
              </div>
            </div>
          </div>
          <div class="w-100 bg-F9F9F9 res-navigation d-lg-none transition">
            <div class="container">
              <div
                class="menu-toggle d-lg-none d-flex justify-content-end align-items-center position-relative z-3">
                <svg class="burgar-menu">
                  <line x1="0" y1="50%" x2="100%" y2="50%" class="top" shape-rendering="crispEdges" />
                  <line x1="0" y1="50%" x2="100%" y2="50%" class="middle" shape-rendering="crispEdges" />
                  <line x1="0" y1="50%" x2="100%" y2="50%" class="bottom" shape-rendering="crispEdges" />
                </svg>
              </div>
              <ul class="list-none mb-0 ps-0 position-relative menu-items"></ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="offcanvas basket-offcanvas offcanvas-end" tabindex="-1" id="basket1" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header dmt-40 dpb-40 tmt-50 tmb-15">
    <button type="button"
      class="basket-close text-reset basket-offcanvas-btn rounded-circle bg-transparent p-0 d-flex align-items-center justify-content-center"
      data-bs-dismiss="offcanvas" aria-label="Close">
      <img src="<?php echo get_home_url() ?>/wp-content/uploads/2025/02/close-icon-gray.svg" class="" alt="">
    </button>
  </div>
  <div class="position-relative h-100">
    <div class="xoo-wsc-modal">
      <?php code_for_cart(); ?>
    </div>
  </div>
</div>