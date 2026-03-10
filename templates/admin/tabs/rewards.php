<?php if (! defined('ABSPATH')) exit; ?>
<div x-show="$store.admin.activeTab === 'rewards'" class="tab-pane p-6" style="display: none;">
    <h2 class="text-lg font-semibold mt-0 mb-6 flex items-center gap-2"><span class="dashicons dashicons-awards"></span> Progress Rewards</h2>
    <div class="space-y-6">
        <div class="space-y-2">
            <label class="text-sm font-medium">Threshold Basis</label>
            <select name="progress_type" class="flex h-10 w-full items-center justify-between rounded-md border border-gray-300 bg-white px-3 py-2 text-sm ring-offset-white placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 appearance-none">
                <option value="subtotal" <?php selected($settings['progress_type'], 'subtotal'); ?>>Cart Subtotal ($)</option>
                <option value="quantity" <?php selected($settings['progress_type'], 'quantity'); ?>>Total Item Quantity</option>
            </select>
        </div>

        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <label class="text-sm font-medium">Reward Checkpoints</label>
            </div>

            <div id="bee-goals-list" class="space-y-3">
                <?php foreach ($settings['goals'] as $index => $goal): ?>
                    <div class="bee-goal-item rounded-lg border border-gray-200 bg-white p-4 shadow-sm relative group">
                        <button class="bee-remove-goal absolute -top-2 -right-2 rounded-full bg-red-500 text-white w-6 h-6 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity shadow-sm">
                            <span class="dashicons dashicons-no-alt text-sm"></span>
                        </button>
                        <div class="grid gap-3">
                            <div class="grid grid-cols-2 gap-3">
                                <div class="space-y-1.5">
                                    <label class="text-xs text-gray-500">Threshold</label>
                                    <input type="number" value="<?php echo esc_attr($goal['threshold']); ?>" class="bee-goal-threshold flex h-9 w-full rounded-md border border-gray-300 bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                                </div>
                                <div class="space-y-1.5">
                                    <label class="text-xs text-gray-500">Icon</label>
                                    <select class="bee-icon-select flex h-9 w-full items-center justify-between rounded-md border border-gray-300 bg-transparent px-3 py-1 text-sm shadow-sm ring-offset-white focus:outline-none focus:ring-1 focus:ring-ring">
                                        <?php foreach ($icons as $val => $name): ?>
                                            <option value="<?php echo esc_attr($val); ?>" <?php selected($goal['icon'] ?? '', $val); ?>><?php echo esc_html($name); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-xs text-gray-500">Reward Label</label>
                                <input type="text" value="<?php echo esc_attr($goal['label']); ?>" class="bee-goal-label flex h-9 w-full rounded-md border border-gray-300 bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="button" id="bee-add-goal" class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-white transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-gray-300 bg-white hover:bg-gray-100 hover:text-gray-900 h-9 px-4 py-2">
                <span class="dashicons dashicons-plus mr-2 text-sm"></span> Add Goal Checkpoint
            </button>
        </div>
    </div>
</div>