import resolveConfig from "tailwindcss/resolveConfig";

export const tailwindConfig = () => {
  return resolveConfig("./tailwind.config.js");
};

export const showFormattedDate = (date) => {
  const options = { day: "2-digit", month: "2-digit", year: "numeric" };
  return new Date(date)
    .toLocaleDateString("id-ID", options)
    .split("/")
    .join("-");
};

export const formatDate = (dateString) => {
  const dateObj = new Date(dateString);
  return dateObj.toLocaleString("id-ID", {
    day: "2-digit",
    month: "short",
    year: "numeric",
  });
};

export const month = [
  "Jan",
  "Feb",
  "Mar",
  "Apr",
  "Mei",
  "Jun",
  "Jul",
  "Aug",
  "Sep",
  "Oct",
  "Nov",
  "Des",
];
