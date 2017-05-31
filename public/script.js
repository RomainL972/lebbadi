$.notify.defaults({
	autoHide:false,
	globalPosition:'top center'
})

function testResult(id, id2) {
	var select = O(id).value;
	O(id2).innerHTML = '<fieldset>'+select+'</fieldset>'
	if (select == "Étude du réhaussement ou TEP") {
		O(id2).innerHTML += '<form><p><select name="result" id="select2"><option value="TDM à 3, 9 et 24 mois">Étude du réhaussement ou TEP négatif</option><option value="Avis spécialisé (biopsie ou chirurgie)">Étude du réhaussement ou TEP positif</option></select></p><p><input type="button" class="button2" value="Conduite à tenir" onclick="testResult(\'select2\', \'result2\')"></p></form>';
	}
	else if (id != 'select2') {
		O('result2').innerHTML = ''
	}
}

function calcul() {
	t = [O('t1').value, O('t2').value, O('t3').value, O('t4').value, O('t5').value, O('t6').value]
	levelt = 0
	for (var i = 0; i <= 6; i++) {
		if (t[i] > levelt) {
			levelt = t[i]
		}
	}
	m_num = O('m').value
	n = O('n').value

	t = levelt.toString()
	m = m_num.toString()

	t = t.replace(".1", "a")
	t = t.replace(".2", "b")
	t = t.replace(".3", "c")

	m = m.replace(".1", "a")
	m = m.replace(".2", "b")
	m = m.replace(".3", "c")

	O('result').innerHTML = "<fieldset>T"+t+" N"+n+" M"+m+"</fieldset>"
}

function recist() {
	result = O('somme')
	cibles = [O('cible1').value, O('cible2').value, O('cible3').value, O('cible4').value, O('cible5').value]
	ciblesb = [O('cible1b').value, O('cible2b').value, O('cible3b').value, O('cible4b').value, O('cible5b').value]
	somme1 = somme2 = 0
	for (var i = 0; i < cibles.length; i++) {
		cibles[i] = cibles[i].replace('', 0)
		cibles[i] = cibles[i].replace(',', '.')
		ciblesb[i] = ciblesb[i].replace('', 0)
		ciblesb[i] = ciblesb[i].replace(',', '.')
		somme1 += Number(cibles[i])
		somme2 += Number(ciblesb[i])
	}
	if (somme1 == 0) {
		somme1 = 0
		result.innerHTML = "<fieldset>Résultat pour les lésions cibles : Réponse complète</fieldset>"
	}
	else {
		result.innerHTML = "<p>Somme : "+somme1+" cm<br>"+somme2+" cm lors de la précédente exploration</p>"
		somme1 = (somme1 - somme2)/somme2*100
		result.innerHTML += "<p>Evolution : "+Math.round(somme1)+"%</p>"
		if (somme1<-30) {
			somme1 = 1
			result.innerHTML += "<fieldset>Résultat pour les lésions cibles : Réponse partielle</fieldset>"
		}
		else if (somme1>20) {
			somme1 = 2
			result.innerHTML += "<fieldset>Résultat pour les lésions cibles : Progression</fieldset>"
		}
		else {
			somme1 = 3
			result.innerHTML += "<fieldset>Résultat pour les lésions cibles : Stabilité entre les deux</fieldset>"
		}
	}
	result = O('result')
	select = O('select').value
	select2 = O('select2').value
	if (somme1 == 0 && select == 1 && select2 == 2) {
		result.innerHTML = "<fieldset>Résultat global : Réponse complète</fieldset>"
	}
	else if ((somme1 == 0 || somme1 == 1) && select == 2 && select2 == 2) {
		result.innerHTML = "<fieldset>Résultat global : Réponse partielle</fieldset>"
	}
	else if (somme1 == 3 && select == 2 && select2 == 2) {
		result.innerHTML = "<fieldset>Résultat global : Maladie stable</fieldset>"
	}
	else if (somme1 == 2 || select == 3 || select2 == 1) {
		result.innerHTML = "<fieldset>Résultat global : Progression</fieldset>"
	}
	else {
		$.notify('Aucun résultat possible', 'error')
	}
}

function tirads(number) {
	if (number == 1) {
		somme = Number(O('compo').value) + Number(O('echo').value) + Number(O('forme').value) + Number(O('contours').value) + Number(O('echogene').value)
		result = O('result')
		form = O('form')
		clear('result2')
		clear('form2')
		clear('result3')
		clear(result)
		clear(form)
		switch (somme) {
			case 0:
			result.innerHTML = '<fieldset><strong>TIRADS 1</strong> = constamment bénin ; pas de surveillance<br>Kyste simple<br>Nodule spongiforme</fieldset>'
			break
			case 1:
			$.notify('Aucun résultat possible', 'error')
			break
			case 2:
			result.innerHTML = '<fieldset><strong>TIRADS 2</strong> = constamment bénin ; pas de surveillance<br>« white knight »<br>macro calcification isolée<br>Thyroïdite sur aiguë typique<br>amas iso échogènes confluents</fieldset>'
			break
			case 3:
			result.innerHTML = '<fieldset><strong>TIRADS 3</strong> - très probablement bénin</fieldset>'
			form.innerHTML = '<form><p>Taille : <select id="taille"><option value="1">&lt; 15 mm</option><option value="2">entre 15 et 25 mm</option><option value="3">&gt; 25 mm</option></select></p><p><input class="button2" type="button" value="Résultat" onclick="tirads(2)"></p></form>'
			break
			case 4:
			case 5:
			case 6:
			result.innerHTML = '<fieldset><strong>TIRADS 4</strong> - suspect</fieldset>'
			form.innerHTML = '<form><p>Taille : <select id="taille"><option value="4">&lt; 10 mm</option><option value="5">entre 10 et 15 mm</option><option value="6">&gt; 15 mm</option></select></p><p><input class="button2" type="button" value="Résultat" onclick="tirads(2)"></p></form>'
			break
			default:
			result.innerHTML = '<fieldset><strong>TIRADS 5</strong> - Fortement suspect</fieldset>'
			form.innerHTML = '<form><p>Taille : <select id="taille"><option value="7">&lt; 5 mm</option><option value="8">entre 5 et 10 mm</option><option value="9">&gt; 10 mm</option></select></p><p><input class="button2" type="button" value="Résultat" onclick="tirads(2)"></p></form>'
		}
	}
	else if (number == 2) {
		result = O('result2')
		form = O('form2')
		select = Number(O('taille').value)
		clear(result)
		clear(form)
		clear('result3')
		preform = ''
		preresult = ''
		switch(select) {
			case 1:
			case 4:
			case 7:
			preresult = '<fieldset>Stop</fieldset>'
			break
			case 2:
			case 5:
			case 8:
			preform = '<form><p><input type="checkbox" id="1"> augmentation de taille &gt; 20% et &gt; 2 mm sur 2 nodules au moins<br><input type="checkbox" id="2"> &gt; 50% en volume<br><input type="checkbox" id="3"> métastase à distance<br><input type="checkbox" id="4"> ganglion suspect<br><input type="checkbox" id="5"> contexte à risque<br><input type="checkbox" id="6"> fixation TEP'
			break
			case 3:
			case 6:
			case 9:
			preresult = '<fieldset>Cytoponction'
		}
		switch(select) {
			case 5:
			case 8:
			preform += '<br><input type="checkbox" id="7"> juxta capsulaire<br><input type="checkbox" id="8"> polaire supérieur<br><input type="checkbox" id="9"> multi focalisé suspectée<br><input type="checkbox" id="10"> âge &lt; 40 ans</p><p><input class="button2" type="button" value="Résultat" onclick="tirads(3)"></p></form>'
			break
			case 2:
			preform += '<p><input class="button2" type="button" value="Résultat" onclick="tirads(3)"></p></form>'
			break
			case 3:
			preresult += ' (sauf si compressif, fluide : kyste)</fieldset>'
			break
			case 6:
			case 9:
			preresult += '</fieldset>'
		}
		result.innerHTML = preresult
		form.innerHTML = preform
	}
	else if (number == 3) {
		result = O('result3')
		select = Number(O('taille').value)
		continuer = 0
		for (var i = 1; i <= 10 && !continuer; i++) {
			if (O(i)!=null && O(i).checked) {
				result.innerHTML = '<fieldset>Cytoponction</fieldset>'
				continuer = 1
			}
		}
		if (!continuer) {
			switch (select) {
				case 2:
				result.innerHTML = '<fieldset>Surveillance à 1, 3 et 5 ans</fieldset>'
				break
				case 5:
				result.innerHTML = '<fieldset>Surveillance à 1, 2, 3 et 5 ans</fieldset>'
				break
				case 8:
				result.innerHTML = '<fieldset>Surveillance annuelle pendant 5 ans</fieldset>'
			}
		}
	}
}

function clear(object) {
	O(object).innerHTML = ''
}

function pirads(number, select_name, result_name) {
	switch(number) {
		case 1:
		value = O(select_name).value
		result = O(result_name)
		clear(result_name+'2')
		switch(Number(value)) {
			case 1:
			result.innerHTML = '<fieldset>PIRADS 1 - lésion significative très peu probable - biopsie non recommandée</fieldset>'
			break;
			case 2:
			result.innerHTML = '<fieldset>PIRADS 2 - lésion significative peu probable - biopsies discutées en fonction du contexte (TR, PSA densité et évolutivité du PSA)</fieldset>'
			break;
			case 3:
			if (select_name == 'select') {
				result.innerHTML = '<form><p>Etude de la perfusion<br><select id="select2"><option value="1">absence de rehaussement/rehaussement diffus non concordant avec anomalie T2-diffusion/rehaussement focal évoquant un nodule d’HBP</option><option value="2">rehaussement focal plus précoce ou contemporain des tissus adjacents concordant avec anomalie T2 - diffusion</option></select></p><p><input type="button" value="Résultat" onclick="pirads(2, \'select2\', \'result\')" class="button2"></p></form>'
			}
			else if (select_name == '2select') {
				result.innerHTML = '<form><p>Etude de la perfusion<br><select id="2select2"><option value="1">absence de rehaussement/rehaussement diffus non concordant avec anomalie T2-diffusion/rehaussement focal évoquant un nodule d’HBP</option><option value="2">rehaussement focal plus précoce ou contemporain des tissus adjacents concordant avec anomalie T2 - diffusion</option></select></p><p><input type="button" value="Résultat" onclick="pirads(2, \'2select2\', \'2result\')" class="button2"></p></form>'
			}
			else if (select_name == '3select') {
				result.innerHTML = '<form><p>Diffusion si interprétable<br><select id="3select2"><option value="2">Hyposignal focal franc en ADC et hypersignal franc en diffusion à b élevé avec masse &gt; 1,5 cm ou avec extension extra capsulaire ou caractère invasif</option><option value="1">Autres</option></select></p><p><input type="button" value="Résultat" onclick="pirads(2, \'3select2\', \'3result\')" class="button2"></p><p>Perfusion si diffusion ininterprétable<br><select id="3select3"><option value="1">absence de rehaussement/rehaussement diffus non concordant avec anomalie T2-diffusion/rehaussement focal évoquant un nodule d’HBP</option><option value="2">rehaussement focal plus précoce ou contemporain des tissus adjacents concordant avec anomalie T2 - diffusion</option></select></p><p><input type="button" value="Résultat" onclick="pirads(2, \'3select3\', \'3result\')" class="button2"></p></form>'
			}
			break
			case 4:
			result.innerHTML = '<fieldset>PIRADS 4 - lésion significative probable - biopsies recommandées</fieldset>'
			break
			case 5:
			result.innerHTML = '<fieldset>PIRADS 5 - lésion significative très probable - biopsies recommandées</fieldset>'
		}
		break
		case 2:
		value = O(select_name).value
		result = O(result_name+'2')
		switch(Number(value)){
			case 1:
			result.innerHTML = '<fieldset>PIRADS 3 - lésion significative ne pouvant être éliminée - biopsies discutées en fonction du contexte (TR, PSA densité et évolutivité du PSA)</fieldset>'
			break
			case 2:
			result.innerHTML = '<fieldset>PIRADS 4 - lésion significative probable - biopsies recommandées</fieldset>'
		}
		break
	}
	
}