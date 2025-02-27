<?php
/*
 * Template Name: Page Builder
 */
$page_builder = get_field('page_builder');
if (have_rows('page_builder')):
	while (have_rows('page_builder')):
		the_row();
		if (get_row_layout() == 'main_hero_section'):
			$main_hero_background_image = get_sub_field('background_image');
			$main_hero_heading = get_sub_field('heading');
			$hero_section_type = get_sub_field('hero_section_type');
			$our_range_button = get_sub_field('range_button');
			$our_range_heading = get_sub_field('range_heading');
			$background_color_class = get_sub_field('background_color_class');
			$primary_box_img = get_sub_field('primary_box_img');
			$section_type_clss = '';
			if ($hero_section_type == 'mainhero'):
				$section_type_clss = "";
			elseif ($hero_section_type == 'boxhero'):
				$section_type_clss = "box-hero-section";
			elseif ($hero_section_type == 'subhero'):
				$section_type_clss = "sub-hero-section";
			endif;
			$background_shape_class = '';
			if ($background_color_class == 'blue'):
				$background_shape_class = "";
			elseif ($background_color_class == 'greengra'):
				$background_shape_class = "greengra-shape";
			elseif ($background_color_class == 'green'):
				$background_shape_class = "green-shape";
			elseif ($background_color_class == 'blue'):
				$class_color = "bg-139cd5";
			endif;
?>
			<!-- hero-section -->
			<section
				class="home-hero-section <?php echo $section_type_clss ?> <?php echo $background_shape_class ?> position-relative">
				<?php if (!empty($main_hero_background_image)): ?>
					<img src="<?php echo wp_get_attachment_image_url($main_hero_background_image, 'large'); ?>" class="w-100 h-100"
						alt="">
				<?php endif; ?>
				<div class="bg-layer position-absolute top-0 start-0 h-100 w-100"></div>
				<?php if (!empty($main_hero_heading)): ?>
					<div class="home-hero-content position-absolute w-100">
						<div class="container h-100">
							<div class="col-lg-7 col-12 mx-auto px-2 px-lg-0 d-flex align-items-center h-100 justify-content-center">
								<div class="red-hat font48 res-font30 text-013945 fw-medium text-center home-hero-title"
									data-aos="fade-up" data-aos-duration="1000">
									<?php echo $main_hero_heading ?>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="bg-img position-absolute z-2 w-100 bottom-0 h-100">
					<?php if ($hero_section_type == 'mainhero'): ?>
						<div class="position-relative range-bg-layer d-flex align-items-end h-100 dpb-40 tpb-50">
							<div class="container px-p-0">
								<div class="range-card-title w-100 z-3 p-initial">
									<?php if (!empty($our_range_button['url'])):
										$target = ($our_range_button['target'] == '') ? "" : "_blank"; ?>
										<div class="d-flex justify-content-center">
											<a href="<?php echo $our_range_button['url'] ?>" target="<?php echo $target; ?>"
												class="btnA bg-013945-btn d-inline-flex align-items-center justify-content-center rounded-pill font18 fw-medium text-decoration-none transition"><?php echo $our_range_button['title'] ?></a>
										</div>
									<?php endif; ?>
									<div class="font40 res-font28 fw-medium text-white text-center dpt-170 tpt-85">
										<?php echo $our_range_heading; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endif;
					if ($hero_section_type == 'boxhero'): ?>
						<div class="red-box-img h-100 d-flex align-items-end justify-content-center dpb-70">
							<img src="<?php echo $primary_box_img; ?>" class="" alt="">
						</div>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'sustainability_content'):
			$sustainability_description = get_sub_field('description'); ?>
			<!-- center-content-section -->
			<section class="center-content-section position-relative w-100" data-aos="fade-up" data-aos-duration="1000">
				<div class="bg-img w-100 d-flex justify-content-center">
					<img src="/wp-content/uploads/2025/02/center-content.png" class="h-100 object-cover" alt="">
				</div>
				<div class="bg-white dpt-100 dpb-100 tpt-50 tpb-50">
					<div class="container">
						<div class="red-hat font32 res-font18 fw-medium col-lg-10 px-lg-5 mx-auto text-center">
							<?php echo $sustainability_description ?>
						</div>
					</div>
				</div>
			</section>
		<?php elseif (get_row_layout() == 'our_range'):
			$our_range_image_box = get_sub_field('image_box');
			$our_range_arrow_bottom = get_sub_field('arrow_bottom');
			$range_clss = ($our_range_arrow_bottom == 'yes') ? "arrow-bottom" : "";
		?>
			<!-- range-card-section  -->
			<section class="range-card-section w-100 position-relative z-3 <?php echo $range_clss; ?>">
				<div class="bg-139cd5 dpb-150 tpb-60 tpt-0">
					<div class="container">
						<?php if (!empty($our_range_image_box)): ?>
							<div class="row flex-column flex-lg-row">
								<?php foreach ($our_range_image_box as $image_box_items): ?>
									<div class="col-lg-4 col-12 dmt-40 tmt-20">
										<a href="<?php echo $image_box_items['link']['url']; ?>"
											class="range-card w-100 text-decoration-none position-relative transition d-inline-flex justify-content-center text-center align-items-center"
											data-aos="fade-up" data-aos-duration="1000">
											<div class="w-100 h-100 d-flex flex-column justify-content-end">
												<div
													class="range-card-hover transition d-flex flex-column align-items-center justify-content-end">
													<div class="range-card-img">
														<img src="<?php echo wp_get_attachment_image_url($image_box_items['image'], 'large'); ?>"
															class="" alt="">
													</div>
													<!-- <div class="shadow-img w-100 d-flex align-items-center justify-content-center">
																						<img src="<?php echo get_home_url(); ?>/wp-content/uploads/2024/08/shadow.svg" class="transition" alt="">
																					</div> -->
												</div>
												<div class="red-hat font30 res-font18 fw-medium text-white fw-medium dmt-15 tmt-5">
													<?php echo $image_box_items['heading']; ?>
												</div>
											</div>
										</a>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>

			<?php elseif (get_row_layout() == 'left_right_image_content'):
			$left__right_content = get_sub_field('left__right_content');
			$left__right_content_middle_content = get_sub_field('middle_content');
			$left_right_content_image = get_sub_field('image');
			$left_right_content_image_prefix = get_sub_field('prefix');
			$left_right_content_image_heading = get_sub_field('heading');
			$left_right_content_image_description = get_sub_field('description');
			$left_right_content_image_button = get_sub_field('button');
			$left_right_content_padding_top = get_sub_field('padding_top');
			$left_right_content_padding_bottom = get_sub_field('padding_bottom');
			$left_right_background_color = get_sub_field('background_color');
			$left_right_bg_class = ($left_right_background_color == 'yes') ? "bg-f2f3f4" : "";
			$align = ($left__right_content_middle_content == 'yes') ? "align-items-center" : "";
			if ($left__right_content == 'left'):
			?>

				<!-- left-img-section -->
				<section
					class="left-right-section <?php echo $left_right_bg_class ?> dpt-<?php echo $left_right_content_padding_top ?> dpb-<?php echo $left_right_content_padding_bottom ?>">
					<div class="container">
						<div class="row <?php echo $align; ?> ">
							<?php if (!empty($left_right_content_image)): ?>
								<div class="col-lg-6 col-md-6 col-12" data-aos="fade-up" data-aos-duration="1000">
									<div class="left-img">
										<img src="<?php echo wp_get_attachment_image_url($left_right_content_image, 'large'); ?>"
											class="w-100 h-100 object-cover radius30" alt="">
									</div>
								</div>
							<?php endif; ?>
							<div class="col-lg-6 col-md-6 col-12 d-flex justify-content-center align-items-center right-content tmt-10 p-lg-5 p-4"
								data-aos="fade-up" data-aos-duration="1000">
								<div>
									<?php if (!empty($left_right_content_image_heading)): ?>
										<div class="red-hat font40 res-font28 fw-medium text-013945 dmb-20">
											<?php echo $left_right_content_image_heading; ?>
										</div>
									<?php endif;
									if (!empty($left_right_content_image_description)): ?>
										<div class="red-hat font22 fw-normal text-4d4d4d dmb-20">
											<?php echo $left_right_content_image_description; ?>
										</div>
									<?php endif;
									if (!empty($left_right_content_image_button['url'])):
										$target_1 = ($left_right_content_image_button['target'] == '') ? "" : "_blank"; ?>
										<a href="<?php echo $left_right_content_image_button['url']; ?>" target="<?php echo $target_1; ?>"
											class="btnA bg-139cd5-btn d-inline-flex align-items-center justify-content-center rounded-pill font18 fw-medium text-decoration-none res-w-100 transition text-center"><?php echo $left_right_content_image_button['title']; ?></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</section>

			<?php else: ?>
				<!-- right-img-section  -->
				<section
					class="right-img-section <?php echo $left_right_bg_class ?> dpt-<?php echo $left_right_content_padding_top ?> dpb-<?php echo $left_right_content_padding_bottom ?>">
					<div class="container">
						<div class="d-flex flex-column flex-lg-row <?php echo $align; ?> ">
							<div class="col-lg-6 col-12">
								<?php if (!empty($left_right_content_image_prefix)): ?>
									<div class="font20 fw-medium text-139cd5 dmb-20"><?php echo $left_right_content_image_prefix; ?></div>
								<?php endif;
								if (!empty($left_right_content_image_heading)): ?>
									<div class="font30 res-font28 fw-medium text-013945 dmb-20 px-2 px-lg-0">
										<?php echo $left_right_content_image_heading; ?>
									</div>
								<?php endif; ?>
								<div class="font22 fw-normal text-4d4d4d dmb-35 px-2 px-lg-0">
									<?php echo $left_right_content_image_description; ?>
								</div>
								<?php if (!empty($left_right_content_image_button['url'])):
									$target_1 = ($left_right_content_image_button['target'] == '') ? "" : "_blank";
								?>
									<a href="<?php echo $left_right_content_image_button['url']; ?>" target="<?php echo $target_1; ?>"
										class="btnA bg-139cd5-btn d-inline-flex align-items-center justify-content-center rounded-pill font18 fw-medium text-decoration-none tmb-30 transition res-w-100"><?php echo $left_right_content_image_button['title']; ?></a>
								<?php endif; ?>
							</div>
							<?php if (!empty($left_right_content_image)): ?>
								<div class="col-lg-6 col-12">
									<div class="right-img">
										<div class="radius30 overflow-hidden h-100">
											<img src="<?php echo wp_get_attachment_image_url($left_right_content_image, 'large'); ?>"
												class="w-100 object-cover h-100" alt="<?php echo $left_right_content_image['title']; ?>">
										</div>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</section>
			<?php endif; ?>

			<?php elseif (get_row_layout() == 'icon_box'):
			$icon_box_wrap = get_sub_field('icon_box_wrap');
			if (!empty($icon_box_wrap)): ?>

				<!-- icon-section -->
				<section class="icon-section" data-aos="fade-up" data-aos-duration="1000">
					<div class="container">
						<div class="icon-box radius30 dpt-50 tpt-20 dpb-50 tpb-20 px-4">
							<div class="row">
								<?php foreach ($icon_box_wrap as $icon_box): ?>
									<div class="col-lg-3 col-md-6 col-12">
										<div class="icon-img mx-auto dmb-15">
											<img src="<?php echo wp_get_attachment_image_url($icon_box['icon'], 'large'); ?>" class="w-100"
												alt="<?php echo $icon_box['icon']['title']; ?>">
										</div>
										<div class="font24 res-font20 fw-medium text-013945 text-center px-lg-4 px-3 tpb-10">
											<?php echo $icon_box['heading']; ?>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</section>
			<?php endif; ?>

		<?php elseif (get_row_layout() == 'our_history'):
			$history_heading = get_sub_field('history_heading');
			$history = get_sub_field('history');
		?>
			<!-- history-section  -->
			<section class="history-section position-relative bg-139cd5 dpt-60 overflow-hidden" data-aos="fade-up"
				data-aos-duration="1000">
				<div class="container">
					<?php if (!empty($history_heading)): ?>
						<div class="red-hat font40 fw-medium text-center text-white dmb-40"><?php echo $history_heading; ?></div>
					<?php endif;
					if (!empty($history)): ?>
						<div class="position-relative col-lg-11 col-12 mx-auto px-lg-4">
							<div class="history-data-slider overflow-hidden dmb-20">
								<?php foreach ($history as $history_items): ?>
									<div class="history-item">
										<div class="position-relative dpb-20 history-card">
											<div class="history-img position-relative dmb-30">
												<img class="w-100 h-100 object-cover radius30 res-radius15"
													src="<?php echo wp_get_attachment_image_url($history_items['image'], 'large'); ?>"
													alt="<?php echo $history_items['image']['title'] ?>">
												<div class="position-absolute bottom-0 left-center">
													<div class="timeline-bg mx-auto position-relative">
														<img src="<?php echo get_home_url(); ?>/wp-content/uploads/2025/02/timeline-date-bg.png"
															alt="..." class="h-100 w-100">
														<div
															class="history-years red-hat font40 fw-medium text-013945 position-absolute top-left-center dmt-15">
															<?php echo $history_items['year'] ?>
														</div>
													</div>
												</div>
											</div>
											<div class="history-content text-white red-hat history-description text-center font24 fw-normal dmb-10 truncate"
												data-max-length="165">
												<?php echo $history_items['description'] ?>
											</div>
										</div>
										<div class="history-line position-relative mb-2">
											<div
												class="history-number slick-counter d-flex justify-content-center align-items-center rounded-circle mx-auto">
												<span
													class="history-counter d-inline-block d-flex align-items-center justify-content-center rounded-circle z-3">
												</span>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="history-layer position-absolute top-0 end-0 h-100"></div>
						</div>
					<?php endif; ?>
				</div>
			</section>


			<?php elseif (get_row_layout() == 'trusted_by'):
			$trusted_heading = get_sub_field('trusted_heading');
			$trusted_logo = get_sub_field('trusted_logo');
			if (!empty($trusted_logo)): ?>
				<!-- logo-slider-section -->
				<section class="logo-slider-section">
					<div class="container">
						<div class="font30 res-font20 fw-medium text-013945 text-center dmb-50 tmb-10" data-aos="fade-up"
							data-aos-duration="1000"><?php echo $trusted_heading ?></div>
						<div class="logo-slider" data-aos="fade-up" data-aos-duration="1000">
							<?php foreach ($trusted_logo as $logos): ?>
								<div class="logo-img d-flex justify-content-center">
									<img src="<?php echo wp_get_attachment_image_url($logos['image'], 'large'); ?>"
										alt="<?php echo $logos['image']['title'] ?>" class="">
								</div>
							<?php endforeach; ?>
						</div>
				</section>
			<?php endif; ?>

			<?php elseif (get_row_layout() == 'about_hero_section'):
			$about_hero_heading = get_sub_field('heading');
			$about_hero_image = get_sub_field('image');
			$about_hero_description = get_sub_field('description');
			if (!empty($about_hero_heading)):
			?>
				<section class="about-us">
					<div class="container">
						<div class="col-lg-12 col-12 mx-auto">
							<div class="col-lg-7 col-12 dmb-50 mx-auto">
								<div class="red-hat font48 res-font30 fw-medium text-center text-013945 dmb-15" data-aos="fade-up"
									data-aos-duration="1000">
									<?php echo $about_hero_heading; ?>
								</div>
							</div>
						</div>
						<?php if (!empty($about_hero_image)): ?>
							<div class="about-picture" data-aos="fade-up" data-aos-duration="1000">
								<img class="w-100 h-100 object-cover radius30"
									src="<?php echo wp_get_attachment_image_url($about_hero_image, 'large'); ?>" alt="">
							</div>
						<?php endif;
						if (!empty($about_hero_description)): ?>
							<div class="col-lg-10 col-12 dmt-60 mx-auto">
								<div class="col-lg-9 mx-auto">
									<div class="red-hat text-center font24 res-font20 fw-medium text-013945 " data-aos="fade-up"
										data-aos-duration="1000"><?php echo $about_hero_description; ?></div>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</section>
			<?php endif; ?>

			<?php elseif (get_row_layout() == 'why_work_with_us'):
			$why_work_heading = get_sub_field('heading');
			$why_work_icon_box = get_sub_field('icon_box');
			$why_work_blue_background_color = get_sub_field('blue_background_color');
			$why_work_column = get_sub_field('column');
			$clss = ($why_work_column == 'two') ? "3" : "6";
			if ($why_work_blue_background_color == 'no'):
			?>
				<!-- question-section -->
				<section class="question-section dpt-<?php echo $why_work_padding_top ?> dpb-<?php echo $why_work_padding_bottom ?>"
					data-aos="fade-up" data-aos-duration="1000">
					<div class="container">
						<div class="questions radius30 dpb-50">
							<?php if (!empty($why_work_heading)): ?>
								<div class="red-hat font40 res-font28 fw-medium text-center text-013945 dpt-50 dmb-50" data-aos="fade-up"
									data-aos-duration="1000"><?php echo $why_work_heading ?></div>
							<?php endif; ?>
							<div class="dpb-50">
								<div class="row">
									<?php foreach ($why_work_icon_box as $work_icon_box): ?>
										<?php if ($why_work_column == 'two'): ?>
											<div class="col-lg-6 col-12 dmb-30">
											<?php else: ?>
												<div class="col-lg-6 col-12 dmb-30">
												<?php endif; ?>
												<?php if (!empty($why_work_heading)): ?>
													<div class="question-img mx-auto dmb-15">
														<img class="w-100"
															src="<?php echo wp_get_attachment_image_url($work_icon_box['icon'], 'large'); ?>"
															alt="<?php echo $work_icon_box['icon']['title'] ?>">
													</div>
												<?php endif; ?>
												<div>
													<?php if (!empty($work_icon_box['title'])): ?>
														<div class="font24 res-font20 text-center text-013945 red-hat fw-medium ">
															<?php echo $work_icon_box['title'] ?>
														</div>
													<?php endif;
													if (!empty($work_icon_box['description'])): ?>
														<div class="red-hat text-center font22 fw-normal text-013945">
															<?php echo $work_icon_box['description'] ?>
														</div>
													<?php endif; ?>
												</div>
												</div>
											<?php endforeach; ?>
											</div>
								</div>
							</div>
						</div>
				</section>

			<?php else: ?>
				<section class="question-section dpt-<?php echo $why_work_padding_top ?> dpb-<?php echo $why_work_padding_bottom ?>"
					data-aos="fade-up" data-aos-duration="1000">
					<div class="container">
						<div class="questions bg-139cd5 radius30 dpb-50">
							<div class="red-hat font40 res-font28 fw-medium text-center text-013945 dpt-50 dmb-50 tmb-0 ">
								<?php echo $why_work_heading ?>
							</div>
							<div class="dpb-100 tpb-50">
								<div class="row">
									<?php foreach ($why_work_icon_box as $work_icon_box):?>
										<?php if ($why_work_column == 'two'): ?>
											<div class="col-lg-6 col-12 dmb-30 tmb-10">
											<?php else: ?>
												<div class="col-lg-3 col-12 dmb-30 tmb-10">
												<?php endif; ?>
												<div class="question-img mx-auto dmb-15">
													<img class="w-100"
														src="<?php echo wp_get_attachment_image_url($work_icon_box['icon'], 'large'); ?>"
														alt="...">
												</div>
												<div>
													<div class="font24 res-font20 text-center text-white red-hat fw-medium ">
														<?php echo $work_icon_box['title'] ?>
													</div>
													<div class="red-hat text-center font22 fw-normal text-white">
														<?php echo $work_icon_box['description'] ?>
													</div>
												</div>
												</div>
											<?php endforeach; ?>
											</div>
								</div>
							</div>
						</div>
				</section>
			<?php endif; ?>


		<?php elseif (get_row_layout() == 'our_team'):
			$our_team_heading = get_sub_field('heading');
			$our_team_team = get_sub_field('team');
		?>
			<!-- our-team-section -->
			<section class="our-team-section position-relative overflow-hidden" data-aos="fade-up" data-aos-duration="1000">
				<div class="container">
					<?php if (!empty($our_team_heading)): ?>
						<div class="text-center font30 red-hat fw-medium text-013945 dmb-5"><?php echo $our_team_heading ?></div>
					<?php endif; ?>
					<div class="team-slider-part">
						<div class="team-arrow-wrapper d-flex align-items-center justify-content-center dmb-15"></div>
						<div class="team-member-slider">
							<?php foreach ($our_team_team as $our_team_team_box): ?>
								<div class="team-card position-relative overflow-hidden">
									<?php if (!empty($our_team_team_box['image'])): ?>
										<div class="team-img radius20 overflow-hidden">
											<img class="w-100 h-100 object-cover"
												src="<?php echo wp_get_attachment_image_url($our_team_team_box['image'], 'large'); ?>"
												alt="">
										</div>
									<?php endif; ?>
									<div class="team-content">
										<div class="triangle mx-auto">
											<img src="<?php echo get_home_url(); ?>/wp-content/uploads/2025/02/white-hover-triangle.svg"
												alt="...">
										</div>
										<div class="team-description">
											<div class="team-name">
												<?php if (!empty($our_team_team_box['name'])): ?>
													<div class="red-hat font24 res-font20 fw-medium text-013945 text-center">
														<?php echo $our_team_team_box['name'] ?>
													</div>
												<?php endif;
												if (!empty($our_team_team_box['team_role'])): ?>
													<div class="red-hat font22 fw-normal  text-4d4d4d text-capitalize text-center dmb-25">
														<?php echo $our_team_team_box['team_role'] ?>
													</div>
												<?php endif; ?>
											</div>
											<?php if (!empty($our_team_team_box['description'])): ?>
												<div class="dmb-10 px-lg-4">
													<div class="text-center red-hat font22 text-4d4d4d fw-normal">
														<?php echo $our_team_team_box['description'] ?>
													</div>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</section>

			<?php elseif (get_row_layout() == 'testimonials_section'):
			$testimonials_heading = get_sub_field('heading');
			$testimonials_items = get_sub_field('testimonials');
			if (!empty($testimonials_items)):
			?>
				<section class="testimonial-slider-section">
					<div class="container">
						<div class="bg-139cd5 radius20">
							<div class="dpt-50 dpb-55">
								<div class="font20 fw-medium red-hat text-013945 text-center dmb-10"><?php echo $testimonials_heading ?>
								</div>
								<div class="d-flex justify-content-center px-lg-5 px-3">
									<div class="col-lg-10 col-12 testimonial-slider  dmb-0">
										<?php foreach ($testimonials_items as $testimonials_items_list): ?>
											<a class="testimonial-description text-decoration-none" href="javascript.void(0);">
												<div class="text-white red-hat text-center font30 res-font20 fw-medium dmb-25">
													<?php echo $testimonials_items_list['description']; ?>
												</div>
												<div class="red-hat text-white text-center font20 fw-medium">
													<?php echo $testimonials_items_list['name']; ?>
												</div>
											</a>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php endif; ?>

		<?php elseif (get_row_layout() == 'image_content_slider'):
			$image_content_slider_items = get_sub_field('image_content');
			$row_count = 0;
			if (!empty($image_content_slider_items)) {
				$row_count = count($image_content_slider_items);
			}
		?>
			<section class="range-section overflow-hidden position-relative" data-aos="fade-up" data-aos-duration="1000">
				<?php if ($row_count > 1): ?>
					<div
						class="range-slick-arrows-wrapper d-lg-none d-inline-flex flex-lg-column flex-row align-items-center position-absolute top-center w-fit z-3">
					</div>
				<?php endif ?>
				<div class="range-slider h-100">
					<?php if (!empty($image_content_slider_items)):
						foreach ($image_content_slider_items as $content_slider_items): ?>
							<div class="range-content h-100 position-relative">

								<?php if (!empty($content_slider_items['image'])): ?>
									<div class="col-lg-6 col-12 range-img position-absolute top-0 start-0 radius30 overflow-hidden p-initial">
										<img src="<?php echo wp_get_attachment_image_url($content_slider_items['image'], 'large'); ?>"
											class="h-100 w-100 object-cover" alt="">
									</div>
								<?php endif ?>
								<div class="row">
									<div class="col-lg-6 col-12 ms-lg-auto dpt-50 pe-lg-5 ps-lg-5 px-p-p">
										<?php if (!empty($content_slider_items['prefix'])): ?>
											<div class="red-hat text-139cd5 font20 fw-medium dmb-10 h-auto ps-lg-5">
												<?php echo $content_slider_items['prefix'] ?>
											</div>
										<?php endif;
										if (!empty($content_slider_items['heading'])): ?>
											<div class="red-hat text-013945 font40 res-font28 fw-medium dmb-25 h-auto ps-lg-5">
												<?php echo $content_slider_items['heading'] ?>
											</div>
										<?php endif;
										if (!empty($content_slider_items['description'])): ?>
											<div class="red-hat font22 fw-normal pe-lg-4 h-auto ps-lg-5 tpb-70">
												<?php echo $content_slider_items['description'] ?>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
					<?php endforeach;
					endif; ?>
				</div>
			</section>


		<?php elseif (get_row_layout() == 'primary_bg_content'):
			$bg_content_description = get_sub_field('description');
			$bg_content_button_one = get_sub_field('button_one');
			$bg_content_button_two = get_sub_field('button_two');
			$bg_content_button_two = get_sub_field('solutions');
			// $primary_box_img = get_sub_field('primary_box_img');
			$primary_background_color_class = get_sub_field('background_color_class');

			$bg_class_color = '';
			if ($primary_background_color_class == 'blue'):
				$bg_class_color = "";
			elseif ($primary_background_color_class == 'greengra'):
				$bg_class_color = "greengra-bg-layer";
			elseif ($primary_background_color_class == 'green'):
				$bg_class_color = "green-bg-layer";
			endif;
		?>
			<!-- red-box-section -->
			<section class="red-box-section w-100 position-relative <?php echo $bg_class_color ?>">
				<!-- <div class="container px-p-0">
																<div class="red-box-img position-absolute left-center z-3">
																	<img src="<?php echo $primary_box_img; ?>" class="w-100 h-100" alt="">
																</div>
																<div class="redbox-bg-img w-100">
																	<img src="/wp-content/uploads/2024/09/range-card-section-bg.png" class="w-100 blue-img" alt="">
																	<img src="/wp-content/uploads/2024/09/enviro-curve.png" class="w-100 greengra-img" alt="">
																	<img src="/wp-content/uploads/2024/08/range-card-section-bg3.png" class="w-100 green-img" alt="">
																</div>
															</div> -->
				<div class="bottom-radius dpt-30 tpt-70 dpb-65">
					<div class="container">
						<div class="col-lg-8 col-12 mx-auto text-center">
							<div class="font28 res-font24 fw-normal text-white px-lg-4"><?php echo $bg_content_description ?></div>
							<div class="d-flex justify-content-center flex-wrap red-box-btns dmt-50 tmt-30">
								<?php if (!empty($bg_content_button_one['title'])): ?>
									<a href="<?php echo $bg_content_button_one['url'] ?>"
										class="btnA color-139cd5-btn d-inline-flex align-items-center justify-content-center rounded-pill font18 fw-medium text-decoration-none transition res-w-100 mx-lg-3 tmb-15"><?php echo $bg_content_button_one['title'] ?></a>
								<?php endif;
								if (!empty($bg_content_button_two)):
								?>
									<a data-id="<?php echo $bg_content_button_two->ID; ?>"
										data-name="<?php echo $bg_content_button_two->post_title; ?>"
										data-image="<?php echo get_the_post_thumbnail_url($bg_content_button_two->ID); ?>"
										class="add-btn btnA color-139cd5-btn d-inline-flex align-items-center justify-content-center rounded-pill font18 fw-medium text-decoration-none transition res-w-100 mx-lg-3 tmb-15 cursor-pointer">Order
										Sample</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>

			<?php elseif (get_row_layout() == 'packaging_slider_section'):
			$left__right_content = get_sub_field('left__right_content');
			$packaging_slider_section_dot_position = get_sub_field('dot_position');
			$packaging_slider = get_sub_field('packaging_slider');
			$packaging_padding_top = get_sub_field('padding_top');
			$packaging_padding_bottom = get_sub_field('padding_bottom');
			$packaging_background_color = get_sub_field('background_color');
			$packaging_bg_class = ($packaging_background_color == 'yes') ? "bg-f2f3f4" : "";

			$clss = "";
			if ($packaging_slider_section_dot_position == 'image'):
				$clss = "image_slider";
			elseif ($packaging_slider_section_dot_position == 'content'):
				$clss = "content_slider";
			elseif ($packaging_slider_section_dot_position == 'with-image'):
				$clss = "with_image_slider";
			elseif ($packaging_slider_section_dot_position == 'with-content'):
				$clss = "with_content_slider";
			endif;
			if ($left__right_content == 'right'):
			?>
				<!-- leftright-slider-section -->
				<section
					class="leftright-slider-section right-slider-part <?php echo $packaging_bg_class ?> <?php echo $clss; ?> dpt-<?php echo $packaging_padding_top; ?> dpb-<?php echo $packaging_padding_bottom; ?>">
					<div class="container">
						<div class="position-relative">
							<div
								class="slick-arrows-wrapper d-inline-flex flex-lg-column flex-row align-items-center position-absolute top-center w-fit z-3">
							</div>
							<?php if (!empty($packaging_slider)): ?>
								<div class="leftright-slider dmb-0 tpb-80 position-initial">
									<?php foreach ($packaging_slider as $packaging_slider_items): ?>
										<div class="leftright-slides">
											<div class="row align-items-center">
												<div class="col-lg-6 order-lg-0 order-1 pe-lg-5" data-aos="fade-up" data-aos-duration="1000">
													<div class="leftright-content">
														<div class="red-hat font20 fw-medium text-139cd5 dmb-10">
															<?php echo $packaging_slider_items['prefix'] ?>
														</div>
														<div class="red-hat font40 res-font28 fw-medium text-013945 dmb-10">
															<?php echo $packaging_slider_items['heading'] ?>
														</div>
														<div class="red-hat font22 text-4d4d4d dmb-20">
															<?php echo $packaging_slider_items['description'] ?>
														</div>
														<?php if (!empty($packaging_slider_items['button']['url'])):
															$target_8 = ($packaging_slider_items['button']['target']) ? "" : "_blank";
														?>
															<a class="btnA bg-013945 text-decoration-none d-inline-flex justify-content-center align-items-center font20 text-capitalize radius30 transition"
																target="<?php echo $target_8; ?>"
																href="<?php echo $packaging_slider_items['button']['url']; ?>"
																tabindex="0"><?php echo $packaging_slider_items['button']['title']; ?></a>
														<?php endif; ?>
													</div>
												</div>

												<div class="col-lg-6 tmb-40">
													<div
														class="leftright-slider-img d-flex align-items-center justify-content-center position-relative w-100">
														<div class="bg-white radius30 overflow-hidden h-100 w-100">
															<img src="<?php echo wp_get_attachment_image_url($packaging_slider_items['image'], 'large'); ?>"
																alt="" class="w-100 h-100 object-cover">
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</section>

			<?php else: ?>


				<!-- leftright-slider-section -->
				<section
					class="leftright-slider-section left-slider-part <?php echo $packaging_bg_class ?> <?php echo $clss; ?> dpt-<?php echo $packaging_padding_top; ?> dpb-<?php echo $packaging_padding_bottom; ?>">
					<div class="container">
						<div class="position-relative">
							<div class="col-lg-6 ps-lg-5 ms-auto">
								<div class="slick-arrows-wrapper d-inline-flex align-items-center position-absolute w-fit z-3"> </div>
							</div>
							<div class="leftright-slider dmb-0 tpb-80 position-initial">
								<?php foreach ($packaging_slider as $packaging_slider_items): ?>
									<div class="leftright-slides">
										<div class="row align-items-center position-relative">
											<div class="col-lg-6 tmb-40">
												<div
													class="leftright-slider-img d-flex align-items-center justify-content-center position-relative w-100">
													<div class="bg-white radius30 overflow-hidden h-100 w-100">
														<img src="<?php echo wp_get_attachment_image_url($packaging_slider_items['image'], 'large'); ?>"
															alt="" class="">
													</div>
												</div>
											</div>
											<div class="col-lg-6 ps-lg-5">
												<div class="leftright-content">
													<div class="red-hat font20 fw-medium text-139cd5 dmb-10">
														<?php echo $packaging_slider_items['prefix'] ?>
													</div>
													<div class="red-hat font40 res-font28 fw-medium text-013945 dmb-10">
														<?php echo $packaging_slider_items['heading'] ?>
													</div>
													<div class="red-hat font22 text-4d4d4d dmb-20 tmb-0">
														<?php echo $packaging_slider_items['description'] ?>
													</div>
													<?php if (!empty($packaging_slider_items['button']['url'])):
														$target_8 = ($packaging_slider_items['button']['target'] == "_blank") ? "" : "";
													?>
														<a class="btnA bg-013945 tmt-20 res-w-100 text-decoration-none d-inline-flex justify-content-center align-items-center font20 text-capitalize radius30 transition"
															target="<?php echo $target_8; ?>"
															href="<?php echo $packaging_slider_items['button']['url']; ?>"
															tabindex="0"><?php echo $packaging_slider_items['button']['title']; ?></a>
													<?php endif; ?>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</section>
			<?php endif; ?>


			<?php elseif (get_row_layout() == 'custom_printed_solutions'):
			$custom_printed_heading = get_sub_field('heading');
			$custom_printed_image_box = get_sub_field('image_box');
			if (!empty($custom_printed_image_box)):
			?>
				<!-- custom-solution-section -->
				<section class="custom-solution-section bg-f2f3f4 dpb-90 tpb-50">
					<div class="container">
						<div class="red-hat font40 fw-medium text-013945 dmb-80 text-center res-font28 tmb-40">
							<?php echo $custom_printed_heading ?>
						</div>
						<div class="row row10">
							<?php foreach ($custom_printed_image_box as $printed_image_box): ?>
								<div class="col-lg-3 col-12 tmb-40 solution-col">
									<a href="<?php echo $printed_image_box['link']['url'] ?>"
										class="text-decoration-none d-inline-flex solution-box-card transition px-4 flex-column justify-content-end w-100">
										<div class="solution-box-card-img w-100 dmb-30 px-lg-2 mx-auto">
											<img src="<?php echo wp_get_attachment_image_url($printed_image_box['image'], 'large'); ?>"
												alt="" class="transition">
										</div>
										<div class="red-hat font24 text-white text-center dmb-20">
											<?php echo $printed_image_box['heading'] ?>
										</div>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</section>
			<?php endif; ?>

		<?php elseif (get_row_layout() == 'video_section'):
			$video_section_prefix = get_sub_field('prefix');
			$video_section_heading = get_sub_field('heading');
			$video_section_description = get_sub_field('description');
			$video_section_link = get_sub_field('video_link');
			$video_section_background = get_sub_field('video_background');
		?>
			<!-- leftright-section -->
			<section class="leftright-section right-img">
				<div class="container">
					<div class="row align-items-center flex-column-reverse flex-lg-row">
						<div class="col-lg-6 col-12">
							<div class="red-hat font20 fw-medium text-139cd5 dmb-20"><?php echo $video_section_prefix ?></div>
							<div class="red-hat font40 fw-medium text-013945 dmb-20 res-font28"><?php echo $video_section_heading ?>
							</div>
							<div class="red-hat font22 text-4d4d4d"><?php echo $video_section_description ?></div>
						</div>
						<div class="col-lg-6 col-12 tmb-20">
							<a href="<?php echo $video_section_link; ?>" class="leftright-img position-relative d-inline-flex w-100"
								data-fancybox>
								<img src="<?php echo wp_get_attachment_image_url($video_section_background, 'large'); ?>" alt=""
									class="h-100 w-100 object-cover">
								<button class="leftright-play-btn bg-transparent border-0 p-0 position-absolute top-left-center">
									<img src="<?php echo get_home_url(); ?>/wp-content/uploads/2025/02/play-btn.svg" alt="">
								</button>
							</a>
						</div>
					</div>
				</div>
			</section>

			<?php elseif (get_row_layout() == 'request_a_quote'):
			$request_a_quote_prefix = get_sub_field('prefix');
			$request_a_quote_heading = get_sub_field('heading');
			$request_a_quote_button = get_sub_field('button');
			$request_a_quote_padding_bottom = get_sub_field('padding_bottom');
			$request_a_quote_padding_top = get_sub_field('padding_top');
			$request_a_quote_gray_background = get_sub_field('gray_background');
			if ($request_a_quote_gray_background == 'no'):
			?>
				<div class="quote-section">
					<div class="container">
						<div class="bg-013945 radius30 text-center px-lg-5 px-3 dpt-75 dpb-75 tpt-30 tpb-30">
							<?php if (!empty($request_a_quote_prefix)): ?>
								<div class="red-hat font20 fw-medium text-139cd5 dmb-30"><?php echo $request_a_quote_prefix ?></div>
							<?php endif; ?>
							<?php if (!empty($request_a_quote_heading)): ?>
								<div class="red-hat font28 fw-medium text-white dmb-30 res-font24"><?php echo $request_a_quote_heading ?>
								</div>
							<?php endif; ?>
							<?php if (!empty($request_a_quote_button['url'])):
								$target_4 = ($request_a_quote_button['target'] == '') ? "" : "_blank";
							?>
								<a class="btnA white-border-btn radius30 font18 fw-medium text-decoration-none d-inline-flex align-items-center justify-content-center text-white text-capitalize transition"
									target="<?php echo $target_4; ?>"
									href="<?php echo $request_a_quote_button['url'] ?>"><?php echo $request_a_quote_button['title'] ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php else: ?>
				<section
					class="quote-section bg-f2f3f4 dpt-<?php echo $request_a_quote_padding_top ?> dpb-<?php echo $request_a_quote_padding_bottom ?> tpt-50 tpb-50">
					<div class="container">
						<div class="bg-013945 radius30 text-center px-lg-5 px-3 dpt-75 dpb-75 tpt-30 tpb-30">
							<div class="col-9 mx-auto">
								<?php if (!empty($request_a_quote_prefix)): ?>
									<div class="red-hat font20 fw-medium text-139cd5 dmb-30"><?php echo $request_a_quote_prefix ?></div>
								<?php endif; ?>
								<?php if (!empty($request_a_quote_heading)): ?>
									<div class="red-hat font28 fw-medium text-center text-white dmb-30 res-font24">
										<?php echo $request_a_quote_heading ?>
									</div>
								<?php endif; ?>
								<?php if (!empty($request_a_quote_button['url'])):
									$target_4 = ($request_a_quote_button['target'] == '') ? "" : "_blank";
								?>
									<a class="btnA white-border-btn red-hat radius30 font18 fw-medium text-decoration-none d-inline-flex align-items-center justify-content-center text-white text-capitalize transition"
										target="<?php echo $target_4; ?>"
										href="<?php echo $request_a_quote_button['url'] ?>"><?php echo $request_a_quote_button['title'] ?></a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</section>
			<?php endif; ?>

		<?php elseif (get_row_layout() == 'why_join_the_team'):
			$why_join_the_team_heading = get_sub_field('heading');
			$why_join_the_team_content = get_sub_field('icon_content');
		?>
			<!-- icon-section -->
			<section class="icon-section career-icon-section" data-aos="fade-up" data-aos-duration="1000">
				<div class="container">
					<div class="icon-box radius30">
						<div class="font40 res-font28 fw-medium text-center dpt-50 tpt-10 dpb-50">
							<?php echo $why_join_the_team_heading ?>
						</div>
						<div class="row dpb-100 px-4 px-lg-0">

							<?php foreach ($why_join_the_team_content as $why_join_content): ?>
								<div class="col-lg-3 col-md-6 col-12 text-center">
									<div class="icon-img dmb-15 dmt-15 mx-auto">
										<img src="<?php echo wp_get_attachment_image_url($why_join_content['icon'], 'large'); ?>"
											class="w-100" alt="">
									</div>
									<div class="font24 res-font20 fw-medium text-013945"><?php echo $why_join_content['heading'] ?>
									</div>
									<div class="font22 text-013945"><?php echo $why_join_content['description'] ?></div>
								</div>
							<?php endforeach; ?>

						</div>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'our_current_vacancies'):
			$our_current_vacancies_slider = get_sub_field('image_slider');
			$our_current_vacancies_heading = get_sub_field('heading');
			$our_current_vacancies_content = get_sub_field('content');
		?>
			<!-- image-slider-section  -->
			<section class="image-slider-section" data-aos="fade-up" data-aos-duration="1000">
				<div class="container">
					<div class="image-slider dmb-50 tmb-10">
						<?php foreach ($our_current_vacancies_slider as $our_current_slider): ?>
							<div class="image-slider-img radius30 overflow-hidden">
								<img src="<?php echo wp_get_attachment_image_url($our_current_slider['image'], 'large'); ?>"
									class="h-100 w-100 object-cover" alt="">
							</div>
						<?php endforeach; ?>
					</div>
					<div class="font40 res-font28 fw-medium text-013945 text-center dmb-50 tmb-10">
						<?php echo $our_current_vacancies_heading ?>
					</div>
					<div class="red-hat font20 fw-medium text-139cd5 text-center res-leading20">
						<?php echo $our_current_vacancies_content ?>
					</div>
				</div>
			</section>


			<?php elseif (get_row_layout() == 'image_box_info'):
			$image_box_info_items = get_sub_field('items');
			if (!empty($image_box_info_items)):
				foreach ($image_box_info_items as $post_data):
					$id = $post_data->ID;
					$background_color_class = get_field('background_color_class', $post_data->ID);
					$box = get_field('icon_content', $post_data->ID);
					$button = get_field('button', $post_data->ID);
					$class_color = '';
					if ($background_color_class == 'green'):
						$class_color = "bg-4aa882";
					elseif ($background_color_class == 'greengra'):
						$class_color = "bg-gradient-layer";
					elseif ($background_color_class == 'purple'):
						$class_color = "bg-59407a";
					elseif ($background_color_class == 'orange'):
						$class_color = "bg-df5e34";
					endif;
			?>
					<!-- our-range-inner-section  -->
					<section class="our-range-inner-section overflow-hidden dmb-80">
						<div class="container">
							<div class="our-range-inner-box <?php echo $class_color; ?> radius30">
								<div class="d-flex flex-column flex-lg-row">
									<div class="col-lg-6 col-12 d-flex justify-content-center align-items-center px-lg-5">
										<div class="our-range-inner-img">
											<img src="<?php echo get_the_post_thumbnail_url($id); ?>" class="w-100" alt="">
										</div>
									</div>
									<div class="col-lg-6 col-12 px-3 px-lg-0">
										<div class="red-hat font40 res-font28 text-white fw-medium dmb-20">
											<?php echo $post_data->post_title; ?>
										</div>
										<div class="red-hat font22 text-white fw-normal dmb-40">
											<div class="dmb-15"><?php echo $post_data->post_excerpt; ?></div>
										</div>
										<?php if (!empty($box)): ?>
											<div class="our-range-inner-icon d-flex flex-wrap me-lg-5 dpt-40 dmb-40">
												<?php foreach ($box as $box_custom): ?>
													<div class="col-lg-3 col-6">
														<div class="box-icons dmb-30">
															<img src="<?php echo $box_custom['icon']['url']; ?>" class="h-100" alt="">
														</div>
														<div class="font18 fw-normal text-white pe-5"><?php echo $box_custom['heading']; ?></div>
													</div>
												<?php endforeach; ?>
											</div>
										<?php endif; ?>
										<div class="d-flex flex-wrap">
											<a href="<?php echo get_permalink($id); ?>"
												class="btnA white-border-btn d-inline-flex align-items-center justify-content-center rounded-pill font18 fw-medium text-decoration-none transition res-w-100 me-lg-5 tmb-30">Learn
												More</a>
											<a href="javascript:void(0)" data-id="<?php echo $id; ?>"
												data-name="<?php echo !empty($post_data->post_title) ? $post_data->post_title : ''; ?>"
												data-image="<?php echo get_the_post_thumbnail_url($id); ?>"
												class="add-btn btnA white-border-btn d-inline-flex align-items-center justify-content-center rounded-pill font18 fw-medium text-decoration-none transition res-w-100">Order
												Sample</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
			<?php endforeach;
			endif;
			?>
		<?php elseif (get_row_layout() == 'hero_with_share_button'):
			$share_button_background_image = get_sub_field('background_image');
		?>
			<section class="news-open-hero px-lg-5" data-aos="fade-up" data-aos-duration="1000">
				<div class="position-relative h-100 px-lg-5">
					<div class="news-open-img w-100 h-100 position-relative radius30 overflow-hidden res-no-radius">
						<img src="<?php echo wp_get_attachment_image_url($share_button_background_image, 'large'); ?>" alt=""
							class="h-100 w-100 object-cover">
						<div
							class="news-open-content position-absolute top-center w-100 px-5 text-center red-hat font40 fw-medium text-white res-font28">
							<?php the_title(); ?>
						</div>
					</div>
				</div>
			</section>

			<?php $date = get_the_date('F j, Y'); ?>
			<section class="hero-bottom-content position-relative">
				<div class="container">
					<div
						class="bg-139cd5 rounded-pill p-4 d-flex flex-wrap align-items-center justify-content-lg-between justify-content-center">
						<div
							class="d-flex flex-wrap flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
							<div class="red-hat font20 fw-medium text-white me-lg-3 order-lg-0 order-1"><?php echo $date; ?>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-lg-end justify-content-center res-w-100 tmt-10">
							<div class="red-hat font20 fw-medium text-white me-4">Share</div>
							<?php echo do_shortcode('[ssba url=”http://simplesharebuttons.xn--com-9o0a title=”Simple Share Buttons”]'); ?>
						</div>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'faqs'):
			$faqs_faq_items = get_sub_field('faq_items');
		?>
			<section class="closet-section">
				<div class="container">
					<div class="closet-accordion" data-aos="fade-up" data-aos-duration="1000">
						<?php foreach ($faqs_faq_items as $faq_item): ?>
							<div class="closet-item dmt-25">
								<div
									class="closet-header cursor-pointer bg-139cd5 rounded-pill d-flex justify-content-between align-items-center p-4 dpb-35">
									<div class="font20 fw-medium text-white"><?php echo $faq_item['heading'] ?></div>
									<div class="closet-arrow position-relative transition pe-4"></div>
								</div>
								<div class="closet-content p-4 dpb-40">
									<div class="font22 fw-normal text-4d4d4d">
										<?php echo $faq_item['description'] ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'page_content'):
			$page_the_content = get_sub_field('the_content');
		?>
			<section class="delivery-content">
				<div class="container">
					<div class="">
						<?php echo $page_the_content; ?>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'journey'):
			$journey_step = get_sub_field('journey_step');
		?>
			<section class="journey-slider-section ">
				<div class="container bg-139cd5 radius30">
					<div class="row dpt-100 dpb-100 tpt-50 tpb-50 justify-content-between">
						<div class="col-lg-6 col-md-12 col-12 journey-img dmb-30 mx-lg-auto px-lg-5 position-sticky p-initial z-3">
							<?php foreach ($journey_step as $journey_step_items):
								$image = $journey_step_items['journey_image'];
							?>
								<img class="w-100 h-100 object-cover radius30" src="<?php echo $image; ?>" alt="">
							<?php endforeach; ?>
						</div>
						<div class="col-lg-6 col-12 journey-content">
							<?php foreach ($journey_step as $journey_step_items): ?>
								<div class="journey-part dpb-50 tpb-25">
									<div class="journey-years red-hat font40 res-font28 fw-medium text-013945">
										<?php echo $journey_step_items['year'] ?>
									</div>
									<div class="text-white red-hat history-description font24 res-font18 fw-normal dmb-10">
										<?php echo $journey_step_items['title'] ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</section>


			<!-- <section class="journey-slider-section dmt-100 dmb-100">
				<div class="container bg-139cd5 radius30">
					<div class="row dpt-100 dpb-100 justify-content-between">
						<div class="col-lg-6 col-md-12 col-12 journey-img dmb-30 mx-lg-auto px-lg-5 position-sticky z-3">
							<img class="w-100 h-100 object-cover radius30" src="./assets/images/history-slider1.png" alt="">
						</div>
						<div class="col-lg-6 col-12 journey-content">
							<div class="journey-part dpb-50">
								<div class="journey-years red-hat font40 fw-medium text-013945">
									1988
								</div>
								<div class="text-white red-hat history-description font24 fw-normal dmb-10">
									Lyan Packaging founded as a general packaging
									merchant.
								</div>
							</div>
						</div>
					</div>
				</div>
			</section> -->


		<?php elseif (get_row_layout() == 'overview_icon_box'):
			$overview_icon_box_items = get_sub_field('icon_box_items');
		?>
			<section class="blue-box-section" data-aos="fade-up" data-aos-duration="1000">
				<div class="container">
					<div class="bg-139cd5 radius30 dpt-100 dpb-100 tpt-40 tpb-40 px-lg-5">
						<div class="row">
							<?php foreach ($overview_icon_box_items as $overview_box_items): ?>
								<div class="col-md-4 col-12 px-lg-5 text-center dmb-25 tmt-20">
									<div class="blue-box-icon mx-auto dmb-20">
										<img class="w-100"
											src="<?php echo wp_get_attachment_image_url($overview_box_items['icon'], 'large'); ?>"
											alt="">
									</div>
									<div class="text-013945 font24 red-hat fw-medium"><?php echo $overview_box_items['title'] ?></div>
									<div class="font24 text-white red-hat"><?php echo $overview_box_items['description'] ?></div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'full_width_image'):
			$full_image = get_sub_field('image');
		?>
			<section class="purpose-picture-section">
				<img class="w-100 h-100 object-cover" src="<?php echo wp_get_attachment_image_url($full_image, 'large'); ?>"
					alt="...">
			</section>

			<?php elseif (get_row_layout() == 'quick_contact'):
			$quick_contact_prefix = get_sub_field('prefix');
			$quick_contact_heading = get_sub_field('heading');
			$quick_contact_form_full_width = get_sub_field('form_full_width');
			if ($quick_contact_form_full_width == 'yes'):
			?>
				<!-- quick-contact-section  -->
				<section class="quick-contact-section" data-aos="fade-up" data-aos-duration="1000">
					<div class="container">
						<div class="bg-013945 radius30  dpt-50 dpb-50 px-lg-5 px-p-p">
							<div class="font20 fw-medium text-139cd5 text-center dmb-20"><?php echo $quick_contact_prefix ?></div>
							<div class="font28 res-font24 fw-normal text-white dmb-30 col-lg-8 col-9 px-lg-4 px-3 mx-auto text-center">
								<?php echo $quick_contact_heading ?>
							</div>
							<?php echo do_shortcode('[contact-form-7 id="6f786cf" title="Quick Contact"]'); ?>
						</div>
					</div>
				</section>

			<?php else: ?>
				<!-- quick-contact-section  -->
				<section class="quick-contact-section">
					<div class="container px-p-0">
						<div class=" bg-013945 radius30  dpt-50 dpb-50 px-p-p">
							<div class="font20 fw-medium text-139cd5 text-center dmb-20"><?php echo $quick_contact_prefix ?></div>
							<div class="font28 res-font24 fw-normal text-white dmb-30 col-lg-8 col-12 px-lg-4  mx-auto text-center">
								<?php echo $quick_contact_heading ?>
							</div>
							<div class="col-lg-8 col-12 mx-auto">
								<?php echo do_shortcode('[contact-form-7 id="a0a2561" title="Disposal Quick Contact"]'); ?>
							</div>
						</div>
					</div>
				</section>
			<?php endif; ?>

		<?php elseif (get_row_layout() == 'spacing'):
			$desktop = get_sub_field('desktop');
			$tablet = get_sub_field('tablet');
			$mobile = get_sub_field('mobile');

			$desktop_mb = $desktop['margin_bottom'];
			$desktop_mb_main = (!empty($desktop['margin_bottom'])) ? " dpb-" : "";
			$tablet_mb = $tablet['margin_bottom'];
			$tablet_mb_main = (!empty($tablet['margin_bottom'])) ? " tpb-" : "";
			$mobile_mb = $mobile['margin_bottom'];
			$mobile_mb_main = (!empty($mobile['margin_bottom'])) ? " mpb-" : "";
		?>
			<div class="spacing <?php echo $desktop_mb_main;
								echo $desktop_mb;
								echo $tablet_mb_main;
								echo $tablet_mb;
								echo $mobile_mb_main;
								echo $mobile_mb; ?>"></div>
			<?php elseif (get_row_layout() == 'single_blog'):
			$single_blog_items = get_sub_field('items');
			if (!empty($single_blog_items)): ?>
				<section class="news-section" data-aos="fade-up" data-aos-duration="1000">
					<div class="container h-100">
						<div class="bg-f2f3f4 news-block radius30 h-100">
							<div class="row align-items-center h-100">
								<div class="col-sm-6 col-12 overflow-hidden pe-lg-5 tmb-30 h-100 news-img" data-aos="fade-up"
									data-aos-duration="1000">
									<div class="w-100 h-100 radius30 overflow-hidden">
										<img src="<?php echo get_the_post_thumbnail_url($single_blog_items->ID); ?>" alt=""
											class="h-100 w-100 object-cover">
									</div>
								</div>
								<div class="col-sm-6 col-12" data-aos="fade-up" data-aos-duration="1000">
									<div class="red-hat font20 fw-medium text-139cd5 dmb-20">The Latest News</div>
									<div class="red-hat font40 fw-medium text-013945 dmb-20 tmb-15 res-font28 truncate"
										data-max-length="62">
										<?php echo $single_blog_items->post_title; ?>
									</div>
									<div class="red-hat font16 leading16 fw-normal text-4d4d4d dmb-90 tmb-30 truncate"
										data-max-length="550">
										<?php echo $single_blog_items->post_content; ?>
									</div>
									<a href="<?php echo get_permalink($single_blog_items->ID); ?>"
										class="btnA bg-139cd5-btn  d-inline-flex align-items-center justify-content-center rounded-pill font18 fw-medium text-decoration-none transition res-w-100">Read
										More</a>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php endif;
			?>

		<?php elseif (get_row_layout() == 'main_blog'):
			$args = array(
				'taxonomy' => 'category',
				'orderby' => 'name',
				'order' => 'ASC',
				'hide_empty' => 1,
			);

			$cats = get_categories($args);

		?>
			<section class="news-card-section">
				<div class="container">
					<div class="d-flex justify-content-lg-center dmb-50">
						<div class="filter-btn-row overflow-auto d-flex align-items-center">
							<button data-filter="all"
								class="filter-btn bg-transparent news-filter-btn transition red-hat font20 fw-medium text-013945 border-0 p-0 me-4 text-nowrap active">
								All
							</button>
							<?php foreach ($cats as $cat) { ?>
								<button data-filter="<?php echo $cat->slug; ?>"
									class="filter-btn bg-transparent news-filter-btn transition red-hat font20 fw-medium text-013945 border-0 p-0 me-4 text-nowrap">
									<?php echo $cat->name; ?>
								</button>
							<?php } ?>
						</div>
					</div>
					<div class="row row15 post-full-load_1">
					</div>
					<div id="ajaxLoader"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2025/02/loader.gif"
							class="w-100"></div>
					<div class="pagination justify-content-center dmb-50 dmt-20"></div>
				</div>
			</section>
			<script id="post-template" type="text/x-handlebars-template">
				<div class="col-xl-4 col-md-6 col-12 dmb-45 news-filter company-news">
																																																																																																																																																																	<div class="news-card d-inline-block w-100" data-aos="fade-up" data-aos-duration="1000">
																																																																																																																																																																		<div class="news-card-img radius10 overflow-hidden dmb-15 position-relative w-100">
																																																																																																																																																																			<img src="{{image}}" alt="{{decodeHtml title}}" class="h-100 w-100 object-cover">
																																																																																																																																																																			<div class="news-card-layer position-absolute top-0 start-0 h-100 w-100 d-flex align-items-center justify-content-center transition">
																																																																																																																																																																				<a href="{{image}}" class="news-layer-icon mx-2 d-flex align-items-center justify-content-center rounded-circle transition" data-fancybox="gallery" data-caption="{{decodeHtml title}}">
																																																																																																																																																																					<img src="/wp-content/uploads/2025/02/search.svg" alt="">
																																																																																																																																																																				</a>
																																																																																																																																																																				<a href="{{ link }}" class="news-layer-icon news-layer-link mx-2 d-flex align-items-center justify-content-center rounded-circle transition">
																																																																																																																																																																					<img src="/wp-content/uploads/2025/02/link.svg" alt="">
																																																																																																																																																																				</a>
																																																																																																																																																																			</div>
																																																																																																																																																																		</div>
																																																																																																																																																																		<div class="news-card-content px-2">
																																																																																																																																																																			<a href="{{ link }}" class="text-decoration-none d-inline-block red-hat font22 fw-medium text-013945 text-center">
																																																																																																																																																																			  {{decodeHtml title}}
																																																																																																																																																																			</a>
																																																																																																																																																																		</div>
																																																																																																																																																																	</div>

																																																																																																																																																																	</div>
																																																																																																																																																																	</script>

			<?php elseif (get_row_layout() == 'only_heading'):
			$only_heading = get_sub_field('heading');
			if (!empty($only_heading)): ?>
				<section class="page-title-section">
					<div class="container">
						<div class="red-hat font48 fw-medium text-013945 text-center" data-aos="fade-up" data-aos-duration="1000">
							<?php echo $only_heading; ?>
						</div>
					</div>
				</section>
			<?php endif; ?>

		<?php elseif (get_row_layout() == 'contact_section'):
			$contact_section_linkedin = get_sub_field('linkedin');
			$contact_section_address = get_sub_field('address');
			$contact_section_email_address = get_sub_field('email_address');
			$contact_section_mobile_number = get_sub_field('mobile_number');
			$contact_section_form_title = get_sub_field('form_title');
			$contact_section_form_description = get_sub_field('form_description');
			$contact_section_google_map = get_sub_field('google_map');
		?>
			<section class="contact-section">
				<div class="container">
					<div class="d-flex flex-wrap">
						<div class="col-lg-6 col-12 pe-lg-4 tmb-50" data-aos="fade-up" data-aos-duration="500">
							<ul class="list-none ps-0 dmb-20 d-flex align-items-center contact-social-media">
								<li class="d-flex me-4">
									<?php if (!empty($contact_section_linkedin['title']['url'])):
										$target_7 = ($contact_section_linkedin['title']['target'] == '') ? "" : "_blank";
									?>
										<a href="<?php echo $contact_section_linkedin['title']['url'] ?>"
											target="<?php echo $target_7; ?>"
											class="text-decoration-none d-inline-flex align-items-center red-hat font15 text-013945">
											<img src="<?php echo wp_get_attachment_image_url($contact_section_linkedin['image'], 'large'); ?>"
												alt="" class="me-2"><?php echo $contact_section_linkedin['title']['title'] ?>
										</a>
									<?php endif; ?>
								</li>
							</ul>
							<div class="red-hat font18 text-013945 col-lg-4 col-6 dmb-15">
								<?php echo $contact_section_address ?>
							</div>
							<div class="dmb-40">
								<a href="mailto:<?php echo $contact_section_email_address ?>"
									class="text-decoration-none d-inline-block red-hat font18 text-013945"><?php echo $contact_section_email_address ?></a>
								<div class="red-hat font18 text-013945">
									Tel: <a href="tel:<?php echo $contact_section_mobile_number ?>"
										class="text-decoration-none d-inline-block red-hat font18 text-013945"><?php echo $contact_section_mobile_number ?></a>
								</div>
							</div>
							<div class="red-hat font32 fw-medium text-333333 dmb-15"><?php echo $contact_section_form_title ?></div>
							<div class="red-hat font16 text-333333 dmb-25"><?php echo $contact_section_form_description ?></div>
							<?php echo do_shortcode('[contact-form-7 id="b6da535" title="Contact Form"]'); ?>

						</div>
						<div class="col-lg-6 col-12 ps-lg-4" data-aos="fade-up" data-aos-duration="1800">
							<div class="radius10 overflow-hidden contact-map">
								<?php echo $contact_section_google_map ?>
							</div>
						</div>
					</div>
				</div>
			</section>

		<?php elseif (get_row_layout() == 'environmental_icon_box'):
			$environmental_icon_box_heading = get_sub_field('heading');
			$environmental_icon_box_description = get_sub_field('description');
			$environmental_icon_box_items = get_sub_field('icon_box');
		?>
			<section class="question-section">
				<div class="container">
					<div class="questions radius30 bg-gradient-layer">
						<?php if (!empty($environmental_icon_box_heading)): ?>
							<div class="red-hat font40 res-font28 fw-medium text-center text-013945 dpt-100 dmb-30">
								<?php echo $environmental_icon_box_heading ?>
							</div>
						<?php endif;
						if (!empty($environmental_icon_box_description)): ?>
							<div class="col-lg-11 col-12 mx-auto dmb-80">
								<div class="col-lg-9 col-12 text-white font22 red-hat text-center mx-auto">
									<?php echo $environmental_icon_box_description ?>
								</div>
							</div>
						<?php endif; ?>
						<div class="dpb-50">
							<div class="row">
								<?php if (!empty($environmental_icon_box_items)): ?>
									<?php foreach ($environmental_icon_box_items as $index => $environmental_items): ?>
										<div class="col-lg-4 col-md-4 col-12 dmb-30 question-cards" data-id="<?php echo $index; ?>">
											<a href="#footprint-info" style="text-decoration: none;">
												<div class="question-img mx-auto dmb-15">
													<img class="w-100"
														src="<?php echo wp_get_attachment_image_url($environmental_items['icon'], 'large'); ?>"
														alt="...">
												</div>
												<div>
													<div class="font24 res-font20 text-center text-013945 red-hat fw-medium ">
														<?php echo $environmental_items['title'] ?>
													</div>
													<div class="red-hat text-center font22 fw-normal text-white">
														<?php echo $environmental_items['description'] ?>
													</div>
												</div>
											</a>
										</div>
								<?php endforeach;
								endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>


			<section class="footprint-section dmt-100" id="footprint-info">
				<div class="container">
					<div class="inner-footprint radius30 pe-3">
						<div class="d-flex justify-content-end dpt-30">
							<div
								class="footprint-icon bg-013945 d-inline-flex align-items-center justify-content-center rounded-pill cursor-pointer">
								<img src="<?php echo get_home_url(); ?>/wp-content/uploads/2025/02/white-close.svg" alt="" class="">
							</div>
						</div>
						<div class="px-lg-5 px-4">
							<?php if (!empty($environmental_icon_box_items)): ?>
								<?php foreach ($environmental_icon_box_items as $index => $environmental_items): ?>
									<div class="row footprint-content dpt-35" data-id="<?php echo $index; ?>">
										<div class="col-6 pe-4">
											<div class="text-139cd5 fw-medium font22 ">
												<?php echo $environmental_items['title']; ?>
											</div>
											<div class="font40 res-font30 red-hat fw-medium">
												<?php echo $environmental_items['description'] ?>
											</div>
										</div>
										<div class="col-lg-6 col-12 dmb-100 tmb-50 pe-2">
											<div class="red-hat text-4d4d4d font24 fw-normal dmb-30 tmb-10">
												<?php echo $environmental_items['content']; ?>
											</div>
										</div>
									</div>
							<?php endforeach;
							endif; ?>
						</div>
					</div>
				</div>
			</section>

			<?	// php elseif (get_row_layout() == 'only_content_section'):
			//	$only_content_section_prefix = get_sub_field('prefix');
			//	$only_content_section_heading = get_sub_field('heading');
			//	$only_content_section_description = get_sub_field('description');
			//	 
			?>
			<!-- <section class="footprint-section">
				<div class="container">
					<div class="inner-footprint radius30 px-lg-5 px-4">
						<div class="row">
							<div class="col-lg-6 col-12">
								<div class="col-lg-11 col-12">
									<?php if (!empty($only_content_section_prefix)): ?>
										<div class="text-139cd5 fw-medium font22 dmt-100 tmt-50">
											<?php echo $only_content_section_prefix ?>
										</div>
									<?php endif ?>
									<?php if (!empty($only_content_section_heading)): ?>
										<div class="font40 res-font30 red-hat fw-medium">
											<?php echo $only_content_section_heading ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
							<?php if (!empty($only_content_section_description)): ?>
								<div class="col-lg-6 col-12 dmt-100 tmt-50 dmb-100 tmb-50 pe-2">
									<div class="red-hat text-4d4d4d font24 fw-normal dmb-30 tmb-10">
										<?php echo $only_content_section_description ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section> -->


		<?php elseif (get_row_layout() == 'background_image_content'):
			$backgroundImage = get_sub_field('background_with_image');
		?>

			<section class="bg-image-content dmb-100 bg-f2f3f4">
				<div class="container">
					<div class="row">
						<nav class="">
							<div class="nav nav-tabs row15 d-flex align-items-center" id="nav-tab" role="tablist">
								<?php
								if (!empty($backgroundImage)):
									foreach ($backgroundImage as $key => $bgImage):
										$Image = $bgImage['images'];
								?>
										<button class="col-3 nav-link <?php echo $key === 0 ? 'active' : ''; ?>"
											id="nav-tab-<?php echo $key; ?>" data-bs-toggle="tab"
											data-bs-target="#nav-pane-<?php echo $key; ?>" type="button" role="tab"
											aria-controls="nav-pane-<?php echo $key; ?>"
											aria-selected="<?php echo $key === 0 ? 'true' : 'false'; ?>">
											<img src="<?php echo $Image; ?>" alt="" class="w-100 h-100 object-cover">
										</button>
								<?php endforeach;
								endif; ?>
							</div>
						</nav>
						<div class="tab-content" id="nav-tabContent">
							<?php
							if (!empty($backgroundImage)):
								foreach ($backgroundImage as $key => $bgImage):
									$BGColor = $bgImage['background_color'];
									$Heading = $bgImage['heading'];
									$Description = $bgImage['description'];
									$RightImg = $bgImage['right_image'];
							?>
									<div class="tab-pane bg-<?php echo $BGColor; ?> <?php echo $key === 0 ? 'show active' : ''; ?>"
										id="nav-pane-<?php echo $key; ?>" role="tabpanel" aria-labelledby="nav-tab-<?php echo $key; ?>"
										tabindex="0">
										<div
											class="d-flex align-items-center dpt-150 tpt-80 dpb-100 tpb-50 radius30 px-lg-5 px-3">
											<div class="col-lg-6 col-12 pe-5">
												<?php if (!empty($Heading)): ?>
													<div
														class="font30 res-font28 text-white res-font20 red-hat fw-medium text-013945 dmb-20 px-2 px-lg-0">
														<?php echo $Heading ?>
													</div>
												<?php endif; ?>
												<?php if (!empty($Description)): ?>
													<div class="font22 res-font18 red-hat text-white fw-normal text-4d4d4d dmb-35 px-2 px-lg-0">
														<?php echo $Description; ?>
													</div>
												<?php endif; ?>
											</div>
											<?php if (!empty($RightImg)): ?>
												<div class="col-lg-6 col-12 ps-5">
													<div class="right-img">
														<img src="<?php echo $RightImg; ?>" class="w-100 h-100 object-cover radius30" alt="">
													</div>
												</div>
											<?php endif; ?>
										</div>
									</div>
							<?php endforeach;
							endif; ?>
						</div>
					</div>
				</div>
			</section>



		<?php elseif (get_row_layout() == 'product_assessments'):
			$product_assessments_heading = get_sub_field('heading');
			$product_assessments_description = get_sub_field('description');
			$product_assessments_accordion = get_sub_field('accordion');
			$product_assessment_heading_for_price_label = get_sub_field('heading_for_price_label');
		?>
			<section class="closet-section bg-f2f3f4 dpt-100 dpb-100 tpt-50 tpb-50">
				<div class="closet-accordion">
					<div class="container">
						<div class="col-lg-11 col-12 mx-auto dmb-80 px-p-p">
							<div class="col-lg-8 col-12 mx-auto">
								<div class="font40 res-font28 red-hat fw-medium text-013945 text-center dmb-20">
									<?php echo $product_assessments_heading ?>
								</div>
								<div class="font24 res-font18 red-hat fw-normal text-013945 mx-auto text-center">
									<?php echo $product_assessments_description ?>
								</div>
							</div>
						</div>
						<?php foreach ($product_assessments_accordion as $key => $assessments_accordion):
							$clsname = ($key == '0') ? "active" : "";
						?>
							<div class="closet-item dmt-25 <?php echo $clsname; ?>">
								<div
									class="red-hat product-closet-header cursor-pointer bg-013945 rounded-pill d-flex justify-content-center align-items-center p-4 dpb-35 <?php echo $clsname; ?>">
									<div class="font24 fw-normal red-hat text-white"><?php echo $assessments_accordion['title'] ?></div>
								</div>

								<div class="closet-content px-4 px-lg-5 text-center dpb-40 bg-white">
									<div class="product-box d-lg-flex justify-content-between align-items-center dpt-35 tpt-0">
										<?php foreach ($product_assessment_heading_for_price_label as $product_assessment_heading_for_price_label_custom): ?>
											<div class="product-content box-heading ">
												<div class="text-center red-hat font22 res-font18 fw-medium text-013945 d-lg-inline-block d-none">
													<?php echo $product_assessment_heading_for_price_label_custom['heading']; ?>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
									<?php foreach ($assessments_accordion['content'] as $assessments_accordion_content): ?>
										<div class="d-flex flex-column flex-lg-row justify-content-between product-box dpb-45 dpt-45">
											<div class="product-content tmb-20">
												<?php if ($assessments_accordion_content['image']): ?>
													<div class="product-img dmb-10">
														<img src="<?php echo wp_get_attachment_image_url($assessments_accordion_content['image'], 'large'); ?>"
															class="w-100 h-100 object-cover" alt="">
													</div>
												<?php endif; ?>
												<div class="red-hat font24 res-font18 fw-medium text-013945">
													<?php echo $assessments_accordion_content['title'] ?>
												</div>
											</div>
											<?php foreach ($assessments_accordion_content['listing'] as $assessments_accordion_listing): ?>
												<div class="d-flex justify-content-between align-items-center px-lg-5 tpt-10">
													<div class="red-hat font18 fw-medium text-013945 text-center content-text d-lg-none">
														<?php echo $assessments_accordion_listing['heading']; ?>
													</div>
													<div class="red-hat font24 res-font18 fw-medium text-013945 text-center content-text">
														<?php echo $assessments_accordion_listing['list'] ?>
													</div>
												</div>
											<?php endforeach; ?>

										</div>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

			<?php elseif (get_row_layout() == 'terms_explained'):
			$terms_explained_heading = get_sub_field('heading');
			$terms_explained_items = get_sub_field('items');
			if (!empty($terms_explained_items)):
			?>
				<section class="terms-section">
					<div class="container">
						<div class="terms radius30 dpt-50 dpb-50 tpb-20 tpt-20 px-lg-5">
							<div class="red-hat font40 res-font30 text-013945 text-center fw-medium">
								<?php echo $terms_explained_heading; ?>
							</div>
							<div class="divider dmt-50 dmb-50"></div>
							<div class="container">
								<div class="tab-container">
									<div class="row dmt-50 dmb-50 tpt-10 tmb-10">
										<div class="col-md-3 col-12">
											<div class="tab-menu position-sticky top-0">
												<?php foreach ($terms_explained_items as $key => $terms_explained_items_custom):
													$clss = ($key == 0) ? "active" : ""; ?>
													<div class="dmb-20 tmb-25">
														<a href="javascript:void(0)"
															class="tab-item w-100 tab-btn tab text-decoration-none d-inline-flex align-items-center justify-content-center red-hat text-capitalize rounded-pill font20 res-font20 fw-medium transition <?php echo $clss; ?>"
															data-id="tab<?php echo $key; ?>">
															<?php echo $terms_explained_items_custom['heading']; ?></a>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
										<?php foreach ($terms_explained_items as $key => $terms_explained_items_custom):
											$clss = ($key == 0) ? "active" : ""; ?>
											<div class="col-md-9 col-12 px-lg-5 tmt-20 tab tab-<?php echo $clss; ?>"
												data-id="tab<?php echo $key; ?>">
												<div class="red-hat text-013945 font40 res-font30 fw-medium dmb-20">
													<?php echo $terms_explained_items_custom['heading']; ?>
												</div>
												<div class="red-hat font24 res-font18 dmb-30 tmb-10">
													<?php echo $terms_explained_items_custom['description']; ?>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php endif; ?>
		<?php elseif (get_row_layout() == 'left_right_big_image_content'):
			$left_right_big_image_content_image = get_sub_field('image');
			$left_right_big_image_content_heading = get_sub_field('heading');
			$left_right_big_image_content_description = get_sub_field('description'); ?>
			<section class="right-img-section">
				<div class="container">
					<div class="d-flex justify-content-center align-items-center flex-column flex-lg-row">
						<div class="col-lg-5 col-12 order-2 order-lg-1 px-lg-2">
							<?php if (!empty($left_right_big_image_content_heading)): ?>
								<div class="font40 res-font20 red-hat fw-medium text-013945 dmb-20">
									<?php echo $left_right_big_image_content_heading ?>
								</div>
							<?php endif ?>
							<?php if (!empty($left_right_big_image_content_description)): ?>
								<div class="font22 res-font18 red-hat fw-normal text-4d4d4d dmb-35 tmb-20">
									<?php echo $left_right_big_image_content_description ?>
								</div>
							<?php endif; ?>
						</div>
						<?php if (!empty($left_right_big_image_content_image)): ?>
							<div class="col-lg-7 col-12 order-1 order-lg-2 tmb-20">
								<div class="right-img">
									<img src="<?php echo wp_get_attachment_image_url($left_right_big_image_content_image, 'large'); ?>"
										class="w-100 h-100 object-cover radius30" alt="">
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
			<?php elseif (get_row_layout() == 'three_block_image_content'):
			$three_block_image_content_items = get_sub_field('items');
			if (!empty($three_block_image_content_items)): ?>
				<section class="sustainability-section">
					<div class="container">
						<div class="image-section">
							<div class="row">
								<?php foreach ($three_block_image_content_items as $items): ?>
									<div class="col-lg-4 col-12 dmt-50">
										<a href="<?php echo $items['heading']['url']; ?>"
											class="page-img d-inline-block position-relative radius30 overflow-hidden">
											<img class="w-100 h-100 object-cover"
												src="<?php echo wp_get_attachment_image_url($items['image'], 'large'); ?>"
												alt="<?php echo $items['heading']['title']; ?>">
											<div class="card-bg-layer position-absolute top-0 start-0 h-100 w-100 bg-black opacity-25">
											</div>
											<div
												class="red-hat font30 text-white text-center position-absolute page-img-title mx-auto top-left-center">
												<?php echo $items['heading']['title']; ?>
											</div>
										</a>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</section>
			<?php endif; ?>

			<?php elseif (get_row_layout() == 'you_may_also_like'):
			$you_may_also_like_heading = get_sub_field('heading');
			if (!empty($you_may_also_like_heading)): ?>
				<?php $master_post = new WP_Query([
					'post_type' => 'solution',
					'posts_per_page' => 4,
					'orderby' => 'date',
					'order' => 'ASC',
					'post__not_in' => array(get_the_ID()),
					'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
				]); ?>
				<?php if ($master_post->have_posts()): ?>
					<!-- custom-solution-section -->
					<section class="custom-solution-section">
						<div class="container">
							<div class="red-hat font40 fw-medium text-013945 dmb-80 text-center res-font28 tmb-40">
								<?php echo $you_may_also_like_heading; ?>
							</div>
							<div class="row row10">
								<?php while ($master_post->have_posts()):
									$master_post->the_post();
									$id = get_the_ID();
									$ntitle = get_the_title(); ?>
									<div class="col-lg-3 col-12 tmb-40 solution-col">
										<a href="<?php echo get_permalink($id); ?>"
											class="text-decoration-none d-inline-flex solution-box-card white-bg transition px-4 flex-column justify-content-end w-100">
											<div class="solution-box-card-img w-100 dmb-30 px-lg-2 mx-auto">
												<img src="<?php echo get_the_post_thumbnail_url($id); ?>" alt=""
													class="w-100 h-100 object-cover transition">
											</div>
											<div class="red-hat font24 text-013945 text-center dmb-20 related-product-title">
												<?php echo $ntitle; ?>
											</div>
										</a>
									</div>
								<?php endwhile;
								wp_reset_postdata(); ?>
							</div>
						</div>
					</section>
			<?php endif;
			endif; ?>

		<?php elseif (get_row_layout() == 'calculation__section'):
			$background_color_class = get_field('background_color_class');
			$class_color = '';
			if ($background_color_class == 'green'):
				$class_color = "bg-4aa882";
			elseif ($background_color_class == 'greengra'):
				$class_color = "bg-gradient-layer";
			elseif ($background_color_class == 'purple'):
				$class_color = "bg-59407a";
			elseif ($background_color_class == 'orange'):
				$class_color = "bg-df5e34";
			endif;
			$calculation__section_description = get_sub_field('description');
			$calculation__section_button_1 = get_sub_field('button_1');
			$calculation__section_first_col = get_sub_field('first_col');
			$calculation__section_second_col = get_sub_field('second_col');
			$calculation__section_third_col = get_sub_field('third_col'); ?>
			<section class="range-card-section w-100">
				<!-- <div class="container px-p-0">
																	<div class="position-relative range-bg-layer dpt-270 tpt-100">
																		<div class="bg-img position-absolute top-0 z-2 w-100">
																			<img src="<?php echo get_home_url(); ?>/wp-content/uploads/2024/08/range-card-section-bg3.png" class="w-100 h-100" alt="">
																		</div>
																	</div>
																</div> -->
				<div class="<?php echo $class_color; ?> dpt-60 dpb-150 tpb-60">
					<div class="container">
						<div class="col-lg-8 col-12 mx-auto text-center" data-aos="fade-up" data-aos-duration="1000">
							<?php if (!empty($calculation__section_description)): ?>
								<div class="font28 res-font24 fw-normal text-white px-lg-4">
									<?php echo $calculation__section_description; ?>
								</div>
							<?php endif; ?>
							<div class="d-flex justify-content-center flex-wrap red-box-btns dmt-50 tmt-30">
								<?php if (!empty($calculation__section_button_1['url'])):
									$target_9 = ($calculation__section_button_1['target'] == '') ? "" : "_blank"; ?>
									<a href="<?php echo $calculation__section_button_1['url']; ?>" target="<?php echo $target_9; ?>"
										class="btnA white-border-btn d-inline-flex align-items-center justify-content-center rounded-pill font18 fw-medium text-decoration-none transition res-w-100 mx-lg-3 tmb-15"><?php echo $calculation__section_button_1['title']; ?></a>
								<?php endif; ?>
								<a href="javascript:void(0)" data-id="<?php echo $id; ?>"
									data-name="<?php echo !empty($post_data->post_title) ? $post_data->post_title : ''; ?>"
									data-image="<?php echo get_the_post_thumbnail_url($id); ?>"
									class="add-btn btnA white-border-btn d-inline-flex align-items-center justify-content-center rounded-pill font18 fw-medium text-decoration-none transition res-w-100 mx-lg-3 tmb-15">Order
									Sample</a>
							</div>
						</div>
						<div class="d-flex flex-column flex-lg-row align-items-center justify-content-lg-around dpt-90">
							<?php if (!empty($calculation__section_first_col['heading'])): ?>
								<a href="<?php echo $calculation__section_first_col['link']['url']; ?>"
									class="rounded-card text-decoration-none d-inline-block text-center">
									<div
										class="rounded-card-bg d-inline-flex justify-content-center align-items-center rounded-pill transition dmb-35">
										<div class="rounded-card-img">
											<img src="<?php echo wp_get_attachment_image_url($calculation__section_first_col['image'], 'large'); ?>"
												class="h-100" alt="">
										</div>
									</div>
									<div class="red-hat font22 fw-normal text-white">
										<?php echo $calculation__section_first_col['heading']; ?>
									</div>
								</a>
							<?php endif; ?>
							<div class="rounded-card-icon my-3 my-lg-0"><img src="/wp-content/uploads/2025/02/plus.svg"
									class="w-100" alt="">
							</div>
							<?php if (!empty($calculation__section_second_col['heading'])): ?>
								<a href="<?php echo $calculation__section_second_col['link']['url']; ?>"
									class="rounded-card text-decoration-none d-inline-block text-center">
									<div
										class="rounded-card-bg d-inline-flex justify-content-center align-items-center rounded-pill transition dmb-35">
										<div class="rounded-card-img">
											<img src="<?php echo wp_get_attachment_image_url($calculation__section_second_col['image'], 'large'); ?>"
												class="h-100" alt="">
										</div>
									</div>
									<div class="red-hat font22 fw-normal text-white">
										<?php echo $calculation__section_second_col['heading']; ?>
									</div>
								</a>
							<?php endif; ?>
							<div class="rounded-card-icon my-3 my-lg-0"><img src="/wp-content/uploads/2025/02/equl-img.svg"
									class="w-100" alt=""></div>
							<?php if (!empty($calculation__section_third_col['heading'])): ?>
								<a href="<?php echo $calculation__section_third_col['link']['url']; ?>"
									class="rounded-card text-decoration-none d-inline-block text-center">
									<div
										class="rounded-card-bg d-inline-flex justify-content-center align-items-center rounded-pill transition dmb-35">
										<div class="rounded-card-img">
											<img src="<?php echo wp_get_attachment_image_url($calculation__section_third_col['image'], 'large'); ?>"
												class="h-100" alt="">
										</div>
									</div>
									<div class="red-hat font22 fw-normal text-white">
										<?php echo $calculation__section_third_col['heading']; ?>
									</div>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>
			<?php elseif (get_row_layout() == 'tab_for_solution'):
			$tab_for_solution_items = get_sub_field('items');
			if (!empty($tab_for_solution_items)): ?>
				<!-- tab-box-section -->
				<section class="tab-box-section">
					<div class="container">
						<div class="tab-container">
							<div class="tab-menu">
								<div class="row">
									<?php foreach ($tab_for_solution_items as $key => $tab_for_solution_items_custom):
										$clss = ($key == 0) ? "active" : ""; ?>
										<div class="col-lg-4 col-md-4 tmb-25">
											<a href="javascript:void(0)"
												class="tab-item w-100 tab-btn tab text-decoration-none d-inline-flex align-items-center justify-content-center red-hat text-capitalize rounded-pill font20 res-font20 fw-medium transition <?php echo $clss; ?>"
												data-id="tab<?php echo $key; ?>">
												<?php echo $tab_for_solution_items_custom['heading']; ?></a>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
						<?php foreach ($tab_for_solution_items as $key => $tab_for_solution_items_custom):
							$clss = ($key == 0) ? "active" : ""; ?>
							<div class="our-range-inner-section dpt-100 tpt-25 dpb-100 tpb-50 tab tab-<?php echo $clss; ?>"
								data-id="tab<?php echo $key; ?>">
								<?php foreach ($tab_for_solution_items_custom['items'] as $items):
									$id = $items->ID;
									$box = get_field('disposal_content', $id);
									$boxIntro = get_field('disposal_content', $id);
									$background_color_class = get_field('background_color_class', $id);
									$class_color = '';
									if ($background_color_class == 'green'):
										$class_color = "bg-4aa882";
									elseif ($background_color_class == 'greengra'):
										$class_color = "bg-gradient-layer";
									elseif ($background_color_class == 'purple'):
										$class_color = "bg-59407a";
									elseif ($background_color_class == 'orange'):
										$class_color = "bg-df5e34";
									elseif ($background_color_class == 'blue'):
										$class_color = "bg-139cd5";
									endif; ?>
									<div class="our-range-inner-box <?php echo $class_color; ?> radius30 dmb-50">
										<div class="d-flex flex-column flex-lg-row">
											<div class="col-lg-6 col-12 d-flex justify-content-center align-items-center">
												<div class="our-range-inner-img">
													<img src="<?php echo get_the_post_thumbnail_url($id); ?>" class="w-100 h-100 object-cover"
														alt="">
												</div>
											</div>
											<div class="col-lg-6 col-12 px-3 px-lg-0 tpt-20">
												<div class="red-hat font40 res-font28 text-white fw-medium dmb-20">
													<?php echo $items->post_title; ?>
												</div>
												<div class="red-hat font22 text-white fw-normal dmb-40">
													<div class="dmb-15">
														<?php echo $boxIntro; ?>
													</div>
												</div>
												<div class="our-range-inner-icon flex-wrap me-lg-5 dpt-40 ">
													<?php if (!empty($box)):
														foreach ($box as $box_custom): ?>
															<div class="d-flex dmb-30">
																<div class="box-icons dmb-30 me-4">
																	<img src="<?php echo $box_custom['icon']['url']; ?>" class="h-100" alt="">
																</div>
																<div>
																	<div class="font24 fw-medium red-hat text-white">
																		<?php echo $box_custom['heading']; ?>
																	</div>
																	<?php if (!empty($box_custom['description'])): ?>
																		<div class="font20 red-hat text-white"><?php echo $box_custom['description']; ?>
																		</div>
																	<?php endif; ?>
																</div>
															</div>
													<?php endforeach;
													endif; ?>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</section>
			<?php endif; ?>

			<?php elseif (get_row_layout() == 'which_product_do_you_have'):
			$which_product_do_you_have_heading = get_sub_field('heading');
			$which_product_do_you_have_items = get_sub_field('items');
			if (!empty($which_product_do_you_have_items)):
			?>
				<!-- product-section -->
				<section class="product-section">
					<div class="container">
						<?php if (!empty($which_product_do_you_have_heading)): ?>
							<div class="font40 res-font28 fw-medium text-013945 text-center">
								<?php echo $which_product_do_you_have_heading; ?>
							</div>
						<?php endif; ?>
						<div class="tab-container">
							<div class="text-center">
								<div class="tab-menu text-center dmt-50 dmb-50 d-inline-block">
									<select class="js-select2">
										<?php foreach ($which_product_do_you_have_items as $key => $which_product_do_you_have_items_custom):
											$clss = ($key == '0') ? "active" : "";
										?>
											<option value="<?php echo $which_product_do_you_have_items_custom->post_title; ?>"
												class="tab-item red-hat font18 text-black fw-medium <?php echo $clss; ?>"
												data-id="tab<?php echo $key; ?>">
												<?php echo $which_product_do_you_have_items_custom->post_title; ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<?php foreach ($which_product_do_you_have_items as $key => $which_product_do_you_have_items_custom):
								$clss = ($key == '0') ? "active" : "";
								$id = $which_product_do_you_have_items_custom->ID;
								$background_color_class = get_field('background_color_class', $which_product_do_you_have_items_custom->ID);
								$box = get_field('icon_content', $which_product_do_you_have_items_custom->ID);
								$button = get_field('button', $which_product_do_you_have_items_custom->ID);
								$class_color = '';
								if ($background_color_class == 'green'):
									$class_color = "bg-4aa882";
								elseif ($background_color_class == 'greengra'):
									$class_color = "bg-gradient-layer";
								elseif ($background_color_class == 'purple'):
									$class_color = "bg-59407a";
								elseif ($background_color_class == 'orange'):
									$class_color = "bg-df5e34";
								endif;

							?>
								<div class="tab tab-data<?php echo $key; ?> tab-" data-id="tab<?php echo $key; ?>">
									<section class="our-range-inner-section">
										<div class="container">
											<div class="our-range-inner-box <?php echo $class_color; ?> radius30 dmt-30">
												<div class="d-flex flex-column flex-lg-row">
													<div class="col-lg-6 col-12 d-flex justify-content-center align-items-center">
														<div class="our-range-inner-img">
															<img src="<?php echo get_the_post_thumbnail_url($id); ?>" class="h-100" alt="">
														</div>
													</div>
													<div class="col-lg-6 col-12 px-3 px-lg-0">
														<div class="red-hat font40 res-font28 text-white fw-medium dmb-20">
															<?php echo $which_product_do_you_have_items_custom->post_title; ?>
														</div>
														<div class="red-hat font22 text-white fw-normal dmb-40">
															<div class="dmb-15">
																<?php echo $which_product_do_you_have_items_custom->post_excerpt; ?>
															</div>
														</div>
														<?php if (!empty($box)): ?>
															<div class="our-range-inner-icon d-flex flex-wrap me-lg-5 dpt-40 dmb-40">
																<?php foreach ($box as $box_custom): ?>
																	<div class="col-lg-3 col-6">
																		<div class="box-icons dmb-30">
																			<img src="<?php echo $box_custom['icon']['url']; ?>" class="h-100"
																				alt="">
																		</div>
																		<div class="font18 fw-normal text-white pe-5">
																			<?php echo $box_custom['heading']; ?>
																		</div>
																	</div>
																<?php endforeach; ?>
															</div>
														<?php endif; ?>
														<div class="d-flex flex-wrap">
															<a href="<?php echo get_permalink($id); ?>"
																class="btnA white-border-btn d-inline-flex align-items-center justify-content-center rounded-pill font18 fw-medium text-decoration-none transition res-w-100 me-lg-5 tmb-30">Learn
																More</a>
															<a href="#" data-id="<?php echo $id; ?>"
																data-name="<?php echo $which_product_do_you_have_items_custom->post_title; ?>"
																data-image="<?php echo get_the_post_thumbnail_url($id); ?>"
																class="add-btn btnA white-border-btn d-inline-flex align-items-center justify-content-center rounded-pill font18 fw-medium text-decoration-none transition res-w-100">Order
																Sample</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</section>
			<?php endif; ?>

			<?php elseif (get_row_layout() == 'sample_request'):
			$sample_request_heading = get_sub_field('heading');
			$sample_request_content = get_sub_field('content');
			$sample_request_form_heading = get_sub_field('form_heading');
			$sample_request_form_content = get_sub_field('form_content');
			$sample_request_category = get_sub_field('category');
			if (!empty($sample_request_category)):
			?>
				<section class="shop-section">
					<div class="container px-p-p">
						<?php if (!empty($sample_request_heading)): ?>
							<div class="red-hat font40 text-013945 text-center text-capitalize fw-medium res-font30 dmb-30 tmb-25">
								<?php echo $sample_request_heading; ?>
							</div>
						<?php endif; ?>
						<?php if (!empty($sample_request_content)): ?>
							<div class="col-lg-10 col-12 mx-auto">
								<div class="col-lg-7 col-12 mx-auto red-hat text-center text-4d4d4d font22 dmb-30">
									<?php echo $sample_request_content; ?>
								</div>
							</div>
						<?php endif; ?>
						<div class="tab-container">
							<div class="tab-menu">
								<div class="row">
									<?php foreach ($sample_request_category as $key => $sample_request_category_custom):
										$clss = ($key == 0) ? "active" : "";
									?>
										<div class="col-lg-4 col-md-4 tmb-25">
											<a href="javascript:void(0)"
												class="sample-tab-item w-100 tab-btn tab text-decoration-none d-inline-flex align-items-center justify-content-center red-hat text-capitalize rounded-pill font20 res-font20 fw-medium transition <?php echo $clss; ?>"
												data-id="tab<?php echo $key; ?>">
												<?php echo get_term($sample_request_category_custom)->name ?></a>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
						<div>
							<?php foreach ($sample_request_category as $key => $sample_request_category_custom):
								$clss = ($key == 0) ? "active" : "";

								$args = array(
									'post_type' => 'solution',
									'tax_query' => array(
										array(
											'taxonomy' => 'solution-type',
											'field' => 'term_id',
											'terms' => $sample_request_category_custom,
										),
									),
								);

								// Query the posts
								$query = new WP_Query($args);
								if ($query->have_posts()):
							?>
									<div class="box-description bg-f2f3f4 dmt-55 tmt-0 radius30 dpt-100 tpt-25 dpb-100 px-lg-5 px-3 sample-tab tab-<?php echo $clss; ?>"
										data-id="tab<?php echo $key; ?>">
										<div class="box-card-section">
											<div class="row">
												<?php while ($query->have_posts()):
													$query->the_post();
													$id = get_the_ID();
												?>
													<div class="col-lg-4 col-md-6 col-12 dmb-35">
														<div
															class="sample-card d-flex justify-content-center tab-item align-items-center bg-white text-decoration-none w-100 radius30 transition p-4">
															<div>
																<div class="sample-card-img dmb-15 overflow-hidden mx-auto">
																	<img src="<?php echo get_the_post_thumbnail_url($id, 'medium_large'); ?>"
																		class="w-100 h-100 object-cover" alt="">
																</div>
																<div
																	class="red-hat font22 res-font18 fw-medium text-013945 text-capitalize text-center shop-card-title dmb-20">
																	<?php echo get_the_title(); ?>
																</div>
																<div
																	class="card-description text-333333 text-center font16 fw-normal red-hat dmb-20">
																	<?php echo get_the_excerpt(); ?>
																</div>
																<div class="d-flex justify-content-center align-items-center">
																	<button data-id="<?php echo $id; ?>" data-name="<?php echo get_the_title(); ?>"
																		data-image="<?php echo get_the_post_thumbnail_url($id); ?>"
																		class="add-btn btnA transparent-bg-btn text-decoration-none red-hat text-013945 text-center d-flex justify-content-center font18 fw-medium text-capitalize align-items-center radius30 transition wsr">Order
																		Sample</button>
																</div>
															</div>
														</div>
													</div>
												<?php endwhile; ?>
											</div>
										</div>
									</div>
							<?php
								endif;
							endforeach;
							wp_reset_postdata();
							?>
				</section>
				<div class="spacing dmb-115 tmb-70 "></div>

				<!-- quick-contact-section  -->
				<section class="quick-contact-section dmb-75">
					<div class="container px-p-0">
						<div class="bg-013945 radius30 dpt-50 dpb-50 px-lg-5 px-p-p">
							<?php if (!empty($sample_request_form_heading)): ?>
								<div class="font20 fw-medium text-139cd5 text-center dmb-20"><?php echo $sample_request_form_heading; ?>
								</div>
							<?php endif; ?>
							<?php if (!empty($sample_request_form_content)): ?>
								<div class="font28 res-font24 fw-normal text-white dmb-55 tmb-35 col-lg-8 px-lg-4 mx-auto text-center">
									<?php echo $sample_request_form_content; ?>
								</div>
							<?php endif; ?>
							<div id="product-details" class="dmb-135 tmb-40"></div>
							<?php echo do_shortcode('[contact-form-7 id="8dcbefb" title="Sample Form"]'); ?>
						</div>
					</div>
				</section>
			<?php endif; ?>
<?php
		endif;
	endwhile;
endif;
?>