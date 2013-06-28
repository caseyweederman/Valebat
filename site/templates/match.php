<?php snippet( 'header' ); ?>

<?php echo $site->page()->var(); ?>

<?php for( $t=0; $t <= 8; $t++ ) : ?>
    <?php echo $t; ?>
    <div id="card<?php echo $t; ?>" style="left:<?php echo (90 * $t); ?>" class="card" draggable="true" onmouseover="growImage(event, this);" onmouseout="shrinkImage(event, this);">
        <div class="leftAug">leftAug</div>
        <div class="cardTitle">title</div>
        <img src="assets/images/card.png" class="cardImage" draggable="false" />
        <div class="cardRule">rules</div>
        <div class="bottAug">bottAug</div>
        <div class="rightAug">rightAug</div>
    </div>
<?php endfor; ?>

<?php snippet( 'footer' ); ?>