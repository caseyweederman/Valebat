<?php snippet( 'header' ); ?>

<?php echo $site->page()->var(); ?>

<?php
#pretend to load the cards from database
    $cards = array(
        array("id" => 0, "player" => 1, "location" => "handLeft", "slot" => 0, "name" => "Rusty Knife",
            "type" => "hand", "type2" => "hand", "element" => "none", "rules" => "is a knife", "currency" => "1"),

        array("id" => 1, "player" => 1, "location" => "handRight", "slot" => 0, "name" => "Buckler",
            "type" => "hand", "type2" => "hand", "element" => "none", "rules" => "a small round shield", "currency" => "1"),

        array("id" => 2, "player" => 1, "location" => "head", "slot" => 0, "name" => "Leather Skullcap",
            "type" => "head", "type2" => "head", "element" => "none", "rules" => "A tight-fitting head-thing", "currency" => "1"),

        array("id" => 3, "player" => 2, "location" => "handLeft", "slot" => 1, "name" => "Grass Circlet",
            "type" => "head", "type2" => "head", "element" => "nature", "rules" => "Does grassy things", "currency" => "4"),

        array("id" => 4, "player" => 1, "location" => "head", "slot" => 0, "name" => "Bone Helm",
            "type" => "head", "type2" => "head", "element" => "dark", "rules" => "Does gloomy stuff", "currency" => "4"),

        array("id" => 5, "player" => 1, "location" => "torso", "slot" => 0, "name" => "Sacred Shawl",
            "type" => "body", "type2" => "body", "element" => "divine", "rules" => "Does some holy stuff", "currency" => "3"),

        array("id" => 6, "player" => 1, "location" => "dungeonTop", "slot" => 0, "name" => "Poison Darts",
            "type" => "trap", "type2" => "trap", "element" => "dark", "rules" => "Do poison", "currency" => "3"),

        array("id" => 7, "player" => 1, "location" => "dungeonLeft", "slot" => 0, "name" => "Goblin Tinker",
            "type" => "minion", "type2" => "minion", "element" => "industrial", "rules" => "1 block", "currency" => "5")
    );
?>

<?php for( $t = 1; $t <= 3; $t++) : ?>
    <?php snippet( 'playmat', array("player" => $t)); ?>
<? endfor; ?>

<?php for( $t=0; $t <= 7; $t++ ) : ?>
    
   <?php snippet( 'card', array( "card" => $cards[$t] ) ); ?>

<?php endfor; ?>

<?php snippet( 'footer' ); ?>