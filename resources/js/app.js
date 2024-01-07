import "./bootstrap";
import "@fortawesome/fontawesome-free/js/all";
import { Chart } from "chart.js";
import { trafficKunjunganKapalChart } from "./components/traffic/dashboard-card-traffic-kunjungan_kapal";
import { trafficJumlahBongkarMuatChart } from "./components/traffic/dashboard-card-traffic-jumlah_bongkar_muat";
import { trafficGRTChart } from "./components/traffic/dashboard-card-traffic-grt";
import { trafficLOAChart } from "./components/traffic/dashboard-card-traffic-loa";
import { serviceChart } from "./components/dashboard-card-service";
import { utilizationOccupancyRatioChart } from "./components/utilization/dashboard-card-utilization-occupancy_ratio";
import { utilizationThroughPutChart } from "./components/utilization/dashboard-card-utilization-through_put";
import { productivityChart } from "./components/dashboard-card-productivity";

// Define Chart.js default settings
/* eslint-disable prefer-destructuring */
Chart.defaults.font.family = '"Inter", sans-serif';
Chart.defaults.font.weight = "500";
Chart.defaults.plugins.tooltip.borderWidth = 1;
Chart.defaults.plugins.tooltip.displayColors = false;
Chart.defaults.plugins.tooltip.mode = "nearest";
Chart.defaults.plugins.tooltip.intersect = false;
Chart.defaults.plugins.tooltip.position = "nearest";
Chart.defaults.plugins.tooltip.caretSize = 0;
Chart.defaults.plugins.tooltip.caretPadding = 20;
Chart.defaults.plugins.tooltip.cornerRadius = 4;
Chart.defaults.plugins.tooltip.padding = 8;

// Register Chart.js plugin to add a bg option for chart area
Chart.register({
  id: "chartAreaPlugin",
  // eslint-disable-next-line object-shorthand
  beforeDraw: (chart) => {
    if (
      chart.config.options.chartArea &&
      chart.config.options.chartArea.backgroundColor
    ) {
      const ctx = chart.canvas.getContext("2d");
      const { chartArea } = chart;
      ctx.save();
      ctx.fillStyle = chart.config.options.chartArea.backgroundColor;
      // eslint-disable-next-line max-len
      ctx.fillRect(
        chartArea.left,
        chartArea.top,
        chartArea.right - chartArea.left,
        chartArea.bottom - chartArea.top
      );
      ctx.restore();
    }
  },
});

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

        document.documentElement.classList.add("[&_*]:!transition-none");

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
          document.documentElement.setAttribute("data-theme", "light");
          localStorage.setItem("dark-mode", false);
          document.dispatchEvent(
            new CustomEvent("darkMode", { detail: { mode: "off" } })
          );
        }

        setTimeout(() => {
          document.documentElement.classList.remove("[&_*]:!transition-none");
        });
      });
    });
  }

  trafficKunjunganKapalChart();
  trafficJumlahBongkarMuatChart();
  trafficGRTChart();
  trafficLOAChart();
  serviceChart();
  utilizationOccupancyRatioChart();
  utilizationThroughPutChart();
  productivityChart();
});
