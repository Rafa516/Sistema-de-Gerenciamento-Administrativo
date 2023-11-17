<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">
  <div class="content-inside">
    <div class="my-4">
      <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
          <a style="background-color: #2E9AFE;color: white" class="nav-link
            active" id="home-tab" data-toggle="tab" role="tab" aria-controls="home"
            aria-selected="false"><b><?php echo $value["sigla"]; ?> </b></a>
        </li>
      </ul>

      <?php if( $unidadeOpenMsg!= '' ){ ?>
      <div class="alert alert-success">
        <b><?php echo $unidadeOpenMsg; ?></b>
      </div>
      <?php } ?>

      <div id="DivIdToPrint">


        <!-- TABELA CABEÇALHO BRASÃO E NOME DA UNIDADE -->
        <div class="table-responsive">
          <table class="table  table-bordered">


            <tbody>

              <tr>
                <td>
                  <center><img src="/res/user/img/brasao.png" width="100" height="90">
                </td>

                <td><br>
                  <center>
                    <h2><?php echo $value["nome"]; ?><h2>
                </td>

              </tr>
              <!-- TABELA ENDEREÇO E TELEFONE  -->
              <table class="table table-hover table-bordered">
                <thead class="table table-dark">

                  <tr>
                    <th>
                      <center>Endereço
                    </th>
                    <th>
                      <center>localização
                    </th>
                  </tr>
                </thead>

               

                <tr>
                  <td>
                    <center><?php echo $value["localidade"]; ?>
                  </td>
                  <td>
                    <center> <a href="/admin/unidade/localizacao/<?php echo $value["id_unidade"]; ?>" class="btn btn-info btn-sm">
                      <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                      <b> Localização</b></a>

                  </td>
                </tr>

                <thead class="table table-dark">

                  <tr>
                    <th>
                      <center>Código da Unidade (SIGRH)
                    </th>
                    <th>
                      <center>Telefone
                    </th>
                  </tr>
                </thead>

               

                <tr>
                  <td>
                    <center><?php echo $value["codigo"]; ?>
                  </td>
                  <td>
                    <center><?php echo $value["telefone"]; ?>

                  </td>
                </tr>
              </table>
                <?php if( $value["unidade"] == 'Unidade Escolar' ){ ?>
                 <table class="table table-hover table-bordered">
                 <tr>
                  <thead class="table table-dark">
                    <th colspan="4">
                      <center>Equipe Gestora
                    </th>
                   
                </tr>
                </thead>
                <tr>
                  <thead class="table table-dark">
                    <th>
                      <center>Diretor(a)
                    </th>
                    <th>
                      <center>Contato

                    </th>
                    <th>
                      <center>Vice-Diretor(a)

                    </th>

                     <th>
                      <center>Contato

                    </th>
                </tr>
                </thead>
                <tr>
                  <td>
                    <center><?php echo $value["diretor"]; ?>
                  </td>
                   <td>
                    <center>
                      <?php if( $value["tel_diretor"] == '' ){ ?>
                      -----
                      <?php }else{ ?>
                      <?php echo $value["tel_diretor"]; ?>
                      <a href="https://wa.me/<?php echo $value["tel_diretor"]; ?>" class="btn btn-success btn-sm" target="_blank"><i class="fab fa-whatsapp" aria-hidden="true"></i> </a>
                      <?php } ?>
                  </td>
                  <td>
                    <center><?php echo $value["vice_diretor"]; ?>

                  </td>
                  <td>
                    <center>
                      <?php if( $value["tel_vice"] == '' ){ ?>
                      -----
                      <?php }else{ ?>
                      <?php echo $value["tel_vice"]; ?>
                      <a href="https://wa.me/<?php echo $value["tel_vice"]; ?>" class="btn btn-success btn-sm" target="_blank"><i class="fab fa-whatsapp" aria-hidden="true"></i> </a>
                      <?php } ?>
                     
                  </td>
                </tr>

                <tr>
                  <thead class="table table-dark">
                    <th colspan="3" >
                      <center>Supervisores(as)
                    </th>
                     <th >
                      <center>Contato
                    </th>
                </tr>
                </thead>
                 <?php $counter1=-1;  if( isset($supervisores) && ( is_array($supervisores) || $supervisores instanceof Traversable ) && sizeof($supervisores) ) foreach( $supervisores as $key1 => $value1 ){ $counter1++; ?>
                <tr >
                  <td  colspan="3" >
                    <center> <?php echo $value1["supervisor"]; ?> 
                    
                    <button
                    onclick="deletar('<?php echo $value1["id_supervisor"]; ?>','<?php echo $value1["supervisor"]; ?>','/admin/delete/supervisor/<?php echo $value1["id_supervisor"]; ?>','Excluir Supervisor')"
                    class="btn btn-danger btn-sm">
                    <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                    
                     
                  <td><center>
                   <?php if( $value1["telefone_supervisor"] == '' ){ ?>

                  <a href="/admin/cadastrar-alterar-contato-supervisor/<?php echo $value1["id_supervisor"]; ?>" class="btn btn-primary btn-sm" target="_blank">Adicionar</a>

                   <?php }else{ ?>
                   <?php echo $value1["telefone_supervisor"]; ?> 

                   <a href="/admin/cadastrar-alterar-contato-supervisor/<?php echo $value1["id_supervisor"]; ?>" class="btn btn-info btn-sm" target="_blank"><i class="fas fa-pen" aria-hidden="true"></i></a>

                   <a href="https://wa.me/<?php echo $value1["telefone_supervisor"]; ?>" class="btn btn-success btn-sm" target="_blank"><i class="fab fa-whatsapp" aria-hidden="true"></i> </a>
                   
                    

                    
                  <?php } ?>
                  </td>
               
                </tr>
                <?php } ?>
                
                <tr>
                  <thead class="table table-dark">
                    <th colspan="3">
                      <center>Chefe Secretaria
                    </th>

                    <th >
                      <center>Contato
                    </th>

                </tr>
                </thead>
             
                <tr>

                  <td colspan="3">
                    <center><?php echo $value["chefe_secretaria"]; ?>

                  </td>
                   <td >
                    <center>
                      <?php if( $value["tel_chefe_secretaria"] == '' ){ ?>
                      -----
                      <?php }else{ ?>
                      <?php echo $value["tel_chefe_secretaria"]; ?>
                      <a href="https://wa.me/<?php echo $value["tel_chefe_secretaria"]; ?>" class="btn btn-success btn-sm" target="_blank"><i class="fab fa-whatsapp" aria-hidden="true"></i> </a>
                      <?php } ?>
                      

                  </td>
                </tr>
              </table>

                <tr>
                <table class="table table-hover table-bordered">
                  <thead class="table table-dark">
                    <th colspan="2">
                      <center>Coordenadores Pedagógicos
                    </th>

                     <th >
                      <center>Contato
                    </th>
                     </thead>
                    <?php $counter1=-1;  if( isset($coordenadores) && ( is_array($coordenadores) || $coordenadores instanceof Traversable ) && sizeof($coordenadores) ) foreach( $coordenadores as $key1 => $value1 ){ $counter1++; ?>
                      <tr >
                       
                        <td colspan="2">
                          <center> <?php echo $value1["coordenador_pedagogico"]; ?>
                          
                          <button
                          onclick="deletar('<?php echo $value1["id_coordenador"]; ?>','<?php echo $value1["coordenador_pedagogico"]; ?>','/admin/delete/coordenador/<?php echo $value1["id_coordenador"]; ?>','Excluir Coordenador')"
                          class="btn btn-danger btn-sm">
                          <i class="fas fa-trash-alt"></i>
                          </button>
                        </td>

                    <td><center>
                   <?php if( $value1["telefone_coordenador"] == '' ){ ?>

                  <a href="/admin/cadastrar-alterar-contato-coordenador/<?php echo $value1["id_coordenador"]; ?>" class="btn btn-primary btn-sm" target="_blank">Adicionar</a>

                   <?php }else{ ?>
                   <?php echo $value1["telefone_coordenador"]; ?> 

                   <a href="/admin/cadastrar-alterar-contato-coordenador/<?php echo $value1["id_coordenador"]; ?>" class="btn btn-info btn-sm" target="_blank"><i class="fas fa-pen" aria-hidden="true"></i></a>
                   
                   <a href="https://wa.me/<?php echo $value1["telefone_coordenador"]; ?>" class="btn btn-success btn-sm" target="_blank"><i class="fab fa-whatsapp" aria-hidden="true"></i> </a>
                   
                    

                    
                  <?php } ?>
                  </td>
                     
                      </tr>
                    <?php } ?>
                     
              </table>
        </div>


        

        <!-- TABELA DE DADOS -->
        <table class="table table-hover table-bordered">
          <thead class="table table-dark">


            <th colspan="2">
              <center>Dados do(a) <?php echo $value["sigla"]; ?>
            </th>


          </thead>
          <tr>
            <td>
              <center><b>Etapa de Ensino</b></center>
            </td>
            <td>
              <center><?php echo $value["etapa"]; ?></center>
            </td>
          </tr>


          <tr>
            <td>
              <center><b>Quantidade de Turmas</b></center>
            </td>
            <td>
              <center><?php echo $value["qtd_turmas"]; ?></center>
            </td>
          </tr>

          <tr>
            <td>
              <center><b>Turnos de Funcionamento da Escola</b></center>
            </td>
            <td>
              <center><?php echo $value["turnos"]; ?></center>
            </td>
          </tr>

          <tr>
            <td>
              <center><b>Oferta educação integral</b></center>
            </td>
            <td>
              <center><?php echo $value["educacao_integral"]; ?></center>
            </td>
          </tr>

          <!-- UNIDADE ADMINISTRATIVA CRE -->
          <?php }else{ ?>
          <table class="table table-hover table-bordered">
            <thead class="table table-dark">

          <tr>
            <thead class="table table-dark">
              <th>
                <center>Coordenador(a)
              </th>
              <th>
                <center>Chefe ...

              </th>
          </tr>
          </thead>
          <tr>
            <td>
              <center><?php echo $value["coordenador"]; ?>
            </td>
            <td>
              <center><?php echo $value["unigep"]; ?>

            </td>
          </tr>

          <tr>
            <thead class="table table-dark">
              <th>
                <center>Chefe UNIAE
              </th>
              <th>
                <center>Chefe UNIAG

              </th>
          </tr>
          </thead>
          <tr>
            <td>
              <center><?php echo $value["uniae"]; ?>
            </td>
            <td>
              <center><?php echo $value["uniae"]; ?>

            </td>
          </tr>

          <tr>
            <thead class="table table-dark">
              <th>
                <center>Chefe UNIEB
              </th>
              <th>
                <center>Chefe UNIPLAT

              </th>
          </tr>
          </thead>
          <tr>
            <td>
              <center><?php echo $value["unieb"]; ?>
            </td>
            <td>
              <center><?php echo $value["uniplat"]; ?>

            </td>
          </tr>
        </table>
        <?php } ?>


        </table>
      </div>



    </div>

    <i>Última alteração registrada pelo(a) usuário(a)<b> <?php echo $value["nome_user"]; ?></b> em <b><?php echo formatDateHoras($value["dt_registro_unidade"]); ?>.</b></i><br><br>


    <button data-toggle="modal" data-target="#registerModal" class="btn btn-success btn-sm"><b><i
          class="fas fa-pen"></i>Alterar</b> </button>

    <?php if( numFotos($value["id_unidade"]) == 0 ){ ?>
    <button  data-toggle="modal" data-target="#imageModal"
    class="btn btn-primary btn-sm"><b>Adicionar Fotos</b> </button>
    <?php }else{ ?>
    <a href="/admin/unidade/fotos/<?php echo $value["id_unidade"]; ?>" class="btn btn-warning btn-sm">
      <i class="fas fa-images" aria-hidden="true"></i>
          <?php if( numFotos($value["id_unidade"]) == 1 ){ ?>
          <b><?php echo numFotos($value["id_unidade"]); ?> Foto</b></a>
        <?php }else{ ?>
        <b><?php echo numFotos($value["id_unidade"]); ?> Fotos</b></a>
        <?php } ?>
    <?php } ?>



    <button id='btn' value='Print' onclick='printtag("DivIdToPrint");' class="btn btn-info btn-sm"
      style="margin-right: 5px;">
      <i class="fa fa-print"></i><b> Imprimir</b>
    </button>




    <hr class="my-4" />

    <a href="/admin/dados-unidades" class="btn btn-info btn-xs"><i class="fas fa-chevron-circle-left"></i><b>
        Voltar</b></a>
  </div>
</div>
</div>

</div>
</div>
</div>
</div>

</div>

  <!-- Modal imagem -->
  <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="imageModal">Adicionar Fotos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form class="form-group" action="/admin/unidade/fotos/post/<?php echo $value["id_unidade"]; ?>"
                  method="post" enctype="multipart/form-data">


                  <div class="form-group"><label class="small mb-1"><b
                      style="font-size:17px;color: #585858">Foto</b></label>
                      <input id="addPhoto" class="form-control py-1" type="file" id="" name="nome_foto[]"
                      multiple="multiple" required/>
              </div>

              <input class="form-control py-1" value="<?php echo $usuario["id_usuario"]; ?>" name="id_usuario"
                  type="hidden">
              <input class="form-control py-1" value="<?php echo $value["id_unidade"]; ?>" name="id_unidade"
                  type="hidden">
         

                  <input class="btn btn-primary btn btn-block" type="submit" value="Adicionar">

              </form>
          </div>
      </div>
  </div>
</div>

<!-- Modal cadastro -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModal">Alterar ou Incluir Dados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php if( $value["unidade"] == 'Unidade Escolar' ){ ?>
        <form class="form-group" action="/admin/unidade/editar/<?php echo $value["id_unidade"]; ?>" method="post"><br>

          <input type="hidden" name="id_unidade" value="<?php echo $value["id_unidade"]; ?>">
          <input type="hidden" name="id_usuario" value="<?php echo $usuario["id_usuario"]; ?>">


          <div class="form-group"><label class="small mb-1"><b>Nome</b></label>
            <input class="form-control py-1" type="text" name="nome" value="<?php echo $value["nome"]; ?>" />
          </div>

          <div class="form-group"><label class="small mb-1"><b>Sigla</b></label>
            <input class="form-control py-1" type="text" name="sigla" value="<?php echo $value["sigla"]; ?>" />
          </div>
          <div class="form-group"><label class="small mb-1"><b>Código da Unidade</b></label>
            <input class="form-control py-1" type="text" name="codigo" value="<?php echo $value["codigo"]; ?>" />
          </div>

          <div class="form-group"><label class="small mb-1"><b>Diretor(a)</b></label>
            <input class="form-control py-1" type="text" name="diretor" value="<?php echo $value["diretor"]; ?>" />
          </div>

          <div class="form-group"><label class="small mb-1"><b>Contato Diretor(a)</b></label>
            <input class="form-control py-1" type="text" name="tel_diretor" value="<?php echo $value["tel_diretor"]; ?>" />
          </div>

          <div class="form-group"><label class="small mb-1"><b>Vice-Diretor(a)</b></label>
            <input class="form-control py-1" type="text" name="vice_diretor" value="<?php echo $value["vice_diretor"]; ?>" />
          </div>

          <div class="form-group"><label class="small mb-1"><b>Contato Vice-Diretor(a)</b></label>
            <input class="form-control py-1" type="text" name="tel_vice" value="<?php echo $value["tel_vice"]; ?>" />
          </div>
           
          <label class="small mb-1"><b>Supervisor</b></label>
          <div id="form_supervisor" class="input-group mb-3">
            <div class="input-group-prepend">
                <button class="btn btn-primary " onclick="adicionarCampo_supervisor()" type="button"><i class="fa fa-plus-circle"
              aria-hidden="true"></i></button>
            </div>
            <input type="text" class="form-control" name="supervisor[]" >
          </div>

          
          <div class="form-group"><label class="small mb-1"><b>Chefe Secretaria</b></label>
            <input class="form-control py-1" type="text" name="chefe_secretaria" value="<?php echo $value["chefe_secretaria"]; ?>" />
          </div>

          <div class="form-group"><label class="small mb-1"><b>Contato Chefe Secretaria</b></label>
            <input class="form-control py-1" type="text" name="tel_chefe_secretaria" value="<?php echo $value["tel_chefe_secretaria"]; ?>" />
          </div>

          <label class="small mb-1"><b>Coordenador</b></label>
          <div id="form_coordenador" class="input-group mb-3">
            <div class="input-group-prepend">
                <button class="btn btn-primary " onclick="adicionarCampo_coordenador()" type="button"><i class="fa fa-plus-circle"
              aria-hidden="true"></i></button>
            </div>
            <input type="text" class="form-control" name="coordenador_pedagogico[]" >
          </div>

          <div class="form-group"><label class="small mb-1"><b>Local</b></label>
            <input class="form-control py-1" type="text" name="localidade" value="<?php echo $value["localidade"]; ?>" />
          </div>

          <div class="form-group"><label class="small mb-1"><b>Telefone</b></label>
            <input class="form-control py-1" type="text" name="telefone" value="<?php echo $value["telefone"]; ?>" />
          </div>

          <div class="form-group"><label class="small mb-1"><b>Etapa</b></label>
            <select class="form-control py-1" name="etapa" id="etapa">
              <option value="<?php echo $value["etapa"]; ?>"><?php echo $value["etapa"]; ?></option>
              <option value=""></option>
              <option value="Educação Infantil">Educação Infantil</option>
              <option value="Educação Infantil  e Ensino Fundamental">Educação Infantil e Ensino Fundamental</option>
              <option value="Ensino Fundamental">Ensino Fundamental</option>
              <option value="Ensino Fundamental e Ensino Médio">Ensino Fundamental e Ensino Médio</option>
              <option value="Ensino Médio">Ensino Médio</option>

            </select>
          </div>



          <div class="form-group"><label class="small mb-1"><b>Quantidade de Turmas</b></label>
            <input class="form-control py-1" type="number" name="qtd_turmas" value="<?php echo $value["qtd_turmas"]; ?>" />
          </div>



          <div class="form-group"><label class="small mb-1"><b>Turnos</b></label>
            <select class="form-control py-1" name="turnos" id="turnos">
              <option value="<?php echo $value["turnos"]; ?>"><?php echo $value["turnos"]; ?></option>
              <option value="Matutino">Matutino</option>
              <option value="Vespertino">Vespertino</option>
              <option value="Noturno">Noturno</option>
              <option value="Matutino e Vespertino">Matutino e Vespertino</option>
              <option value="Vespertino e Noturno">Vespertino e Noturno</option>
              <option value="Matutino,Vespertino e Noturno">Matutino,Vespertino e Noturno</option>

            </select>
          </div>


          <div class="form-group"><label class="small mb-1"><b>Oferta Educação Integral</b></label>
            <select class="form-control py-1" name="educacao_integral" id="educacao_integral">
              <option value="<?php echo $value["educacao_integral"]; ?>"><?php echo $value["educacao_integral"]; ?></option>
              <option value=""></option>
              <option value="Sim">Sim</option>
              <option value="Não">Não</option>
            </select>
          </div>



          <input class="btn btn-info btn btn-block" type="submit" value="Enviar">


        </form>
        <!-- UNIDADE ADMINISTRATIVA CRE -->
        <?php }else{ ?>

        <form class="form-group" action="/admin/unidade-administrativa/editar/<?php echo $value["id_unidade"]; ?>" method="post"><br>

          <input type="hidden" name="id_unidade" value="<?php echo $value["id_unidade"]; ?>">
          <input type="hidden" name="id_usuario" value="<?php echo $usuario["id_usuario"]; ?>">


          <div class="form-group"><label class="small mb-1"><b>Nome</b></label>
            <input class="form-control py-1" type="text" name="nome" value="<?php echo $value["nome"]; ?>" />
          </div>

          <div class="form-group"><label class="small mb-1"><b>Sigla</b></label>
            <input class="form-control py-1" type="text" name="sigla" value="<?php echo $value["sigla"]; ?>" />
          </div>
          <div class="form-group"><label class="small mb-1"><b>Código da Unidade</b></label>
            <input class="form-control py-1" type="text" name="codigo" value="<?php echo $value["codigo"]; ?>" />
          </div>

          <div class="form-group"><label class="small mb-1"><b>Coordenador(a)</b></label>
            <input class="form-control py-1" type="text" name="coordenador" value="<?php echo $value["coordenador"]; ?>" />
          </div>

          <div class="form-group"><label class="small mb-1"><b>Chefe ...</b></label>
            <input class="form-control py-1" type="text" name="unigep" value="<?php echo $value["unigep"]; ?>" />
          </div>

          <div class="form-group"><label class="small mb-1"><b>Chefe UNIAE</b></label>
            <input class="form-control py-1" type="text" name="uniae" value="<?php echo $value["uniae"]; ?>" />
          </div>

          <div class="form-group"><label class="small mb-1"><b>Chefe UNIAG</b></label>
            <input class="form-control py-1" type="text" name="uniag" value="<?php echo $value["uniag"]; ?>" />
          </div>

          <div class="form-group"><label class="small mb-1"><b>Chefe UNIEB</b></label>
            <input class="form-control py-1" type="text" name="unieb" value="<?php echo $value["unieb"]; ?>" />
          </div>

          <div class="form-group"><label class="small mb-1"><b>Chefe UNIPLAT</b></label>
            <input class="form-control py-1" type="text" name="uniplat" value="<?php echo $value["uniplat"]; ?>" />
          </div>

          <input class="btn btn-info btn btn-block" type="submit" value="Enviar">


        </form>

        <?php } ?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function printtag(tagid) {
    var hashid = "#" + tagid;
    var tagname = $(hashid).prop("tagName").toLowerCase();
    var attributes = "";
    var attrs = document.getElementById(tagid).attributes;
    $.each(attrs, function (i, elem) {
      attributes += " " + elem.name + " ='" + elem.value + "' ";
    })
    var divToPrint = $(hashid).html();
    var head = "<html><head>" + $("head").html() + "</head>";
    var allcontent = head + "<body  onload='window.print()'   >" + "<" + tagname + attributes + ">" + divToPrint + "</" + tagname + ">" + "</body></html>";
    var newWin = window.open('', 'Print-Window');
    newWin.document.open();
    newWin.document.write(allcontent);
    newWin.document.close();
    // setTimeout(function(){newWin.close();},10);
  }
</script>

<script type="text/javascript">
  var controleCampo = 1;

  function adicionarCampo_supervisor() {
    controleCampo++;
    // console.log(controleCampo);

    document.getElementById('form_supervisor').insertAdjacentHTML('beforeend','<div class="input-group mb-3" id="campo' + controleCampo + '"> <div class="input-group-prepend"> <button  class="btn btn-danger  type="button" id="' + controleCampo + '" onclick="removerCampo_supervisor(' + controleCampo + ')"><i class="fa fa-minus-circle" ></i></button></div> <input type="text"  class="form-control " name="supervisor[]"></div>' );
  }

  function removerCampo_supervisor(idCampo) {
    //console.log("Campo remover: " + idCampo);
    document.getElementById('campo' + idCampo).remove();
  }

  function adicionarCampo_coordenador() {
    controleCampo++;
    // console.log(controleCampo);

    document.getElementById('form_coordenador').insertAdjacentHTML('beforeend','<div class="input-group mb-3" id="campo' + controleCampo + '"> <div class="input-group-prepend"> <button  class="btn btn-danger  type="button" id="' + controleCampo + '" onclick="removerCampo_coordenador(' + controleCampo + ')"><i class="fa fa-minus-circle" ></i></button></div> <input type="text"  class="form-control " name="coordenador_pedagogico[]"></div>' );
  }

  function removerCampo_coordenador(idCampo) {
    //console.log("Campo remover: " + idCampo);
    document.getElementById('campo' + idCampo).remove();
  }


</script>





