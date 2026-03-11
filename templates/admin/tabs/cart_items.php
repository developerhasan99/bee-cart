<?php if (! defined('ABSPATH')) exit; ?>
<div x-show="$store.admin.activeTab === 'cart_items'" class="tab-pane p-6" style="display: none;">
    <h2 class="text-lg font-semibold mt-0 mb-2 flex items-center gap-2">
        <span class="dashicons dashicons-cart"></span> Cart items
    </h2>
    <p class="text-sm text-gray-500 mb-8">Customize how cart items are displayed inside the drawer.</p>

    <div class="space-y-8">
        <!-- Visibility Section -->
        <div>
            <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-500 mb-4">Visibility</h3>
            <div class="space-y-4">
                <div class="flex items-center space-x-2">
                    <input type="checkbox" id="show_item_images" x-model="$store.admin.settings.show_item_images" class="peer h-4 w-4 shrink-0 rounded-sm border border-gray-900 ring-offset-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2">
                    <label for="show_item_images" class="text-sm font-medium leading-none">Show product images</label>
                </div>

                <div class="flex items-center space-x-2">
                    <input type="checkbox" id="show_item_total" x-model="$store.admin.settings.show_item_total" class="peer h-4 w-4 shrink-0 rounded-sm border border-gray-900 ring-offset-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2">
                    <label for="show_item_total" class="text-sm font-medium leading-none">Show item subtotal</label>
                </div>
            </div>
            <p class="text-xs text-gray-400 mt-4">Control which elements of the cart items should be visible to customers.</p>
        </div>

        <!-- Quantity Selector Section -->
        <div>
            <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-500 mb-4">Quantity Selector</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="qty_selector_type" class="text-sm font-medium">Selector Style</label>
                    <select id="qty_selector_type" x-model="$store.admin.settings.qty_selector_type" class="flex h-10 w-full items-center justify-between rounded-md border border-gray-300 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring transition-colors">
                        <option value="boxed">Boxed with +/- buttons</option>
                        <option value="simple">Simple input field</option>
                    </select>
                    <p class="text-xs text-gray-400">Choose the interaction style for quantity changes.</p>
                </div>
            </div>
        </div>
    </div>
</div>