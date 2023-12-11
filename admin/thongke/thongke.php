
<canvas id="myChart" style="width:100%;max-width:700px"></canvas>

<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<script>
    var thongkeData = <?php echo json_encode($list_thong_ke); ?>;

    var xValues = thongkeData.map(function(item) {
        return item.ngaytao;
    });

    var yValues1 = thongkeData.map(function(item) {
        return item.sodonhang;
    });
console.log(yValues1); 
    var yValues2 = thongkeData.map(function(item) {
        return item.tongtien;
    });

    var barColors = ["blue", "orange"];

    new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                label: "Số Đơn Hàng",
                backgroundColor: barColors[0],
                data: yValues1
            }, {
                label: "Tổng Doanh Thu",
                backgroundColor: barColors[1],
                data: yValues2
            }]
        },
        options: {
            legend: { display: true },
            title: {
                display: true,
                text: "Biểu đồ thống kê"
            }
        }
    });
</script>
