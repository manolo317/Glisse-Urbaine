<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
 
	<style type="text/css">
	  img 
	  {
	    padding: 5px;
	    max-width: 480px;
	  }
	  #galerie
	  {
	  	border:3px groove gray;
		border-radius:20px;
		background: whitesmoke;
		width:50%;
		position: relative;
		text-align:center;
		padding: 20px;
		margin: 20px;
	  }
	</style>
		<div id="galerie">
			<img src="img/minialienvspredator.jpg" id="img/alienvspredator.jpg" class='miniature'>
			<img src="img/miniecureuilskate.jpg" id="img/ecureuilskate.jpg" class='miniature'>
			<img src="img/miniaaron_wheelz.jpg" id="img/aaron_wheelz.jpg" class='miniature'>
			<img src="img/minidoublescoot.jpg" id="img/doublescoot.jpg" class='miniature'>
			<img src="img/minimirko_hanben.jpg" id="img/mirko_hanben.jpg" class='miniature'><br />
			<img id="grand" src="img/alienvspredator.jpg" />
		</div>
	<script src="jquery-3.1.0.js"></script>
	<script>
	  $(function() {
	    $('.miniature').css('border','5px white solid');
	    $('img:first').css('border','5px black solid');
	    $('.miniature').click(function() {
	      $('img').css('border','5px white solid');
	      $(this).css('border','5px black solid');
	      var nom = $(this).attr('id');
	      $('#grand').attr('src',nom);
	    });  
	  });
	</script>



	</body>
</html>
