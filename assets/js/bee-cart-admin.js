document.addEventListener("alpine:init", () => {
  Alpine.store("admin", {
    activeTab: "design",

    setTab(tab) {
      this.activeTab = tab;
    },
  });
});
