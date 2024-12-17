<div>
    <canvas id="genderChart"></canvas>
    
</div>

<script>
    // The Gender Chart
    const genderChart = document.getElementById('genderChart');

    new Chart(genderChart, {
        type: 'doughnut',
        data: {
            labels: ['Male', 'Female'],
            datasets: [{
                label: 'Gender',
                data: [{{ $males }},
                    {{ $totalNumber - $males }}
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgb(54, 162, 235)',
                    'rgb(255, 99, 132)',
                ],
                borderWidth: 1
            }],
        },
        options: {}
    });
</script>
