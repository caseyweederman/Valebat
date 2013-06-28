function growImage(event, card){

 $(card).animate({
 	zIndex: '100',
 	height: '350px',
 	width: '250px'
 }, 40);
}
function shrinkImage(event, card){
	e = event.toElement || event.relatedTarget;
 if(e.parentNode == card || e == card){
 	return;
 }
 $(card).animate({
 	zIndex: '0',
 	height: '87px',
 	width: '62px'
 }, 40);
}