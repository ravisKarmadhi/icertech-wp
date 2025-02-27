import Handlebars from 'handlebars';

export class Handlebar {

    init() {
        this.handlebar();
        this.QuestionAccordion();
    }

    // Dark Mode Functionality
    handlebar() {
        Handlebars.registerHelper('decodeHtml', function (text) {
            var txt = document.createElement("textarea");
            txt.innerHTML = text;
            return txt.value;
        });

        jQuery(document).ready(function () {
            var paginationContainer = $('.pagination'); // Add a container for pagination
            var currentPage = 1; // Define currentPage globally
            var targetContainer = $('.post-full-load_1');
            function post_handle() {
                var post_cat = jQuery('.filter-btn-row button.active').attr('data-filter');
                var ajaxLoader = $('#ajaxLoader');
                var loadmore = $('.news-section .master-load');
                var isAjaxLoading = false; // Flag to check if AJAX is loading

                if (targetContainer.length == 0) return;

                var data = {
                    'action': 'get_post_ajax',
                    'post_main': post_cat,
                    'paged': currentPage
                };

                if (!isAjaxLoading) {
                    isAjaxLoading = true; // Set loading flag to true

                    ajaxLoader.removeClass('d-none');

                    jQuery.post(ajaxurl, data, function (response) {
                        if (response == "null") {
                            loadmore.addClass('d-none');
                        } else {
                            try {
                                var jsonResponse = JSON.parse(response);
                                ajaxLoader.addClass('d-none');
                                if (jsonResponse['data']) {
                                    var services = jsonResponse['data'];
                                    var length = services.length;
                                    if (length < 8) {
                                        loadmore.addClass('d-none');
                                    } else {
                                        loadmore.removeClass('d-none');
                                    }
                                    var propertyTemplateSource = document.getElementById('post-template').innerHTML;
                                    var template = Handlebars.compile(propertyTemplateSource);

                                    services.forEach(function (item) {
                                        var result = template(item);
                                        targetContainer.append(result);
                                    });
                                    updatePagination(jsonResponse.pagination);
                                } else {

                                }
                            } catch (e) {
                                console.error("Error parsing JSON response:", e);
                                // Handle error accordingly, e.g., show a message to the user
                            } finally {
                                isAjaxLoading = false; // Reset loading flag
                            }
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        console.error("AJAX request failed:", textStatus, errorThrown);
                        ajaxLoader.addClass('d-none');
                        isAjaxLoading = false; // Reset loading flag
                    });
                }
            }

            function updatePagination(pagination) {
                paginationContainer.empty(); // Clear existing pagination

                var totalPages = pagination.total_pages;
                var currentPage = pagination.current_page;

                if (totalPages > 1) {
                    // Create "Previous" button
                    if (currentPage > 1) {
                        var prevPage = $('<li>').addClass('page-item').append(
                            $('<a>').addClass('page-link').text('Previous').attr('href', 'javascript:void(0)').data('page', currentPage - 1)
                        );
                        paginationContainer.append(prevPage);
                    }

                    // Create page number links
                    for (var i = 1; i <= totalPages; i++) {
                        var pageItem = $('<li>').addClass('page-item').append(
                            $('<a>').addClass('page-link').text(i).attr('href', 'javascript:void(0)').data('page', i)
                        );

                        if (i === currentPage) {
                            pageItem.addClass('active');
                        }

                        paginationContainer.append(pageItem);
                    }

                    // Create "Next" button
                    if (currentPage < totalPages) {
                        var nextPage = $('<li>').addClass('page-item').append(
                            $('<a>').addClass('page-link').text('Next').attr('href', 'javascript:void(0)').data('page', currentPage + 1)
                        );
                        paginationContainer.append(nextPage);
                    }
                }
            }

            jQuery(document).on("click", ".pagination .page-link", function (e) {
                e.preventDefault();
                var newPage = $(this).data('page');
                if (newPage !== currentPage) {
                    currentPage = newPage;
                    targetContainer.html(''); // Clear the container
                    post_handle(); // Load the selected page
                }
            });

            jQuery(document).on("click", ".filter-btn-row button", function () {
                jQuery('.filter-category button').removeClass('active');
                jQuery(this).addClass('active');
                currentPage = 1; // Reset the page number when category changes
                targetContainer.html('');
                post_handle();
            });

            post_handle(); // Initial call
        });

    }


    QuestionAccordion() {
        jQuery(document).ready(function ($) {
            // Hide all footprint content sections except the first one
            $('.footprint-content').hide();
            $('.footprint-content').first().show(); // Show the first footprint-content by default

            $('.question-cards').on('click', function () {
                var id = $(this).data('id');

                // Hide all footprint content sections
                $('.footprint-content').hide();

                // Show the footprint content section that matches the clicked question card
                $('.footprint-content[data-id="' + id + '"]').show();
                $('.footprint-section').slideDown();
            });

            $('.footprint-icon').on('click', function(){
                $('.footprint-section').slideUp();
            });
        });
    }
}