window.onload = ()=>{
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Elecciones', 'Votos'],
          ['PP',     34.21],
          ['PSOE',      30.19],
          ['Vox',  9.63],
          ['Ahora Republicas', 4.91],
          ['Sumar',    4.67]
        ]);

        var options = {
          title: 'Elecciones España'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
      
     /*function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Visitations', { role: 'style' } ],
          ['2010', 10, 'color: gray'],
          ['2020', 14, 'color: #76A7FA'],
          ['2030', 16, 'opacity: 0.2'],
          ['2040', 22, 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],
          ['2050', 28, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']
        ]);

        var options = {
          title: 'Visitations over the years'
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('barchart'));

        chart.draw(data, options);
    }
    */
    var data = google.visualization.arrayToDataTable([
        ['Element', 'Density', { role: 'style' }],
        ['Copper', 8.94, '#b87333'],            // RGB value
        ['Silver', 10.49, 'silver'],            // English color name
        ['Gold', 19.30, 'gold'],
        ['Platinum', 21.45, 'color: #e5e4e2' ], // CSS-style declaration
     ]);
     function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Visitations', { role: 'style' } ],
          ['2010', 10, 'color: gray'],
          ['2020', 14, 'color: #76A7FA'],
          ['2030', 16, 'opacity: 0.2'],
          ['2040', 22, 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],
          ['2050', 28, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']
        ]);

        var options = { 
          title: 'Visitations over the years'
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('barchart'));

        chart.draw(data, options);
    }
}