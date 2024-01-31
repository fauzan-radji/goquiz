const borderColor = getComputedStyle(document.body).getPropertyValue(
  "--dark-primary"
);
history.reverse();
const chart = new Chart(historyCtx, {
  type: "line",
  data: {
    labels: history.map((e) =>
      new Date(+e.finish_time).toLocaleDateString("en-US", {
        day: "2-digit",
        month: "2-digit",
        year: "2-digit",
      })
    ),
    datasets: [
      {
        label: "Riwayat Poin",
        data: history.map((e) => e.point),
        fill: true,
        borderColor: borderColor,
        tension: 0.1,
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
        title: {
          display: true,
          text: "Poin",
        },
      },
      x: {
        title: {
          display: true,
          text: "Percobaan",
        },
      },
    },
  },
});
