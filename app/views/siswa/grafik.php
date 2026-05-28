<!DOCTYPE html>
<html>
<head>
    <title>Grafik Progress</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<h2>Grafik Progress Kebiasaan</h2>

<canvas id="myChart"></canvas>

<script>
const labels = <?= json_encode($label ?? []); ?>;
const data = <?= json_encode($data ?? []); ?>;

console.log(labels);
console.log(data);

new Chart(document.getElementById('myChart'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Jumlah Aktivitas',
            data: data
        }]
    }
});
</script>

</body>
</html>