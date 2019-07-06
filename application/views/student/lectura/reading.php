<!DOCTYPE html>
<html>
<head>
	<title>Lecture kids | Movil</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="keywords" content="jquery, book, flip, pages, moleskine, booklet, plugin, css3 "/>

	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png?3">
	<script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/PDFObject-master/pdfobject.min"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/reading/booklet/jquery.booklet.1.1.0.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/reading/css/style.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/custom_theme.css">

	<style type="text/css">
		.btn.btn-flat {
			border-radius: 0;
			-webkit-box-shadow: none;
			-moz-box-shadow: none;
			box-shadow: none;
			border-width: 1px;
		}
		.btn-success {
			background-color: #7ec716;
			border-color: #7ec716;
		}
		.btn {
			border-radius: 3px;
			-webkit-box-shadow: none;
			box-shadow: none;
			border: 1px solid transparent;
			border-top-color: transparent;
			border-top-width: 1px;
			border-right-color: transparent;
			border-right-width: 1px;
			border-bottom-color: transparent;
			border-bottom-width: 1px;
			border-left-color: transparent;
			border-left-width: 1px;
		}
		.btn-block {
			display: block;
			width: 100%;
		}
		.btn-success {
			color: #fff;
			background-color: #7ec716;
			border-color: #7ec716;
		}
		.btn {
			display: inline-block;
			margin-bottom: 0;
			font-weight: 400;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			background-image: none;
			border: 1px solid transparent;
			padding: 6px 12px;
			font-size: 14px;
			line-height: 1.42857143;
			border-radius: 4px;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}
		.pfd_view{
			margin-top: 50px;
			margin-left: 10%;
			margin-right: 10%;
		}
	</style>
</head>
<body class="theme-1">
	
	<center>
		<table class="atern-top-info">
			<tr>
				<td class="top-info">
					<a class="link" href="<?php echo base_url(); ?>Movil/Lecturas/detail/<?php if(!empty($detail_lectura)){echo $detail_lectura->idLectura;}?>"><b>Volver</b></a>
				</td>
				<td class="top-info">
					<b>Título: </b>
					<?php if(!empty($detail_lectura)){echo ucwords($detail_lectura->titulo);} else {echo "No se pudo cargar";}?>
				</td>
				<td class="top-info">
					<b>Subido el: </b>
					<?php if(!empty($detail_lectura)){echo ucwords($detail_lectura->fecha_creacion);} else {echo "No se pudo cargar";} ?>
				</td>
				<td class="top-info">
					<b>Autor: </b>
					<?php if(!empty($detail_lectura)){echo ucfirst($detail_lectura->autor);} else {echo "No se pudo cargar";} ?>
				</td>
			</tr>
		</table>
	</dicenterv>

	<?php if(!empty($detail_lectura)){ ?>
	<?php if($detail_lectura->tipo_lectura == 1){ ?>
	<div class="book_wrapper">
		<a id="pageSelector"></a>
		<a id="next_page_button"></a>
		<a id="prev_page_button"></a>
		<div id="mybook" style="display:none;">
			<?php if(!empty($paginas)): ?>
			<div class="b-load">
				<!-- HOJA MEDIO -->
				<?php foreach($paginas as $pagina): ?>
				<center><div>
					<?php echo $pagina->contenido; ?>
				</div></center>
				<?php endforeach ?>
				<!-- HOJA FIN -->
				<div>
					<div class="box box-widget widget-user box-shadow">
						<div class="widget-user-header bg-blue-active">
							<div class="widget-user-image">
								<img class="img-circle bg-verde img-circle-lectura" src="<?php echo base_url(); ?>assets/img/book.png">
							</div>
							<h3 class="widget-user-username">
								Fin de lectura
							</h3>
							<h4 class="widget-user-desc text-verde">
								¡Bien hecho!
							</h4>
						</div>

						<div class="box-footer">
							<div class="row">
								<div class="col-sm-6 col-6">
									<div class="description-block">
										<h5 class="description-header">¡No olvides finalizar la lectura para poder activar los reactivos!</h5>
										<p></p>
										<form action="<?php echo base_url(); ?>Movil/Lecturas/finishLectura/<?php if(!empty($detail_lectura)){echo $detail_lectura->idLectura;}?>">
											<button type="submit" class="btn btn-block btn-success btn-flat">
												Finalizar lectura
											</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php else: ?>
				<div class="b-load">
					<div>
						<div class="box box-widget widget-user box-shadow">
							<div class="widget-user-header bg-blue-active">
								<div class="widget-user-image">
									<img class="img-circle bg-verde img-circle-lectura" src="<?php echo base_url(); ?>assets/img/book.png">
								</div>
								<h3 class="widget-user-username">
									<?php
									if(!empty($detail_lectura)){echo ucwords($detail_lectura->titulo);} else {echo "No se pudo cargar";}
									?>
								</h3>
								<h4 class="widget-user-desc text-verde">
									<i>subido el:
										<?php
										if(!empty($detail_lectura)){echo ucwords($detail_lectura->fecha_creacion);} else {echo "No se pudo cargar";}
										?>
									</i>
								</h4>
							</div>

							<div class="box-footer">
								<div class="row">
									<div class="col-sm-6 col-6">
										<div class="description-block">

											<h1>¡Ups! Parece que esta lectura se quedo sin contenido, avisa a tu profesor.</h1>

											<br><br>
											<form action="<?php echo base_url(); ?>Movil/Lecturas/detail/<?php if(!empty($detail_lectura)){echo $detail_lectura->idLectura;}?>">
												<button type="submit" class="btn btn-block btn-success btn-flat">
													Regresar a los detalles de lectura
												</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>
			</div>
		</div>
	</div>
	<?php } else if($detail_lectura->tipo_lectura == 2){ ?>
		<?php if(!empty($info_file)){ ?>
	<div class="pfd_view">
		<h1 style="color:white;"><?php echo base_url().'uploads/archivos/'.$info_file->nombre_archivo; ?></h1>
		<iframe src="http://flowpaper.com/flipbook/<?php echo base_url().'uploads/archivos/'.$info_file->nombre_archivo; ?>" width="100%" height="500" style="border: none;" allowFullScreen></iframe>
		<form action="<?php echo base_url(); ?>Movil/Lecturas/finishLectura/<?php if(!empty($detail_lectura)){echo $detail_lectura->idLectura;}?>">
			<button type="submit" class="btn btn-block btn-success btn-flat">
				Finalizar lectura
			</button>
		</form>
	</div>
	
		<?php } ?>
	<?php } ?>
	<?php } ?>

	<!-- <div class="modal fade" id="message_bot_read" tabindex="-1" role="dialog" 
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-body text-centers"  data-dismiss="modal">
            <table width="100%">
                <tr>
                    <img class="bot_modal_maroon" src="<?php echo base_url(); ?>assets/img/theme/bot_level_1.png">
                </tr>
                <tr>
                    <h1 class="bot_message_yellow">¡A LEER! <br> Recuerda finalizar la lectura.</h1>
                </tr>
            </table>
        </div>
    </div>
 -->
    <script type="text/javascript">
      $('document').ready(function(){
        $("#message_bot_read").modal();
      });
    </script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/reading/booklet/jquery.easing.1.3.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/reading/booklet/jquery.booklet.1.1.0.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/flipbook/js/html2canvas.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/flipbook/js/three.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/flipbook/js/pdf.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/flipbook/js/3dflipbook.min.js"></script>
	<script type="text/javascript">
		var $mybook       = $('#mybook');
		var $pageSelector = $('#pageSelector');
		var $bttn_next    = $('#next_page_button');
		var $bttn_prev    = $('#prev_page_button');

		$bttn_next.show();
		$bttn_prev.show();
		$mybook.show().booklet({
		    name:               null,                            // name of the booklet to display in the document title bar
		    width:              850,                             // container width
		    height:             550,                             // container height
		    speed:              700,                             // speed of the transition between pages
		    direction:          'LTR',                           // direction of the overall content organization, default LTR, left to right, can be RTL for languages which read right to left
		    startingPage:       1,                               // index of the first page to be displayed
		    easing:             'easeInOutQuad',                 // easing method for complete transition
		    easeIn:             'easeInQuad',                    // easing method for first half of transition
		    easeOut:            'easeOutQuad',                   // easing method for second half of transition

		    closed:             false,                           // start with the book "closed", will add empty pages to beginning and end of book
		    closedFrontTitle:   $pageSelector,                            // used with "closed", "menu" and "pageSelector", determines title of blank starting page
		    closedFrontChapter: null,                            // used with "closed", "menu" and "chapterSelector", determines chapter name of blank starting page
		    closedBackTitle:    null,                            // used with "closed", "menu" and "pageSelector", determines chapter name of blank ending page
		    closedBackChapter:  null,                            // used with "closed", "menu" and "chapterSelector", determines chapter name of blank ending page
		    covers:             false,                           // used with  "closed", makes first and last pages into covers, without page numbers (if enabled)

		    pagePadding:        0,                              // padding for each page wrapper
		    pageNumbers:        true,                            // display page numbers on each page

		    hovers:             false,                            // enables preview pageturn hover animation, shows a small preview of previous or next page on hover
		    overlays:           false,                            // enables navigation using a page sized overlay, when enabled links inside the content will not be clickable
		    tabs:               false,                           // adds tabs along the top of the pages
		    tabWidth:           0,                              // set the width of the tabs
		    tabHeight:          0,                              // set the height of the tabs
		    arrows:             false,                           // adds arrows overlayed over the book edges
		    cursor:             'pointer',                       // cursor css setting for side bar areas

		    hash:               false,                           // enables navigation using a hash string, ex: #/page/1 for page 1, will affect all booklets with 'hash' enabled
		    keyboard:           true,                            // enables navigation with arrow keys (left: previous, right: next)
		    next:               $bttn_next,                     // selector for element to use as click trigger for next page
		    prev:               $bttn_prev,                     // selector for element to use as click trigger for previous page

		    menu:               null,                            // selector for element to use as the menu area, required for 'pageSelector'
		    pageSelector:       false,                           // enables navigation with a dropdown menu of pages, requires 'menu'
		    chapterSelector:    false,                           // enables navigation with a dropdown menu of chapters, determined by the "rel" attribute, requires 'menu'

		    shadows:            false,                            // display shadows on page animations
		    shadowTopFwdWidth:  1,                             // shadow width for top forward anim
		    shadowTopBackWidth: 1,                             // shadow width for top back anim
		    shadowBtmWidth:     5,                              // shadow width for bottom shadow

		    before:             function(){},                    // callback invoked before each page turn animation
		    after:              function(){}                     // callback invoked after each page turn animation
		});
		Cufon.refresh();
	</script>

</body>
</html>