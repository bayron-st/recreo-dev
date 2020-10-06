

<?php echo form_open(site_url('participantes/juego/create/' ), array('class' => 'form-horizontal form-groups-bordered validate ajax-submit', 'enctype' => 'multipart/form-data'));?>


<div class="col-sm-3">
      <input type="text" class="form-control" name="CANTIDAD"  value=""  data-validate="required" data-message-required="<?php echo ' Falta completar el campo nombre';?>">
    </div>
    <br><br><br>

<div class="info">
    <div class="score">
        <div class="turns" >Antes del reinicio: <span>2</span></div>
        <div class="attempts">Intentos: <span>0</span></div>
        <div class="wins" name="CANTIDAD">Victorias: <span>0</span></div>
    </div>
</div>
<main>
    <div class="card" data-type="flower" data-matched="false">
        <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/envase_2.jpg')"></div>
        <div class="back"  style="background-image:url('<?php echo base_url();?>uploads/game/logo.jpg')"></div>

    </div>

    <div class="card" data-type="mushroom" data-matched="false">
      <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/envase_3.jpg')"></div>
      <div class="back"  style="background-image:url('<?php echo base_url();?>uploads/game/logo.jpg')"></div>
    </div>

    <div class="card" data-type="star" data-matched="false">
      <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/envase_4.jpg')"></div>
      <div class="back"  style="background-image:url('<?php echo base_url();?>uploads/game/logo.jpg')"></div>
    </div>

    <div class="card" data-type="flower" data-matched="false">
      <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/envase_2.jpg')"></div>
      <div class="back"  style="background-image:url('<?php echo base_url();?>uploads/game/logo.jpg')"></div>
    </div>

    <div class="card" data-type="mushroom" data-matched="false">
      <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/envase_3.jpg')"></div>
      <div class="back"  style="background-image:url('<?php echo base_url();?>uploads/game/logo.jpg')"></div>
    </div>

    <div class="card" data-type="star" data-matched="false">
      <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/envase_4.jpg')"></div>
      <div class="back"  style="background-image:url('<?php echo base_url();?>uploads/game/logo.jpg')"></div>
    </div>

    <div class="card" data-type="flower" data-matched="false">
      <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/envase_2.jpg')"></div>
      <div class="back"  style="background-image:url('<?php echo base_url();?>uploads/game/logo.jpg')"></div>
    </div>

    <div class="card" data-type="mushroom" data-matched="false">
      <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/envase_3.jpg')"></div>
      <div class="back"  style="background-image:url('<?php echo base_url();?>uploads/game/logo.jpg')"></div>
    </div>

    <div class="card" data-type="star" data-matched="false">
      <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/envase_4.jpg')"></div>
      <div class="back"  style="background-image:url('<?php echo base_url();?>uploads/game/logo.jpg')"></div>
    </div>

    <div class="card" data-type="flower" data-matched="false">
      <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/envase_2.jpg')"></div>
      <div class="back"  style="background-image:url('<?php echo base_url();?>uploads/game/logo.jpg')"></div>
    </div>

    <div class="card" data-type="mushroom" data-matched="false">
      <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/envase_3.jpg')"></div>
      <div class="back"  style="background-image:url('<?php echo base_url();?>uploads/game/logo.jpg')"></div>
    </div>

    <div class="card" data-type="star" data-matched="false">
      <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/envase_4.jpg')"></div>
      <div class="back"  style="background-image:url('<?php echo base_url();?>uploads/game/logo.jpg')"></div>
    </div>

    <div class="card" data-type="1up" data-matched="false">
      <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/envase_5.jpg')"></div>
      <div class="back"  style="background-image:url('<?php echo base_url();?>uploads/game/logo.jpg')"></div>
    </div>

    <div class="card" data-type="coin10" data-matched="false">
      <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/envase_6.jpg')"></div>
      <div class="back"  style="background-image:url('<?php echo base_url();?>uploads/game/logo.jpg')"></div>
    </div>

    <div class="card" data-type="coin20" data-matched="false">
      <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/envase_7.jpg')"></div>
      <div class="back"  style="background-image:url('<?php echo base_url();?>uploads/game/logo.jpg')"></div>
    </div>

    <div class="card" data-type="1up" data-matched="false">
      <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/envase_5.jpg')"></div>
      <div class="back"  style="background-image:url('<?php echo base_url();?>uploads/game/logo.jpg')"></div>
    </div>

    <div class="card" data-type="coin10" data-matched="false">
      <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/envase_6.jpg')"></div>
      <div class="back"  style="background-image:url('<?php echo base_url();?>uploads/game/logo.jpg')"></div>
    </div>

    <div class="card" data-type="coin20" data-matched="false">
      <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/envase_7.jpg')"></div>
      <div class="back"  style="background-image:url('<?php echo base_url();?>uploads/game/logo.jpg')"></div>
    </div>

</main>

<div class="success">
    <div class="success-icon" data-type="mushroom">
          <div class="front" style="background-image:url('<?php echo base_url();?>uploads/game/logo.png')"></div>
    </div>

    <h2 class="success-message">¡Buen trabajo! </h2>
    <div class="score">
        <div class="turns">Antes del reinicio <span>2</span></div>
        <div class="attempts">Intentos <span>0</span></div>
        <div class="wins">Victorias <span>0</span></div>
        <div class="attempts-overall">Total intentos <span>0</span></div>
    </div>

    <button type="submit" class="btn-continue">Continuar</button>


  </div>

 <script type="text/javascript">
 var $board = $('main');
 var $card = $('.card');
 var $itemCount = $('.score span');
 var $wins = $('.wins span');
 var $turns = $('.turns span');
 var $attempts = $('.attempts span');
 var $attemptsOverall = $('.attempts-overall span');
 var $success = $('.success');
 var $successMsg = $('.success-message');
 var $successIcon = $('.success-icon');
 var $btnContinue = $('.btn-continue');
 var $btnSound = $('.btn-sound');
 var selectedClass = 'is-selected';
 var visibleClass = 'is-visible';
 var playSoundClass = 'is-playing';
 var scoreUpdateClass = 'is-updating';
 var lastTurnClass = 'last-turn';
 var dataMatch = 'data-matched';
 var dataType = 'data-type';
 var turnsCount = 2;
 var winsCount = 0;
 var attemptsCount = 0;
 var attemptsOverallCount = 0;
 var tooManyAttempts = 8;
 var timeoutLength = 600;
 var card1;
 var card2;
 var msg;


 // barajar las cartas
 shuffleCards();

 $card.on('click', function() {
   // Agregua la clase seleccionada a una tarjeta solo si aún no coincide
   if ($(this).attr(dataMatch) == 'false') {
     $(this).addClass(selectedClass);
   }

   var selectedCards = $('.' + selectedClass);

   // Comprueba si las cartas coinciden
   if (selectedCards.length == 2) {
     card1 = selectedCards.eq(0).attr(dataType);
     card2 = selectedCards.eq(1).attr(dataType);

     if (card1 == card2) {
       if ($btnSound.hasClass(playSoundClass)) {
         soundMatch.play();
       }
       selectedCards
         .attr(dataMatch, true)
         .removeClass(selectedClass)

     } else {
       if ($btnSound.hasClass(playSoundClass)) {
         soundNoMatch.play();
       }
       setTimeout(function() {
         turnsCount--;
         $turns
           .addClass(scoreUpdateClass)
           .html(turnsCount);
         selectedCards.removeClass(selectedClass);
       }, timeoutLength);

       if(turnsCount === 1) {
         setTimeout(function() {
           $turns.addClass(lastTurnClass);
         }, timeoutLength);
       }

       if(turnsCount <= 0) {
         setTimeout(function() {
           turnsCount = 2;
           $turns
             .removeClass(lastTurnClass)
             .html(turnsCount);
           $card.attr(dataMatch, false);
           attemptsCount += 1;
           $attempts
             .addClass(scoreUpdateClass)
             .html(attemptsCount);
         }, timeoutLength);
       }

     }
   }

   // gana
   if ($('[' + dataMatch + '="true"]').length == $card.length) {
     // Show success screen
     $success.addClass(visibleClass);
     if (attemptsCount <= tooManyAttempts) {
       setTimeout(function() {
         if ($btnSound.hasClass(playSoundClass)) {
           soundSuccess.play();
         }
       }, 600);
     }
     // Actualizar el mensaje de éxito según la cantidad de intentos
     switch(true) {
       case (attemptsCount <= 2):
         msg = "SUPER!!!";
         $successIcon.attr(dataType, "star");
         break;
       case (attemptsCount > 2 && attemptsCount <= 5):
         msg = "¡Buen trabajo!";
         $successIcon.attr(dataType, "mushroom");
         break;
       case (attemptsCount > 5 && attemptsCount <= 8):
         msg = "¡Puedes hacerlo mejor!";
         $successIcon.attr(dataType, "flower");
         break;
       case (attemptsCount > tooManyAttempts):
         msg = "Eso tomó un tiempo ...";
         $successIcon.attr(dataType, "chest");
         break;
     }
     $successMsg.text(msg);

     setTimeout(function() {
       attemptsOverallCount += attemptsCount;
       $attemptsOverall
         .addClass(scoreUpdateClass)
         .html(attemptsOverallCount);
       winsCount += 1;
       $wins
         .addClass(scoreUpdateClass)
         .html(winsCount);
       $card.attr(dataMatch, false);
     }, 1200);
   }

 });

 // Remove the score update class after the animation completes
 $itemCount.on(
   "webkitAnimationEnd oanimationend msAnimationEnd animationend",
   function() {
     $itemCount.removeClass(scoreUpdateClass);
   }
 );

 //  ¡A la siguiente ronda!
 $btnContinue.on('click', function() {
   $success.removeClass(visibleClass);
   shuffleCards();
   setTimeout(function() {
     turnsCount = 2;
     $turns
       .removeClass(lastTurnClass)
       .html(turnsCount);
     attemptsCount = 0;
     $attempts.html(attemptsCount);
   }, 300);
 });

 // Card shuffle function
 function shuffleCards() {
   var cards = $board.children();
   while (cards.length) {
     $board.append(cards.splice(Math.floor(Math.random() * cards.length), 1)[0]);
   }
 }

 </script>

<?php echo form_close();?>
