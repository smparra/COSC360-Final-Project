const xDates = [60,70,80,90,100,110,120,130,140,150];
const yPrice = [7,8,8,9,9,9,10,11,14,14,15];

new Chart("priceChart", {
  type: "line",
  data: {
    labels: xDates,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yPrice
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 6, max:16}}],
    }
  }
});