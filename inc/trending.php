<section class="featured-categories">
	<!-- Item slider-->
	<div class="container-fluid">
	  <!--<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
		  <div class="carousel carousel-showmanymoveone slide" id="itemslider">
			<div class="carousel-inner">

			  <div class="item active">
				<div class="col-xs-12 col-sm-6 col-md-2">
				  <a href="#"><img src="img/50000557_5-fresho-tomato-hybrid-organically-grown.jpg" class="img-responsive center-block"></a>
				  <h4 class="text-center">MAYORAL SUKNJA</h4>
				  <h5 class="text-center">4000,00 TK</h5>
				</div>
			  </div>

			  <div class="item">
				<div class="col-xs-12 col-sm-6 col-md-2">
				  <a href="#"><img src="img/40050189_3-anmol-yummy-tiffin-cake-chocolate.jpg" class="img-responsive center-block"></a>
				  <h4 class="text-center">MAYORAL KOŠULJA</h4>
				  <h5 class="text-center">4000,00 TK</h5>
				</div>
			  </div>

			  <div class="item">
				<div class="col-xs-12 col-sm-6 col-md-2">
				  <a href="#"><img src="img/10000912_7-fresho-chicken-leg-without-skin.jpg" class="img-responsive center-block"></a>
				  <span class="badge">10%</span>
				  <h4 class="text-center">PANTALONE TERI 2</h4>
				  <h5 class="text-center">4000,00 TK</h5>
				  <h6 class="text-center">5000,00 TK</h6>
				</div>
			  </div>

			  <div class="item">
				<div class="col-xs-12 col-sm-6 col-md-2">
				  <a href="#"><img src="img/bell-pepper-food-fresh-132431.jpg" class="img-responsive center-block"></a>
				  <h4 class="text-center">CVETNA HALJINA</h4>
				  <h5 class="text-center">4000,00 RSD</h5>
				</div>
			  </div>

			  <div class="item">
				<div class="col-xs-12 col-sm-6 col-md-2">
				  <a href="#"><img src="img/10000366_9-fresho-parwal.jpg" class="img-responsive center-block"></a>
				  <h4 class="text-center">MAJICA FOTO</h4>
				  <h5 class="text-center">4000,00 TK</h5>
				</div>
			  </div>

			  <div class="item">
				<div class="col-xs-12 col-sm-6 col-md-2">
				  <a href="#"><img src="img/30000605_12-fresho-papaya-raw.jpg" class="img-responsive center-block"></a>
				  <h4 class="text-center">MAJICA MAYORAL</h4>
				  <h5 class="text-center">4000,00 TK</h5>
				</div>
			  </div>

			</div>

			<div id="slider-control">
			  <a class="left carousel-control" href="#itemslider" data-slide="prev"><img src="https://cdn0.iconfinder.com/data/icons/website-kit-2/512/icon_402-512.png" alt="Left" class="img-responsive"></a>
			  <a class="right carousel-control" href="#itemslider" data-slide="next"><img src="http://pixsector.com/cache/81183b13/avcc910c4ee5888b858fe.png" alt="Right" class="img-responsive"></a>
			</div>
		  </div>
		</div>
	  </div>-->
	</div>	
</section>
	<style>

#itemslider h4{
  font-family: 'Josefin Sans', sans-serif;
  font-weight: 400;
  font-size: 12px;
  margin: 10px auto 3px;
}
#itemslider h5{
  font-family: 'Josefin Sans', sans-serif;
  font-weight: bold;
  font-size: 12px;
  margin: 3px auto 2px;
}
#itemslider h6{
  font-family: 'Josefin Sans', sans-serif;
  font-weight: 300;;
  font-size: 10px;
  margin: 2px auto 5px;
}
/*.badge {
  background: #b20c0c;
  position: absolute;
  height: 40px;
  width: 40px;
  border-radius: 50%;
  line-height: 31px;
  font-family: 'Josefin Sans', sans-serif;
  font-weight: 300;
  font-size: 14px;
  border: 2px solid #FFF;
  box-shadow: 0 0 0 1px #b20c0c;
  top: 5px;
  right: 25%;
}*/
#slider-control img{
  padding-top: 60%;
  margin: 0 auto;
}
@media screen and (max-width: 992px){
#slider-control img {
  padding-top: 70px;
  margin: 0 auto;
}
}

.carousel-showmanymoveone .carousel-control {
  width: 4%;
  background-image: none;
}
.carousel-showmanymoveone .carousel-control.left {
  margin-left: 5px;
}
.carousel-showmanymoveone .carousel-control.right {
  margin-right: 5px;
}
.carousel-showmanymoveone .cloneditem-1,
.carousel-showmanymoveone .cloneditem-2,
.carousel-showmanymoveone .cloneditem-3,
.carousel-showmanymoveone .cloneditem-4,
.carousel-showmanymoveone .cloneditem-5 {
  display: none;
}
@media all and (min-width: 768px) {
  .carousel-showmanymoveone .carousel-inner > .active.left,
  .carousel-showmanymoveone .carousel-inner > .prev {
    left: -50%;
  }
  .carousel-showmanymoveone .carousel-inner > .active.right,
  .carousel-showmanymoveone .carousel-inner > .next {
    left: 50%;
  }
  .carousel-showmanymoveone .carousel-inner > .left,
  .carousel-showmanymoveone .carousel-inner > .prev.right,
  .carousel-showmanymoveone .carousel-inner > .active {
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner .cloneditem-1 {
    display: block;
  }
}
@media all and (min-width: 768px) and (transform-3d), all and (min-width: 768px) and (-webkit-transform-3d) {
  .carousel-showmanymoveone .carousel-inner > .item.active.right,
  .carousel-showmanymoveone .carousel-inner > .item.next {
    -webkit-transform: translate3d(50%, 0, 0);
    transform: translate3d(50%, 0, 0);
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner > .item.active.left,
  .carousel-showmanymoveone .carousel-inner > .item.prev {
    -webkit-transform: translate3d(-50%, 0, 0);
    transform: translate3d(-50%, 0, 0);
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner > .item.left,
  .carousel-showmanymoveone .carousel-inner > .item.prev.right,
  .carousel-showmanymoveone .carousel-inner > .item.active {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    left: 0;
  }
}
@media all and (min-width: 992px) {
  .carousel-showmanymoveone .carousel-inner > .active.left,
  .carousel-showmanymoveone .carousel-inner > .prev {
    left: -16.666%;
  }
  .carousel-showmanymoveone .carousel-inner > .active.right,
  .carousel-showmanymoveone .carousel-inner > .next {
    left: 16.666%;
  }
  .carousel-showmanymoveone .carousel-inner > .left,
  .carousel-showmanymoveone .carousel-inner > .prev.right,
  .carousel-showmanymoveone .carousel-inner > .active {
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner .cloneditem-2,
  .carousel-showmanymoveone .carousel-inner .cloneditem-3,
  .carousel-showmanymoveone .carousel-inner .cloneditem-4,
  .carousel-showmanymoveone .carousel-inner .cloneditem-5,
  .carousel-showmanymoveone .carousel-inner .cloneditem-6  {
    display: block;
  }
}
@media all and (min-width: 992px) and (transform-3d), all and (min-width: 992px) and (-webkit-transform-3d) {
  .carousel-showmanymoveone .carousel-inner > .item.active.right,
  .carousel-showmanymoveone .carousel-inner > .item.next {
    -webkit-transform: translate3d(16.666%, 0, 0);
    transform: translate3d(16.666%, 0, 0);
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner > .item.active.left,
  .carousel-showmanymoveone .carousel-inner > .item.prev {
    -webkit-transform: translate3d(-16.666%, 0, 0);
    transform: translate3d(-16.666%, 0, 0);
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner > .item.left,
  .carousel-showmanymoveone .carousel-inner > .item.prev.right,
  .carousel-showmanymoveone .carousel-inner > .item.active {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    left: 0;
  }
}

	</style>