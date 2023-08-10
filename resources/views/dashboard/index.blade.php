@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
  
  @include('dashboard._counting')
  @include('dashboard._graph')
  {{-- @include('layouts.templates.overview') --}}
  
@endsection

@section('scripts')

<script>
  var ctx = document.getElementById("chart-bars").getContext("2d");

  var monthlyCounts = @json($monthlyCounts);
  
  var labels = [];
  var data = [];

  for (var i = 0; i < monthlyCounts.length; i++) {
    labels.push(getShortMonthName(monthlyCounts[i].month));
    data.push(monthlyCounts[i].count);
  }

  console.log(labels);
  console.log(data);

  new Chart(ctx, {
    type: "bar",
    data: {
      labels,
      datasets: [{
        label: "Laporan",
        tension: 0.4,
        borderWidth: 0,
        borderRadius: 4,
        borderSkipped: false,
        backgroundColor: "#fff",
        data,
        maxBarThickness: 6
      }, ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
          },
          ticks: {
            suggestedMin: 0,
            suggestedMax: 500,
            beginAtZero: true,
            padding: 15,
            font: {
              size: 14,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
            color: "#fff"
          },
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false
          },
          ticks: {
            display: false
          },
        },
      },
    },
  });


  var ctx2 = document.getElementById("chart-line").getContext("2d");

  var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

  gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
  gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
  gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

  var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

  gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
  gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
  gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors


  var gradientStroke3 = ctx2.createLinearGradient(0, 230, 0, 50);

  gradientStroke3.addColorStop(1, 'rgba(15, 185, 177,0.2)');
  gradientStroke3.addColorStop(0.2, 'rgba(72,72,176,0.0)');
  gradientStroke3.addColorStop(0, 'rgba(15, 185, 177,0)'); //purple colors

  var gradientStroke4 = ctx2.createLinearGradient(0, 230, 0, 50);

  gradientStroke4.addColorStop(1, 'rgba(66, 134, 244,0.15)');
  gradientStroke4.addColorStop(0.2, 'rgba(72,72,176,0.0)');
  gradientStroke4.addColorStop(0, 'rgba(66, 134, 244,0)'); //purple colors

  const gradientStroke = [gradientStroke1, gradientStroke2, gradientStroke3, gradientStroke4];

  const borderColors = ["#cb0c9f", "#3A416F", "#0FB9B1", "#4286f4"];

  const monthlyImt = @json($monthlyImt);

  var labelsImt = [];
  var dataImt = [];

  for (var i = 0; i < monthlyImt.length; i++) {
    dataImt.push({
      label: monthlyImt[i].status_imt,
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: borderColors[i],
      borderWidth: 3,
      backgroundColor: gradientStroke[i],
      fill: true,
      data: [],
      maxBarThickness: 6
    });
  }

  const currentDate = new Date();
  const currentMonth = currentDate.getMonth();
  const startMonth = (currentMonth - 11 + 12) % 12 + 1; // Bulan 11 bulan yang lalu
  const endMonth = currentMonth + 1; // Bulan saat ini

  const monthRange = getMonthRange(startMonth, endMonth);
  
  for (var i = 0; i < monthRange.length; i++) {
    labelsImt.push(getShortMonthName(monthRange[i]));
    
    for (var j = 0; j < monthlyImt.length; j++) {

      if (monthlyImt[j].count[monthRange[i]]) {
        const count = monthlyImt[j].count[monthRange[i]];
        dataImt[j].data.push(count);
      } else {
        dataImt[j].data.push(0);
      }
    }

  }

  new Chart(ctx2, {
    type: "line",
    data: {
      labels: labelsImt,
      datasets: dataImt,
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            padding: 10,
            color: '#b2b9bf',
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: '#b2b9bf',
            padding: 20,
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });

  function getShortMonthName(monthNumber) {
    const months = [
        'jan', 'feb', 'mar', 'apr', 'may', 'jun',
        'jul', 'aug', 'sep', 'oct', 'nov', 'dec'
    ];

    return months[monthNumber - 1];
  }

  function getMonthRange(startMonth, endMonth) {
    const months = [
        'jan', 'feb', 'mar', 'apr', 'may', 'jun',
        'jul', 'aug', 'sep', 'oct', 'nov', 'dec'
    ];
    const monthsNumber = [
        1, 2, 3, 4, 5, 6,
        7, 8, 9 ,10, 11, 12
    ];

    const currentMonth = new Date().getMonth();
    const result = [];

    for (let i = currentMonth - 11; i <= currentMonth; i++) {
        let index = i;
        if (i < 0) {
            index = 12 + i;
        }
        result.push(monthsNumber[index]);
    }

    return result;
    // console.log(result);
    // console.log(result.slice(startMonth - 1, endMonth));

    // return result.slice(startMonth - 1, endMonth);
  }
</script>
@endsection