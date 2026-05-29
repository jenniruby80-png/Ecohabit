<h2>Grafik Aktivitas Admin</h2>

<canvas id="myChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode($label); ?>,
        datasets: [{
            label: 'Jumlah Aktivitas',
            data: <?= json_encode($data); ?>,
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>