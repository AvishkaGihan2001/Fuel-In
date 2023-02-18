<?php include 'header.php';
include './config/db.php';

$pendingQuery = "SELECT Count(*) as PendingCount FROM fuelrequest WHERE status= 'Pending'";
$pendingResult = mysqli_fetch_assoc(mysqli_query($con, $pendingQuery));

$pendingCount = $pendingResult['PendingCount'];


$approvalQuery = "SELECT Count(*) as ApprovalCount FROM fuelrequest WHERE status= 'Approval'";
$approvalResult = mysqli_fetch_assoc(mysqli_query($con, $approvalQuery));

$approvalCount = $approvalResult['ApprovalCount'];


$rejectQuery = "SELECT Count(*) as RejectCount FROM fuelrequest WHERE status= 'Reject'";
$rejectResult = mysqli_fetch_assoc(mysqli_query($con, $rejectQuery));

$rejectCount = $rejectResult['RejectCount'];

?>




<style>
  .boxo1 {
    position: relative;
    text-align: center;
    color: white;
  }

  .bottom-left {
    position: absolute;
    bottom: 8px;
    left: 16px;
  }

  #container {
    width: 100%;
    
  }

  #left {
    float: left;
    width: 100px;
  }

  #right {
    float: right;
    width: 100px;
  }

  #center {
    margin: 0 auto;
    width: 100px;
  }

  #size{
    font-size: larger;
  }
</style>
<div class="boxo1">
  <img src="fossil-fuel-hero.jpg" class="d-block w-100" alt="fuel-fuel-hero" />
  <div class="bottom-left">
    <h5>Second slide label</h5>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    </p>
  </div>
</div>
<br />
<div id = "container">
  <main style="text-align: center;">
    <div class="container-fluid px-4">
      <div class="row">
        <div class="col-xl-3 col-md-6" id="left">
          <div class="card bg-primary text-white mb-4">
            <div class="card-body">Pending Fuel Requests </div>
            <div class=' row mx-0 d-flex jusitify-content-center'>
              <div class='col-md-12 d-flex justify-content-center'>
                <label class="text-center " id = "size" ><?php echo $pendingCount ?></label>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-center">
              <a class="small text-white stretched-link" href="fuelrequest.php">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6" id="center">
          <div class="card bg-success text-white mb-4">
            <div class="card-body">Approval Fuel Requests</div>
            <div class=' row mx-0 d-flex jusitify-content-center'>
              <div class='col-md-12 d-flex justify-content-center'>
                <label class="text-center"><?php echo $approvalCount ?></label>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-center">
              <a class="small text-white stretched-link" href="fuelrequest.php">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-danger text-white mb-4">
            <div class="card-body">
              Reject Fuel Requests
            </div>
            <div class=' row mx-0 d-flex jusitify-content-center'>
              <div class='col-md-12 d-flex justify-content-center'>
                <label class="text-center"><?php echo $rejectCount ?></label>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-center">
              <a class="small text-white stretched-link" href="fuelrequest.php">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-6">
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-chart-area me-1"></i>
              Area Chart Example
            </div>
            <div class="card-body">
              <div id="myAreaChart" width="100%" height="40"></div>
            </div>

          </div>
        </div>
        <div class="col-xl-6">
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-chart-bar me-1"></i>
              Bar Chart Example
            </div>
            <div class="card-body">
              <div id="myBarChart" width="100%" height="40"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script type="text/javascript">
    var options = {
      series: [{
        data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
      }],
      chart: {
        type: 'bar',
        height: 350
      },
      plotOptions: {
        bar: {
          borderRadius: 4,
          horizontal: true,
        }
      },
      dataLabels: {
        enabled: false
      },
      xaxis: {
        categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan',
          'United States', 'China', 'Germany'
        ],
      }
    };



    var chart = new ApexCharts(document.querySelector("#myBarChart"), options);
    chart.render();



    var areaOptions = {
      series: [{
        name: 'series1',
        data: [31, 40, 28, 51, 42, 109, 100]
      }, {
        name: 'series2',
        data: [11, 32, 45, 32, 34, 52, 41]
      }],
      chart: {
        height: 350,
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'smooth'
      },
      xaxis: {
        type: 'datetime',
        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
      },
      tooltip: {
        x: {
          format: 'dd/MM/yy HH:mm'
        },
      },
    };
    var chart = new ApexCharts(document.querySelector("#myAreaChart"), areaOptions);
    chart.render();
  </script>


  <?php include 'footer.php'; ?>