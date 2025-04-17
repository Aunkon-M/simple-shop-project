document.querySelectorAll("a[href^='#']").forEach(anchor => {
    anchor.addEventListener("click", function(e) {
      e.preventDefault();

      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        target.scrollIntoView({ behavior: "smooth" });
      }
      function toggleDarkMode() {
        document.body.classList.toggle("dark");
        localStorage.setItem("mode", document.body.classList.contains("dark") ? "dark" : "light");
      }
      
    });
  });
  