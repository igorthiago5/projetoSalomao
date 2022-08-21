function getValue( valor )
{
	let selecao = document.getElementById('selecao_usuario')
	return valor = selecao.options[selecao.selectedIndex].value


}
function getNome(valor)
{
	let nome = document.getElementById('selecao_usuario')
	return valor = nome.options[nome.selectedIndex].text
	
}


function addForm_E_ConfirmarSenha()
{
	


	let div = document.getElementById('div_form')
	let form = document.createElement('form');
	form.action = "/edit?acao=atualizar"
	form.method = "POST"
	form.id = "form"

	let id = document.createElement('input')
	
	id.id="id_usuario"
	id.type = "text"
	id.name = "id_atual"
	id.enabled = "true"
	id.className = "form-control mt-3 "
	id.value = this.getValue()



	let nome = document.createElement('input')
	nome.id = "nome"
	nome.type = "text"
	nome.placeholder = "nome"
	nome.name = "nome"
	nome.className = "form-control mt-3"
	nome.value = this.getNome()
	

	let email = document.createElement('input')
	email.id = "email"
	email.type = "email"
	
	email.name = "email"
	email.className = "form-control mt-3"
	email.placeholder= "Digite um novo email"

	let senha = document.createElement('input')
	senha.id = "senha"
	senha.name = "senha"
	senha.type = "password"
	senha.placeholder ="senha"
	senha.className = "form-control mt-3"
	senha.required ="true"


	let confirmar_senha = document.createElement('input')
	confirmar_senha.id= "senha2"
	confirmar_senha.type = "password"
	confirmar_senha.name = "confirmar_senha"
	confirmar_senha.placeholder ="Confirme sua senha"
	confirmar_senha.className = "form-control mt-3"
	confirmar_senha.required ="true"

	let selecao = document.createElement('select')
	let txt = "Admin"
	selecao.id="selecao_status"
	selecao.name = "status"
	selecao.className = "form-select"

	let option1 = document.createElement('option')
	option1.value = "1"
	option1.innerHTML = "Admin"

	let option2 = document.createElement('option')
	option2.value = "2"
	option2.innerHTML = "funcionario"
	


	let label = document.createElement('label')
	label.innerHTML = "Escolha uma opção"

	let botao = document.createElement('button')
	botao.id ="btn-atualizar"
	botao.className = "btn btn-primary mt-3"
	botao.innerHTML = "Atualizar"
	botao.type = "submit"


	form.appendChild(id)
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
	
	if(form_cont.length >  1){
		let form_remove = document.getElementById('form')
		form_remove.parentNode.removeChild(form_remove)
	}
	
}
function ajax(pagina)
{
	let div = document.getElementById('div')
	let xml = new XMLHttpRequest()
	console.log(xml)
	xml.open('GET', 'pagina.php');
	xml.onreadystatechange = ()=>{
		if(xml.readyState == 4 && xml.status== 200){
			console.log(xml.responseText)
		}
		else{
			console.log(xml.responseText)
		}
	}
	xml.send()
}
