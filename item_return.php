<?php
	include("index_layout.php");
	include("database.php");
	$update_id=$_GET['id'];
	$Itemisseu=mysql_query("select * from `issue_item` where id='".$update_id."'");		
	$ftc_Itemisseu=mysql_fetch_array($Itemisseu);
	$ftcname=$ftc_Itemisseu['name'];
	$ftcmobile_no=$ftc_Itemisseu['mobile_no'];
	$ftcitem_id=$ftc_Itemisseu['item_id'];
	$ftcitem_price=$ftc_Itemisseu['item_price'];
	$ftcQuantity=$ftc_Itemisseu['quantity'];
	$ftctotal_price=$ftc_Itemisseu['total_price'];
	$ftcremarks=$ftc_Itemisseu['remarks'];
	$ftcissue_date=date('d-m-Y', strtotime($ftc_Itemisseu['issue_date']));
  
	if(isset($_POST['sub']))	
	{
		extract($_POST);
		$timestamp=date('Y-m-d h:i:s');
		$return_date=date('Y-m-d', strtotime($_POST['return_date'])); 
		//-- Update Stock
		$old_quantity=$_POST['old_quantity'];
		
		$cheskquery=mysql_query("select * from `stock_quantity` where item_id='$item_id'");		
		$ftc_nmg=mysql_fetch_array($cheskquery);
		$ftcQuantity=$ftc_nmg['quantity'];
		$totalRemainingQuantity=$ftcQuantity+$old_quantity;
		//-- 
		$afterreturntotalStock=$totalRemainingQuantity-$quantity;
		mysql_query("update `stock_quantity` set `quantity`='$afterreturntotalStock' where `item_id`='$item_id'"); 
		//-- Insert Issue
		mysql_query("insert into `return_item` SET `issue_id`='$issue_id',`name`='$name',`mobile_no`='$mobile_no',`item_price`='$item_price',`item_id`='$item_id',`total_price`='$total_price',`quantity`='$quantity',`remarks`='$remarks',`return_date` = '$return_date' , `timestamp`='$timestamp'");	
		@header("location:item_return.php");
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
									<i class="fa fa-gift"></i> Return Item
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
                                                    <select class="form-control select2me getMobile" required="required" placeholder="Select..." id="issue_id" name="issue_id">
                                                        <option value=""> Select...</option>
                                                            <?php
                                                            $r1=mysql_query("select `name`,`id`,`mobile_no`,`quantity` from issue_item order by `name` ASC");		
                                                            $i=0;
                                                            while($row1=mysql_fetch_array($r1))
                                                            {
                                                                $id=$row1['id'];
                                                                $name=$row1['name'];
																$mobile_no=$row1['mobile_no'];
																$quantity=$row1['quantity'];
                                                                ?>
                                                                <option value="<?php echo $id;?>" name="<?php echo $name;?>" mobile="<?php echo $mobile_no;?>" quantity="<?php echo $quantity;?>"><?php echo $name;?></option>
                                                            	<?php 
                                                            }?> 
                                                      </select> 
                                                </div>
                                            </div>
                                            <input type="hidden" id="old_quantity" name="old_quantity">
                                            <input type="hidden" id="name" name="name">
                                            <div class="form-group col-md-6">
                                                <label class="control-label col-md-4">Mobile No</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <input class="form-control allLetter mobile"  placeholder="Please Enter Mobile No" required name="mobile_no" autocomplete="off" type="text">
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
                                                                <option  value="<?php echo $id;?>" price='<?php echo $price;?>'><?php echo $item_name;?></option>
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
                                                    <input class="form-control allLetter item_price"  name="item_price" placeholder="Please select item" readonly required autocomplete="off" type="text">
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
                                                    <input class="form-control allLetter total_price" name="total_price" placeholder="Please enter quantity"  readonly required autocomplete="off" type="text">
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
                                                      <input class="form-control form-control-inline input-md date-picker"  value="<?php echo date('d-m-Y');?>"  placeholder="dd/mm/yyyy" data-date-format="dd-mm-yyyy" type="text" name="return_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label col-md-4">Reasone for return</label>
                                                <div class="col-md-8">
                                                    <div class="input-icon right">
                                                    <i class="fa"></i>
                                                    <textarea class="form-control" name="remarks"  placeholder="Remarks" rows="2" autocomplete="off" ></textarea>
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

	$('.getMobile').on('change', function()
	{
		var itemvalue=$(this).val();
		var itemRate = $('option:selected', this).attr('mobile');
		var name = $('option:selected', this).attr('name');
		var old_quantity = $('option:selected', this).attr('quantity');
		if(itemvalue.length >0){
		$('.mobile').val(itemRate); $('#old_quantity').val(old_quantity);$('#name').val(name);
		}else { $('.mobile').val(''); $('#old_quantity').val('');$('#name').val('');
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
		var issue_id = $('#issue_id option:selected').val();
		var item_id = $('.getRate option:selected').val();
  		$.ajax({
			url: "notification_page.php?function_name=CheckStockReturnMoreThenIssueOrNot&issue_id="+issue_id+"&quantity="+quantity+"&item_id="+item_id,
			}).done(function(response) {
			if(response == 1)
			{alert('You have return more then  issue item.');$('.total_price').val('');$('.quantity').val('');
			}else{}
  		});
		
	});
});
</script>
<?php scripts();?>

</html>
 

