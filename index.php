<?php
error_reporting(0);
include('server/Connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blood Bank</title>

  <!-- Bootstrap core CSS -->

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->

  <?php include('includes/header.php');?>
  <?php include('includes/slider.php');?>

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">Welcome to Blood Bank</h1>

    <!-- Marketing Icons Section -->
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Who can Donate Blood?</h4>
          <div class="card-body">
            <p class="card-text">You are eligible to donate blood if you are in good health, weigh at least 110 pounds and are 17 years or older.</p>
          </div>
          <div class="card-footer">
            <a href="https://en.wikipedia.org/wiki/Blood_donation" target="_blank">Learn more</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Who can't donate blood</h4>
          <div class="card-body">
            <p class="card-text">You are not eligible to donate blood if you have ever used self-injected drugs (non-prescription),
              Had hepatitis, Are in a high-risk group for AIDS</p>
          </div>
          <div class="card-footer">
            <a href="https://en.wikipedia.org/wiki/Blood_donation" target="_blank">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Blood Donation Features</h4>
          <div class="card-body">
            <p class="card-text">You'll get a mini-medical.
              Donating blood reduces your risk of heart disease and cholesterol.
              When donating blood, you are removing 225 to 250mg of iron from your body, reducing your risk of health complications.
              Donating blood burns calories.
              Feeling the joy of saving a human life.</p>
          </div>
          <div class="card-footer">
            <a href="https://www.fedhealth.co.za/healthy-living-tips/the-health-benefits-of-donating-blood/" target="_blank">Learn More</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->


    <h2>Information</h2>

    <div class="row">
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="https://cbr.ubc.ca/files/2017/08/Emaan_Blood-bag-700x400.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Blood Groups</a>
            </h4>
            <p class="card-text">There are different types of Blood Groups such as
            <ul>
            <li>A+, A-</li>
            <li>O+, O-</li>
            <li>B+, B-</li>
            <li>AB+, AB-</li>
          </ul>
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://www.health-and-wellness-in-the-workplace.com/lib/033/062-150108-f-nj377-001.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Humanity Process</a>
            </h4>
            <p class="card-text">You can save someone life by giving blood.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="https://whistleblowerprotection.eu/wp-content/uploads/2019/03/doctor-pexels-photo-1919236-700x400.jpeg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Free Health Report</a>
            </h4>
            <p class="card-text">By giving blood you can get free medical checkup of your heath</p>
          </div>
        </div>
      </div>
    </div>
    <div>

        <!-- Portfolio Section -->
        <h2>Some of the Donar</h2>

        <div class="row">
            <?php
            $status=1;
            $sql = "SELECT * from tblblooddonars where status=:status order by rand() limit 6";
            $query = $dbh -> prepare($sql);
            $query->bindParam(':status',$status,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
                foreach($results as $result)
                { ?>

                    <div class="col-lg-4 col-sm-6 portfolio-item">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top img-fluid" src="http://www.health-and-wellness-in-the-workplace.com/lib/033/062-150108-f-nj377-001.jpg" alt="" ></a>
                            <div class="card-body">
                                <h4 class="card-title"><a href="#"><?php echo htmlentities($result->FullName);?></a></h4>
                                <p class="card-text"><b>  Gender :</b> <?php echo htmlentities($result->Gender);?></p>
                                <p class="card-text"><b>Blood Group :</b> <?php echo htmlentities($result->BloodGroup);?></p>

                            </div>
                        </div>
                    </div>

                <?php }} ?>





        </div>
    <!-- /.row -->

    <!-- Features Section -->
    <div class="row">
      <div class="col-lg-6">
        <h2>Blood Donation Features</h2>
        <strong>Advantages</strong>
        <ul>
          <li>Reduce Iron Level</li>
          <li>Identifies adverse health effects</li>
          <li>Helps people feel good about themselves</li>
          <li>Burns calories</li>
        </ul>
        <strong>Disadvantages</strong>
        <ul>
        <li>Dizziness</li>
         <li> Deeling faint</li>
          <li>Lightheadedness</li>
         <li>Nausea</li>
        </ul>
      </div>
      <div class="col-lg-6">
        <img class="img-fluid rounded" src="" alt="">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/7HXJyMjUBqI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Call to Action Section -->
    <div class="row mb-4">
      <div class="col-md-8">
      </div>
      <div class="col-md-4">
      </div>
    </div>
    </div>
  </div>
  <!-- /.container -->

  <!-- Footer -->

  <?php include('includes/footer.php');?>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
