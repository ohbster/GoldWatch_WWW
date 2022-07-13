const CHART = document.getElementById("lineChart");
console.log(CHART)
const lineChart = new Chart(CHART, {
	type: 'line',
	data: data,
	
});