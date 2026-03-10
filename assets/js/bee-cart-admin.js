document.addEventListener("alpine:init", () => {
  Alpine.store("admin", {
    activeTab: "placement",

    setTab(tab) {
      this.activeTab = tab;
    },
  });
});
