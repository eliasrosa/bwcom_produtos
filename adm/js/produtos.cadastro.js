$(function(){
			
	var $form = $('#produtos-cadastro form');
	var $task = $('.task', $form);		

	// adiciona class first
	function setImagemDestaque(){
		$('#imagens .img a.first').removeClass('first');
		$('#imagens .img a.status1:first').addClass('first');
	}
	setImagemDestaque();
	
	
	// ordem das imagens
	if($('#imagens .img a').length > 1){
		$('#imagens .img').sortable({
			items: 'a',
			handle: 'span',
			cursor: 'move',
			placeholder: 'placeHolder',
			forcePlaceholderSize: true,
			stop: function(){
				$task.val('imagemOrdem');				
				setImagemDestaque();
				$.post($form.attr('action'), $form.serialize(), function(i){});
			}
		});	
	}

	// ordem dos textos
	if($('#textos .txt table tr').length > 1){
		$('#textos .txt table').sortable({
			items: 'tr',
			handle: 'span.move',
			cursor: 'move',
			placeholder: 'placeHolder',
			forcePlaceholderSize: true,
			stop: function(){
				$task.val('textoOrdem');				
				$.post($form.attr('action'), $form.serialize(), function(i){});
			}
		});	
	}
		
	// categorias	
	var addCheckboxCat = function(id){
		
		var selectIndex = $('#categorias .prod'+ id).attr('rel');
		var db = baseProdutosCategorias;
		var select = db[selectIndex];
		var nome = db[selectIndex]['nome'];
		var id = db[selectIndex]['id'];
				
		if(!$('#categorias .cat'+id).length){	
			
			pais = '';
			$.each(select['pais'], function(a, b){
				pais = pais + ''+ b['nome'] + ' / ';
			});
			
			nome = pais + ''+ nome + '';
			
			var html = '<div class="campo block"><span><input type="checkbox" class="cat'+id+'" name="dados[categorias][]" value="'+id+'" checked="cheched" /></span><span class="input">'+ nome +'</span><br class="clearfix"/></div>';
			$('#categorias').append(html);				
		}		
	};
	
	if (typeof baseProdutosCategoriasOk != 'undefined'){	
		$.each(baseProdutosCategoriasOk, function(a, b){
			addCheckboxCat(b['idcategoria']);
		});
	}
	
	$('#categorias a.add').click(function(){
		var id = $('#categorias select.cat').val();
		addCheckboxCat(id);
	});
	

	// opções
	var opcoes = {
		
		i : 0,

		init: function(){

			$('#opc .campo .opNome', $form).keypress(function(e){
				var code = (e.keyCode ? e.keyCode : e.which);	
				if (code == 13){ 
					opcoes.add('', true);	
					return false;
				}
			});

			$('#opc a.opAdd', $form).click(function(){ 
				opcoes.add('', true);
			});

			this.load();
		},
		
		load: function(){
			
			var $opcoes = $('#opc', $form);
			var dados = eval('('+$('.dados', $opcoes).html()+')');
			
			$.each(dados, function(i, op){
				$op = opcoes.add(op.nome, false);

				$.each(op.itens, function(ii, item){
					opcoes.addItem(item, $op, opcoes.i, false);
				});
			});
		},
		
		add: function(n, autoAddItemEmpty){
			if(n == '')
				var n = $('#opc .campo .opNome', $form).val();
			
			if (n != ''){
				this.i++;
				
				var opKey = 'op'+this.i;
								
				var html = '<fieldset class="'+opKey+ '"><legend>' +n+ '</legend>' +
								'<input type="hidden" class="tit" value="' +n+ '" name="dados[opcoes][][' +this.i+ ']" />' +
								'<div class="top"><a href="javascript:void(0);" class="opAddItem">Adicionar opção</a> | ' +
								'<a href="javascript:void(0);" class="opRenomear cmove">Renomear</a> | ' +
								'<a href="javascript:void(0);" class="opMover cmove">Mover</a> | ' +
								'<a href="javascript:void(0);" class="opRemove">Remover</a>' +
								'</div><br class="clearfix" />' +							
							'</fieldset>';
							
				$('#opc .lista', $form).append(html);
				$('#opc .campo .opNome', $form).val('');
			
				var $op = $('fieldset.'+opKey, $form);
				var id = this.i; 
				var $inputHidden = $('input.tit', $op);
				var $legend = $('legend', $op);
				
				var nomeOpcao = $inputHidden.val();
								
				$('.opAddItem', $op).click(function(){
					opcoes.addItem('', $op, id);
				})
				
				$('.opRenomear', $op).click(function(){
					var newText = prompt('Insira da opção:', nomeOpcao);
					
					if(newText != ''){
						if(newText != null){
							$inputHidden.val(newText);
							$legend.html(newText);
							nomeOpcao = newText;
						}
					}else{
						alert('Nome inválido!');
						$('.opRenomear', $op).click();
					}
				})
				
				if(autoAddItemEmpty)
					$('.opAddItem', $op).click();
		
				$('.opRemove', $op).click(function(){
					if(confirm('Tem certeza que deseja REMOVER a opção \''+ nomeOpcao +'\'?'))
						$op.remove();
				});
				
				$('#opc .lista').sortable({
					items: 'fieldset',
					handle: '.opMover',
					cursor: 'move',
					containment: 'parent',
					placeholder: 'ui-state-highlight',
					forcePlaceholderSize: true
				});
				
				$op.sortable({
					items: 'p',
					handle: '.opItemMove',
					cursor: 'move',
					containment: 'parent',
					placeholder: 'ui-state-highlight',
					forcePlaceholderSize: true
				});
				
				return $op;

			}else{
				alert('Nome inválido!');
			}
		},
		
		addItem : function(txt, $op, i, isAuto){
			
			var html = '<p class="item">' +
							'Item: ' +
							'<input type="text" class="w90 mr10" name="dados[opcoes][itens][' +i+ '][]" value="' +txt+ '" />' +
							'<a href="javascript:void(0);" class="opItemMove cmove">Mover</a> | ' +
							'<a href="javascript:void(0);" class="opItemRemove">Remover</a>' +
						'</p>';
						
			$op.append(html);
			
			var $item = $('p:last-child', $op);
			
			$('.opItemRemove', $item).click(function(){
				if(confirm('Tem certeza que deseja REMOVER este item?'))
					$item.remove();
			});

			$('input', $item).keypress(function(e){
				var code = (e.keyCode ? e.keyCode : e.which);	
				var $i = $('p input[value=""]', $op);
				
				if (code == 13){ 
					if($i.length)
						$i.first().focus();
					else
						opcoes.addItem('', $op, i, true);
					return false;
				}
			})
			
			if(isAuto == true)
				$('input', $item).focus();
		}
		
	};

	if($('#opc').length){
		opcoes.init();
	}
	
});
