
const labels = <? php echo json_encode(array_column($totalContr, 'category')); ?>;

const data = {
    labels: labels,
    datasets: [{
        label: 'users',
        backgroundColor: 'rgb(255, 100, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: <? php echo json_encode(array_column($totalContr, 'amount')); ?>,
                }]
            };

const config = {
    type: 'bar',
    data: data,
    options: {}
};

const myChart = new Chart(
    document.getElementById('myfirstchart'),
    config
);
