<?php
if (! defined('ABSPATH')) {
    exit;
}

$settings = get_option('bee_cart_settings', array());

$heading = $settings['cart_title'] ?? 'Your Cart';
$enable_countdown = $settings['enable_timer'] ?? false;
$countdown_minutes = $settings['timer_duration'] ?? 15;
// Using a fixed message for now as we don't have a specific msg input in the builder yet, 
// but we can add it later if needed.
$countdown_msg = 'Your cart is reserved for [timer] minutes!';

$show_announcement = $settings['show_announcement'] ?? false;
$announcement = $settings['announcement_text'] ?? '';
?>
<div x-data="beeCart(<?php echo esc_attr($countdown_minutes); ?>)"
    @added_to_cart.window="openCart()"
    @open-bee-cart.window="openCart()"
    class="bee-cart-alpine-wrap">

    <div class="bee-cart-overlay" :class="{'is-active': isOpen}" @click="closeCart()"></div>
    <div class="bee-cart-drawer" id="bee-cart-drawer" :class="{'is-active': isOpen}">
        <div class="bee-cart-header">
            <div class="bee-cart-header-top">
                <h3 class="bee-cart-title"><?php echo esc_html($heading); ?></h3>
                <button class="bee-cart-close" @click="closeCart()" aria-label="Close cart">&times;</button>
            </div>




        </div>

        <div class="bee-cart-body-wrap" id="bee-cart-content" :class="{'is-loading': isLoading}">
            <div x-html="cartHtml"></div>
            <!-- Initial content gets loaded via AJAX on open -->
            <div class="bee-cart-loading" x-show="isLoading" style="display: none;">
                <div class="bee-cart-spinner"></div>
            </div>
        </div>
    </div>
</div>