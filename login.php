
<?php
session_start();
//Database Configuration File
include('config.php');    
error_reporting(0);
print($_SESSION["logged_in"]);
if(isset($_SESSION["logged_in"])) {
    print("Session is set");
    header("location:home.php");
    }

    else if(isset($_POST['login']))
{
    //Genrating random number for salt
    if(@$_SESSION['randnmbr']==""){
        
        $Alpha22=range("A","Z");
        $Alpha12=range("A","Z");
        $alpha22=range("a","z");
        $alpha12=range("a","z");
        $num22=range(1000,9999);
        $num12=range(1000,9999);
        $numU22=range(99999,10000);
        $numU12=range(99999,10000);
        $AlphaB22=array_rand($Alpha22);
        $AlphaB12=array_rand($Alpha12);
        $alphaS22=array_rand($alpha22);
        $alphaS12=array_rand($alpha12);
        $Num22=array_rand($num22);
        $NumU22=array_rand($numU22);
        $Num12=array_rand($num12);
        $NumU12=array_rand($numU12);
        $res22=$Alpha22[$AlphaB22].$num22[$Num22].$Alpha12[$AlphaB12].$numU22[$NumU22].$alpha22[$alphaS22].$num12[$Num12];
        $text22=str_shuffle($res22);
        $_SESSION['randnum']= $text22;
    }
    // Getting username/ email and password
    $uname=strip_tags($_POST['username']);
    $password=strip_tags(hash('sha256',$_POST['password']));
    // Hashing with Random Number
    $saltedpasswrd=hash('sha256',$password.$_SESSION['randnum']);
    // Fetch stored password  from database on the basis of username/email 
    $sql ="SELECT accountId,UserName,UserEmail,LoginPassword,Role,is_active FROM userdata WHERE (UserName=:usname || UserEmail=:usname)";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':usname', $uname,  PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
        foreach ($results as $result) {
            $fetchpassword=$result->LoginPassword;
            $role=$result->Role;
            $accountId=$result->accountId;
            $active=$result->is_active;
            // hashing for stored password
            $storedpass= hash('sha256',$fetchpassword.$_SESSION['randnum']);
        }
        //You can configure your cost value according to your server configuration.By Default value is 10.
        $options = [
            'cost' => 12,
        ];
        // Hashing of the post password
        $hash= password_hash($saltedpasswrd,PASSWORD_DEFAULT, $options);
        // Verifying Post password againt stored password
        if(password_verify($storedpass,$hash)){
            if($active==0){
                echo $error;
                $error="You are not verified user. Please check your registered email address for the verification Link";
            }else{
             if($role=='admin' ){
                 $_SESSION["logged_in"] = '2';
                 header("Location: home.php");
             }          
            else {
                $_SESSION['accountId']=$accountId;
                $_SESSION["username_login"]= $uname;
            $_SESSION["logged_in"] = '1';
            header("Location: home.php");

                
            }
        }
        }else{

        echo "$invalid";
        $invalid = "Invalid Details";
        //echo "$uname";
}
 
}
else {
    echo "$invalid";
    $invalid = "Invalid Details";
    
    //echo "$uname";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login form</title>
    <link rel="shortcut icon" type="image/x-icon" href="favi.ico" />
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login1.css">
    <link rel="stylesheet" href="css/login2.css">

</head>

<body>
<div class="limiter ">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						LOGIN
					</span>
                </div>
                <br>
                <?php if ($error) { ?><div>
            <strong>Verify </strong> : <?php echo htmlentities($error); ?></div>
            <?php } ?>
            <?php if ($invalid) { ?><div>
            <strong>Sorry </strong> : <?php echo htmlentities($invalid); ?></div>
            <?php } ?>

           
    <div class="login100-form validate-form">
        <form method="post">
            <div class="wrap-input100 validate-input m-b-26"><input type="text" class="input100" id="username" name="username"  title="Please enter you username" required placeholder="username" ></div>
            <div class="wrap-input100 validate-input m-b-26"><input type="password" class="input100" id="password" name="password" placeholder="Password" value="" required title="Please enter your password"></div>
            <div class="login100-form-btn"><button type="submit" name="login">Login</button></div><br>
            <a href="signup.php" class="login100-form-btn">Register</a>
           <br>
            <a href="forgot_password.php" class="txt1">Forgot Password ?</a>
		</div>
        </div>	
	</div>	
</div>					
    </div>


