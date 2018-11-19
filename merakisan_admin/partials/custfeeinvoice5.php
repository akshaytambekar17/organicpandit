<style>
	td{border:1px solid black;}
</style>
<?php	
session_start();
$registerid = $_SESSION['registerid'];
  $cityid = $_SESSION['cityid'];
include ("includes/db.php");
						//$Fees_Id=$_GET['orderid']; 
						
						//$rs12 = mysqli_query($db,"SELECT `date` FROM `offer_order` WHERE `order_id`='$Fees_Id'");
						
						//$date=mysqli_fetch_assoc($rs12);
						
						//$rs = mysqli_query($db,"SELECT `mobileno`,`payment_type`,`shipping_address`,`custname` FROM `orderdetail` WHERE `order_id`='$Fees_Id'");
						
						//$value = mysqli_fetch_assoc($rs);
						
						?>	

					
				
		<div class="container" style="background:#333333">
			<div class="row" id="printdiv">
			<div class="col-md-1"> </div>
				<div class="col-md-12"> 
					<div class="panel"style="margin-bottom: 0; margin-top: 13px;">
							<!--<div class="panel-body">
								<div class="col-md-12">
									<h6>&nbsp;&nbsp;Invoice # 10<?php echo $Fees_Id;?></h6>
									<h6>&nbsp;&nbsp;Order # 00<?php echo $Fees_Id;?></h6>
									<h6>&nbsp;&nbsp;Order Date :&nbsp;<?php echo $date['date'];?></h6>
								</div>
							</div>
							<div class="panel-body">
									<table class="table">
									 <thead>
									 <tr>
									 <th><h4>Sold to:</h4></th>
									 <th><h4>Ship to:</h4></th>
									 </tr>
									 </thead>
									  <tbody>
									
									 <tr>
									 <td> <p><?php echo $value['custname'];?></p>
									<p><?php echo $value['shipping_address'];?></p>
									<p>Mob:<?php echo $value['mobileno'];?></p> </td>
									 <td> <p><?php echo $value['custname'];?></p>
									<p><?php echo $value['shipping_address'];?></p>
									<p>Mob:<?php echo $value['mobileno'];?></p> </td>
									
									 </tr>
									 </tbody>
									 </table>
							</div>
							
							<div class="panel-body">
							
							<table class="table">
									 <thead>
									 <tr>
									 <th><h4>Payment Method:</h4></th>
									 <th><h4>Shipping Method:</h4></th>
									 </tr>
									 </thead>
									  <tbody>
									
									 <tr>
									 <td><p><?php if($value['payment_type']=='COD') {echo "Cash On Delivery";} else {echo "Online";}?></p></td>
									 <td> <p>Shipping Charge: Rs. 20 /- </p>
									<p></p>
									<p>(Total Shipping Fee:Rs. 20 /-)</p> </td>
									
									 </tr>
									 </tbody>
									 </table>
							</div>
							<p></p>-->
					
						<div class="panel-body" style="padding: 5px;">
						<h5 align="center"><b>Assigned Order</b></h5><br>
							<div class="row">
							<?php 
							if(empty($cityid))
								{
							$rs_result = mysqli_query($db,"SELECT d.`name`,d.`mobile`,o.`order_id`,o.`shipping_address`,o.`payment_type`,o.`delivari_date`,o.`delivari_time`,o.`order_status` FROM `assign_boy` a JOIN `delivery_boy` d ON a.`boyid`= d.`id` JOIN `orderdetail` o ON a.`order_id` = o.`order_id` WHERE o.`order_status`=2 GROUP BY o.`order_id` DESC");
								}else{
									$rs_result = mysqli_query($db,"SELECT d.`name`,d.`mobile`,o.`order_id`,o.`shipping_address`,o.`payment_type`,o.`delivari_date`,o.`delivari_time`,o.`order_status` FROM `assign_boy` a JOIN `delivery_boy` d ON a.`boyid`= d.`id` JOIN `orderdetail` o ON a.`order_id` = o.`order_id` WHERE o.`city_id` = '$cityid' AND o.`order_status`=2 GROUP BY o.`order_id` DESC");
								}
							?>
								<div class="col-md-12">
									 <table class="table">
									 <thead>
									 <tr style="border:1px solid black">
									 <th>NO</th>
									 <th>ORDERNO</th>
									 <th>NAME</th>
									 <th>MOBILE</th>							
									 <th>PAYMENT</th>
									 <th>SHIPPINGADDRESS</th>
									 <th>DATE</th>
									 <th>TIME</th>
									 </tr>
									 </thead>
									 <tbody>
							<?php   

                                    $no= 1;
                                    $total = array();
                                    $subtotal = array();
									while($row=mysqli_fetch_array($rs_result,MYSQLI_ASSOC))
									{
									?>
									 <tr>
									 <td><?php echo $no++; ?></td>
									 <td> <?php echo $row['order_id']; ?></td>
									 <td> <?php echo $row['name']; ?></td>
									 <td> <?php echo $row['mobile'];?></td>
									 <td> <?php echo $row['payment_type']; ?></td>
									 <td> <?php echo $row['shipping_address']; ?></td>
									 <td> <?php echo $row['delivari_date']; ?></td>
									 <td> <?php echo $row['delivari_time']; ?></td>
									 </tr>
								  <?php 
									} 
									?>
								
									 </tbody>
									 </table>
								</div>
							</div><!--row End-->
						</div>
						<hr style="border:1px solid black">
						<!--<div class="panel">
						<table class="table">
						<tr>
						<h6 class="pleft"><b>Thanks for order ~ MeraKisan</b></h6>
						
							<h5 class="pright"><b> Sub Total:&nbsp;Rs.&nbsp;<?php echo array_sum($total) ; ?>&nbsp;/- </b></h5>
							<h5 class="pright"><b> Shipping charge:&nbsp;Rs. 20 /- </b></h5>
							<h5 class="pright"><b> Grand Total:&nbsp;Rs.&nbsp;<?php echo array_sum($total) + 20; ?> &nbsp;/-</b></h5>
							
						</tr>
						</table>	
						</div>-->
					</div>
				</div>
			</div>
			<br>
			<div class="row">
		 <center><button type="submit" onclick="myFunction('printdiv')" class="btn btn-sm btn-primary">Print</button>&nbsp<a href="export9.php"><button class="btn btn-sm  btn-success">Export</button></a></center>	 
		 </div>
			 
		 </div>
<script>
function myFunction(el) {
	
   var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	
}
</script>