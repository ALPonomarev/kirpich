function plus(n) {
 var cena=document.getElementById("cena_"+n);
 var col=document.getElementById("col_"+n);
 var cenap=document.getElementById("cenap_"+n);
 var itog=document.getElementById("itog");
 
 col.innerHTML=1+Number(col.innerHTML);
 cenap.innerHTML=Number(cenap.innerHTML)+Number(cena.innerHTML);
 itog.innerHTML=Number(itog.innerHTML)+Number(cena.innerHTML);
 $.post("basket_update.php",{id:n, num:col.innerHTML});
}

function minus(n) {
 var cena=document.getElementById("cena_"+n);
 var col=document.getElementById("col_"+n);
 var cenap=document.getElementById("cenap_"+n);
 var itog=document.getElementById("itog");
 
 if(col.innerHTML!=0) {
  col.innerHTML=Number(col.innerHTML)-1;
  cenap.innerHTML=Number(cenap.innerHTML)-Number(cena.innerHTML);
  itog.innerHTML=Number(itog.innerHTML)-Number(cena.innerHTML);    
 }
 $.post("basket_update.php",{id:n, num:col.innerHTML});
} 