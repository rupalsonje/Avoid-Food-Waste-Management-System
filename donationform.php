<?php
// session_start();
// echo $_SESSION['username'];

$conn = mysqli_connect('localhost','rupal','1234567890','avoid food waste m.s');

if(!$conn){
    echo 'econnection error: '. mysqli_connect_error();
}
$error = array('city'=>'','name'=>'','state'=>'','country'=>'','image'=>'','address'=>'','zip'=>'');

if(isset($_POST['submit'])){
    if(empty($_POST['firstname'])){
        $error['name']= "name is required";
    }
    else{
        $fn = htmlspecialchars($_POST['firstname']);
    }
    
    if(empty($_POST['lastname'])){
        $error['name']= "name is required";
    }
    else{
        $ln = htmlspecialchars($_POST['lastname']);    
    }
    if(empty($_POST['address'])){
        $error['address']= "address is required";
    }
    else{
        $address = htmlspecialchars($_POST['address']);        
    }
    if(empty($_POST['city'])){
        $error['city']= "city is required";
    }
    else{
        $city = htmlspecialchars($_POST['city']);        
    }
    if(empty($_POST['state'])){
        $error['state']= "state is required";
    }    
    else{
        $state = htmlspecialchars($_POST['state']);        
    }
    if(empty($_POST['postalcode'])){
        $error['postalcode']= "zipcode/postalcode is required";
    }    
    else{
        $pc = htmlspecialchars($_POST['postalcode']);        
    }    
    if(empty($_POST['country'])){
        $error['country']= "country is required";
    }    
    else{
        $country = htmlspecialchars($_POST['country']);        
    }
    
    if(empty($_POST['donationtype'])){
        // $error['postalcode']= "zipcode/postalcode is required";
    }    
    else{
        $type = htmlspecialchars($_POST['donationtype']);        
    }
    if(empty($_POST['comment'])){
        $error['comment']= "description is required";
    }    
    else{
        $comment = htmlspecialchars($_POST['comment']);        
    }

    if(array_filter($error)){
        echo 'errors in form';
    }
    else{
        // $name=$_POST['firstname']+' '+$_POST['lastname'];

        $name = mysqli_real_escape_string($conn,$_POST['firstname']);
        $address = mysqli_real_escape_string($conn,$_POST['address']);
        $city = mysqli_real_escape_string($conn,$_POST['city']);
        $state = mysqli_real_escape_string($conn,$_POST['state']);
        $pc = mysqli_real_escape_string($conn,$_POST['postalcode']);
        $country = mysqli_real_escape_string($conn,$_POST['country']);
        $type = mysqli_real_escape_string($conn,$_POST['donationtype']);
        $comment = mysqli_real_escape_string($conn,$_POST['comment']);
    
        $sql = "INSERT INTO `donation`(`fullname`,`addres`,`city`,`state_s`,`postal code`,`country`,`d_type`,`comment`) VALUES ('$name','$address','$city','$state','$pc','$country','$type','$comment');";
         echo 'hey';       
        if(mysqli_query($conn,$sql)){
            echo "success";
            header('Location:index.php');
        }
        else{
            // $error['name'] = "query error";
            echo 'error';
            print_r($error); 
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="donationform.css">
    <script src="https://kit.fontawesome.com/d3535522b2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="navbar.css">
</head>
<body>  
    <header>
        <div id="navbar-animmenu">
            <ul class="show-dropdown main-navbar">
                <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
                <li>
                    <a href="index.php"><i class="fas fa-address-book"></i>Home</a>
                </li>
                <li class="active">
                    <a href="#"><i class="fas fa-donate"></i>Donations</a>
                </li>
                <li>
                    <a href="index.php"><i class="fas fa-user"></i>Profile</a>
                </li>
                <li>
                    <a href="donation.html"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </li>
            </ul>
        </div>
    </header>

    <div class="container">
        <div class="donation">
            <div class="row">
                <div class="col-xs-12 col-md-12">   
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Donation Form</h3>
                        </div>
                        <div class="panel-body">                        
                            <div class="bodyTest">
                                <form action="donationform.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- first name input-->
                                            <div class="form-group">
                                                <label for="firstname" class="control-label">First Name</label>
                                                <div class="">
                                                    <input id="first-name" name="firstname" required type="text" autocomplete="firstname" placeholder="first name" class="form-control">
                                                    <p class="help-block"></p>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="lastname" class="control-label">Last Name</label>
                                                <div class="">
                                                    <input id="last-name" required name="lastname" type="text" autocomplete="lastname" placeholder="last name" class="form-control">
                                                    <p class="help-block"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- last name input-->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="control-group">
                                                <label class="control-label ">Address</label>
                                                <div class=" ">
                                                    <input id="address" required name="address" type="text" autocomplete="address" placeholder="address" class="form-control">
                                                </div>
                                                <p class="help-block"></p>
                                            </div>
                                        </div>                            
                                    </div>
                                    <div class="row">    
                                        <div class="col-sm-6">
                                            <div class="control-group">
                                                <label class="control-label">City / Town</label>
                                                <div class="">
                                                    <input id="city" name="city"  required type="text" autocomplete="city" placeholder="city" class="form-control">
                                                    <p class="help-block"></p>
                                                </div>
                                            </div>
                                        <!-- region input-->
                                        </div>
                                        <div class="col-sm-6">    
                                                <div class="control-group">
                                                    <label class="control-label">State / Province</label>
                                                    <div class="">
                                                        <input id="state" name="state" required type="text" placeholder="state / province / region" class="form-control">
                                                        <p class="help-block"></p>
                                                    </div>
                                                </div>
                                        </div>    
                                        <div class="col-sm-6">
                                            <div class="control-group">
                                                <label class="control-label ">Zip / Postal Code</label>
                                                <div class="">
                                                    <input id="postalcode" name="postalcode" required type="text" autocomplete="postalcode" placeholder="zip or postal code" class="form-control">
                                                    <p class="help-block"></p>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="col-sm-6">
                                        <!-- country select -->
                                            <div class="control-group">
                                                <label class="control-label c">Country</label>
                                                <div class="">
                                                    <input id="country" name="country" type="text" required autocomplete="country" placeholder="country" class="form-control">
                                                    <p class="help-block"></p>
                                                </div>
                                            </div>        
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="control-group">
                                                <label class="control-label d">Donation Type</label>
                                                <div class="">
                                                    <select name="donationtype" id="donationtype" required class="form-control" >
                                                        <option value="food" selected="food">Food</option>
                                                        <option value="clothes">Clothes</option>
                                                        <option value="stationary">Stationary</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    <p class="help-block"></p>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="control-group">
                                                <label class="control-label d">Comment</label>
                                                <div class="">
                                                    <textarea class="form-control" name="comment" required id="comment" placeholder="describe donation" cols="100" rows="5"></textarea>
                                                </div>    
                                            </div>
                                            <p class="help-block"></p>
                                        </div>
                                        <!-- <div class="col-sm-6">
                                            <div class="control-group">
                                                <label class="control-label d">Images</label>
                                                <div class="">
                                                    <input type="file" id="fileupload" name="files" required class="form-control" multiple="multiple">                                            </div>    
                                                    <?php
                                                    if (isset($_FILES['files'])) {
                                                        $myFile = $_FILES['files'];
                                                        $fileCount = count($myFile["name"]);
    
                                                        for ($i = 0; $i < $fileCount; $i++) {
                                                            ?>
                                                                <p>File #<?php echo '= $i+1' ?>:</p>
                                                                <p>
                                                                    Name: <?php echo $myFile["name"][$i] ?><br>
                                                                </p>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                                </div>
                                            <p class="help-block"></p>
                                        </div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12" style="margin: 10px auto;">
                                            <button name="submit" class="btn btn-success btn-lg btn-block" type="submit" id="submit">Donate Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="navbar.js"></script>
</body>
</html>