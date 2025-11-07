import "./bootstrap";
// Auto + manual dark mode toggle

const html = document.documentElement;
const checkbox = document.getElementById("switch");

function applyTheme(mode) {
    if (mode === "dark") {
        html.classList.add("dark");
        checkbox.checked = true;
    } else {
        html.classList.remove("dark");
        checkbox.checked = false;
    }
}

function toggleTheme() {
    const current = localStorage.getItem("theme") === "dark" ? "light" : "dark";
    localStorage.setItem("theme", current);
    applyTheme(current);
}

// Detect stored or system preference
const storedTheme = localStorage.getItem("theme");
const systemPrefersDark = window.matchMedia(
    "(prefers-color-scheme: dark)"
).matches;
const initialTheme = storedTheme || (systemPrefersDark ? "dark" : "light");
applyTheme(initialTheme);

// Watch system changes (auto mode)
window
    .matchMedia("(prefers-color-scheme: dark)")
    .addEventListener("change", (e) => {
        if (!localStorage.getItem("theme")) {
            applyTheme(e.matches ? "dark" : "light");
        }
    });

// Bind switch to same logic
checkbox.addEventListener("change", () => {
    const mode = checkbox.checked ? "dark" : "light";
    localStorage.setItem("theme", mode);
    applyTheme(mode);
});

// Navbar mobile toggle
document.addEventListener('DOMContentLoaded', () => {
  const menuBtn = document.getElementById('menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');
  const menuIcon = document.getElementById('menu-icon');
  const closeIcon = document.getElementById('close-icon');

  menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
    menuIcon.classList.toggle('hidden');
    closeIcon.classList.toggle('hidden');
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const menuBtn = document.getElementById('menu-btn');
  const mobileNav = document.getElementById('mobile-nav');

  menuBtn?.addEventListener('click', () => {
    const expanded = menuBtn.getAttribute('aria-expanded') === 'true';
    menuBtn.setAttribute('aria-expanded', !expanded);
    mobileNav.classList.toggle('hidden');
  });
});


