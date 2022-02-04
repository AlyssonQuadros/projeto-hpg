<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<div class="title-section"></div>

<div class="block">
  <form id="formInstituicao" on:submit|preventDefault={id != undefined ? updateForm : insertForm}>

    <!-- inputs eppo code / cultura_tipo -->
    <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>

    <div class="row">

      <div class="col-lg-12 mb-4 tabela-mail-cliente">
        <div class="col-12 col-lg-12 avalia-table" data-estagio="1">
          <div class="head-avalia-table">
            <div class="sub-head-line line-codigo col-lg-3 col-md-5 col-sm-5 col-5">E-mail</div>
            <div class="sub-head-line line-descricao col-lg-8 col-md-6 col-sm-6 col-5">{_.contato}</div>
            <div class="sub-head-line line-excluir line-excluir-head col-lg-1 col-md-1 col-sm-1 col-2">{_.opcoes}</div>
          </div>
          <div class="body-avalia-table">
            {#if cliente.idCliente != undefined}

              {#each clienteArr as itens, chave}

                {#if chave != 0}

                  <div class="row-body row-body-estagio" data-created="1">
                    <div class="sub-body-line line-codigo col-lg-3 col-md-5 col-sm-5 col-5">
                      <div class="form-group form-outline">
                        <input type="text" class="form-control form-control-lg inp-mail" value="{itens.Email}" name="clienteemail[email][]"/>
                      </div>
                    </div>
                    <div class="sub-body-line line-descricao col-lg-8 col-md-6 col-sm-6 col-5">
                      <div class="form-group form-outline">
                        <input type="text" class="form-control form-control-lg inp-contato" value="{itens.Contato}" name="clienteemail[contato][]"/>
                      </div>
                    </div>
                    <div class="sub-body-line line-excluir col-lg-1 col-md-1 col-sm-1 col-2">
                      <button type="button" onclick="excluirLinha(this)" class="btn btn-block btn-outline-danger pt-3 pb-3 btn-exclude">
                        <i class="far fa-trash-alt"></i>
                      </button>
                    </div>
                  </div>

                {/if}

              {/each}

            {:else}

              <div class="row-body row-body-estagio" data-created="1">
                <div class="sub-body-line line-codigo col-lg-3 col-md-5 col-sm-5 col-5">
                  <div class="form-group form-outline">
                    <input type="text" class="form-control form-control-lg inp-mail" name="clienteemail[email][]"/>
                  </div>
                </div>
                <div class="sub-body-line line-descricao col-lg-8 col-md-6 col-sm-6 col-5">
                  <div class="form-group form-outline">
                    <input type="text" class="form-control form-control-lg inp-contato" name="clienteemail[contato][]"/>
                  </div>
                </div>
                <div class="sub-body-line line-excluir col-lg-1 col-md-1 col-sm-1 col-2">
                  <button type="button" onclick="excluirLinha(this)" class="btn btn-block btn-outline-danger pt-3 pb-3 btn-exclude">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </div>
              </div>

            {/if}
          </div>
          <div class="btns-add-campos">
            <button type="button" onclick="adicionarLinha(this)" data-button="linha" class="btn-outline-blue btn-add-line">
              <i class="far fa-plus-square mr-2"></i>{_.adicionar_linha}
            </button>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <!-- radio situacao -->
        <div class="form-group form-outline btn-suggestions">
          <label class="form-label mr-3 text-muted" for="formShowProductNamesApp">{_.situacao}</label>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            {#if cliente.Situacao == "1" || id == undefined}
              <label class="btn btn-info active">
                <input type="radio" name="situacao" value="1" checked>{_.ativo}
              </label>
              <label class="btn btn-info">
                <input type="radio" name="situacao" value="0">{_.inativo}
              </label>
            {:else}
              <label class="btn btn-info active">
                <input type="radio" name="situacao" value="1">{_.ativo}
              </label>
              <label class="btn btn-info">
                <input type="radio" name="situacao" value="0" checked>{_.inativo}
              </label>
            {/if}
          </div>
        </div>
      </div>

    </div>

    <div class="row section-btn-actions">

      <div class="col-12">
        <button type="submit" class="btn btn-primary  btn-block text-white mb-2"><i class="fas fa-save"></i> {_.salvar}</button>
      </div>

    </div>
  </form>

</div>

</section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <style lang="scss">
	@media only screen and (max-width: 600px) {
		.body-avalia-table {
			.row-body {
				.form-outline {
					padding: 15px 1px !important; 
				}
			}
		}
	}
	@media only screen and (max-width: 992px) {
		.body-avalia-table {
			.row-body {
				.sub-body-line {
					padding: 15px 4px;
				}
			}		
		}
	}
	.head-avalia-table, .body-avalia-table {
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		div:nth-child(even) {
			border-left: 1px solid #cecece;
			border-right:  1px solid #cecece;
		}
	}
	.head-avalia-table div:last-of-type, .body-avalia-table .row-body div:last-of-type {
		display: flex;
		justify-content: center;
	}
	.head-avalia-table div, .body-avalia-table .row-body div {
		padding: 15px 15px;
	}
	.avalia-table {
		.row-body-estagio {
			.line-excluir {
				button {
					display: none;
				}
			}
		}
	}
	.button-remove-estagio {
		display: flex;
		border-bottom-left-radius: 0px;
	    border-bottom-right-radius: 0px;
	    border-top-left-radius: 0px;
	    flex-wrap: wrap;
	    transition: all ease 0.2s !important;
	    justify-content: center;
	    align-items: center;
	}
	.btn-outline-gray {
		background-color: transparent;
		border: 1px dashed #4a4a4a;
		width: 100%;
		padding: 15px 0px;
		color:  #4a4a4a;
		transition: all ease 0.2s;
		&:hover {
			border: 1px dashed #4a4a4a;
			background-color: #4a4a4a;
			color:  white;
		}
	}
	.avalia-table {
		width: 100%;
		border:  1px solid #cecece;
		border-radius: 5px;
		padding: 0px;
		background-color: #F2F3F7;

		input {
			width:  100%;
		}
		.form-outline {
			padding: 10px 0px;
			margin: 0px;
		}
		.btns-add-campos {
			display: flex;
			.btn-outline-blue {
				background-color: transparent;
				border: 1px dashed #369bff;
				width: 100%;
				padding: 15px 0px;
				color:  #369bff;
				transition: all ease 0.2s;
				&:hover {
					border: 1px dashed #369bff;
					background-color: #369bff;
					color:  white;

				}
			}
		}
		.head-avalia-table {
			border-bottom: 1px solid #cecece;
			.sub-head-line {
				color:  #656565;
				&.line-excluir {
					padding: 0px;
					button {
						padding: 5px;
						font-size: 14px; 
					}
				}
			}
		}
		.body-avalia-table {
		    background-color: #e4e4e4;
			.sub-body-line {
				border-top: 1px solid #cecece;
				button {
					padding: 2px !important;
					width: 30px;
					height: 30px;
				}
				.icon-arrow {
					padding: 0px 25px;
					align-items: center;
					.fa-level-up-alt {
						transform: rotate(90deg);
					    color: #717171;
					    font-size: 30px;
					}
				}
				&.line-excluir {
					align-items: center;

				}
			}
			.row-body {
				padding: 0px;
				width: 100%;
				display: flex;
				flex-wrap: wrap;
				border:  0px;
			}
		}
	}
</style>
  </body>
</html>

