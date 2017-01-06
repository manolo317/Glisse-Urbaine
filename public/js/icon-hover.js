$(function() {
    $('#icon-roller').mouseover(function() {
      $(this).fadeOut(1000);
      $('.icon-roller-hover').fadeIn(1000);
      $('#lien-icone').html('Toutes les vidéos Roller').css('color','rgb(237,153,39)');
    });
    $('.icon-roller-hover').mouseout(function() {
      $(this).fadeOut(1000);
      $('#icon-roller').fadeIn(1000);
      $('#lien-icone').html('');
    });
  });

$(function() {
    $('#icon-trot').mouseover(function() {
      $(this).fadeOut(1000);
      $('.icon-trot-hover').fadeIn(1000);
      $('#lien-icone').html('Toutes les vidéos Trottinette').css('color','rgb(126,244,55)');
    });
    $('.icon-trot-hover').mouseout(function() {
      $(this).fadeOut(1000);
      $('#icon-trot').fadeIn(1000);
      $('#lien-icone').html('');
    });
  });
  
$(function() {
    $('#icon-skate').mouseover(function() {
      $(this).fadeOut(1000);
      $('.icon-skate-hover').fadeIn(1000);
      $('#lien-icone').html('Toutes les vidéos Skate').css('color','rgb(0,165,244)');
    });
    $('.icon-skate-hover').mouseout(function() {
      $(this).fadeOut(1000);
      $('#icon-skate').fadeIn(1000);
      $('#lien-icone').html('');
    });
  });