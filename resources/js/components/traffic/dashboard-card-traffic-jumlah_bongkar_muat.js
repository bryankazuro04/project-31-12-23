import {
  Chart,
  BarController,
  BarElement,
  LinearScale,
  TimeScale,
  Tooltip,
  Legend,
} from "chart.js/auto";
import "chartjs-adapter-moment";
import { formatDate, month, showFormattedDate } from "../../utils";
import moment from "moment";

Chart.register(
  BarController,
  BarElement,
  LinearScale,
  TimeScale,
  Tooltip,
  Legend
);

export const trafficJumlahBongkarMuatChart = () => {
  const ctx = document.getElementById("trafficJumlahBongkarMuatChart");
  if (!ctx) return;

  const darkMode = localStorage.getItem("dark-mode") === "true",
    gridColor = {
      light: "#f1f5f9",
      dark: "#334155",
    },
    borderColor = {
      light: "rgb(54, 162, 235)",
      dark: "rgb(25, 245, 215)",
    },
    textColor = {
      light: "#aaa",
      dark: "rgb(12, 255, 255)",
    },
    tooltipBodyColor = {
      light: "#1e293b",
      dark: "#f1f5f9",
    },
    tooltipBgColor = {
      light: "#fff",
      dark: "#334155",
    },
    tooltipBorderColor = {
      light: "#e2e8f0",
      dark: "#475569",
    };

  fetch("/api/traffic-data")
    .then((response) => response.json())
    .then((data) => {
      const jumlahBongkarMuat = data.map((item) => item.jumlah_bongkar_muat);

      let date = data.map((item) => {
        const tanggal = new Date(item.created_at);
        return showFormattedDate(tanggal);
      });

      const myData = [
        {
          label: "Data Jumlah Bongkar Muat",
          data: jumlahBongkarMuat,
          borderColor: borderColor.dark,
          backgroundColor: borderColor.dark,
        },
      ];

      new Chart(ctx, {
        type: "line",
        data: {
          labels: data.length === 0 ? month : date,
          datasets: data.length === 0 ? [] : myData,
        },
        options: {
          layout: {
            padding: {
              top: 12,
              bottom: 16,
              left: 20,
              right: 20,
            },
          },
          scales: {
            y: {
              border: {
                display: false,
              },
              ticks: {
                maxTicksLimit: 5,
                color: "#aaa",
              },
              grid: {
                color: darkMode ? gridColor.dark : gridColor.light,
              },
            },
            x: {
              type: "time",
              time: {
                parser: "DD-MM-YYYY",
                unit: "month",
                displayFormats: {
                  month: "MMM YY",
                },
              },
              border: {
                display: false,
              },
              grid: {
                display: false,
              },
              ticks: {
                maxRotation: 0,
                color: darkMode ? textColor.dark : textColor.light,
              },
              suggestedMin: moment().subtract(1, "year").startOf("year"),
              suggestedMax: moment().endOf("year"),
            },
          },
          plugins: {
            legend: {
              display: false,
            },
            htmlLegend: {
              containerId: "traffic-jumlah_bongkar_muat-data-legend",
            },
            tooltip: {
              callbacks: {
                title: (date) => formatDate(date[0].label),
                label: (context) =>
                  `${context.parsed.y} ${context.dataset.label}`,
              },
              titleColor: darkMode
                ? tooltipBodyColor.dark
                : tooltipBodyColor.light,
              bodyColor: darkMode
                ? tooltipBodyColor.dark
                : tooltipBodyColor.light,
              backgroundColor: darkMode
                ? tooltipBgColor.dark
                : tooltipBgColor.light,
              borderColor: darkMode
                ? tooltipBorderColor.dark
                : tooltipBorderColor.light,
            },
          },
          interaction: {
            intersect: false,
            mode: "nearest",
          },
          maintainAspectRatio: false,
        },
        plugins: [
          {
            id: "htmlLegend",
            afterUpdate(c, args, options) {
              const legendContainer = document.getElementById(
                  options.containerId
                ),
                ul = legendContainer.querySelector("ul");

              if (!ul) return;

              while (ul.firstChild) {
                ul.firstChild.remove();
              }

              const items = c.options.plugins.legend.labels.generateLabels(c);

              items.forEach((item) => {
                const li = document.createElement("li"),
                  button = document.createElement("button"),
                  box = document.createElement("div"),
                  labelContainer = document.createElement("span"),
                  value = document.createElement("span"),
                  label = document.createElement("span");

                // Li element style
                li.classList.add("mr-4");

                // Button element style
                button.classList.add("inline-flex", "items-center");
                button.style.opacity = item.hidden ? ".3" : "";
                button.onclick = () => {
                  c.setDatasetVisibility(
                    item.datasetIndex,
                    !c.isDatasetVisible(item.datasetIndex)
                  );
                  c.update();
                };

                // Box element style
                box.classList.add("w-6", "mr-2", "pointer-events-none");
                box.style.backgroundColor = item.fillStyle;
                box.style.height = "0.5rem";

                // Label element style
                labelContainer.classList.add("flex", "items-center", "text-xs");

                // Value element style
                value.classList.add(
                  "text-slate-800",
                  "dark:text-slate-100",
                  "font-bold",
                  "mr-2",
                  "pointer-events-none"
                );

                // Label element style
                label.classList.add("text-slate-500", "dark:text-slate-400");

                const { data } = c.data.datasets[item.datasetIndex];
                data.slice(0, 3);

                let totalValue = data.map((item) => {
                  return parseInt(item);
                });

                const theValue = totalValue.reduce((a, b) => a + b),
                  valueText = document.createTextNode(`${theValue} Ton`),
                  labelText = document.createTextNode(item.text);

                value.appendChild(valueText);
                label.appendChild(labelText);
                li.appendChild(button);
                button.appendChild(box);
                button.appendChild(labelContainer);
                labelContainer.appendChild(value);
                labelContainer.appendChild(label);
                ul.appendChild(li);
              });
            },
          },
        ],
      });
    });
};
