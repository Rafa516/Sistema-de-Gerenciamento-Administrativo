<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">

    <div class="content-inside">

        <div class="my-4">
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a style="background-color: #2E9AFE;color: white" class="nav-link active" id="home-tab"
                        data-toggle="tab" role="tab" aria-controls="home" aria-selected="false"><b>Editar Avaliação -
                            <?php echo $value["nome"]; ?> - <?php echo $value["sigla"]; ?> -
                            <?php echo $value["codigo"]; ?>
                        </b></a>
                </li>
            </ul>

            <?php if( $CallOpenMsg != '' ){ ?>
            <div class="alert alert-success">
                <b><?php echo $CallOpenMsg; ?></b>
            </div>
            <?php } ?>

            <?php if( $errorRegister != '' ){ ?>
            <div class="alert alert-danger">
                <b><?php echo $errorRegister; ?></b>
            </div>
            <?php } ?>



            <div class="container-fluid px-1 py-5 mx-auto">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-12 col-lg-8 col-md-9 col-11 text-center">

                        <form class="form-group" action="/usuario/avaliacao/editar/<?php echo $value["id_avaliacao"]; ?>" method="post">

                            <input class="form-control py-1" value="<?php echo $usuario["id_usuario"]; ?>" name="id_usuario"
                                type="hidden">

                            <input class="form-control py-1" value="<?php echo $value["id_avaliacao"]; ?>" name="id_avaliacao"
                                type="hidden">



                    </div>
                </div>

                <b>1. Identificação da Avaliação</b><br><br>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table table-dark">


                            <th colspan="3">
                                <center>Unidade Escolar - Código
                            </th>


                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td colspan="2">
                                    <select class="form-control py-1" id="" name="id_unidade" required>
                                        <option value="<?php echo $value["id_unidade"]; ?>"><?php echo $value["nome"]; ?> - [<?php echo $value["sigla"]; ?>] -
                                            <?php echo $value["codigo"]; ?>
                                        </option>
                                        <?php $counter1=-1;  if( isset($unidades) && ( is_array($unidades) || $unidades instanceof Traversable ) && sizeof($unidades) ) foreach( $unidades as $key1 => $value1 ){ $counter1++; ?>
                                        <option value="<?php echo $value1["id_unidade"]; ?>"><?php echo $value1["nome"]; ?> - [<?php echo $value1["sigla"]; ?>] -
                                            <?php echo $value1["codigo"]; ?>
                                        </option>
                                        <?php } ?>
                                    </select>

                                </td>

                                <td>
                                    <center>
                                        <a target="_blank" href="/usuario/cadastrar-unidade"
                                            class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"
                                                aria-hidden="true"></i><b> 
                                                UE</b></a>
                                    </center>
                                </td>





                            </tr>



                        </tbody>

                        <thead class="table table-dark">


                            <th>
                                <center>Situação<b>
                            </th>
                            <th colspan="2">
                                <center>Semestre - Ano<b>
                            </th>


                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>

                                    <select class="form-control py-1" name="situacao" required>
                                        <option value="<?php echo $value["situacao"]; ?>"><?php echo $value["situacao"]; ?></option>
                                        <option value="Em Andamento">Em Andamento</option>
                                        <option value="Pendente">Pendente</option>
                                        <option value="Finalizado">Finalizado</option>

                                    </select>

                                </td>

                                <td colspan="2">

                                    <select class="form-control py-1" id="semestre" name="semestre" required>
                                        <option value="<?php echo $value["semestre"]; ?>"><?php echo $value["semestre"]; ?></option>
                                        <option value="1° - 2023">1° - 2023</option>
                                        <option value="2° - 2023">2° - 2023</option>
                                        <option value="1° - 2024">1° - 2024</option>
                                        <option value="2° - 2024">2° - 2024</option>
                                        <option value="1° - 2025">1° - 2025</option>
                                        <option value="2° - 2025">2° - 2025</option>
                                        <option value="1° - 2026">1° - 2026</option>
                                        <option value="2° - 2026">2° - 2026</option>
                                    </select>
                                </td>


                            </tr>



                        </tbody>

                    </table>
                </div>

                <b>3. Observações</b><br><br>

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
                                        name="observacao"> <?php echo $value["observacao"]; ?> </textarea> </td>
                            </tr>



                        </tbody>

                    </table>
                </div>

                <i>Última alteração registrada pelo(a) usuário(a)<b> <?php echo $value["nome_user"]; ?></b> em
                    <b><?php echo formatDateHoras($value["dt_registro_avaliacao"]); ?>.</b></i><br><br>

                <center><input style="width: 100%;" class="btn btn-success btn " type="submit" value="Alterar"></center>
            </div>
        </div>

        </form>
        <hr>

        <a href="/usuario/avaliacoes" class="btn btn-info btn-xs"><i class="fas fa-chevron-circle-left"></i><b>
                Voltar</b></a>

        
    </div>

</div>
</div>

</div>
<hr class="my-4" />


</div>


</div>
</div>

<script src="https://cdn.ckeditor.com/4.21.0/basic/ckeditor.js"></script>

<script>
    CKEDITOR.replace('observacao');
</script>