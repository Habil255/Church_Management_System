<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const labels = <?php echo json_encode(array_column($output,'month')); ?>;
  
    const data = {
      labels: labels,
      datasets: [{
        label: 'Users',
        backgroundColor: 'rgb(255, 100, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: <?php echo json_encode(array_column($output,'users')); ?>,
      }]
    };
  
    const config = {
      type: 'line',
      data: data,
      options: {}
    };
  </script>
  <script>
    const myChart = new Chart(
      document.getElementById('myfirstchart'),
      config
    );
  </script>
