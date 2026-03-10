<?php if (! defined('ABSPATH')) exit; ?>
<div x-show="$store.admin.activeTab === 'design'" class="tab-pane p-6" style="display: none;">
    <h2 class="text-lg font-semibold mb-6 flex items-center gap-2"><span class="dashicons dashicons-art"></span> Design</h2>
    <div class="space-y-6">
        <div class="space-y-2">
            <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Primary Theme Color</label>
            <div class="flex items-center gap-3">
                <label class="relative cursor-pointer w-10 h-10 rounded-md border border-gray-200 shadow-sm overflow-hidden">
                    <input type="color" name="primary_color" value="<?php echo esc_attr($settings['primary_color']); ?>" class="absolute -inset-2 w-[200%] h-[200%] cursor-pointer">
                </label>
                <input type="text" value="<?php echo esc_attr($settings['primary_color']); ?>" class="flex h-10 w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm ring-offset-white file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" readonly>
            </div>
            <p class="text-sm text-gray-500">Used for buttons, progress bars, and active states.</p>
        </div>
    </div>
</div>