   <div id="card<?php echo $card['id']; ?>" style="left: <?php echo (90 * $card['id']); ?>px" class="card" draggable="true">
        <div class="icon type <?php echo $card['type']; ?>"></div>
        <div class="icon type2 <?php echo $card['type']; ?>"></div>
        <div class="icon element <?php echo $card['element']; ?>"></div>
        <div class="cardTitle"><?php echo $card['name']; ?></div>
        <div class="cardImage" style="background-image:url(assets/images/card.png);"></div>
        <div class="cardRule"><?php echo $card['rules']; ?></div>
        <div class="augment sideAug leftAug">leftAug seven eight nine ten eleven twelve thirteen</div>
        <div class="augment bottAug">bottAug one two three four five six</div>
        <div class="augment sideAug rightAug">rightAug sixteen seventeen eighteen nineteen twenty</div>
        <div class="icon currency"><?php echo $card['currency']; ?></div>
    </div>