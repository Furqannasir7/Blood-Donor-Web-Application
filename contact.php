<?php
session_start();
error_reporting(0);
include('server/Connection.php');
if(isset($_POST['send']))
{
    $name=$_POST['fullname'];
    $email=$_POST['email'];
    $contactno=$_POST['contactno'];
    $message=$_POST['message'];
    $sql="INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name',$name,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
    $query->bindParam(':message',$message,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
        $msg="Query Sent. We will contact you shortly";
    }
    else
    {
        $error="Something went wrong. Please try again";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blood Bank</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <style>
        input[id="name"]:invalid {
            background-color: deepskyblue;
        }
        input[id="phone"]:invalid{
            background-color: deepskyblue;
        }
        input[id="email"]:invalid{
            background-color: deepskyblue;
        }
        input[id="name"]:valid {
            background-color: lightgreen;
        }
        input[id="phone"]:valid{
            background-color: lightgreen;
        }
        input[id="email"]:valid{
            background-color: lightgreen;
        }

    </style>

</head>

<body>

<?php include('includes/header.php');?>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Contact</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
    </ol>

    <!-- Content Row -->
    <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
            <!-- Embedded Google Map -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27225.338749116516!2d74.25945258702397!3d31.46458250881326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3919015f82b0b86f%3A0x2fcaf9fdeb3d02e6!2sJohar+Town%2C+Lahore%2C+Punjab%2C+Pakistan!5e0!3m2!1sen!2s!4v1556228490869!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

        <div class="col-lg-8 mb-4">
            <h3>Send us a Message</h3>
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
            else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
            <form name="sentMessage"  method="post">
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Full Name:</label>
                        <input type="text" class="form-control" id="name" name="fullname" required data-validation-required-message="Please enter your name." required pattern="^([a-zA-Z0-9]+|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{1,}|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{3,}\s{1}[a-zA-Z0-9]{1,})$">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Phone Number:</label>
                        <input type="tel" class="form-control" id="phone" name="contactno"  required data-validation-required-message="Please enter your phone number." required pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" >
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Please enter your email address." required pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Message:</label>
                        <textarea rows="10" cols="100" class="form-control" id="message" name="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                    </div>
                </div>
                <div id="success"></div>
                <!-- For success/fail messages -->
                <button type="submit" name="send"  class="btn btn-primary">Send Message</button>
            </form>
        </div>

        <!-- Contact Details Column -->
        <?php
        $pagetype=$_GET['type'];
        $sql = "SELECT Address,EmailId,ContactNo from tblcontactusinfo";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
        foreach($results as $result)
        { ?>
        <div class="col-lg-4 mb-4">
            <h3>Contact Details</h3>
            <p>
                <?php   echo htmlentities($result->Address); ?>
                <br>
            </p>
            <p>
                <abbr title="Phone">P</abbr>: <?php   echo htmlentities($result->ContactNo); ?>
            </p>
            <p>
                <abbr title="Email">E</abbr>: <a href="mailto:name@example.com"><?php   echo htmlentities($result->EmailId); ?>
                </a>
            </p>
            <?php }} ?>
        </div>
    </div>
    <!-- /.row -->


</div>
<!-- /.container -->
<?php include('includes/footer.php');?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/tether/tether.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Contact form JavaScript -->
<!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

</body>

</html>
