<style type="text/css">
	.diapo
	{
		margin-top: 120px;
	}
	.stage button { margin-top: 10px; }
	.stage ul {
		color: rgb(126,244,55);
		text-align: center;
		margin: 0;
		padding: 0;
		list-style-type: none;
	}
	.stage p {
		max-width: 500px;
		margin-left: auto;
		margin-right: auto;
	}
	.stage a {
		color: rgb(126,244,55);
		-webkit-transition: color 0.25s cubic-bezier(0.860, 0.000, 0.070, 1.000); 
	       -moz-transition: color 0.25s cubic-bezier(0.860, 0.000, 0.070, 1.000); 
	         -o-transition: color 0.25s cubic-bezier(0.860, 0.000, 0.070, 1.000); 
	            transition: color 0.25s cubic-bezier(0.860, 0.000, 0.070, 1.000); /* ease-in-out */
	}
	.stage button {
		color: gray;
		font-size: 12px;
		letter-spacing: 0.3em;
		text-transform: uppercase;
		border-radius: 4px;
		cursor: pointer;
		border: none;
		background: rgb(126,244,55);
		padding: 8px 14px;
	}
	.stage ul.animate {
		-webkit-transition: -webkit-transform 0.75s cubic-bezier(0.860, 0.000, 0.070, 1.000); 
	       -moz-transition: transform 0.75s cubic-bezier(0.860, 0.000, 0.070, 1.000); 
	         -o-transition: transform 0.75s cubic-bezier(0.860, 0.000, 0.070, 1.000); 
	            transition: transform 0.75s cubic-bezier(0.860, 0.000, 0.070, 1.000); /* ease-in-out */	
	}
	.stage {
		width: 80%;
		margin: 0 auto;
		padding: 0 12%;
		text-align: center;
		overflow: hidden;
	}	
	.sldr {
		max-width: 500px;
		margin: 0 auto;
		overflow: visible;
		position: relative;
		clear: both;
		display: block;
	}
	.sldr > ul > li {
		float: left;
		display: block;
		width: 500px;
	}
	.stage div.skew {
		max-width: 500px;
		margin: 0 auto;
	
		display: block;
		overflow: hidden;
		-webkit-transform: skewX(16deg);
	       -moz-transform: skewX(16deg);
	        -ms-transform: skewX(16deg);
	            transform: skewX(16deg);
	}
	.stage div.skew > div.wrap {
		display: block;
		overflow: hidden;
		-webkit-transform: skewX(-16deg);
		   -moz-transform: skewX(-16deg);
		    -ms-transform: skewX(-16deg);
		        transform: skewX(-16deg);
		margin-left: -10.1%;
		width: 122%;
	}
	.stage img {
		max-width: 1000px;
		width: 100%;
		height: auto;
		display: block;
		margin: 0 auto;
	}
	.selectors li {
		font-size: 46px;
		line-height: 32px;
		display: inline;
		padding: 0 2px;	
	}
	.selectors li a {
		text-decoration: none;
	}
	.selectors li.focalPoint a {
		color: #CCC;
		cursor: default;
	}
	.captions div {
		left: 200%;
		position: fixed;
		opacity: 0;
		-webkit-transition: opacity 0.75s cubic-bezier(0.860, 0.000, 0.070, 1.000); 
	       -moz-transition: opacity 0.75s cubic-bezier(0.860, 0.000, 0.070, 1.000); 
	         -o-transition: opacity 0.75s cubic-bezier(0.860, 0.000, 0.070, 1.000); 
	            transition: opacity 0.75s cubic-bezier(0.860, 0.000, 0.070, 1.000); /* ease-in-out */
	}
	.captions div.focalPoint {
		opacity: 1;
		left: inherit;
		position: static;
		margin-bottom: 12px;			
	}
	.captions p
	{
		text-align: center;
	}
	div.captions div p a
	{
		color: gray;
		font-size: 25px;
		text-decoration: underline;
		-moz-text-decoration-color: rgb(126,244,55);
		text-decoration-color: rgb(126,244,55);			
	}
	.captions div p a:hover
	{
		color: rgb(126,244,55);
	}
	.stage .clear {
		display: block;
		width: 100%;
		height: 0px;
		overflow: hidden;
		clear: both;
	}
</style>
<div class="diapo">
	<div class="stage">
		<div id="SLDR-ONE" class="sldr">
			<ul class="wrp animate">
				<li class="elmnt-one"><div class="skew"><div class="wrap"><a href="roller.php" title="Toutes les news de Roller"><img src="img/diaporoller.jpg" width="1000" height="563"></a></div></div></li>
				<li class="elmnt-two"><div class="skew"><div class="wrap"><a href="skate.php" title="Toutes les news de Skate"><img src="img/diaposkate.jpg" width="1000" height="563"></a></div></div></li>
				<li class="elmnt-three"><div class="skew"><div class="wrap"><a href="trottinette.php" title="Toutes les news de Trotinette"><img src="img/diapotrot.jpg" width="1000" height="563"></div></a></div></li>
				<li class="elmnt-four"><div class="skew"><div class="wrap"><a href="videos.php" title="Toutes les vidéos"><img src="img/diapovideos.jpg" width="1000" height="563"></div></a></div></li>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="captions">
		 <div class="focalPoint"><p><a href="roller.php" title="Toutes les news de Roller"><small>Roller</small></a></p></div>
		 <div><p><a href="skate.php" title="Toutes les news de Skate"><small>Skate</small></a></p></div>
		 <div><p><a href="trottinette.php" title="Toutes les news de Trotinette"><small>Trotinette</small></p></a></div>
		 <div><p><a href="videos.php" title="Toutes les vidéos"><small>Vidéos</small></p></a></div>
		</div>
		<ul class="selectors">
			<li class="focalPoint"><a href="">&ordm;</a></li><li><a href="">&ordm;</a></li><li><a href="">&ordm;</a></li><li><a href="">&ordm;</a></li>
		</ul>
		<button class="sldr-prv sldr-nav prev">Prev</button>
		<button class="sldr-nxt sldr-nav next">Next</button>
		<div class="clear"></div>
	</div>
</div>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery.sldr.js"></script>
<script>
	$( window ).load( function() {
	$( '.sldr' ).each( function() {
		var th = $( this );
		th.sldr({
			focalClass    : 'focalPoint',
			offset        : th.width() / 2,
			sldrWidth     : 'responsive',
			nextSlide     : th.nextAll( '.sldr-nav.next:first' ),
			previousSlide : th.nextAll( '.sldr-nav.prev:first' ),
			selectors     : th.nextAll( '.selectors:first' ).find( 'li' ),
			toggle        : th.nextAll( '.captions:first' ).find( 'div' ),
			sldrInit      : sliderInit,
			sldrStart     : slideStart,
			sldrComplete  : slideComplete,
			sldrLoaded    : sliderLoaded,
			sldrAuto      : true,
			sldrTime      : 5000,
			hasChange     : true
		});
	});
		// OPACITY OF BUTTON SET TO 0%
	$(".roll").css("opacity","0"); 
	// ON MOUSE OVER
	$(".roll").hover(function () {
	// SET OPACITY TO 70%
	$(this).stop().animate({
	opacity: .7
	}, "slow");
	},
	// ON MOUSE OUT
	function () {
	// SET OPACITY BACK TO 50%
	$(this).stop().animate({
	opacity: 0
	}, "slow");
	});
});
function sliderInit( args ) {
}
function slideLoaded( args ) {
}
function sliderLoaded( args ) {
}
function slideStart( args ) {
}
function slideComplete( args ) {
}
</script>