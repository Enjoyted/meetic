var id=0;
function ajouterVille()
{
	var form=document.getElementById('addVille');
	var newInput=document.createElement("input");
	newInput.type='text';
	newInput.name='ville'+id;
	id=id+1;
	form.appendChild(newInput);
	form.appendChild(document.createElement("br"));
}
function submitForm(form)
{
	document.getElementById(form).submit();
}