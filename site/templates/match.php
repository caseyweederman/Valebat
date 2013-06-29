<?php snippet( 'header' ); ?>

<?php echo $site->page()->var(); ?>

<?php
#pretend to load the cards from database
    $cards = array(
        array("name" => "Rusty Knife", "type" => "hand", "type2" => "hand",
        	"element" => "none", "rules" => "is a knife", "currency" => "1"),

        array("name" => "Buckler", "type" => "hand", "type2" => "hand",
        	"element" => "none", "rules" => "a small round shield", "currency" => "1"),

        array("name" => "Leather Skullcap", "type" => "head", "type2" => "head",
        	"element" => "none", "rules" => "A tight-fitting head-thing", "currency" => "1"),

        array("name" => "Grass Circlet", "type" => "head", "type2" => "head",
        	"element" => "nature", "rules" => "Does grassy things", "currency" => "4"),

        array("name" => "Bone Helm", "type" => "head", "type2" => "head",
        	"element" => "dark", "rules" => "Does gloomy stuff", "currency" => "4"),

        array("name" => "Sacred Shawl", "type" => "body", "type2" => "body",
        	"element" => "divine", "rules" => "Does some holy stuff", "currency" => "3"),

        array("name" => "Poison Darts", "type" => "trap", "type2" => "trap",
        	"element" => "dark", "rules" => "Do poison", "currency" => "3"),

        array("name" => "Goblin Tinker", "type" => "minion", "type2" => "minion",
        	"element" => "industry", "rules" => "1 block", "currency" => "5")
    );
?>

<?php for( $t=0; $t <= 7; $t++ ) : ?>
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
   <div id="card<?php echo $t; ?>" style="left: <?php echo (90 * $t); ?>px" class="card" draggable="true" onmouseover="growImage(event, this);" onmouseout="shrinkImage(event, this);">
        <div class="icon type <?php echo $cards[$t]['type']; ?>"></div>
        <div class="icon type2 <?php echo $cards[$t]['type']; ?>"></div>
        <div class="icon element <?php echo $cards[$t]['element']; ?>"></div>
        <div class="augment leftAug">leftAug</div>
        <div class="cardTitle"><?php echo $cards[$t]['name']; ?></div>
        <!--<img src="assets/images/card.png" class="cardImage" draggable="false" />-->
        <div class="cardRule"><?php echo $cards[$t]['rules']; ?></div>
        <div class="augment bottAug">bottAug</div>
        <div class="augment rightAug">rightAug</div>
        <div class="icon currency"><?php echo $cards[$t]['currency']; ?></div>
    </div>
<?php endfor; ?>

<?php snippet( 'footer' ); ?>