function growImage(event, card){

 $(card).animate({
 	zIndex: '100',
 	height: '315px',
 	width: '225px'
 }, 40);
}
function shrinkImage(event, card){
	e = event.toElement || event.relatedTarget;
 if(e.parentNode == card || e == card){
 	return;
 }
 $(card).animate({
 	zIndex: '0',
 	height: '105px',
 	width: '75px'
 }, 40);
}