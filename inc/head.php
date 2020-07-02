<?php 
	require('add_to_cart.php');
	$obj= new add_to_cart();
	$totalProduct = $obj->totalProduct();
?>
<body>
	<!--Navigation sction-->
	<div class="top-nav-bar">
		<div class="search-box">
			<i class="fa fa-bars" aria-hidden="true" id="menu-btn" onclick="openmenu()"></i>
			<i class="fa fa-times" aria-hidden="true"id="close-btn" onclick="closemenu()"></i>
			<a href="index.php"><img src="img\51606312.png" class="logo"></a>
			<div class="autocomplete">
				<form action="search.php" method="get">
					<input type="text" class="form-controls form-control" name="str" placeholder="select for products,brand and more...." autocomplete="off">
				</form>
			</div>
			<div class="input-group-text"><i class="fa fa-search" aria="hidden"></i></div>
		</div>
		<div class="menu-bar">
			<ul>
				<?php 
					if(isset($_SESSION['user_login']))
					{	echo '<li>'; 
						echo '<a href="#" class="text-center">'.$_SESSION['user_name'].' <i class="fa fa-caret-down"></i></a>';
							echo "<ul class='drop-menu menu-2'>";
								echo "<li><a href='myorder.php'>Order</a></li>";
								echo "<li><a>Member</a></li>";
								echo "<li><a href='logout.php'><i class='fa fa-sign-out'></i>Logout</a></li>";
							echo "</ul>";
					
						echo '</li>';
						echo '<li>';
							echo '<a>';
							 echo '<i class="fa fa-heart-o"></i><span class="badge badge-info"></span>';
							 echo '</a>';
						echo '</li>';
					}
					else
					{
						echo "<li><a class='log-sign'><i class='fa fa-sign-in'></i>Login & Sign up</a></li>";
					}
				?>
				<li>
					<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					<a href="cart.php"><span class="badge badge-info">
						<?php echo $totalProduct;?>
					</span></a>
				</li>
			</ul>
		</div>
	</div>
	<!--login panel-->
	<div id="log-btn" class="modal">
		<div class="login-wrap">
			<a class="close" title="Close Modal"></a>
			<div class="login-html">
				<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
				<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
				<div class="login-form">
					<div class="sign-in-htm">
						<form method="post" id="loginfrom">
							<div class="group">
								<label for="logemail" class="label" style="text-align:left;">Email </label>
								<input id="logemail" type="text" class="input" name="loginemail" placeholder="Enter Emai ID">
								<span id="log_error_email"></span>
							</div>
							<div class="group">
								<label for="pass" class="label" style="text-align:left;">Password</label>
								<input id="pass" type="password" class="input" data-type="password" name="loginpassword" placeholder="Enter Password">
							</div>
							<div class="group">
								<input id="check" type="checkbox" class="check" checked>
								<label for="check"><span class="icon"></span> Keep me Signed in</label>
							</div>
							<div class="group">
							  <!--<button type="submit" class="button" name="button" value="btn-signin" id="btn-signin">Sign In</button>-->
							  <input type="submit" class="button" name="login" value="Sign In" id="btn-signin" />
							</div>
						</form>
						<div class="hr"></div>
						<div class="foot-lnk">
						  <a href="#forgot" style="color:#ffffff;">Forgot Password?</a>
						</div>
					</div>
					<div class="sign-up-htm">
						<form method="post" id="signupForm">
							<div class="group">
								<label for="user" class="label" style="text-align:left;">Username</label>
								<input id="signuser" type="text" class="input" name="username" placeholder="Enter Username" required autocomplete="off">
								<span id="usercheck"></span>
							</div>
							<div class="group">
								<label for="signpass" class="label"style="text-align:left;">Password</label>
								<input id="signpass" type="password" class="input" data-type="password" name="password" autocomplete="off" required placeholder="Enter Password">
								<span id="passcheck"></span>
							</div>
							<div class="group">
								<label for="signphone" class="label" style="text-align:left;">Phone</label>
								<input id="signphone" type="text" class="input" name="phone" placeholder="Enter phone Number" autocomplete="off" required>
								<span  id="phonecheck"></span>
							</div>
							<div class="group">
								<label for="signemail" class="label" style="text-align:left;">Email Address</label>
								<input id="signemail" type="text" class="input" name="email" placeholder="Enter User Email" autocomplete="off" required>
								<span id="emailcheck"></span>
							</div>
							<div class="group">
								<button type="submit" class="button" name="button" id="btn-signup" value="btn-signup">Sign Up</button>
							</div>
						</form>
						<div class="hr"></div>
						<div class="foot-lnk">
							<p></p>
							<a href="#" style="color:#ffffff;">Already Member ?</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>