function Reset(id) 
{
	document.getElementById(id).value='';
}

function checkEmail()
{
	var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i'); // tu créé un objet RegExp qui définit une expression réguilière
	// une expression régulière c'est le format que doit avoir une chaine de caractère
	if(reg.test(document.getElementById('email').value)) // ici on appelle la méthode test associé à l'objet reg qui va tester que la chaine
	//passer en paramètre respecte le format définit au dessus
	{
		document.getElementById('imageEmail').src='images/valide.png';
		document.getElementById('email').style.border ="solid 1px #9cd900";
		return true;
	}
	else
	{
		document.getElementById('imageEmail').src='images/erreur.png';
		document.getElementById('email').style.border ="solid 1px red";
		return false;
	}
}

function checkPassword()
{
	if(document.getElementById('pass').value==document.getElementById('cpass').value)
	{
		document.getElementById('imagePass').src='images/valide.png';
		document.getElementById('cpass').style.border ="solid 1px #9cd900";
		return true;
	}
	else
	{
		document.getElementById('imagePass').src='images/erreur.png';
		document.getElementById('cpass').style.border ="solid 1px red";
		return false;
	}
}
function checkSexe()
{
	if(document.getElementById('sexe').value!="-")
	{
		document.getElementById('imageSexe').src='images/valide.png';
		document.getElementById('sexe').style.border ="solid 1px #9cd900";
		return true;
	}
	else
	{
		document.getElementById('imageSexe').src='images/erreur.png';
		document.getElementById('sexe').style.border ="solid 1px red";
		return false;
	}
}
function checkCherche()
{
	if(document.getElementById('cherche').value!="-")
	{
		document.getElementById('imageCherche').src='images/valide.png';
		document.getElementById('cherche').style.border ="solid 1px #9cd900";
		return true;
	}
	else
	{
		document.getElementById('imageCherche').src='images/erreur.png';
		document.getElementById('cherche').style.border ="solid 1px red";
		return false;
	}
}
function checkFormulaire()
{
	var envoie=true;
	var form=document.getElementById('formulaireInscription');
	var child=form.getElementsByTagName("input");
	var p=document.getElementById('error');
	p.innerHTML='';
	var i;
	for(i=0;i<child.length;i++)
	{
		if(child[i].value=='')
		{
			envoie=false;
			p.innerHTML=p.innerHTML+'veuillez remplir le champ '+child[i].name+'<br />';
		}
	}
	if(checkSexe() && checkPassword() && checkCherche() && checkEmail())
	{
		form.submit();
	}
}

function changer(element)
{
	element.style='width:50%;color:black;';
	element.value='';
}