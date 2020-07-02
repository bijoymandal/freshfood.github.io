<section class="header">
	<div class="side-menu" id="side-menu">
		<ul>
			<?php
				$sql = "SELECT * FROM `category` WHERE parent_id=0 order BY category_name ASC";
				$result = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_assoc($result))
				{
					?>
			
					<li><a href="category.php?id=<?php echo $row['category_id']?>"><?php echo $row['category_name'];?></a><i class="fa fa-angle-right" aria-hidden="true"></i>
						<!--<ul>
							<li><a href="#<?php echo $row['parent_id'];?>"><?php echo $row['category_name'];?></li>
						</ul>-->
					</li>
			<?php
		}
		?>
		</ul>
	</div>