		function checkPassword()
		{
			if(document.getElementById('pass').value==document.getElementById('cpass').value)
			{
				document.getElementById('imagePass').src='images/valide.png';
				return true;
			}
			else
			{
				document.getElementById('imagePass').src='images/erreur.png';
				return false;
			}
		}
		function modifier(id)
		{
			var noeud=document.getElementById(id);
			while(noeud.firstChild){
			  noeud.removeChild(noeud.firstChild);
			};
		}
		function supprimerCompte(element)
		{
				id=element.parentNode;
				id.removeChild(id.firstChild);
				var form=document.createElement("form");
				form.method="post";
				form.action="php/delete_account.php";
				var span=document.createElement("span");
				span.innerHTML="Password : ";
				var newInput=document.createElement("input");
				newInput.type='password';
				newInput.name='password';
				id.appendChild(newInput);
				id.appendChild(document.createElement("br"));
				var newSubmit=document.createElement("input");
				newSubmit.value="valider";
				newSubmit.type="submit";
				form.appendChild(span);
				form.appendChild(newInput);
				form.appendChild(newSubmit);
				id.appendChild(form);
		}
		function modifier(element)
		{
			id=element.id;
			element=element.parentNode;
			element.removeChild(element.firstChild);
			var form=document.createElement("form");
			form.method="post";
			form.action="php/modifier_profil.php";
			var newInput=document.createElement("input");
			newInput.type='text';
			newInput.name=id;
			var newSubmit=document.createElement("input");
			newSubmit.value="valider";
			newSubmit.type="submit";
			var newInputHidden=document.createElement("input");
			newInputHidden.value=id;
			newInputHidden.name="champ";
			newInputHidden.type="hidden";
			form.appendChild(newInputHidden);
			form.appendChild(newInput);
			form.appendChild(newSubmit);
			element.appendChild(form);
		}
		function envoyerFormulaire(id)
		{
			if(checkPassword())
			{
				document.getElementById("formulairePass").submit();
			}
		}