<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">
  <div class="content-inside">
    <div class="my-4">
      <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
          <a style="background-color:#2E9AFE;color: white" class="nav-link active" id="home-tab" data-toggle="tab"
            role="tab" aria-controls="home" aria-selected="false">Alterar Dados - Usuário
              <b><?php echo $usuario["nome_user"]; ?></b></a>
        </li>
      </ul>
     

      <?php if( $profileMsg != '' ){ ?>

      <div class="alert alert-success">
        <b><?php echo $profileMsg; ?></b>
      </div>
      <?php } ?>


      <?php if( $errorRegister != '' ){ ?>

      <div class="alert alert-danger">
        <b> <?php echo $errorRegister; ?></b>
      </div>
      <?php } ?>


      <button data-toggle="modal" data-target="#dateModal1" class="btn btn-success"><b>Alterar senha</b> </button><br>

      <form class="form-group" action="/admin/usuarios/editar/<?php echo $usuario["id_usuario"]; ?>" method="post"><br>


        <div class="form-group"><label class="small mb-1"><b>Nome</b></label>
          <input class="form-control py-1" value='<?php echo $usuario["nome_user"]; ?>' type="text" name="nome_user" />
        </div>


        <?php if( $usuario["inadmin"] == 1 ){ ?>

        <div class="form-group"><label class="small mb-1"><b>Administrador</b></label>
          <select class="form-control py-1" name="inadmin" id="inadmin">
            <option value="1">Sim</option>
            <option value="0">Não</option>
          </select>
        </div>

        <?php }elseif( $usuario["inadmin"] == 0 ){ ?>

        <div class="form-group"><label class="small mb-1"><b>Administrador</b></label>
          <select class="form-control py-1" name="inadmin" id="inadmin">
            <option value="0">Não</option>
            <option value="1">Sim</option>


          </select>
        </div>

        <?php } ?>



        <input class="btn btn-success btn btn-block" type="submit" value="Alterar">


      </form>



    
      <hr class="my-4" />

      <a href="/admin/usuarios" class="btn btn-info btn-xs"><i class="fas fa-chevron-circle-left"></i><b>
          Voltar</b></a>


    </div>
  </div>
</div>

<!-- Modal Senha -->
<div class="modal fade" id="dateModal1" tabindex="-1" role="dialog" aria-labelledby="dateModal1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dateModal1">Alterar Senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group" action="/perfil/alterar-senha-usuarios/<?php echo $usuario["id_usuario"]; ?>" method="post"><br>


          <div class="form-group"><label class="small mb-1"><b style="font-size:17px;color: #585858">Nova
                Senha</b></label>
            <input class="form-control py-1" value='' type="password" name="nova_senha" required />
          </div>


          <input class="btn btn-success btn btn-block" type="submit" value="Alterar">


        </form>
      </div>
    </div>
  </div>
</div>