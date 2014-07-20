
$(document).ready( function (){
			
	$("#formFuncionarios").validate({
	
		rules:{				

			codigoPermissao: {
				required:true
			},
									
			nomeFuncionario: {
			
				required: true
			}, sobrenomeFuncionario: {
			
				required:true
			
			}, dataNascimentoFuncionario:{
			
				required: true,
				date: true
			
			}, sexoFuncionario:{
			
				required: true
			
			},emailFuncionario:{
			
				required: true,
				email: true							
				
			},loginFuncionario:{
			
				required: true
			
			}, senhaFuncionario: "required",
				confirmeSenha: {
				equalTo: "[name=senhaFuncionario]"	
			
			}
		}, 
		messages: {
		
			codigoPermissao: {
				required: "Escolha uma opção!"
			},
		
			nomeFuncionario: {
		
				required: "Preencha o campo nome!"
		
			}, sobrenomeFuncionario: {
			
				required: "Preencha o campo sobrenome!" 
			
			}, dataNascimentoFuncionario:{
			
				required: "Preencha uma determinada data!",
				date: "Preencha uma data existente!"
			
			}, sexoFuncionario:{
			
				required: "Escolha o seu sexo!"
			
			},emailFuncionario:{
			
				required: "Verifique seu email!",
				email: "Coloque um email válido"							
				
			},loginFuncionario:{
			
				required: "Preencha seu login!"
			
			}, senhaFuncionario: "Verifique a sua senha!",
				confirmeSenha: {
				equalTo: "Digite a sua senha corretamente!"						
			}
		},
			
		submitHandler: function(form){ //Pega pelo id do Form, quando o botão submit for clicado
				
			//Função que verifica os dados vindos do submit e guarda na variavel DADOS
			var dados = $(form).serialize();
			
			$.ajax({
				//Manda o método que é POST para a URL indicada
				type: "POST",
				url: "funcionarios-p.php",
				data: dados,
				success: function() {
				
					//Cria a mensage de dados cadastrados com sucesso
					var mensagem = "<span class=\"dadosCorretos\">Dados cadastrados com sucesso!</span>";
					
					//Joga a mensagem na tela
					document.getElementById('mensagem').innerHTML = mensagem;
					//Apaga o texto inserido no campo
					document.getElementById('codigoPermissao').value = "";
					document.getElementById('nomeFuncionario').value = "";
					document.getElementById('sobrenomeFuncionario').value = "";
					document.getElementById('dataNascimentoFuncionario').value = "";
					document.getElementById('sexoFuncionario').value = "";
					document.getElementById('emailFuncionario').value = "";
					document.getElementById('loginFuncionario').value = "";
					document.getElementById('senhaFuncionario').value = "";
					document.getElementById('confirmeSenhaFuncionario').value = "";
					$("#mensagem").show();
					
					
					setTimeout(function() {
						$('#mensagem').hide();
						}, 
					2000); // O tempo é contado em milisegundos, portanto dois mil é igual a 2 segundos
				}
				
			});
			
			return false;
		}
	});

});

// ============================================================================ OBRAS =================================================================================================

$(document).ready( function(){
			
	$ ("#formObras").validate({
		
		rules:{
		
			descricaoObra: {
			
				required:true
			}
		},
		messages:{
		
			descricaoObra:{
			
				required:"Preencha o campo nome!"
			}
		},
		
		submitHandler: function(form){ //Pega pelo id do Form, quando o botão submit for clicado
					
				//Função que verifica os dados vindos do submit e guarda na variavel DADOS
				var dados = $(form).serialize();
				
				$.ajax({
					//Manda o método que é POST para a URL indicada
					type: "POST",
					url: "obras-p.php",
					data: dados,
					success: function() {
					
						//Cria a mensage de dados cadastrados com sucesso
						var mensagem = "<span class=\"dadosCorretos\">Dados cadastrados com sucesso!</span>";
						
						//Joga a mensagem na tela
						document.getElementById('mensagem').innerHTML = mensagem;
						//Apaga o texto inserido no campo
						document.getElementById('descricaoObra').value = "";
						$("#mensagem").show();
						
						
						setTimeout(function() {
							$('#mensagem').hide();
							}, 
						2000); // O tempo é contado em milisegundos, portanto dois mil é igual a 2 segundos
					}
					
				});
				
				return false;
		}
	});			
});

//================================================================ PRODUTOS-F ===============================================================================================

$(document).ready( function(){
	$("#formProdutos").validate({
		rules:{
			
			nomeProduto:{
			
				required:true
			},
			descricaoProduto:{
			
				required:true
			}
		},
		messages:{
			
			nomeProduto:{
			
				required:"Preencha o campo nome!"
			},
			descricaoProduto:{
			
				required:"Preencha o campo descrição!"
			}
		},

		submitHandler: function(form){ //Pega pelo id do Form, quando o botão submit for clicado
					
				//Função que verifica os dados vindos do submit e guarda na variavel DADOS
				var dados = $(form).serialize();
				
				$.ajax({
					//Manda o método que é POST para a URL indicada
					type: "POST",
					url: "produtos-p.php",
					data: dados,
					success: function() {
					
						//Cria a mensage de dados cadastrados com sucesso
						var mensagem = "<span class=\"dadosCorretos\">Dados cadastrados com sucesso!</span>";
						
						//Joga a mensagem na tela
						document.getElementById('mensagem').innerHTML = mensagem;
						//Apaga o texto inserido no campo
						document.getElementById('nomeProduto').value = "";
						document.getElementById('descricaoProduto').value = "";
						$("#mensagem").show();
						
						
						setTimeout(function() {
							$('#mensagem').hide();
							}, 
						2000); // O tempo é contado em milisegundos, portanto dois mil é igual a 2 segundos
					}
					
				});
				
			return false;
		}
	});

});

//========================================================== TIPOSMIDIAS-F =========================================================================================

$(document).ready ( function(){
			
	$("#formTiposMidias").validate({
		
		rules:{
			descricaoTipoMidia:{
			
				required:true
			}
		},
		messages:{
			descricaoTipoMidia:{
			
				required:"Preencha o campo mídia!"
			}
		
		},
		
		submitHandler: function(form){ //Pega pelo id do Form, quando o botão submit for clicado
					
				//Função que verifica os dados vindos do submit e guarda na variavel DADOS
				var dados = $(form).serialize();
				
				$.ajax({
					//Manda o método que é POST para a URL indicada
					type: "POST",
					url: "tiposMidias-p.php",
					data: dados,
					success: function() {
					
						//Cria a mensage de dados cadastrados com sucesso
						var mensagem = "<span class=\"dadosCorretos\">Dados cadastrados com sucesso!</span>";
						
						//Joga a mensagem na tela
						document.getElementById('mensagem').innerHTML = mensagem;
						//Apaga o texto inserido no campo
						document.getElementById('descricaoTipoMidia').value = "";
						$("#mensagem").show();
						
						
						setTimeout(function() {
							$('#mensagem').hide();
							}, 
						2000); // O tempo é contado em milisegundos, portanto dois mil é igual a 2 segundos
					}
					
				});
				
			return false;
		}
		
	});

});

//============================================================ MIDIASPRODUTOS-F ============================================================================

$(document).ready ( function(){
			
	$("#formMidiasProdutos").validate({
	
		rules:{
			
			codigoProduto:{
				required: true
			},
			
			codigoTipoMidia:{
				required: true
			},
		
			descricaoMidiaProduto:{
			
				required: true
			}					
		},
		messages:{
		
			codigoProduto:{
				required: "Selecione uma opção!"
			},
			
			codigoTipoMidia:{
				required: "Selecione uma opção!"
			},
			
			descricaoMidiaProduto:{
			
				required:"Preencha o campo descrição!"
			}		
		},

		submitHandler: function(form){ //Pega pelo id do Form, quando o botão submit for clicado
					
				//Função que verifica os dados vindos do submit e guarda na variavel DADOS
				var dados = $(form).serialize();
				
				$.ajax({
					//Manda o método que é POST para a URL indicada
					type: "POST",
					url: "midiasProdutos-p.php",
					data: dados,
					success: function() {
					
						//Cria a mensage de dados cadastrados com sucesso
						var mensagem = "<span class=\"dadosCorretos\">Dados cadastrados com sucesso!</span>";
						
						//Joga a mensagem na tela
						document.getElementById('mensagem').innerHTML = mensagem;
						//Apaga o texto inserido no campo
						//document.getElementById('descricaoBloco').value = "";
						$("#mensagem").show();
						
						
						setTimeout(function() {
							$('#mensagem').hide();
							}, 
						2000); // O tempo é contado em milisegundos, portanto dois mil é igual a 2 segundos
					}
					
				});
				
			return false;
		}
		
	});		
});

//==================================================================== MIDIASOBRAS-F ======================================================================================

$(document).ready ( function(){
			
	$("#formMidiasObras").validate({
	
		rules:{
		
			codigoObra:{
			
				required: true
			},

			codigoTipoMidia: {
				required: true
			}
		},
		messages:{
			
			codigoObra:{
			
				required:"Preencha o campo obra!"
			},

			codigoTipoMidia:{
				required: "Preencha o campo tipo de midia"
			}
		},

		submitHandler: function(form){ //Pega pelo id do Form, quando o botão submit for clicado
					
				//Função que verifica os dados vindos do submit e guarda na variavel DADOS
				var dados = $(form).serialize();
				
				$.ajax({
					//Manda o método que é POST para a URL indicada
					type: "POST",
					url: "MidiasObras-p.php",
					data: dados,
					success: function() {
					
						//Cria a mensage de dados cadastrados com sucesso
						var mensagem = "<span class=\"dadosCorretos\">Dados cadastrados com sucesso!</span>";
						
						//Joga a mensagem na tela
						document.getElementById('mensagem').innerHTML = mensagem;
						//Apaga o texto inserido no campo
						//document.getElementById('descricaoBloco').value = "";
						$("#mensagem").show();
						
						
						setTimeout(function() {
							$('#mensagem').hide();
							}, 
						2000); // O tempo é contado em milisegundos, portanto dois mil é igual a 2 segundos
					}
					
				});
				
			return false;
		}
		
	});		
});