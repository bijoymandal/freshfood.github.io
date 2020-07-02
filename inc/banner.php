<div class="slider">
	<div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
		<div class="carousel-inner">
			<?php echo make_slides($conn);?>
		</div>
		<ol class="carousel-indicators">
			<?php echo make_slide_indicators($conn);?>
	  </ol>
	</div>
</div>
</section>