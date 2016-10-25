<?php
/*
  Template Name: Credito
  Single Post Template: credito
 */
get_header();
the_post();

$custom_fields = get_post_custom();
?>
<div id="master">
    <div id="content" class="container">
        <div class="top">
            <ul class="breadcrumbs">
                <br/>
            </ul>
        </div>
        <h1 class="entry-title" itemprop="headline" style="text-align: left"><?php the_title(); ?></h1><br/>
        <p style="text-align: justify; line-height: 30px;"><span style="color: #000000;">Nuestra institución ofrece los siguientes créditos:</span></p>

        <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  Link with href
</a>
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  Button with data-target
</button>
<div class="collapse" id="collapseExample">
  <div class="well">
    ...
  </div>
</div>
        
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
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
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="search" class="right">
            <form method="get" id="searchform" action="<?php echo get_bloginfo('url'); ?>/">
                <input placeholder="Búsqueda" type="text" class="srch-txt" id="buscador" name="s">
            </form>
        </div>
        <div class="clear"></div>
        <div id="lead"> </div>
        <div id="content-side" class="left">
            <div>
                <div class='flexcroll' style="width:290px; height:510px; z-index:1px;">
                    <?php echo do_shortcode('[dcwp-jquery-accordion menu="menu_credito" skin="orange" ]'); ?>
                </div>
            </div>
            <!--
                        <div class="imagen imagen-fijo-wpb"><?//php if (function_exists("wpbanners_show")) wpbanners_show(2); ?></div>
                        <div class="imagen imagen-fijo-wpb"><?//php if (function_exists("wpbanners_show")) wpbanners_show(3); ?></div>
            -->
        </div>
        <div id="content-main">

            <?php
            if (has_post_thumbnail()) {
                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail_size');
                $url = $thumb['0'];
                ?><div class="imagen imagen-fijo-inst">
                    <a rel="slb_group[1398] slb slb_internal" href="<?php echo $url; ?>" target="_blank" >
                        <?php echo the_post_thumbnail(); ?>
                    </a>
                </div>
                <?php
            }
            if (isset($custom_fields['Encabezado'][0])) {
                ?>
                <blockquote><?php echo $custom_fields['Encabezado'][0] ?></blockquote>
                <?php
            }
            if (isset($custom_fields['Pie-Foto'][0])) {
                ?>
                <cite><?php echo $custom_fields['Pie-Foto'][0] ?></cite>
                <?php
            }
            ?>

            <div class="clear"></div>
            <p>&nbsp;</p>
            <?php the_content(); ?>
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>
