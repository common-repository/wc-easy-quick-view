(function($) {
	'use strict';

	$(document).ready(function() {

		/** Check if ewqv_btn is defined and has an icon property */
		if (typeof ewqv_btn !== 'undefined' && ewqv_btn.icon) {
			let iconClass = ewqv_btn.icon;
			let iconElement = $('<i class="' + iconClass + '"></i>');
			if (ewqv_btn.icon_position === 'before') {
				$('.easy_woo_quick_view_btn').prepend(iconElement);
			} else {
				$('.easy_woo_quick_view_btn').append(iconElement);
			}
		}

		/** Click event handler for the quick view button */
		$('.easy_woo_quick_view_btn').on('click', function(e) {
			e.preventDefault();
			let productId = $(this).data('product-id');

			/** Create a loading overlay HTML content */
			let loading_text = loading.animation_text;
			let loadingHtml = `
			<div class="loading-overlay">
				<div class="loading-text">${loading_text}</div>
			</div>`;		

			/** Append the loading overlay to the body of the web page */
			$('body').append(loadingHtml);

			/** AJAX request to retrieve the product details */
			$.ajax({
				url: easy_woocommerce_quick_view.ajax_url,
				type: 'POST',
				data: {
					action: 'easy_woocommerce_quick_view',
					nonce: easy_woocommerce_quick_view.nonce,
					product_id: productId
				},
				success: function(response) {
					setTimeout(function() { 
						/** Open the Magnific Popup and display the product details */
						$.magnificPopup.open({
							items: {
								src: response
							},
							type: 'inline',
							mainClass: 'mfp-ewqv',
							closeBtnInside: true,
							closeOnBgClick: true,
							showCloseBtn: true,
						});

						/** Initialize WooCommerce variation forms if WooCommerce is active. */
						if (typeof wc_add_to_cart_variation_params !== 'undefined') {
							var form_variation = $('.easy-wqv-product-modal').find('.variations_form');
							form_variation.each(function () {
								$(this).wc_variation_form();
							});
						}

						/** Check if there are gallery images */
						let hasGalleryImages = $('#easy-wqv-image-slider .easy-wqv-product-image').length > 1;
						let left_icon = ewqv_slidrt_icon.left;
						let right_icon = ewqv_slidrt_icon.right;
						
						/** Initialize Slick slider only if there are gallery images */
						if (hasGalleryImages) {
							$('#easy-wqv-image-slider').slick({
								dots: true,
								infinite: true,
								slidesToShow: 1,
								slidesToScroll: 1,
								prevArrow: `<button type="button" class="slick-prev"><i class="${left_icon}"></i></button>`,
								nextArrow: `<button type="button" class="slick-next"><i class="${right_icon}"></i></button>`
							});
						}

						// Remove loading overlay upon successful AJAX completion
						$('.loading-overlay').remove();

					}, 1000);
				},
				error: function() {
					console.log('Error retrieving product details.');
				}
			});
		});
	});
})(jQuery);


