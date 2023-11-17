<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">

  <div class="content-inside">

    <div class="my-4">
      <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
          <a style="background-color: #2E9AFE;color: white" class="nav-link active" id="home-tab" data-toggle="tab"
            role="tab" aria-controls="home" aria-selected="false"><b>Registrar Benefício </b></a>
        </li>
      </ul>


      <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
          <div class="col-xl-12 col-lg-8 col-md-9 col-11 text-center">

            <form class="form-group" action="/usuario/registrar-beneficios/enviar" method="post">

             <input class="form-control py-1" value="<?php echo $usuario["id_usuario"]; ?>" name="id_usuario" type="hidden"> 


          </div>
        </div>

        <b>1. Identificação do Benefício</b><br><br>

        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="table table-dark">


              <th colspan="5">
                <center>Nome - Matrícula - CPF - Componente Curricular<b>
              </th>

              </tr>
            </thead>
            <tbody>

              <tr>
                <td colspan="3">
                  <select class="js-example-basic-single"  id="" name="id_temporario" required>
                    <option value=""></option>
                    <?php $counter1=-1;  if( isset($temporarios) && ( is_array($temporarios) || $temporarios instanceof Traversable ) && sizeof($temporarios) ) foreach( $temporarios as $key1 => $value1 ){ $counter1++; ?>
                    <option value="<?php echo $value1["id_temporario"]; ?>"><?php echo $value1["nome"]; ?> - <?php echo $value1["matricula"]; ?> - <?php echo $value1["cpf"]; ?> -
                      <?php echo $value1["componente"]; ?>
                    </option>
                    <?php } ?>
                  </select>

                </td>

                <td colspan="2">
                  <center>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTemporarios"
                      id="buttonsUtilidade">
                      <i class="fa fa-user"></i><b> Cadastrar CT</b> 
                    </button>
                  </center>
                </td>


              </tr>



            </tbody>

            <thead class="table table-dark">


              <th>
                <center>Início Exercício<b>
              </th>
              <th>
                <center>Final Exercício<b>
              </th>
              <th>
                <center>Nº Processo SEI<b>
              </th>
              <th>
                <center>Data Processo SEI
              </th>

              <th>
                <center>Carência
              </th>

              </tr>
            </thead>
            <tbody>

              <tr>

                <td> <input name="inicio" type="date" class="form-control py-1" ></td>
                <td> <input name="fim" type="date" class="form-control py-1" ></td>
                <td> <input name="processo" class="form-control py-1"></td>
                <td> <input name="data_processo" type="date" class="form-control py-1"></td>
                <td> <select class="form-control py-1" name="carencia" id="carencia" required>
                    <option value=""></option>
                    <option value="Curta">Carência Curta</option>
                    <option value="Longa">Carência Longa</option>
                  </select>
                </td>


              </tr>



            </tbody>

          </table>
        </div>
        <hr>


        <b>2. Lançamento referente ao Benefício, à Folha/Ano - Situação no Sistema</b>



        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="table table-dark">


              <th>
                <center>Folha - Mês<b>
              </th>

              <th>
                <center>Ano<b>
              </th>

              <th>
                <center>Benefício
              </th>

              <th>
                <center>SIGRH<b>
              </th>

              <th>
                <center>Exercício<b>
              </th>

              </tr>
            </thead>
            <tbody>

              <tr>
                <td> <select class="form-control py-1" name="mes" id="mes" required>
                    <option value=""></option>
                    <option value="01 - Janeiro">01 - Janeiro</option>
                    <option value="02 - Fevereiro">02 - Fevereiro</option>
                    <option value="03 - Março">03 - Março</option>
                    <option value="04 - Abril">04 - Abril</option>
                    <option value="05 - Maio">05 - Maio</option>
                    <option value="06 - Junho">06 - Junho</option>
                    <option value="07 - Julho">07 - Julho</option>
                    <option value="08 - Agosto">08 - Agosto</option>
                    <option value="09 - Setembro">09 - Setembro</option>
                    <option value="10 - Outubro">10 - Outubro</option>
                    <option value="11 - Novembro">11 - Novembro</option>
                    <option value="12 - Dezembro">12 - Dezembro</option>
                  </select> </td>

                <td>
                  <select class="form-control py-1" name="ano" >
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2026">2027</option>
                  </select>
                </td>

                <td>
                  <select class="form-control py-1" name="beneficio" id="beneficio" required>
                    <option value=""></option>
                    <option value="Auxílio Alimentação">Auxílio Alimentação</option>
                    <option value="Auxílio Transporte">Auxílio Transporte</option>
                  </select>
                </td>



                <!-- <td>
                 <select class="form-control py-1" id="componente" name="componente">
                  <option value="">
                  <?php $counter1=-1;  if( isset($componentes) && ( is_array($componentes) || $componentes instanceof Traversable ) && sizeof($componentes) ) foreach( $componentes as $key1 => $value1 ){ $counter1++; ?>
                  <option value="<?php echo $value1["componente"]; ?>"><?php echo $value1["componente"]; ?>
                  </option>
                  <?php } ?>
                </select> 

                </td>-->

                <td> <select class="form-control py-1" name="situacao" id="situacao" required>
                    <option value=""></option>
                    <option value="Incluído no Sistema">Incluído no Sistema</option>
                    <option value="Falta Incluir no Sistema">Falta Incluir no Sistema</option>
                    <option value="Ajustar Benefício">Ajustar Benefício</option>
                     <option value="Solicitado via SEI">Solicitado via SEI</option>
                     <option value="Solicitar via SEI">Solicitar via SEI</option>
                      <option value="Incluído no Sistema e Solicitar REPAG">Incluído no Sistema e Solicitar REPAG</option>
                    <option value="Incluído no Sistema e REPAG Solicitado">Incluído no Sistema e REPAG Solicitado</option>
                     <option value="Incluído no Sistema e REPAG Efetuado">Incluído no Sistema e REPAG Efetuado</option>


                  </select> </td>

                  <td>
                  <select class="form-control py-1" name="exercicio" id="exercicio" required>
                    <option value="Verificar">Verificar</option>
                    <option value="Em Exercício">Em Exercício</option>
                    <option value="Finalizado">Finalizado</option>
                    <option value="E. Provisória">E. Provisória</option>
                  </select>
                </td>

              </tr>



            </tbody>

          </table>
        </div>
        <hr>

        <b>2. Observações</b>



        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead class="table table-dark">


              <th>
                <center>Observações em geral<b>
              </th>

              </tr>
            </thead>
            <tbody>

              <tr>
                <td> <textarea style="height: 110px;" class="form-control py-1" value="" type="text"
                    name="observacoes"></textarea></td>
              </tr>



            </tbody>

          </table>
        </div>
        <center><input style="width: 100%;" class="btn btn-primary btn " type="submit" value="Enviar"></center>
      </form>
      </div>
      
    </div>

  
    <hr class="my-4" />
    <a href="javascript:history.back()" class="btn btn-info btn-xs"><i class="fas fa-chevron-circle-left"></i><b>
        Voltar</b></a>
    
  </div>

</div>
</div>

</div>






<!-- MODAL CADASTRAR NOVO TEMPORÁRIO -->
<div class="modal fade" id="modalTemporarios" tabindex="-1" role="dialog" aria-labelledby="modalTemporariosTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar Contrato Temporário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form class="form-group" action="/usuario/registrar-temporarios-modal-beneficios/enviar" method="post">

          <input class="form-control py-1" value="<?php echo $usuario["id_usuario"]; ?>" name="id_usuario" type="hidden">

          <div class="form-group"><label class="small mb-1"><b>Nome</b></label>
            <input class="form-control py-1" type="text" name="nome" required />
          </div>

          <div class="form-group"><label class="small mb-1"><b>Matrícula</b></label>
            <input class="form-control py-1" type="text" name="matricula" />
          </div>

          <div class="form-group"><label class="small mb-1"><b>CPF</b></label>
            <input class="form-control py-1" type="text" name="cpf" />
          </div>


          <div class="form-group"><label class="small mb-1"><b>Componente</b></label>
            <select class="form-control py-1" id="componente" name="componente" required>
              <option value="">
                <?php $counter1=-1;  if( isset($componentes) && ( is_array($componentes) || $componentes instanceof Traversable ) && sizeof($componentes) ) foreach( $componentes as $key1 => $value1 ){ $counter1++; ?>
              <option value="<?php echo $value1["componente"]; ?>"><?php echo $value1["componente"]; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group"><label class="small mb-1"><b>Ano</b></label>
            <select class="form-control py-1"  name="ano" required>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
            </select>
          </div>


          <input class="btn btn-primary btn btn-block" type="submit" value="Enviar">
        </form>


        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
</div>





</div>
</div>

<script src="https://cdn.ckeditor.com/4.21.0/basic/ckeditor.js"></script>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script type="text/javascript">


  $(".js-example-basic-single").select2({

  });

</script>

<script>
  CKEDITOR.replace('observacoes');
</script>