<script type="text/javascript">

	$(document).on('click', '.btn-mover-instituicao', function() {

		idCliente = this.getAttribute('data-id');
		idStatus = this.getAttribute('status-id');
		idInstituicao = this.getAttribute('instituicao-id');

		dados = {status : idStatus, idCliente : idCliente, idInstituicao : idInstituicao};

		$.post(URL_JS + "/buscainstituicao/editarStatus/", dados)
			.done(function (data){
				var obj = JSON.parse(data);
				console.log(data);
				if (obj.status == 'OK') {
					new PNotify({
						title: '<?=@$_SESSION['lang']['sucesso']?>',
						text: obj.msg,
						type: 'success',
						styling: 'bootstrap3'
					});
				}else {
					new PNotify({
						title: '<?=@$_SESSION['lang']['erro']?>',
						text: obj.msg,
						type: 'error',
						hide: false,
						styling: 'bootstrap3'
					});
				}
				status = '<?=$_GET['status']?>';
				setTimeout(function(){
					document.location.reload(true);
				}, 2000);
				// datatableInit(status);
			});
	});
	
</script>