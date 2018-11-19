<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<style>
ul.nav.tabs {
    text-align: center;
    margin-bottom: 0px;
}
.autodata li
{
	margin:5px;
	cursor:pointer;
}
</style>
<script type="text/javascript">
  $(document).ready(function()
   {
   		/*$("#cityid").change(function(){
   			var id = $("#cityid").val();
   			$.ajax({
				  type: "POST",
				  url: "<?php echo base_url();?>slocation",
				  data: "cityid="+id,
				  success: function(data){
				  
				     $("#locationid").html(data);
				  }
				});
   		});
   		*/
   });
</script>
<?php $iv = rand(0,9);  ?>
<?php if(!empty($productlist)) { ?>
<!-- Google Code for Remarketing Tag -->
<script type="text/javascript">
var google_tag_params = {
ecomm_prodid: '<?php echo $productlist[$iv]->product_id; ?>',
ecomm_pagetype: 'home',
ecomm_totalvalue: <?php echo $productlist[$iv]->price; ?>,
};
</script>
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 842828211;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/842828211/?guid=ON&amp;script=0"/>
</div>
</noscript>
<?php } ?>





<?php //echo "<pre>"; print_r($productlist); die;?>
<!--<div data-vide-bg="<?php echo base_url();?>video/video">-->

<div style="background-image: url(<?php echo base_url();?>images/merabanner.png); background-repeat:no-repeat;background-size:auto; height:200px;">
    <div class="container">
		<div class="banner-info">
			<h3> </h3>	
					
		</div>	
    </div>
</div>


<!--content-->
<div class="content-top ">
	
	<div class="container ">
	<p id="cadded" style="display:none;" class="alert alert-success text-center">Product has been added to Cart.  <b><a href="javascript:;" onclick="return $('.my-cart-icon').click();" class="text-success">Countinue to cart</a></b></p>
		<div class="spec ">
			<h3>Products</h3>
			<div class="ser-t">
				<b></b>
				<span><i></i></span>
				<b class="line"></b>
			</div>
		</div>
		<?php //echo $cid; die;?>
			<div class="tab-head ">
				<nav class="nav-sidebar">
					<ul class="nav tabs ">
					<?php foreach ($category as $cat)
												{ ?>
					<li class=""><a href="<?php echo base_url();?>category/<?php echo $cat->category_id ?>" ><?php echo $cat->categoryname; ?></a></li>						

					<?php } ?>							
					 <!-- <li class="<?php if($cid == 1) echo "active" ?>"><a href="<?php echo base_url();?>category/1" >Organic Grocery</a></li>
					  <li class="<?php if($cid == 2) echo "active" ?>"><a href="<?php echo base_url();?>category/2" >Exotic Vegetables</a></li> 
					  <li class="<?php if($cid == 3) echo "active" ?>"><a href="<?php echo base_url();?>category/3">Vegetables</a></li>  
					  <li class="<?php if($cid == 4) echo "active" ?>"><a href="<?php echo base_url();?>category/4">Fruits</a></li>-->
					</ul>
				</nav>
				
				<!-- search -->
				
				<!-- search -->
				
				<div class=" tab-content tab-content-t ">
					<div class="tab-pane active text-style" id="tab1">
						<div class="searchcontent con-w3l">

						<?php if(!empty($productlist)){ foreach ($productlist as $product) { 
								
						?>
							<div class="col-md-3 m-wthree" style="padding-bottom: 15px;">
								<div class="col-m">	
								<a href="#" id="<?php echo $product->product_id; ?>"data-toggle="modal" data-target="#myModal1<?php echo $product->product_id;?>" class="offer-img">
										<img src="<?php echo $this->config->base_url();?>/merakisan_admin/profile/<?php echo $product->pic_url; ?>" class="img-responsive" alt="" >
										
									</a>
									<div class="mid-1">
										<div class="women">
<h6><a href="<?php echo base_url();?>single/<?php echo $product->product_id;?>"><?php echo $product->name;?></a> (<?php echo $product->unit_value ."".$product->price_unit;?>)</h6>							
										</div>
										<div class="mid-2">
											<p ><em class="item_price">Rs. <?php echo $product->price;?></em></p>
											  <div class="block">
												
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="add">
											 <div class="btn-group">
												<button onclick="var demo=$('.dedispl<?php echo $product->product_id;?>').val();
												if(parseInt(demo)>1){
												$('.dedispl<?php echo $product->product_id;?>').val(parseInt(demo)-1); }
												" class="btn btn-success btn-xs">-</button>
												<input type="button" value="1" size="2"  class="btn btn-default btn-xs dedispl<?php echo $product->product_id;?>" ></button> 
												<button onclick="var demo=$('.dedispl<?php echo $product->product_id;?>').val();$('.dedispl<?php echo $product->product_id;?>').val(parseInt(demo)+1); 
												" class="btn btn-success btn-xs">+</button>
											  </div>
										   <button onclick="$(this).attr('data-quantity',$('.dedispl<?php echo $product->product_id;?>').val());" class="btn btn-danger my-cart-btn my-cart-b " data-id="<?php echo $product->product_id;?>" data-name="<?php echo $product->name;?>" data-summary="summary 1" data-price="<?php echo $product->price; ?>" data-quantity="1" data-image="https://www.shopping.merakisan.com/merakisan_admin/profile/<?php echo $product->pic_url; ?>">Add to Cart</button>
										</div>
										<!-- modal -->
										<div class="modal fade" id="myModal1<?php echo $product->product_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content modal-info new">
												<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
																</div>
												<div class="modal-body modal-spa">
												<div class="col-md-4 span-2">
																<div class="item">
																	<img src="https://www.shopping.merakisan.com/merakisan_admin/profile/<?php echo $product->pic_url; ?>" class="img-responsive" alt="">
																</div>
														</div>
														<div class="col-md-8 span-1">
								<h3><?php echo $product->name;?> (<?php echo $product->unit_value ."".$product->price_unit;?>)</h3>
															
															
															<div class="price_single">
															  <span class="reducedfrom ">&nbsp;&nbsp;&nbsp; Rs <?php echo $product->price;?></span>
															
															 <div class="clearfix"></div>
															</div>
													
										
															<h4 class="quick">Quick Overview:</h4>
															<p class="quick_desc"> <?php echo $product->description;?></p>
															 <div class="add add-to">

															 <div class="btn-group">
																<button onclick="var demo=$('.dedispl<?php echo $product->product_id;?>').val();
																if(parseInt(demo)>1){
																$('.dedispl<?php echo $product->product_id;?>').val(parseInt(demo)-1); }
																" class="btn btn-success btn-xs">-</button>
																<input type="button" value="1" size="2"  class="btn btn-default btn-xs dedispl<?php echo $product->product_id;?>" ></button> 
																<button onclick="var demo=$('.dedispl<?php echo $product->product_id;?>').val();$('.dedispl<?php echo $product->product_id;?>').val(parseInt(demo)+1); 
																" class="btn btn-success btn-xs">+</button> 
															  </div>
																   <button onclick="$(this).attr('data-quantity',$('.dedispl<?php echo $product->product_id;?>').val());" class="btn btn-danger my-cart-btn my-cart-b " data-id="<?php  echo $product->product_id;?>" data-name="<?php echo $product->name;?>" data-summary="summary 1" data-price="<?php echo $product->price; ?>" data-quantity="1" data-image="https://www.shopping.merakisan.com/merakisan_admin/profile/<?php echo $product->pic_url; ?>">Add to Cart</button>
															</div>
														</div>
														<div class="clearfix"> </div>
														</div>
													
												</div>
											</div>
										</div>
										<!-- modal end -->
										
									</div>
								</div>
							</div>
							<?php } } else
							{ ?>
								<div class="col-m"> <h5><?php echo "Product Not Found"?></h5></div>
							<?php
							}
							?>
							
							
							
							<div class="clearfix"></div>
						 </div>
					</div>
					
				</div>
			</div>
		
	</div>
	</div>
	</div>
  <!-- Carousel
    ================================================== -->
    <!--<div id="myCarousel" class="carousel slide" data-ride="carousel">
     
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
         <a href="kitchen.html"> <img class="first-slide" src="images/ba.jpg" alt="First slide"></a>
       
        </div>
        <div class="item">
         <a href="care.html"> <img class="second-slide " src="images/ba1.jpg" alt="Second slide"></a>
         
        </div>
        <div class="item">
          <a href="hold.html"><img class="third-slide " src="images/ba2.jpg" alt="Third slide"></a>
          
        </div>
      </div>
    
    </div>--><!-- /.carousel -->

<!--content-->

	<!---popup for select city---->
		<div class="modal fade" id="citypopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
								<div class="col-md-5 span-2">
										<div class="form-group">
											<label class="no padding-right"> City </label>	
										</div>
								</div>
								<div class="col-md-7 span-1 ">
									<div class="form-group">
											<select name="city" id="cityid">
											<option value="">Select city</option>

											</select>	
											</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>



  <!-- product -->
  			 <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info new">
						
						
								
							
						</div>
					</div>
				</div>
  <!--- sdfsdsd-->
			
			
			
			