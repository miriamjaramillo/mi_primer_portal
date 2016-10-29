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

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Consumo
        </button> 

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Simulador de crédito de consumo</h4>
                    </div>
                    <div class="modal-body">
                        <div id="tablero">
                            <form action="javascript:calcula(this.form)">
                                <strong>Capital:</strong>
                                <input class="texto"type="text" name="capital" value="0" size="10" maxlength="10" onkeypress="return validar(event, true)" onBlur="desenfoque(this)" onFocus="if (this.value == 0) {
                                            this.value = ''
                                        }"><br>
                                <strong>Interés:</strong>
                                <select name="intereses" id="intereses">
                                    <option value="11.02">VIVIENDA</option>
                                    <option value="15.86">CONSUMO</option>
                                    <option value="25.59">MICRO MINORSTA</option>
                                    <option value="24.36">MICRO AC. SIMPLE</option>
                                    <option value="23.14">MICRO AC. AMPLIADA</option>
                                </select>%<br>
                                <strong>Nº de cuotas:</strong>
                                <input class="texto" onkeypress="return validar(event)" type="text" name="cuotas" value="0" size="3" maxlength="3" onBlur="desenfoque(this)" onFocus="if (this.value == 0) {
                                            this.value = ''}"><br>
                                <input type="submit" name="calcular" id="calcular" value="Calcular">
                            </form>
                        </div>
                        <div id="credito"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary">Guardar cambios</button>
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
