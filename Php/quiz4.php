<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz4 (PHP)</title>
    <style>
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <canvas id="barChart"></canvas>
            </div>

            <div class="col-6">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>

</body>

</html>

<script>
$(document).ready(function() {

    var urlApi = "https://www.trcloud.co/test/api.php";
    $.ajax({
        url: urlApi,
        type: "get",
        dataType: "json",
        success: function(res) {
            // console.log(res);
            var city = [];
            var population = [];

            $.each(res, function(index, data) {
                city.push(data.City);
                population.push(data.Population);
            });

            // console.log(city);
            // console.log(population);

            //barChart
            // var ctx1 = $("#barChart");
            var barChart = generateChart($("#barChart"), "bar", city, population);

            //pieChart
            // var ctx2 = $("#pieChart");
            var pieChart = generateChart($("#pieChart"), "pie", city, population);
        },
        error: function(xhr, status, error) {
            console.error("Error:", xhr);
            console.error("Status:", status);
            console.error("Error message:", error);

            alert("เกิดข้อผิดพลาดในการโหลดข้อมูล: " + error);
        }
    });

    function generateChart(ctx, typeChart, dataCity, dataPopulation) {
        var chart = new Chart(ctx, {
            type: typeChart,
            data: {
                labels: dataCity,
                datasets: [{
                    label: 'Range by Country',
                    data: dataPopulation,
                    backgroundColor: [
                        'rgba(255, 99, 99, 0.3)', //red
                        'rgba(55, 160, 230, 0.3)', //blue
                        'rgba(255, 200, 80, 0.3)', //yellow
                        'rgba(75, 190, 190, 0.3)', //green
                        'rgba(150, 100, 255, 0.3)', //purple
                        'rgba(255, 160, 65, 0.3)', //orange
                        'rgba(255, 100, 130, 0.3)', //red
                        'rgba(55, 165, 235, 0.3)', //blue
                        'rgba(255, 205, 90, 0.3)', //yellow
                        'rgba(80, 194, 195, 0.3)', //green
                        'rgba(155, 105, 255, 0.3)', //purple
                        'rgba(255, 155, 65, 0.3)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 99, 1)', //red
                        'rgba(55, 160, 230, 1)', //blue
                        'rgba(255, 200, 80, 1)', //yellow
                        'rgba(75, 190, 190, 1)', //green
                        'rgba(150, 100, 255, 1)', //purple
                        'rgba(255, 160, 65, 1)', //orange
                        'rgba(255, 100, 130, 1)', //red
                        'rgba(55, 165, 235, 1)', //blue
                        'rgba(255, 205, 90, 1)', //yellow
                        'rgba(80, 194, 195, 1)', //green
                        'rgba(155, 105, 255, 1)', //purple
                        'rgba(255, 155, 65, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
});
</script>