<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">

    <div class="content-inside">

        <div class="my-4">
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a style="background-color: #2E9AFE;color: white" class="nav-link active" id="home-tab"
                        data-toggle="tab" role="tab" aria-controls="home" aria-selected="false"><b>Alterar Dados do mês
                            de <?php echo $value["mes"]; ?> </b></a>
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

                    </div>
                </div>
                <form class="form-group" action="/usuario/horas_pagas/enviar/<?php echo $value["id_horas_pagas"]; ?>" method="post">

                    <input class="form-control py-1" value="<?php echo $value["id_horas_pagas"]; ?>"  type="hidden">


                    <b>Dados para cálculo do <b>Valor das Horas Pagas</b> referente a <?php echo $value["mes"]; ?>. <br><br> 


                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="table table-dark">



                                <th>
                                    <center>Vencimento<b>
                                </th>
                                <th>
                                    <center>Referência1<b>
                                </th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td> <input min="1"  step=".01" value="<?php echo $value["vencimento"]; ?>" name="vencimento" type="number"
                                            class="form-control py-1" required></td>
                                    <td> <input min="1"  step=".01" value="<?php echo $value["referencia1"]; ?>" name="referencia1" type="number"
                                            class="form-control py-1" required></td>

                                </tr>

                            </tbody>

                        </table>
                    </div>

                    <hr>


                    <center><input style="width: 100%;" class="btn btn-success btn" type="submit" value="Alterar">
                    </center><br><br>
            </div>
            <a href="javascript:history.back()" class="btn btn-info btn-xs"><i
                    class="fas fa-chevron-circle-left"></i><b>
                    Voltar</b></a>
            <hr>
        </div>

    </div>


</div>
</div>

</div>
<hr class="my-4" />

</form>
</div>
</div>



<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

    $(document).ready(function () {
        $('#eqp1').select2();
    });
</script>

<script>
    $(document).ready(function () {
        $('#eqp2').select2();
    });
</script>