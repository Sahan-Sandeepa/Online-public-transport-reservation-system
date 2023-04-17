<?php   
session_start();  
if(!isset($_SESSION["user"])){  

    header("location: ../php/login.php");  
} else {  
?>
<!doctype html>
<html>
	<head>
	<title>BuyTickets.lk</title>
  <link rel="shortcut icon" href="/img/navimg/socialmedia/logo.png"></title>
	<link rel="stylesheet" href="../css/payment.css">
    <link rel="stylesheet" href="../css/navsearch.css">
   
    <script src="../js/sctipt.js"></script>
	</head>
	
	<body>
    <!--Navigation bar Start-->
    <nav>  

<div class="logo">
    <!--Site Logo-->
    <a href="../index.html" style="text-decoration: none; ">
        <img src="../img/navimg/socialmedia/logo.png" id="logoimg">
       
      <h4>BuyTickets.LK </h4></a></div>
    <!--Navigiation Bar-->
<ul>
<li><a href="../index.html">Home</a></li>

<!--First Drop Down Menu-->
<li><a href="#">Reservation</a>

<ul>
<li> <a href="SearchBusresult.php">Bus Booking</a></li>
<li> <a href="trainserach.php">Train Booking</a></li>


</ul>
</li>

<li><a href="userprofile.php">User Profile</a>

<li><a href="../help.html">Help</a></li>
<!--Third Drop Down Menu-->


</li>
</ul>
</nav>  
 <!--Navigation bar End-->

 <!--Get Summery Data-->
 <?php

//Retrieving Data For Summery
    require 'config.php';
   $pname=$_GET['name'];
   //selecting data from main table and foreign table
    $sql = "SELECT * FROM seat INNER JOIN busreservation ON busreservation.BRID = seat.busID where seat.pName='$pname'";
    $result = $con->query($sql);
  
    if($result->num_rows>0){
  
      while($row = $result->fetch_assoc()){
  

    $dbbspoint =$row['BSPoint'];
    $dbbepoint =$row['BEPoint'];
    $dbreg=$row['BREGnum'];
    $dbroute=$row['BRouteNum'];
    $dbprice=$row['BTicketPrice'];
    $dbdate =$row['BDate'];
    $dbtime =$row['BTime'];
    $dbpName=$row['pName'];
    $dbseatnum=$row['SeatNum'];

      }
  
    }
    else{

        echo "System Error Occur";
    }
            ?>


<?php

 $num=count(explode(",",$dbseatnum));
 $ticketcount = $num-1;
 $totalTPrice = $ticketcount *$dbprice;

?>

<div id="maincontent">
 <div id="content">
        <div id="leftBox" class="line">
           <h1>Summery</h1>
        <table>
        <tr>
    <td class="title" >Customer Name</td>
    <td><?php echo $dbpName?></td>
   
    </tr>
    <tr>

    <td class="title" >Bus Starting Point</td>
    <td><?php echo $dbbspoint?></td>
    </tr>
    <tr>

        <td class="title" >Bus End Point</td>
        <td><?php echo $dbbepoint?></td>
        </tr>
        <tr>

        <td class="title" >Bus Starting Time And Date</td>
        <td><?php echo $dbdate.'('.$dbtime.')'?></td>
        </tr>
         <tr>

        <td class="title" >Reserved Seat Number</td>
        <td><?php echo $dbseatnum?></td>
        </tr>
        <tr>

        <td class="title" >Total Price</td>
        <td><?php echo $totalTPrice?></td>
        </tr>


        </table>
           
        </div>
        <div id="rightBox" >
            <h1 id="txtSign">PAYMENT</h1>
           <?php echo "<form action='../php/CrudOperation/setpayment.php?tot=$totalTPrice' method='POST'>"?>
                    
            <div class="input">
                
            
         
                <label>Card Name-:</label>
                <input type="text"  name="cardName" placeholder="Enter Card Name" required oninvalid="this.setCustomValidity('Enter Card Name')" oninput="this.setCustomValidity('')">

                <label>Card Number-:</label>
                <input type="Number"  id='cno' name="cardNo" placeholder="Enter Card Number" oninput="checkcardno(this)" required oninvalid="this.setCustomValidity('Enter Valid Card Number')" oninput="this.setCustomValidity('')">

                <label> Card Expire Date-:</label>
                <input type="month"  name="cardEX" placeholder="Card Expire Date" required oninvalid="this.setCustomValidity('Card Expire Date')" oninput="this.setCustomValidity('')">
           
               
                <label>CVV-:</label>
                <input type="number" id='cvv' name="cvv" placeholder="Enter CVV" oninput="checkcvv()" required oninvalid="this.setCustomValidity('Enter Valid CVV')" oninput="this.setCustomValidity('')">
           
      
               
            
         
        
           
                <button type="submit" id="btnpay" name="submit">PAY</button>
            </form>
            
           
        </div>

        </div>
    </div>

    </div>









        

</div>
	 <!------------------------FOOTER-------------------------------------->
     <footer>
<div class="footerDiv" id="fd1">

    <hr   style="color:rgb(185, 46, 46); height: 300px; float: right; " >
   
<h1 class="fd1h1" ><a href="../index.html"> BuyTickets.LK</a></h1>
<ul id="flist">
    
            
                <li><a href="../ContactUs.html">Contact Us </a></li>
                <li><a href="../offers.html">Offers </a></li>
                <li><a href="../help.html">Helps </a></li>
                <li><a href="../Terms _ condition.html">Terms and Conditions </a></li>
                <li><a href="../Feedback.html">FeedBack </a></li>
</ul>
   
</div>

<div class="footerDiv" id="fd2">
    <hr   style="color:rgb(185, 46, 46); height: 300px; float: right; " >
<h1 class="fd1h2">About Us</h1>

<p>01.09 team developed BuyTicket.LK - an innovative online bus and train ticket booking platform that seeks a hassle-free and improved public transportation system. 
            The largest growing business in Sri Lanka and other countries, especially by bus and train. It is therefore imperative to provi
            de an adequate user-friendly innovation mechanism for bus and train ticket booking procedures.<a href="aboutUs.html" style="color: darkorange;">More</a></p>

</div>
<div class="footerDiv" id="fd3"><hr   style="color:rgb(185, 46, 46); height: 300px; float: right; " >
<h1>Payment Method</h1>
<a href="https://www.mastercard.us/en-us.html" target="_blank"> <img src="../img/navimg/MasterCard.svg" id="mastercard" ></a>
<a href="https://www.paypal.com/us/home" target="_blank"> <img src="../img/navimg/ez-cash.png" id="paypal"></a>
<a href="https://www.payhere.lk/" target="_blank"> <img src="../img/navimg/PayHere-Logo.png" alt=""></a>
<br>

 <h1>Bank Partner</h1>
    <a href="https://www.boc.lk/" target="_blank"><img src="../img/navimg/boc.svg" alt=""></a>
    <a href="https://www.peoplesbank.lk/" target="_blank"><img src="../img/navimg/peoples-bank.png" alt=""></a>
    <a href="https://www.nsb.lk/" target="_blank"><img src="../img/navimg/National-Savings-Bank-NSB-in-Sri-Lanka.jpg" alt=""></a>
</div>
<div class="footerDiv" id="fd4">


<h1>Follow Us</h1>

<a href="https://www.facebook.com/" target="_blank"><img src="../img/navimg/socialmedia/facebook-brands.svg" alt="" class="social"></a>
        <a href="https://www.instagram.com/" target="_blank"><img src="../img/navimg/socialmedia/instagram-brands.svg" alt="" class="social"></a>
        <a href="https://www.linkedin.com/" target="_blank"><img src="../img/navimg/socialmedia/linkedin-brands.svg" alt="" class="social"></a>
        <a href="https://twitter.com/?lang=en" target="_blank"><img src="../img/navimg/socialmedia/twitter-square-brands.svg" alt="" class="social"></a>
    </div>
<div id="copyright">Copyright GroupProject@2021</div>
</footer>

	</body>
</html>
<?php

  }
?>