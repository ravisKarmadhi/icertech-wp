export class Cart {
    init() {
        jQuery(document).ready(function ($) {
            $('body').on('click', '.add_to_cart_button', function (e) {
                e.preventDefault();
                jQuery('.head-cart a').trigger('click');

                var product_id = $(this).closest('.product-submit-btn').find('.variation_id').val();
                if (product_id == undefined) {
                    product_id = $(this).attr('data-product_id');
                }
                var quantity = $(this).closest('form').find('.qty').val();

                $.ajax({
                    type: 'POST',
                    url: wc_add_to_cart_params.ajax_url,
                    data: {
                        action: 'custom_ajax_add_to_cart',
                        product_id: product_id,
                        quantity: quantity
                    },
                    success: function (response) {
                        jQuery(".xoo-wsc-container").remove();
                        jQuery(response).appendTo(".xoo-wsc-modal");
                        // Get the current URL
                        const currentUrl = new URL(window.location.href);

                        // Add or update the query parameter (e.g., 'myParam' with value 'myValue')
                        currentUrl.searchParams.set('action', 'viewcart');

                        // Reload the page with the new query parameter
                        window.location.href = currentUrl.toString();
                    },
                    error: function (xhr, status, error) {
                        jQuery(".xoo-wsc-container").remove();
                        jQuery(response).appendTo(".xoo-wsc-modal");
                    }
                });
            });
        });

        $(document).ready(function () {
            // Get the full query string from the URL
            var queryString = window.location.search;

            // Create a URLSearchParams object
            var urlParams = new URLSearchParams(queryString);

            // Get the value of the 'action' parameter
            var actionParam = urlParams.get('action');

            // Check if the 'action' parameter exists and do something
            if (actionParam == 'viewcart') {
                jQuery('#basket1').addClass('show fade').attr({
                    'aria-modal': 'true',
                    'role': 'dialog'
                });

                var backdropDiv = jQuery('<div>', {
                    class: 'offcanvas-backdrop fade show'
                });

                // Append the backdrop div to the body
                jQuery('body').append(backdropDiv).css('overflow' , 'hidden');

                console.log('fsjfghsghfsh');

                // Get the current URL
                var currentUrl = new URL(window.location.href);

                // Remove the 'action' query parameter
                currentUrl.searchParams.delete('action');

                // Update the URL without reloading the page
                window.history.replaceState({}, '', currentUrl.toString());
            }
            $('.basket-close').on('click', function () {
                jQuery('#basket1').removeClass('show fade').removeAttr('aria-modal role');
                backdropDiv.remove();
                jQuery('body').css('overflow', '');
            });
        });
        jQuery(document).ready(function ($) {
            $('body').on('click', '.remove-cart-item', function (e) {
                e.preventDefault();

                var cart_item_key = $(this).data('cart_item_key');

                $.ajax({
                    type: 'POST',
                    url: wc_add_to_cart_params.ajax_url,
                    data: {
                        action: 'custom_ajax_remove_cart_item',
                        cart_item_key: cart_item_key
                    },
                    success: function (response) {
                        jQuery(".xoo-wsc-container").remove();
                        jQuery(response).appendTo(".xoo-wsc-modal");
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

        jQuery(document).ready(function ($) {
            function updateQuantityField(input, step) {
                let currentVal = parseInt(input.val(), 10) || 0;
                let max = parseInt(input.attr('max'), 10) || 999999;
                let min = parseInt(input.attr('min'), 10) || 0;

                if (currentVal + step >= min && currentVal + step <= max) {
                    input.val(currentVal + step).trigger('change');
                }
            }

            $('body').on('click', '.quantity .plus', function () {
                let input = $(this).closest('.quantity').find('input.qty');
                updateQuantityField(input, 50);
                let input_value = $(this).closest('.quantity').find('input.qty').val();
                jQuery('.add_to_cart_button').attr('data-quantity', input_value);
            });

            $('body').on('click', '.quantity .minus', function () {
                let input = $(this).closest('.quantity').find('input.qty');
                updateQuantityField(input, -50);
            });
        });

        setInterval(function () {
            var master = jQuery('.variation_id').val();
            jQuery('.add_to_cart_button').attr('data-product_id', master);
        }, 100);

        jQuery(document).ready(function () {
            function getCookie(name) {
                let value = `; ${document.cookie}`;
                let parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(';').shift();
            }

            function setCookie(name, value, days) {
                let expires = "";
                if (days) {
                    let date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "") + expires + "; path=/";
            }

            function deleteCookie(name) {
                document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            }

            function isIdInCookie(id, cookieArray) {
                return cookieArray.some(item => item.id === id);
            }

            function removeProductFromCookie(id, cookieArray) {
                return cookieArray.filter(item => item.id !== id);
            }

            function updateProductList() {
                let products = getCookie('products') ? JSON.parse(getCookie('products')) : [];
                if (products.length > 0) {
                    let productList = products.map(product => ` ${product.id}`).join(', ');
                    jQuery('#product-list').val('Current Products: ' + productList);
                } else {
                    jQuery('#product-list').val('');
                }
            }

            function fetchProductDetails() {
                let products = getCookie('products') ? JSON.parse(getCookie('products')) : [];
                let productHtml = '';

                if (products.length > 0) {
                    products.forEach(product => {
                        productHtml += `
                            <div class="product-item d-flex align-items-center justify-content-between px-lg-3 py-3 px-0 transition">
                                <div class="col-lg-10 d-flex align-items-center">
                                    <div class="product-item-img me-5 d-flex align-items-center justify-content-center">
                                        <img src="${product.image}" alt="${product.name}" class="w-100"/>
                                    </div>
                                    <p class="red-hat font22 text-white res-font18">${product.name}</p>
                                </div>
                                <div class="col-lg-2 d-flex align-items-center justify-content-end">
                                    <button class="remove-btn col-lg-2 p-0 border-0 bg-transparent" data-id="${product.id}" data-name="${product.name}" data-image="${product.image}">
                                    <img src="/wp-content/uploads/2025/02/icon-delete.svg">
                                    </button>
                                </div>
                            </div>
                        `;
                    });
                } else {
                    // productHtml = '<p>No products selected.</p>';
                }

                jQuery('#product-details').html(productHtml);

                if (products.length > 0) {
                    jQuery('.value-order').text(products.length);
                } else {
                    jQuery('.value-order').text("");
                }
            }

            function showAlert(message) {
                jQuery('#alert-message').text(message);
                jQuery('#custom-alert').addClass('custom-alert-active').fadeIn();
                setTimeout(function () {
                    jQuery('#custom-alert').fadeOut();
                }, 4000);
                jQuery('#close-alert').click(function () {
                    jQuery('#custom-alert').fadeOut();
                });
            }



            // Add button click event
            jQuery('.add-btn').click(function () {
                let id = jQuery(this).data('id').toString();
                let name = jQuery(this).data('name');
                let image = jQuery(this).data('image');
                let products = getCookie('products') ? JSON.parse(getCookie('products')) : [];
                if (isIdInCookie(id, products)) {
                    showAlert('This product is already added');
                } else {
                    products.push({ id: id, name: name, image: image });
                    setCookie('products', JSON.stringify(products), 30);
                    showAlert('Sample ' + name + 'added to request form');
                    updateProductList();
                    fetchProductDetails();
                }
            });

            // Event delegation for dynamically added remove buttons
            jQuery('#product-details').on('click', '.remove-btn', function () {
                let id = jQuery(this).data('id').toString();
                let products = getCookie('products') ? JSON.parse(getCookie('products')) : [];

                if (isIdInCookie(id, products)) {
                    products = removeProductFromCookie(id, products);
                    setCookie('products', JSON.stringify(products), 30);
                    showAlert('Product with ID ' + id + ' has been removed');
                    updateProductList();
                    fetchProductDetails();
                } else {
                    showAlert('This product is not in the list');
                }
            });

            // Delete cookie when the form is submitted
            jQuery('#wpcf7-f1032-o1').submit(function (e) {
                e.preventDefault(); // Optional, in case you are using AJAX submission
                deleteCookie('products'); // Remove the 'products' cookie
                // showAlert('Form submitted and cookie deleted.');
            });

            updateProductList();
            fetchProductDetails();
        });


    }
}