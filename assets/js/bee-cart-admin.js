jQuery(document).ready(function ($) {
  const $preview = $(".z-10"); // the preview container
  const $goalsList = $("#bee-goals-list");

  // Tab switching logic
  const tabBtns = document.querySelectorAll(".tab-btn");
  const tabPanes = document.querySelectorAll(".tab-pane");

  tabBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      tabBtns.forEach((b) => {
        b.classList.remove("bg-gray-100", "text-gray-900");
        b.classList.add("text-gray-500");
      });
      btn.classList.add("bg-gray-100", "text-gray-900");
      btn.classList.remove("text-gray-500");

      tabPanes.forEach((p) => {
        p.classList.add("hidden");
        p.classList.remove("block");
      });
      const target = btn.getAttribute("data-target");
      document.getElementById(target).classList.remove("hidden");
      document.getElementById(target).classList.add("block");
    });
  });

  function updatePreviewColors(color) {
    document.querySelectorAll('[style*="background-color"]').forEach((el) => {
      if (el.closest(".relative.z-10")) {
        if (el.classList.contains("bg-gray-900")) {
          el.style.backgroundColor = color;
        }
      }
    });
    document.querySelectorAll('[style*="color:"]').forEach((el) => {
      if (el.classList.contains("text-gray-900")) {
        el.style.color = color;
      }
    });
  }

  // Color picker sync
  $('input[type="color"]').on("input", function (e) {
    const hexInput = $(this).parent().next("input");
    hexInput.val(e.target.value);
    updatePreviewColors(e.target.value);
  });

  // Watch for checkbox changes
  $("#enable_coupon").on("change", function (e) {
    $("#preview-coupon-section").css(
      "display",
      e.target.checked ? "flex" : "none",
    );
  });

  $("#enable_badges").on("change", function (e) {
    $("#preview-badges-section").css(
      "display",
      e.target.checked ? "flex" : "none",
    );
  });

  // Add Goal Handler
  $("#bee-add-goal").on("click", function () {
    const $firstItem = $(".bee-goal-item").first();
    if ($firstItem.length) {
      const $item = $firstItem.clone();
      $item.find("input").val("");
      $item.find(".bee-icon-select").val("star");
      $goalsList.append($item);
    } else {
      // Create fresh if empty
      const html = `
      <div class="bee-goal-item rounded-lg border border-gray-200 bg-white p-4 shadow-sm relative group">
          <button class="bee-remove-goal absolute -top-2 -right-2 rounded-full bg-red-500 text-white w-6 h-6 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity shadow-sm">
              <span class="dashicons dashicons-no-alt text-sm"></span>
          </button>
          <div class="grid gap-3">
              <div class="grid grid-cols-2 gap-3">
                  <div class="space-y-1.5">
                      <label class="text-xs text-gray-500">Threshold</label>
                      <input type="number" value="" class="bee-goal-threshold flex h-9 w-full rounded-md border border-gray-300 bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
                  </div>
                  <div class="space-y-1.5">
                      <label class="text-xs text-gray-500">Icon</label>
                      <select class="bee-icon-select flex h-9 w-full items-center justify-between rounded-md border border-gray-300 bg-transparent px-3 py-1 text-sm shadow-sm ring-offset-white focus:outline-none focus:ring-1 focus:ring-ring">
                          <option value="truck">Truck</option>
                          <option value="tag">Tag</option>
                          <option value="gift">Gift</option>
                          <option value="star" selected>Star</option>
                          <option value="credit-card">Card</option>
                          <option value="check">Check</option>
                          <option value="shopping-bag">Bag</option>
                      </select>
                  </div>
              </div>
              <div class="space-y-1.5">
                  <label class="text-xs text-gray-500">Reward Label</label>
                  <input type="text" value="" class="bee-goal-label flex h-9 w-full rounded-md border border-gray-300 bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring">
              </div>
          </div>
      </div>`;
      $goalsList.append(html);
    }
  });

  // Remove Goal Handler
  $(document).on("click", ".bee-remove-goal", function () {
    $(this).closest(".bee-goal-item").remove();
  });

  // Save Settings Handler
  $("#bee-save-settings").on("click", function () {
    const $btn = $(this);
    const goals = [];

    $(".bee-goal-item").each(function () {
      const threshold = $(this).find(".bee-goal-threshold").val();
      const label = $(this).find(".bee-goal-label").val();
      const icon = $(this).find(".bee-icon-select").val();

      if (threshold) {
        goals.push({ threshold, label, icon });
      }
    });

    const settings = {
      progress_type: $('select[name="progress_type"]').val(),
      goals: goals,
      primary_color: $('input[name="primary_color"]').val(),
      enable_coupon: $("#enable_coupon").prop("checked"),
      enable_badges: $("#enable_badges").prop("checked"),
    };

    const originalText = $btn.text();
    $btn.prop("disabled", true).text("Saving...");

    $.ajax({
      url: beeCartAdminData.ajax_url,
      type: "POST",
      data: {
        action: "beecart_save_settings",
        security: beeCartAdminData.nonce,
        settings: JSON.stringify(settings),
      },
      success: function (response) {
        if (response.success) {
          $btn.text("Saved!");
          setTimeout(() => {
            $btn.prop("disabled", false).text(originalText);
          }, 2000);
        }
      },
      error: function () {
        $btn.text("Error");
        setTimeout(() => {
          $btn.prop("disabled", false).text(originalText);
        }, 2000);
      },
    });
  });
});
