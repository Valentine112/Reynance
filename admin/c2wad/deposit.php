<?php
include "../../php/Mailing.php";

include "../../config/config.php";

$msg = "";

if(isset($_GET['referred'])){
	$referreds = $_GET['referred'];
}else{
	$referreds = '';
}

$crypto = "";
$crypto_abbr = "";
if(isset($_GET['token'])) {
  $token = htmlspecialchars(stripslashes(trim($_GET['token'])));
  switch ($token) {
    case 'btc':
      $crypto = "Bitcoin";
      $crypto_abbr = "BTC";
      break;

    case 'eth':
      $crypto = "Ethereum";
      $crypto_abbr = "ETH";
      break;
    
    case 'usdt':
      $crypto = "USDT";
      $crypto_abbr = "USDT";
      break;

    case 'shiba':
      $crypto = "SHIBA";
      $crypto_abbr = "shiba";
      break;
    
    default:
      $crypto = "Unknown";
      $crypto_abbr = "NULL";
      break;
  }
}

if(isset($_SESSION['uid'])){

}
else{

	header("location:../c2wadmin/signin.php");
}
if(isset($_POST['approve'])){
	
	$tnx = $_POST['tnx'];
	$usd = $_POST['usd'];
	$email = $_POST['email'];
	$date1 = Date("y/m/d");
	

		$sql1 = "UPDATE users SET walletbalance = walletbalance + $usd WHERE email='$email'";
		
		$sql2= "SELECT * FROM btc WHERE tnxid = '$tnx'";
  $result2 = mysqli_query($link,$sql2);
  if(mysqli_num_rows($result2) > 0){
   $row = mysqli_fetch_assoc($result2);
   $row['status'];
   $type_crypto = $row['type'];
  }

  $sqlus= "SELECT * FROM users WHERE email = '$email'";
  $resultus = mysqli_query($link,$sqlus);
  if(mysqli_num_rows($resultus) > 0){
   $rowus = mysqli_fetch_assoc($resultus);
   $usernamewtc = $rowus['username'];
 
  }
 $error = "";
if(isset($row['status']) &&  $row['status']== "approved"){
	
	$msg = "Transaction already approved!";

}else{
		$error = $email;
    $link->autocommit(FALSE);
		if(mysqli_query($link, $sql1)){
        $sql1 = "UPDATE btc SET status = 'approved'  WHERE tnxid = '$tnx'";
        if(mysqli_query($link, $sql1)):
            $link->autocommit(TRUE);
            $msg = "transaction approved successfully and investor is credited!";
            $name = "Macrounique";

            $body = '
            <div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 

            <div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">

            <div class="be_logo" style="float: center; margin: auto; text-align: center;"> <img src="https://macrounique.com/images/logo/invest.png" style="height: 150px; width: 100%;" /> </div>

            <div style="clear: both;"></div> 

            <div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

            <h1 style="text-align: center;" >'.$name.'</h1>

            </div> </div> 

            <div class="be_body" style="padding: 20px;"> <p style="line-height: 20px; color:#000; font-size: 16px; font-weight: 400;"> 

            Congraulation! Your deposit of '.$usd.' USD worth has been approved.  


            </p>

                  <div>
                    <ul style="font-size: 16px;">
                        <li><b>User</b>: '.$usernamewtc.'</li>
                        <li><b>Amount:</b> '.$usd.'</li>
                        <li><b>Transaction means:</b> '.strtoupper($type_crypto).'</li>
                        <li><b>Transaction Id:</b> '.$tnx.'</li>
                        <li><b>Date:</b> '.$date1.'</li>
                    </ul>
                  </div>
                  
                <section style="color: grey; font-weight: 600;">Thank you for choosing Quandary Visions</section>
                

            <div class="be_footer">
            <div style="border-bottom: 1px solid #ccc;"></div>


            <div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

            <p> Please do not reply to this email. Emails sent to this address will not be answered. 
            Copyright ©2020 '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div>

              <span style="display: none;">'.random_int(10000, 99999).'</span>

            </div> </div></div>' ;


            $mailing = new Mailing($email, 'invest@macrounique.com', 'Macrounique Investment', $name);
            $mailing->config();
            $mailing->add_image("../../images/logo/logo.png");
            $mailing->set_params($body, "Deposit Successful");

            $mailing->send();
        else:
          $msg = "transaction was not approved! ";
        endif;
		}
}
}

if(isset($_POST['referrer'])){
	
    $referred = $_POST['referred'];
		$email = $_POST['email'];
		$tnx = $_POST['tnx'];
		$usd = $_POST['usd'];
		

  
  $refb = (double) $usd * 0.05;
  echo $refb;

		$sql6 = "UPDATE users SET refbonus = refbonus + $refb,walletbalance = walletbalance + $refb  WHERE refcode ='$referred'";
		
		
		if(mysqli_query($link, $sql6)){
	
		$msg = "Referrer paid successfully!";
		}else{
			$msg = "Cannot pay the referer!";
		}
 }


if(isset($_POST['delete'])) {
	
	$tnx = $_POST['tnx'];
	
$sql = "DELETE FROM btc WHERE tnxid='$tnx'";

if (mysqli_query($link, $sql)) {
    $msg = "Order deleted successfully!";
} else {
    $msg = "Order not deleted! ";
}
}

include 'header.php';

?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
  

  <link rel="stylesheet" href=" https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/buttons/1.5.6/css/buttons.jqueryui.min.css">



  

  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap.min.css">
  <link rel="stylesheet" href="css/deposit.css">
 
  
    
    



  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
 

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.jqueryui.min.js"></script>
   
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
  

     
 <div class="content-wrapper">
  


  <!-- Main content -->
  <section class="content">



   <style>
 
	
   </style>


<div style="width:100%">
  <div class="box box-default">
    <div class="box-header with-border">

	<div class="row">


		 <h2 class="text-center"><?= strtoupper($crypto); ?> INVESTORS DEPOSIT MANAGEMENT</h2>
		  </br>

</br>
 <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>
		    </br>

<div class="col-md-12 col-sm-12 col-sx-12">
    <div class="table-responsive">
          <table class="display" style="width: 100%;" id="example">

					<thead>

						<tr class="info">
						<th>Email</th>
						<th style="display:none;"></th>
						<th style="display:none;"></th>
						<th style="display:none;"></th>
							<th>Amount(<?= $crypto_abbr; ?>)</th>
                               <th>Status</th>
							 
							 <th>Transaction ID</th>
               <th>Photo</th>
							 <th style="display:none;"></th>
							  <th>Referrer Pay </th>
							<th>Date</th>
                                <th>Action</th>
                                 <th>Action</th>
                                  <th>Action</th>
								
                                

						</tr>
					</thead>


					<tbody>
					<?php $mssg = ""; $sql= "SELECT * FROM btc WHERE type = '$crypto' ORDER BY id DESC";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) < 1):
          echo "<tr class=primary>
                  <td colspan=12><h3 style=text-align:center>No transaction here</h3></td>
                </tr>";
            //$mssg = "<h3>NO $crypto TRANSACTIONS HAS BEEN MADE</h3>";
        else:
				  while($row = mysqli_fetch_assoc($result)){   
          $row['status'];
          $row['referred'];
   
   
if(isset($row['status']) &&  $row['status']== 'approved'){
	
	
	$sec = 'Approved &nbsp;&nbsp;<i style="background-color:green;color:#fff; font-size:20px;" class="fa  fa-check" ></i>';

}else{
$sec ='Pending &nbsp;&nbsp;<i class="fa  fa-refresh" style=" font-size:20px;color:red"></i>';

}


				  ?>

						<tr class="primary">
						<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']).'?token='.strtolower($crypto_abbr); ?>" method="post">
              <td><?php echo $row['email'];?></td>
							
							<td style="display:none;"><input type="hidden" name="email" value="<?php echo $row['email'];?>"> </td>
							<td style="display:none;"><input type="hidden" name="usd" value="<?php echo $row['usd'];?>"> </td>
							
							<td style="display:none;"><input type="hidden" name="tnx" value="<?php echo $row['tnxid'];?>"> </td>
							<td><?php echo $row['usd']; ?></td>
							<td><?php echo $sec ;?></td>
							
							<td><?php echo $row['tnxid'];?></td>

              <td><a href="<?= $row['image']; ?>"><img width="100" height="100" src=" <?= $row['image']; ?> " alt=" <?= $row['image']; ?> " ></a></td>
              
           <td style="display:none;"><input type="hidden" name="referred" value="<?php echo $row['referred'];?>"> </td>
		    <td><?php echo $row['referred'];?></td>
			   <td><?php echo $row['date'];?></td>
      
              <td><button class="btn btn-success" type="submit" name="approve">Approve</button></td>
                            
							<td><button class="btn btn-info" type="submit" name="referrer">Pay Referrer</button></td>
							
							<td><button class="btn btn-danger" type="submit" name="delete">Delete</button></td>
							
   
</form>

						</tr>
					  <?php
}
      endif;
			  ?>
					</tbody>



				</table>
</div>
          </div>

		  </div>
          <!-- /top tiles -->

          </div>

                



    </body>
              </div>
            </div>


              </div>


          <br />







    </body>
              </div>
            </div>





          </section>

   </div>
  </div>
</div>


  </body>
</html>
    
<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
       
    } );
    

    table.buttons().container()
        .insertBefore( '#example_filter' );

        table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-12:eq(0)' );
} );
</script>






<script>
$(document).ready(function () {
        $('#table')
                .dataTable({
                    "responsive": true,
                    
                });

				
    });



				</script>


