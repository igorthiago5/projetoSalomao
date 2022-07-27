function desabilitarDiv()
{

	let selecao = document.getElementById('selecao_usuario')
 	let valor = selecao.options[selecao.selectedIndex].value
 	let nome = document.getElementById('nome').disabled  = true
 	let email = document.getElementById('email').disabled  = true
 	let senha = document.getElementById('senha').disabled  = true
 	let status = document.getElementById('status').disabled  = true
 	let selecao_status = document.getElementById('selecao_status').disabled  = true
 	let botao = document.getElementById('botao').disabled  = true

	 if(valor  > 1){
	 	nome = document.getElementById('nome').disabled  = false
	 	email = document.getElementById('email').disabled  = false
 	 	senha = document.getElementById('senha').disabled  = false
 	 	status = document.getElementById('status').disabled  = false
 	 	selecao_status = document.getElementById('selecao_status').disabled  = false
 	 	botao = document.getElementById('botao').disabled  = false
 	 	
	 }
}
function addForm()
{
	let div = document.getElementById('div_form')
	let form = document.createElement('form');
	form.action = "/edit?acao=atualizar"
	form.method = "POST"
	form.id = "form"


	let nome = document.createElement('input')
	nome.id = "nome"
	nome.type = "text"
	nome.placeholder = "nome"
	nome.name = "nome"
	nome.className = "form-control mt-3"
	nome.value= "nome"

	let email = document.createElement('input')
	email.id = "email"
	email.type = "email"
	email.placeholder = "email"
	email.name = "email"
	email.className = "form-control mt-3"
	email.value= "email"

	let senha = document.createElement('input')
	senha.id = "senha"
	senha.name = "senha"
	senha.type = "password"
	senha.placeholder ="senha"
	senha.className = "form-control mt-3"


	let confirmar_senha = document.createElement('input')
	confirmar_senha.id= "senha2"
	confirmar_senha.name = "confirmar_senha"
	confirmar_senha.placeholder ="Confirme sua senha"
	confirmar_senha.className = "form-control mt-3"

	let selecao = document.createElement('select')
	let txt = "Admin"
	selecao.id="selecao_status"
	selecao.name = "status"
	selecao.className = "form-select"

	let option1 = document.createElement('option')
	option1.value = "admin"
	option1.innerHTML = "Admin"

	let option2 = document.createElement('option')
	option2.value = "funcionario"
	option2.innerHTML = "funcionario"
	


	let label = document.createElement('label')
	label.innerHTML = "Escolha uma opção"

	let botao = document.createElement('button')
	botao.id ="btn-atualizar"
	botao.className = "btn btn-primary mt-3"
	botao.innerHTML = "Atualizar"

	
	form.appendChild(nome)
	form.appendChild(email)
	form.appendChild(senha)
	form.appendChild(confirmar_senha)
	form.appendChild(label)
	form.appendChild(selecao)
	form.appendChild(botao)

	selecao.appendChild(option1)
	selecao.appendChild(option2)
	div.appendChild(form)
	let form_cont = document.querySelectorAll('form')
	console.log(form_cont.length)
	if(form_cont.length >  1){
		let form_remove = document.getElementById('form')
		form_remove.parentNode.removeChild(form_remove)
	}
	

}
