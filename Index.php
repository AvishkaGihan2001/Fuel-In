<?php include 'header.php';
include './config/db.php';
include './services/common.php';

$pendingQuery = "SELECT Count(*) as PendingCount FROM fuelrequest WHERE status= 'Pending'";
$pendingResult = mysqli_fetch_assoc(mysqli_query($con, $pendingQuery));

$pendingCount = $pendingResult['PendingCount'];

$approvalQuery = "SELECT Count(*) as ApprovalCount FROM fuelrequest WHERE status= ' Approval'";
$approvalResult = mysqli_fetch_assoc(mysqli_query($con, $approvalQuery));

$approvalCount = $approvalResult['ApprovalCount'];

$rejectQuery = "SELECT Count(*) as RejectCount FROM fuelrequest WHERE status= ' Reject'";
$rejectResult = mysqli_fetch_assoc(mysqli_query($con, $rejectQuery));

$rejectCount = $rejectResult['RejectCount'];

// customer pending approval and reject summary

$cuspendingQuery = "SELECT Count(*) as PendingCount FROM req_fuel WHERE status= 'Pending'";
$cuspendingResult = mysqli_fetch_assoc(mysqli_query($con, $cuspendingQuery));

$cuspendingCount = $cuspendingResult['PendingCount'];

$cusapprovalQuery = "SELECT Count(*) as ApprovalCount FROM req_fuel WHERE status= 'Approval'";
$cusapprovalResult = mysqli_fetch_assoc(mysqli_query($con, $cusapprovalQuery));

$cusapprovalCount = $cusapprovalResult['ApprovalCount'];

$cusrejectQuery = "SELECT Count(*) as RejectCount FROM req_fuel WHERE status= ' Reject'";
$cusrejectResult = mysqli_fetch_assoc(mysqli_query($con, $cusrejectQuery));

$cusrejectCount = $cusrejectResult['RejectCount'];



$data = [];
$dataDis = [];


$sql = "SELECT distinct address FROM fuelstation";

if ($results = mysqli_query($con, $sql)) {
  $i = 0;
  while ($row = mysqli_fetch_assoc($results)) {
    $dataDis[$i] = $row["address"];
    $data[$i] = getDataCount($con, $row["address"]);

    $i++;
  }
}

// echo json_encode(['data'=>$data]);

?>




<style>
  .boxo1 {
    /* align-items: flex-start; */
    position: relative;
    text-align: center;
    color: white;
    background-image: url('fossil-fuel-hero.jpg');
    /* Set a specific height */
    min-height: 500px;

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
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

  #size {
    font-size: larger;
  }

  .font {
    text-align: center;
    font-family: sans-serif;
    font-size: large;
    text-decoration: underline;
  }

  .box-shawdow {
    -webkit-box-shadow: 0px 0px 67px -11px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 0px 0px 67px -11px rgba(0, 0, 0, 0.75);
    box-shadow: 0px 0px 67px -11px rgba(0, 0, 0, 0.75);
  }
</style>
<div class="boxo1">
  <!-- <img src="" class="d-block w-100" alt="fuel-fuel-hero" /> -->
</div>
<br />
<div class="font">
  <h5>Welcome to Fuel In private limites</h5>
</div>
<div>
  <p>
    The Ministry of Power and Energy announced the launch of the “Fuelin pass project" to provide the public a convenient and easily accessible solution to obtain fuel and facilitate an allocation-based fuel distribution method.

  </p>

</div>

<br />
<!-- customer request summary -->
<div class="font">
  <h5>Customer Request Summary</h5>
</div>
<br />
<div id="container">
  <main style="text-align: center;">
    <div class="container-fluid px-4">
      <div class="row">
        <div class="col-xl-3 col-md-6" id="left">
          <div class="card box-shawdow bg-primary text-white mb-4">
            <div class="card-body">
              Pending Customer Requests
            </div>
            <div class=' row mx-0 d-flex jusitify-content-center'>
              <div class='col-md-12 d-flex justify-content-center'>
                <label class="text-center " id="size"><?php echo $cuspendingCount ?></label>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-center">
              <a class="small text-white stretched-link" href="CustomerReq.php">
                View Details
              </a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6" id="center">
          <div class="card box-shawdow bg-success text-white mb-4">
            <div class="card-body">
              Approval Customer Requests
            </div>
            <div class=' row mx-0 d-flex jusitify-content-center'>
              <div class='col-md-12 d-flex justify-content-center'>
                <label class="text-center"><?php echo $cusapprovalCount ?></label>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-center">
              <a class="small text-white stretched-link" href="fuelrequest.php">
                View Details
              </a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card box-shawdow bg-danger text-white mb-4">
            <div class="card-body">
              Reject Customer Requests
            </div>
            <div class=' row mx-0 d-flex jusitify-content-center'>
              <div class='col-md-12 d-flex justify-content-center'>
                <label class="text-center"><?php echo $cusrejectCount ?></label>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-center">
              <a class="small text-white stretched-link" href="fuelrequest.php">
                View Details
              </a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
      </div>
      <br />
      <!-- fual request summary -->
      <div class="font">
        <h5>Fuel Request Summary</h5>
      </div>
      <br />
      <div id="container">
        <main style="text-align: center;">
          <div class="container-fluid px-4">
            <div class="row">
              <div class="col-xl-3 col-md-6" id="left">
                <div class="card box-shawdow bg-primary text-white mb-4">
                  <div class="card-body">Pending Fuel Requests </div>
                  <div class=' row mx-0 d-flex jusitify-content-center'>
                    <div class='col-md-12 d-flex justify-content-center'>
                      <label class="text-center " id="size"><?php echo $pendingCount ?></label>
                    </div>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-center">
                    <a class="small text-white stretched-link" href="fuelrequest.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6" id="center">
                <div class="card box-shawdow bg-success text-white mb-4">
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
                <div class="card box-shawdow bg-danger text-white mb-4">
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
            <br />
            <br />
            <hr />




            <!-- summary chart of the fual distribution and other -->

            <div>
              <div class="card mb-4">
                <div class="card-header">
                  <i class="fas fa-chart-bar me-1"></i>
                  District Vise fuel distribution chart
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
        data: <?php echo json_encode($data); ?>
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
        categories: <?php echo json_encode($dataDis); ?>,
      }
    };


    console.log("chart data:", options)
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