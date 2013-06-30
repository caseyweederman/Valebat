<?php snippet( 'header' ); ?>

<?php echo $site->page()->var(); ?>

<?php
#pretend to load the cards from database
    $cards = array(
        array("id" => 0, "name" => "Rusty Knife", "type" => "hand", "type2" => "hand",
        	"element" => "none", "rules" => "is a knife", "currency" => "1"),

        array("id" => 1, "name" => "Buckler", "type" => "hand", "type2" => "hand",
        	"element" => "none", "rules" => "a small round shield", "currency" => "1"),

        array("id" => 2, "name" => "Leather Skullcap", "type" => "head", "type2" => "head",
        	"element" => "none", "rules" => "A tight-fitting head-thing", "currency" => "1"),

        array("id" => 3, "name" => "Grass Circlet", "type" => "head", "type2" => "head",
        	"element" => "nature", "rules" => "Does grassy things", "currency" => "4"),

        array("id" => 4, "name" => "Bone Helm", "type" => "head", "type2" => "head",
        	"element" => "dark", "rules" => "Does gloomy stuff", "currency" => "4"),

        array("id" => 5, "name" => "Sacred Shawl", "type" => "body", "type2" => "body",
        	"element" => "divine", "rules" => "Does some holy stuff", "currency" => "3"),

        array("id" => 6, "name" => "Poison Darts", "type" => "trap", "type2" => "trap",
        	"element" => "dark", "rules" => "Do poison", "currency" => "3"),

        array("id" => 7, "name" => "Goblin Tinker", "type" => "minion", "type2" => "minion",
        	"element" => "industrial", "rules" => "1 block", "currency" => "5")
    );
?>
<!--Me, snippet this or something
    <div id="card<?php echo $t; ?>" style="left:<?php echo (90 * $t); ?>" class="card" draggable="true" onmouseover="growImage(event, this);" onmouseout="shrinkImage(event, this);">
        <div class="type body"></div>
        <div class="element dark"></div>
        <div class="leftAug">leftAug</div>
        <div class="cardTitle">title</div>
        <img src="assets/images/card.png" class="cardImage" draggable="false" />
        <div class="cardRule">rules</div>
        <div class="bottAug">bottAug</div>
        <div class="rightAug">rightAug</div>
    </div>
   -->
<?php for( $t=0; $t <= 7; $t++ ) : ?>
    
   <?php snippet( 'card', array("card" => $cards[$t])); ?>

<?php endfor; ?>

<?php snippet( 'footer' ); ?>