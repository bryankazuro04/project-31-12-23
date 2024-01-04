import "./bootstrap";

import "@fortawesome/fontawesome-free/js/all";

document.addEventListener("DOMContentLoaded", () => {
    const themeToggle = document.querySelectorAll(".theme-toggle");

    if (themeToggle.length > 0) {
        themeToggle.forEach((theme, value) => {
            if (localStorage.getItem("dark-mode") === "true") {
                theme.checked = true;
            }

            theme.addEventListener("change", () => {
                const { checked } = theme;

                themeToggle.forEach((element, i) => {
                    if (i !== value) {
                        element.checked = checked;
                    }
                });

                document.documentElement.classList.add(
                    "[&_*]:!transition-none"
                );

                if (theme.checked) {
                    document.documentElement.style.colorScheme = "dark";
                    document.documentElement.classList.add("dark");
                    document.documentElement.setAttribute("data-theme", "dark");

                    localStorage.setItem("dark-mode", true);
                    document.dispatchEvent(
                        new CustomEvent("darkMode", { detail: { mode: "on" } })
                    );
                } else {
                    document.documentElement.style.colorScheme = "light";
                    document.documentElement.classList.remove("dark");
                    document.documentElement.setAttribute(
                        "data-theme",
                        "light"
                    );
                    localStorage.setItem("dark-mode", false);
                    document.dispatchEvent(
                        new CustomEvent("darkMode", { detail: { mode: "off" } })
                    );
                }

                setTimeout(() => {
                    document.documentElement.classList.remove(
                        "[&_*]:!transition-none"
                    );
                });
            });
        });
    }
});
