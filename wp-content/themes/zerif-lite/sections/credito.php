<?php
/*
  Template Name: Credito
  Single Post Template: credito
 */
get_header();
the_post();

$custom_fields = get_post_custom();
?>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.12.3.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/dataTables.jqueryui.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/credito.js" type="text/javascript"></script>
<link href="<?php echo get_template_directory_uri(); ?>/css/jquery-ui.css" type="text/css"/>
<link href="<?php echo get_template_directory_uri(); ?>/css/dataTables.jqueryui.min.css" type="text/css"/>

<div id="master">
    <div id="content" class="container">
        <div class="top">
            <ul class="breadcrumbs">
                <br/>
            </ul>
        </div>
        <h1 class="entry-title" itemprop="headline" style="text-align: left"><?php the_title(); ?></h1><br/>
        <p style="text-align: justify; line-height: 30px;"><span style="color: #000000;">Nuestra institución ofrece los siguientes créditos:</span></p>
        
        
        <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="font-size: 12px">Simulador de crédito</a>
        <p align="left">
        <div class="collapse" id="collapseExample">
            <div class="well">
                <form action="javascript:calcula(this.form)" class="form-group">
                            <table style="margin: -2.5%; border: 0; margin-left: 1%">
                                <tr>
                                    <td style="width: 50%; border: 0;"><div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3">Capital: </span>
                                            <input type="text" class="form-control" placeholder="Ingrese el capital" aria-describedby="sizing-addon3" name="capital" onkeypress="return validar(event, true)" onBlur="desenfoque(this)" onFocus="if (this.value == 0) {
                                                        this.value = ''
                                                    }">
                                        </div></td>
                                    <td style="width: 50%; border: 0;"><div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3">N° de cuotas: </span>
                                            <input type="text" class="form-control" placeholder="Cuotas en meses" aria-describedby="sizing-addon3" name="cuotas" onkeypress="return validar(event)" onBlur="desenfoque(this)" onFocus="if (this.value == 0) {
                                                        this.value = '' }">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: 0;"><div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3">Tipo de crédito:</span>
                                            <select class="form-control"  name="intereses" id="intereses">
                                                <option value="11.02">Vivienda</option>
                                                <option value="15.86">Consumo</option>
                                                <option value="25.59">Micro Monorista</option>
                                                <option value="24.36">Micro Ac. Simple</option>
                                                <option value="23.14">Micro Ac. Ampliada</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td style="border: 0;"><div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3">Tasa de interés nominal:&nbsp;</span>
                                            <input type="text" class="form-control" aria-describedby="sizing-addon3" disabled="true" value="0">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: 0;"><div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3">Amortización:&nbsp;</span>
                                            <input type="text" class="form-control" aria-describedby="sizing-addon3" disabled="true" value="Cuota fija (Francesa)">
                                        </div>
                                    </td>
                                    <td style="border: 0;"><div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3">Seguro de desgravamen:</span>
                                            <input type="text" class="form-control" aria-describedby="sizing-addon3" disabled="true" value="0.60%">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <!--<button type="submit" class="btn btn-default" name="calcular">Calcular</button>-->
                            <input type="submit" class="btn btn-primary" name="calcular" id="calcular" value="Calcular" style="font-size: 12px; padding: 5px 15px; margin: 20px">
                        </form>
                <div id="credito"></div>
            </div>
        </div></p>

        <!-- Button trigger modal -->
        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Consumo</button>--> 

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div style="text-align: left; font-size: 14px"> <b>Simulador de crédito de consumo</b>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    </div>
                    <div class="modal-body">
<!--                        <form action="javascript:calcula(this.form)" class="form-group">
                            <table style="margin: -2.5%; border: 0; margin-left: 1%">
                                <tr>
                                    <td style="width: 50%; border: 0;"><div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3">Capital: </span>
                                            <input type="text" class="form-control" placeholder="Ingrese el capital" aria-describedby="sizing-addon3" name="capital" onkeypress="return validar(event, true)" onBlur="desenfoque(this)" onFocus="if (this.value == 0) {
                                                        this.value = ''
                                                    }">
                                        </div></td>
                                    <td style="width: 50%; border: 0;"><div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3">N° de cuotas: </span>
                                            <input type="text" class="form-control" placeholder="Cuotas en meses" aria-describedby="sizing-addon3" name="cuotas" onkeypress="return validar(event)" onBlur="desenfoque(this)" onFocus="if (this.value == 0) {
                                                        this.value = '' }">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: 0;"><div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3">Tipo de crédito:</span>
                                            <select class="form-control"  name="intereses" id="intereses">
                                                <option value="11.02">Vivienda</option>
                                                <option value="15.86">Consumo</option>
                                                <option value="25.59">Micro Monorista</option>
                                                <option value="24.36">Micro Ac. Simple</option>
                                                <option value="23.14">Micro Ac. Ampliada</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td style="border: 0;"><div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3">Tasa de interés nominal:&nbsp;</span>
                                            <input type="text" class="form-control" aria-describedby="sizing-addon3" disabled="true" value="0">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: 0;"><div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3">Amortización:&nbsp;</span>
                                            <input type="text" class="form-control" aria-describedby="sizing-addon3" disabled="true" value="Cuota fija (Francesa)">
                                        </div>
                                    </td>
                                    <td style="border: 0;"><div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3">Seguro de desgravamen:</span>
                                            <input type="text" class="form-control" aria-describedby="sizing-addon3" disabled="true" value="0.60%">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <button type="submit" class="btn btn-default" name="calcular">Calcular</button>
                            <input type="submit" class="btn btn-primary" name="calcular" id="calcular" value="Calcular" style="font-size: 12px; padding: 5px 15px; margin: 20px">
                        </form>-->
<!--                        <div id="credito"></div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 12px">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script type='text/javascript'>
    $(document).ready(function () {
        $('#example').DataTable();
    });


</script>
<?php get_footer(); ?>
