<div id="<?php echo $player; ?>" class="playmat" style="background-color:#<?php
 $num = hexdec("234567") * $player;
 $maxHex = hexdec("FFFFFF");
 if($num > $maxHex) $color = $num - (floor($num / $maxHex) * $maxHex);
 else $color = $num; 
 echo sprintf("%06X",$color); 
 ?>">
 <div class="slot headSlot"><div class="slotIcon head"></div></div>
 <div class="slot handLeftSlot"><div class="slotIcon hand"></div></div>
 <div class="slot handRightSlot"><div class="slotIcon hand"></div></div>
 <div class="slot torsoSlot"><div class="slotIcon torso"></div></div>

 <div class="slot dungeon1"><div class="dungeon"></div></div>
 <div class="slot dungeon2"><div class="dungeon"></div></div>
 <div class="slot dungeon3"><div class="dungeon"></div></div>
 <div class="slot dungeon4"><div class="dungeon"></div></div>
 <div class="slot ante"><div class="ante"></div></div>

</div>