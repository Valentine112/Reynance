<?php

session_start();

include "../../php/Mailing.php";
include "../../config/db.php";

include "header.php";
$msg = "";

if(!isset($_SESSION['uid'])){
	header("location:../c2wadmin/signin.php");
}

$selecting1 = $link->prepare("SELECT fname, lname, email FROM users ORDER BY id ASC");
$selecting1->execute();
$selecting1->bind_result($index_fname, $index_lname, $index_email);
$selecting1->store_result();

if(isset($_POST['submit'])){

$recipient = $link->real_escape_string($_POST['recipients']);
 
$subject = $link->real_escape_string($_POST['subject']);

$message = $_POST['message'];

$emails = $link->real_escape_string($_POST['emails']);

$message = nl2br($message);
$message = str_replace("/\r|\n|\r\n/", "", $message);

$body = '
    
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <div style="background: #f5f7f8; width: 100%; height: 100%; font-family: "Poppins", sans-serif!important; font-weight: 100;" class="be_container"> 

<div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">

<div class="be_logo" style="float: center; margin: auto; text-align: center;"> <img src="https://macrounique.com/images/logo/logo.png" style="height: 100px; width: 100px;" /> </div>


<div style="clear: both;"></div> 

<div class="be_bluebar" style="background: dodgerblue; padding: 15px; color: #fff;margin-top: 10px;">

<h1 style="text-align: center;">'.$subject.' </h1>

</div> </div>

<div class="be_body" style="padding: 20px;"> <p style="line-height: 25px; font-size: 16px; text-align: center;">

'.$message.'
</p>  </div> 

<section style="color: grey; font-weight: 500;">Thank you for choosing Quandary Visions</section>
<br>

</div>

<span style="display: none;">'.random_int(10000, 99999).'</span>

';

if($recipient == "everyone"){
    while ($b = $selecting1->fetch()) {
      $name = $index_fname.$index_lname;
      $mailing = new Mailing($index_email, 'invest@quandaryvisions.com', 'quandaryvisionsinvestment', $name);
      $mailing->config();
      $mailing->set_params($body, $subject);
      $mailing->send();
    }
}else{
    if(!empty($emails)){
        $selecting2 = $link->prepare("SELECT fname, lname FROM users WHERE email = ? ORDER BY id ASC LIMIT 1");
        $selecting2->bind_param('s', $emails);
        $selecting2->execute();
        $selecting2->bind_result($two_fname, $two_lname);
        $selecting2->store_result();
        $selecting2->fetch();

        $name = $two_fname.$two_lname;
        $mailing = new Mailing($emails, 'invest@quandaryvisions.com', 'quandaryvisionsinvestment', $name);
        $mailing->config();
        $mailing->set_params($body, $subject);
        $mailing->send();
    }
}



if($mailing->send()) {
  
    $msg =  "Mail has been sent successfully!";
}
               
           else{
                $msg = "Something went wrong. Please try again later!";
            }
        
    }

    $selecting = $link->prepare("SELECT fname, lname, email, walletbalance, pname, package FROM users ORDER BY id ASC");
    $selecting->execute();
    $selecting->bind_result($fname, $lname, $user_email, $walletbalance, $pname, $package);
    $selecting->store_result();

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

<script src="js/sendmail.js"></script>

<style>
  .select-who span{
    padding: 1%;
    padding-left: 2%;
    padding-right: 2%; 
    border-radius: 15px;
    cursor:pointer;
  }
  input[type="text"] {
      color: #000!important;
      font-weight: 600;
  }
  textarea{
      font-weight: 600;
  }
</style>

  <div class="content-wrapper">
  


  <!-- Main content -->
  <section class="content">


<div style="width:100%">
          <div class="box box-default">
            <div class="box-header with-border">

	<div class="row">


		 <h2 class="text-center">MAIL MANAGEMENT</h2>
		  </br>

     </br>

 
          <hr></hr>
          
            <div class="box-header with-border">
            
            <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>

     <form class="form" action="sendmail.php" method="POST" >
            <div style="width: 100%; text-align: center;" class="select-who">
              <span style="background-color: #5e5e5e; color: #fff;" data-elem="private" onclick="who(this)">Private</span> &emsp; <span data-elem="everyone" onclick="who(this)">Everyone</span>
            </div>
           <h3>Send Mail</h3>
		   
              <div class="form-group">

                <div class="form-group">
                    <div class="form-group">
                    <input type="text" name="emails" id="email" placeholder="Recipient Email" class="form-control">
                    </div>
                
                  <input type="text" name="recipients" value="private" id="who" hidden readonly>
                <input type="text" name="subject" placeholder="Email Subject"  class="form-control">
                </div>
                
                <div class="form-group">
                <textarea  name="message" placeholder="Write your mail here" class="form-control"></textarea>
              </div>
	  <button style="" type="submit" class="btn btn-primary" name="submit" > <i class="fa fa-send"></i>&nbsp; Send Mail </button>

    </form>
    <br><br>

    <div style="width:100%">
  <div class="box box-default">
    <div class="box-header with-border">

    <table class="display" style="width: 100%;" id="example">
      <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Balance</th>
            <th>Package name</th>
            <th>Package</th>
        </tr>
      </thead>
      <tbody>
        <?php while($a = $selecting->fetch()): ?>
            <tr>
                <td><?= $fname; ?></td>
                <td><?= $lname; ?></td>
                <td><?= $user_email; ?></td>
                <td><?= $walletbalance; ?></td>
                <td><?= $pname; ?></td>
                <td><?= $package; ?></td>
            </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

    </div>
   </div>

   </div>
  </div>
  </div>
  </div>
  </div>
  </section>
</div>

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

