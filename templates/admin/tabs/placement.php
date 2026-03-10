<?php if (! defined('ABSPATH')) exit; ?>
<div x-show="$store.admin.activeTab === 'placement'" class="tab-pane p-6" style="display: none;">
    <h2 class="text-lg font-semibold mt-0 mb-6 flex items-center gap-2"><span class="dashicons dashicons-layout"></span> Placement</h2>
    <p class="text-sm text-gray-500 mb-6">Manage how and where the cart drawer appears on your site.</p>

    <div class="space-y-6">
        <div class="flex items-center space-x-2">
            <input type="checkbox" id="enable_cart_drawer" name="enable_cart_drawer" class="peer h-4 w-4 shrink-0 rounded-sm border border-gray-900 ring-offset-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 data-[state=checked]:bg-gray-900 data-[state=checked]:text-white" <?php checked($settings['enable_cart_drawer'] ?? true); ?>>
            <label for="enable_cart_drawer" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
                Enable Cart Drawer Site-wide
            </label>
        </div>

        <div class="space-y-2">
            <label class="text-sm font-medium">Cart Drawer Position</label>
            <select name="cart_position" class="flex h-10 w-full items-center justify-between rounded-md border border-gray-300 bg-white px-3 py-2 text-sm ring-offset-white placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 appearance-none">
                <option value="right" <?php selected($settings['cart_position'] ?? 'right', 'right'); ?>>Right Side</option>
                <option value="left" <?php selected($settings['cart_position'] ?? 'right', 'left'); ?>>Left Side</option>
            </select>
        </div>

        <div class="flex items-center space-x-2">
            <input type="checkbox" id="auto_open_cart" name="auto_open_cart" class="peer h-4 w-4 shrink-0 rounded-sm border border-gray-900 ring-offset-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 data-[state=checked]:bg-gray-900 data-[state=checked]:text-white" <?php checked($settings['auto_open_cart'] ?? true); ?>>
            <label for="auto_open_cart" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
                Auto open on Add to cart
            </label>
        </div>

        <div class="space-y-2">
            <label class="text-sm font-medium">Show Cart icon on menu</label>
            <?php $menus = wp_get_nav_menus(); ?>
            <select name="menu_placement" class="flex h-10 w-full items-center justify-between rounded-md border border-gray-300 bg-white px-3 py-2 text-sm ring-offset-white placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 appearance-none">
                <option value="none" <?php selected($settings['menu_placement'] ?? 'none', 'none'); ?>>None</option>
                <?php foreach ($menus as $menu) : ?>
                    <option value="<?php echo esc_attr($menu->slug); ?>" <?php selected($settings['menu_placement'] ?? 'none', $menu->slug); ?>>
                        <?php echo esc_html($menu->name); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <p class="text-xs text-gray-500 mt-1">Select a menu to automatically append the cart icon.</p>
        </div>

        <div class="bg-blue-50 p-4 border border-blue-100 rounded-lg">
            <h3 class="text-sm font-semibold text-blue-900 mt-0 mb-2">Shortcode & Snippets</h3>
            <p class="text-sm text-blue-800 mb-3">You can use these shortcodes to place the cart icon manually on any page, menu, or builder.</p>
            <div class="flex items-center gap-2">
                <code class="px-2 py-1 bg-white text-blue-900 border border-blue-200 rounded text-xs select-all">[bee_cart_icon]</code>
                <span class="text-xs text-blue-700">Displays the floating cart toggle button.</span>
            </div>
        </div>
    </div>
</div>