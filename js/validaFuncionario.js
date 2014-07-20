
function enviardados(){
 
	
	
	//dataNascimentoFuncionario
	//sexoFuncionario
	//loginFuncionario
	//senhaFuncionario
	
	if(document.funcionarios.nomeFuncionario.value=="" || document.funcionarios.nomeFuncionario.value.length < 2){
		alert("Preencha campo NOME corretamente!");
		document.funcionarios.nomeFuncionario.focus();
		return false;
	}
 
	if (document.funcionarios.sobrenomeFuncionario.value=="" || document.funcionarios.sobrenomeFuncionario.value.length < 2){
		alert( "Preencha o campo sobrenome!" );
		document.funcionarios.sobrenomeFuncionario.focus();
		return false;
	}
	
	if (!document.funcionarios.sexoFuncionario[0].checked && !document.funcionarios.sexoFuncionario[1].checked ){
		alert("Preencha o campo sexo!");
		//document.funcionarios.sexoFuncionario.focus();
		return false;
	}
	
	//if( document.funcionarios.emailFuncionario.value=="" || document.funcionarios.emailFuncionario.value.indexOf('@')== -1 || document.funcionarios.emailFuncionario.value.indexOf('.')==-1 ){
	//	alert( "Preencha campo E-MAIL corretamente!" );
	//	document.funcionarios.emailFuncionario.focus();
	//	return false;
	//}
 
	if (document.funcionarios.loginFuncionario.value=="" || document.funcionarios.loginFuncionario.value.length < 4){
		alert( "O campo login deve ter no minimo 4 letras!" );
		document.funcionarios.loginFuncionario.focus();
		return false;
	}
		
	if (document.funcionarios.senhaFuncionario.value=="" || document.funcionarios.senhaFuncionario.value < 4){
		alert("O campo senha deve ter no minimo 4 caracteres!");
		document.funcionarios.senhaFuncionario.focus();
		return false;
	}
	
	if (document.funcionarios.senhaFuncionario.value != document.funcionarios.confirmaSenhaFuncionario.value){
		alert("Sua senha esta incorreta, verifique!");
		document.funcionarios.senhaFuncionario.focus();
		return false;
	}
	
	
	return true;
}
 