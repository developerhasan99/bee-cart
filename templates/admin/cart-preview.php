<?php if (! defined('ABSPATH')) exit; ?>
<div class="fixed top-8 right-0 bottom-0 z-10 w-[420px] bg-white shadow-lg border-l border-gray-200 flex flex-col transition-all duration-300">
    <!-- Side Cart Header Preview -->
    <div class="p-6 border-0 border-b border-solid border-gray-200 flex justify-between items-center">
        <h2 class="text-lg font-semibold my-0">Your Cart</h2>
        <button class="bg-gray-100 border-0 rounded size-8 flex items-center justify-center cursor-pointer">
            <span class="dashicons dashicons-no-alt"></span>
        </button>
    </div>

    <!-- Side Cart Body Preview -->
    <div class="flex-1 overflow-y-auto p-6 space-y-6">

        <!-- Progress Bar Component -->
        <div class="bg-gray-50 rounded-lg p-4">
            <div class="text-sm text-center mb-3">
                You are <span class="font-bold">$45.00</span> away from <strong class="text-gray-900" style="color: <?php echo esc_attr($settings['primary_color']); ?>">Free Shipping</strong>
            </div>

            <div class="relative h-2 bg-gray-100 rounded-full overflow-visible">
                <div class="absolute top-0 left-0 h-full bg-gray-900 rounded-full transition-all duration-500" style="width: 45%; background-color: <?php echo esc_attr($settings['primary_color']); ?>;"></div>

                <!-- Checkpoints -->
                <div id="bee-preview-checkpoints" class="absolute inset-0 pointer-events-none">
                    <!-- Will be hydrated by JS, but adding dummy for visual -->
                    <div class="absolute top-1/2 -translate-y-1/2 bg-gray-900 text-white rounded-full p-1 flex items-center justify-center shadow-md border-2 border-background" style="left: 50%; width: 24px; height: 24px; transform: translate(-50%, -50%); background-color: <?php echo esc_attr($settings['primary_color']); ?>;">
                        <span class="dashicons dashicons-truck text-[12px] leading-none"></span>
                    </div>
                    <div class="absolute top-1/2 -translate-y-1/2 bg-white text-gray-500 rounded-full p-1 flex items-center justify-center shadow-sm border-2 border-muted" style="left: 100%; width: 24px; height: 24px; transform: translate(-50%, -50%);">
                        <span class="dashicons dashicons-tag text-[12px] leading-none"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cart Item Example -->
        <div class="flex gap-4">
            <div class="w-20 h-20 bg-gray-100 rounded-md flex items-center justify-center">
                <span class="dashicons dashicons-format-image text-3xl text-gray-300"></span>
            </div>
            <div class="flex-1 flex flex-col justify-between">
                <div class="flex justify-between items-start">
                    <div>
                        <h4 class="text-sm font-medium">Premium Leather Bag</h4>
                        <p class="text-xs text-gray-500 mt-0.5">Brown / One Size</p>
                    </div>
                    <button class="text-gray-500 hover:text-red-500 transition-colors">
                        <span class="dashicons dashicons-trash text-sm"></span>
                    </button>
                </div>
                <div class="flex justify-between items-center mt-2">
                    <div class="flex items-center border border-gray-200 rounded-md">
                        <button class="w-7 h-7 flex items-center justify-center text-gray-500 hover:bg-muted">-</button>
                        <span class="w-8 text-center text-sm font-medium">1</span>
                        <button class="w-7 h-7 flex items-center justify-center text-gray-500 hover:bg-muted">+</button>
                    </div>
                    <span class="text-sm font-semibold">$120.00</span>
                </div>
            </div>
        </div>

        <!-- Recommended Upsell -->
        <div class="pt-4 border-t border-gray-200">
            <h4 class="text-sm font-semibold mb-3">You might also like</h4>
            <div class="flex items-center gap-3 p-3 border border-gray-200 rounded-lg">
                <div class="w-12 h-12 bg-gray-100 rounded shrink-0"></div>
                <div class="flex-1">
                    <h5 class="text-sm font-medium leading-none mb-1">Leather Polish</h5>
                    <span class="text-sm text-gray-500">$15.00</span>
                </div>
                <button class="shrink-0 h-8 px-3 text-xs font-medium bg-gray-900 text-white rounded-md" style="background-color: <?php echo esc_attr($settings['primary_color']); ?>;">Add</button>
            </div>
        </div>
    </div>
    <!-- Side Cart Footer Preview -->
    <div class="p-4 border-t border-gray-200 bg-white space-y-4">
        <div id="preview-coupon-section" class="flex gap-2" style="<?php echo empty($settings['enable_coupon']) ? 'display: none;' : ''; ?>">
            <input type="text" placeholder="Gift card or discount code" class="flex-1 h-10 px-3 text-sm border border-gray-300 rounded-md bg-white">
            <button class="h-10 px-4 text-sm font-medium bg-gray-100 text-gray-900 rounded-md">Apply</button>
        </div>
        <div class="flex justify-between items-center text-sm font-medium">
            <span>Subtotal</span>
            <span class="text-lg font-semibold">$120.00</span>
        </div>
        <button class="w-full h-12 text-base font-semibold bg-gray-900 text-white rounded-md flex items-center justify-center gap-2 shadow-md hover:opacity-90 transition-opacity" style="background-color: <?php echo esc_attr($settings['primary_color']); ?>;">
            Checkout <span class="opacity-80">•</span> $120.00
        </button>
        <div id="preview-badges-section" class="flex justify-center gap-3 opacity-60 grayscale" style="<?php echo empty($settings['enable_badges']) ? 'display: none;' : ''; ?>">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" class="h-4" alt="PayPal">
            <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" class="h-4" alt="Visa">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b7/MasterCard_Logo.svg" class="h-4" alt="Mastercard">
        </div>
    </div>
</div>