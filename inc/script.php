<?php 
	
	if(isset($_POST['login']))
	{
		//print_r($_POST);
		$useremail = mysqli_real_escape_string($conn,$_POST['loginemail']);
		$userpass = mysqli_real_escape_string($conn,$_POST['loginpassword']);
		$email_check =  "select * from `customer` where email = '$useremail'";
		$res = mysqli_query($conn,$email_check);
		$checkemail = mysqli_num_rows($res);
		if($checkemail >0)
		{
			$email_pass = mysqli_fetch_assoc($res);
			$db_pass = $email_pass['password'];	
			$pass_decode = password_verify($userpass, $db_pass);
			//echo "Email Id right";
			//return ;
			if($email_pass && $pass_decode)
			{	
				$_SESSION['user_login'] = 'yes';
				$_SESSION['user_ID'] = $email_pass['id'];
				$_SESSION['user_name'] = $email_pass['username'];
				//window.location.href='index.php';
				//header("Location:index.php");
			}
		}
		else
		{
			echo "wrong";
		}
	}
?>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!--
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">	
	-->
	<script>
		/*navigation icon */ 
		function openmenu()
		{
			document.getElementById("side-menu").style.display="block";
			document.getElementById("menu-btn").style.display="none";
			document.getElementById("close-btn").style.display="block";
		}
		function closemenu()
		{
			document.getElementById("side-menu").style.display="none";
			document.getElementById("menu-btn").style.display="block";
			document.getElementById("close-btn").style.display="none";
		}
		//incremnt and decrement qty
		$('#quantity_inc_button').click(function()
		{
			//alert("hi");
			var qtynum = $('#quantity_input');
			var a = qtynum.val();
			if(a <=4 )
			{
				a++;
				qtynum.val(a);
			}
			else
			{
				$('#quantity_inc_button').prop("disabled",true);	
			}
		});
		$('#quantity_dec_button').click(function()
		{
			var qtynum = $('#quantity_input');
			var a = qtynum.val();
			if(a >=2)
			{
				a--;
				qtynum.val(a);
			}				
			else
			{
				$('#quantity_dec_button').prop("disabled",true);
			}
		});
		
		/*function manage_cart(pid,type)
		{
			var qty = $('#quantity_input').val();
			$.ajax({
				url:'manage_cart.php',
				type:'post',
				data:'pid='+pid+'&qty='+qty+'&type='+type,
				success:function(data)
				{
					$('.badge-success').html(data);
				}
			});	
		}*/
		
		//form validation 
		$(document).ready(function()
		{
			$(document).on('click','.log-sign',function()
			{
				$('#log-btn').modal('show');
				$('#log-btn').css({"display":"block"});
				$('#signupForm')[0].reset();
				$('#signupForm').submit(function(event)
				{
					//alert(formData);
					event.preventDefault();
					var formData = $(this).serialize();
					formData = "button=regiester&"+formData;
					$.ajax({
						url:'./functions/process.php',
						data:formData,
						method:'post',
						dataType:'json',
						success:function(data)
						{
							if(data=="Email exist")
							{
								$('#emailcheck').html('Email Id Already Exists');
							}
							if(data=="insert")
							{
								$('.foot-lnk p').html("Thank you for regiestration");
							}
							$('#log-btn').modal('hide');
							$('#log-btn').css({"display":"none"});
						}
					});	
				});
				$('#loginfrom')[0].reset();
				/*$('#loginfrom').submit(function(event)
				{
					//alert("hi");
					event.preventDefault();
					var formData = $(this).serialize();
					formData = "button=login&"+formData;
					//alert(formData);
					$.ajax({
						url:'./functions/process.php',
						data:formData,
						method:'post',
						//dataType:'json',
						success:function(data)
						{
							if(data == "wrong")
							{
								$('#log_error_email').text("Email ID not exists");
							}
							if(data == "valid")
							{
								window.Location.href=index.php;
							}
							//$('#log-btn').modal('hide');
							//$('#log-btn').css({"display":"none"});
						}
					});
				});*/
				
			});
			
			$(document).on('click','.close',function()
			{
				$('#log-btn').modal('hide');
				$('#log-btn').css({"display":"none"});
			});
			//product submit
			/*$("#prod_item").submit(function(e)
			{
				e.preventDefault();
				var formdata = $(this).serialize();
				formdata = "button=add_to_cart&"+formdata;
				//alert(formdata);
				$.ajax({
					url: "./functions/process.php",
					type: "POST",
					dataType:"json", 
					data: formdata,
				}).done(function(data)
				{
					var totalItemInCart = $("#shopping-cart").html(data.items_in_cart); // get Json data                   
					var new_item_qty = $("#items_in_shopping_cart").html(data.all_items); //
					$('#cart_update_info').empty();
					$("#cart_update_info").append("<div id='new_item_added'><i class='glyphicon glyphicon-ok' style='color:green;'></i> Item added to the cart</div>").fadeIn('fast').delay(2000).fadeOut('fast');
					$("#cart_update_info").append("<div id='new_item_added'><img alt='tick image' width='20' src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0MjYuNjY3IDQyNi42NjciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQyNi42NjcgNDI2LjY2NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiM2QUMyNTk7IiBkPSJNMjEzLjMzMywwQzk1LjUxOCwwLDAsOTUuNTE0LDAsMjEzLjMzM3M5NS41MTgsMjEzLjMzMywyMTMuMzMzLDIxMy4zMzMgIGMxMTcuODI4LDAsMjEzLjMzMy05NS41MTQsMjEzLjMzMy0yMTMuMzMzUzMzMS4xNTcsMCwyMTMuMzMzLDB6IE0xNzQuMTk5LDMyMi45MThsLTkzLjkzNS05My45MzFsMzEuMzA5LTMxLjMwOWw2Mi42MjYsNjIuNjIyICBsMTQwLjg5NC0xNDAuODk4bDMxLjMwOSwzMS4zMDlMMTc0LjE5OSwzMjIuOTE4eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K'/> Item added to the cart</div>").fadeIn('fast').delay(2000).fadeOut('fast');
					if($('.shopping-item').css("display","block"))
					{
						$(".shopping-cart-info").trigger("click");
					}
				})
				//e.preventDefault();
			});
			$('#shopping-cart-info').click(function(e)
			{
				e.preventDefault();
				$('#shopping-item').fadeIn();
				$('#shopping-cart-result').load("./functions/process.php",{"load_cart_items":"true"});
			});
			*/
		});

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		function manage_cart(pid,type)
		{
			var qty = $('#quantity_input').val();
			//alert(qty);
			$.ajax({
				url:'manage_cart.php',
				method:'post',
				data: 'pid='+pid+'&qty='+qty+'&type='+type,
				success:function(data)
				{
					//alert(data);
					if(type == 'remove')
					{
						window.location.href='cart.php';
					}
					$('.badge-info').html(data);
				}
			});
		}
		
		function manage_wishlist(pid,type)
		{
			$.ajax({
				url:'manage_wish.php',
				method:'post',
				data:'wid='+pid+'&wtype='+type,
				success:function(data)
				{
					alert(data);
					if(data == "not_login")
					{
						$('#modalLRForm').modal('open');
					}				
				}
			});
		}
		$(document).on('click','#log-sign',function()
		{
			$('#log-btn').modal('show');
			$('#log-btn').css({"display":"block"});
			$('#signupForm')[0].reset();
		});
		
		
		function sort_product_drop(cat_id)
		{
			var sort_product_id = $('#sort_product_id').val();
			//alert(cat_id);
			window.location.href="http://localhost/shops/category.php?id="+cat_id+"&sort="+sort_product_id;
		}
		/*$(document).on('click','#myTab',function()
		{
			var popularity = $('#home-tab').attr('href');
			var price_low = $('#profile-tab').attr('href');
			var price_high = $('#contact-tab').attr('href');
			var new_lunch = $('#newset-tab').attr('href');
			alert(popularity);
			alert(price_low);
			alert(price_high);
			alert(new_lunch);
		});*/
		$(document).on('click','#wishlist',function()
		{
			var wish_id = $('#wish_id').val();
			alert(wish_id);
		});
	
	
	$(document).ready(function()
	{
		$('#itemslider').carousel({ interval: 3000 });

		$('.carousel-showmanymoveone .item').each(function()
		{
			var itemToClone = $(this);
			for (var i=1;i<6;i++) 
			{
				itemToClone = itemToClone.next();
				if (!itemToClone.length) 
				{
					itemToClone = $(this).siblings(':first');
				}

				itemToClone.children(':first-child').clone()
				.addClass("cloneditem-"+(i))
				.appendTo($(this));
			}
		});
	});
	
</script>

</body>
</html>