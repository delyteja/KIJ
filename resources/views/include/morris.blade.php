<script>
$(document).ready(function() {
$(function() {


    Morris.Bar({
        element: 'morris-bar-pemasukan',
        data: [<?php echo $pemasukan_chart_fix; ?>],
        xkey: 'm',
        ykeys: 'x',
        labels: ['Series A'],
        hideHover: 'auto',
        resize: true,
        stacked: true
    });

    Morris.Bar({
        element: 'morris-bar-pengeluaran',
        data: [<?php echo $pengeluaran_chart_fix; ?>],
        xkey: 'm',
        ykeys: 'x',
        // labels: ['Series A', 'Series B'],
        hideHover: 'auto',
        resize: true
    });    
    
    Morris.Donut({
        element: 'morris-donut-pemasukan',
        data: [<?php echo $pemasukan_pie_fix; ?>],
        resize: true
    });

    Morris.Donut({
        element: 'morris-donut-pengeluaran',
        data: [<?php echo $pengeluaran_pie_fix; ?>],
        resize: true
    });
});
});
</script>