	var total = 0;
	var a =0;
	var b =0;
	var c =0;
	var d =0;
function start(){


	
	var x = document.getElementById("montantETP");
	var m = document.getElementById("ETP");
	var montant = x.innerText || x.textContent;
	var qte = m.value;
	montant= parseFloat(montant);
	var t=montant * qte;
	document.getElementById("totalETP").innerHTML = t;
	a=t;
	
	var x = document.getElementById("montantKM");
	var m = document.getElementById("KM");
	var montant = x.innerText || x.textContent;
	var qte = m.value;
	montant= parseFloat(montant);
	var t=montant * qte;
	document.getElementById("totalKM").innerHTML = t;
	b=t;
	
	var x = document.getElementById("montantREP");
	var m = document.getElementById("REP");
	var montant = x.innerText || x.textContent;
	var qte = m.value;
	montant= parseFloat(montant);
	var t=montant * qte;
	document.getElementById("totalREP").innerHTML = t;
	c=t;
	
	var x = document.getElementById("montantNUI");
	var m = document.getElementById("NUI");
	var montant = x.innerText || x.textContent;
	var qte = m.value;
	montant= parseFloat(montant);
	var t=montant * qte;
	document.getElementById("totalNUI").innerHTML = t;
	d=t;
	
	total = a + b + c + d;
	document.getElementById("total").innerHTML = total;
}

function montant(yolo){

	var id = yolo.id
	
	var x = document.getElementById("montant"+id);
	var m = document.getElementById(id);
	var montant = x.innerText || x.textContent;
	var qte = m.value;
	montant= parseFloat(montant);
	document.getElementById("total"+id).innerHTML = montant * qte;
	var tt = document.getElementById("total"+id);
	var tot = tt.innerText || tt.textContent;
	tot= parseFloat(tot);
	if(id=="ETP"){
		a = tot;
	}else if(id=="KM"){
		b = tot;
	}else if(id=="NUI"){
		c = tot;
	}else{
		d = tot;
	}
	
	total = a + b + c + d;
	document.getElementById("total").innerHTML = total;
}

function check(quantite) {
  if(quantite.value.match('^' + quantite.getAttribute('pattern') + '$')) {
    return true;
  } else {
    alert(quantite.getAttribute('data-msg'));
    return false;
  }
}