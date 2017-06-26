<?php
	include("index_layout.php");
	include("database.php");
 
	if(isset($_POST['sub']))	
	{
		extract($_POST);
		$timestamp=date('Y-m-d h:i:s');
		$issue_date=date('Y-m-d', strtotime($_POST['issue_date'])); 
		//-- Update Stock
		$cheskquery=mysql_query("select * from `stock_quantity` where item_id='$item_id'");		
		$ftc_nmg=mysql_fetch_array($cheskquery);
		$ftcQuantity=$ftc_nmg['quantity'];
		$totalRemainingQuantity=$ftcQuantity-$quantity; 
		mysql_query("update `stock_quantity` set `quantity`='$totalRemainingQuantity' where `item_id`='$item_id'"); 
		//-- Insert Issue
		mysql_query("insert into `issue_item` SET `name`='$name',`mobile_no`='$mobile_no',`item_price`='$item_price',`item_id`='$item_id',`total_price`='$total_price',`quantity`='$quantity',`remarks`='$remarks',`issue_date` = '$issue_date' , `timestamp`='$timestamp'");	
		@header("location:item_issue.php");
	}
?>

<html>
	<head>
		<?php css();?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Item Issue</title>
	</head>
	<?php contant_start(); menu();  ?>
	<body>
		<div class="page-content-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-md-12">
						<div class="portlet box">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i> Item Issue
								</div>
							</div>
							<div class="portlet-body form">
							<!-- BEGIN FORM-->
								<form  class="form-horizontal" id="form_sample_2"  role="form" method="post"> 
									<div class="form-body">
                                    	<div class="col-md-12">
                                            <div class="form-group col-md-6">
                                                <label class="control-label col-md-4">Name</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input class="form-control" placeholder="Please Enter Name" required name="name" autocomplete="off" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label col-md-4">Mobile No</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input class="form-control allLetter" placeholder="Please Enter Mobile No" required name="mobile_no" autocomplete="off" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group col-md-6">
                                                <label class="control-label col-md-4"> Item </label>
                                                <div class="col-md-8">
                                                  	<select class="form-control getRate select2me" required="required" placeholder="Select..." name="item_id">
                                                        <option value=""> Select...</option>
                                                            <?php
                                                            $r1=mysql_query("select `item_name`,`id`,`price` from master_item where flag = 0 order by id ASC");		
                                                            $i=0;
                                                            while($row1=mysql_fetch_array($r1))
                                                            {
                                                                $id=$row1['id'];
                                                                $item_name=$row1['item_name'];
																$price=$row1['price'];
                                                               ?>
                                                                <option value="<?php echo $id;?>" price='<?php echo $price;?>'><?php echo $item_name;?></option>
                                                            <?php 
                                                            }?> 
                                                      </select>   
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label col-md-4">Item Price</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input class="form-control allLetter item_price" name="item_price" placeholder="Please select item" readonly required autocomplete="off" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group col-md-6">
                                                <label class="control-label col-md-4">Quantity</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                        <input class="form-control allLetter quantity" placeholder="Please Enter quantity" required name="quantity" autocomplete="off" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label col-md-4">Total Price</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input class="form-control allLetter total_price"  name="total_price" placeholder="Please enter quantity"  readonly required autocomplete="off" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group col-md-6">
                                                <label class="control-label col-md-4">Date</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                        <i class="fa"></i>
                                                      <input class="form-control form-control-inline input-md date-picker"  value="<?php echo date("d-m-Y"); ?>" placeholder="dd/mm/yyyy" data-date-format="dd-mm-yyyy" type="text" name="issue_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label col-md-4">Remarks</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <textarea class="form-control" name="remarks" placeholder="Remarks" rows="2" autocomplete="off" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
										<div align="center">
												<button type="submit" name="sub" class="btn btn-primary">Submit</button>
												<button type="reset" class="btn default">Cancel</button>
										</div>
										 
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-------------------------- View------------>
 				</div>
			</div>
		</div>
 	</body>
<?php footer(); ?>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {	
 
	$('.allLetter').keyup(function(){
		var inputtxt=  $(this).val();
		var numbers =  /^[0-9]*\.?[0-9]*$/;
		
		if(inputtxt.match(numbers))  
		{  
		} 
		else  
		{  
			$(this).val('');
			return false;  
		}
	});
	$('.getRate').on('change', function()
	{
		var itemvalue=$(this).val();
		var itemRate = $('option:selected', this).attr('price');
		if(itemvalue.length >0){
		$('.item_price').val(itemRate);
		}else { $('.item_price').val('');
		}
	});
	$('.quantity').keyup(function(){
		var quantity = $(this).val();
		var item_price=$('.item_price').val();
		var total= item_price * quantity;
		
		if(quantity.length >0){
		$('.total_price').val(total);
		}else { $('.total_price').val('');
		}
 	});
	$('.quantity').keyup(function(){
		var quantity = $(this).val();
		var item_id = $('.getRate option:selected').val();
  		$.ajax({
			url: "notification_page.php?function_name=CheckStockAvaiableOrNot&id="+item_id+"&quantity="+quantity,
			}).done(function(response) {
			if(response == 1)
			{alert('Out of stock');$('.total_price').val('');$('.quantity').val('');
			}else{}
  		});
		
	});
});
</script>
<?php scripts();?>

</html>
 

