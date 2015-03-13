<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Maremo
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div id="pl-2">
		<div class="panel-grid" id="pg-2-0">
			<div class="panel-grid-cell" id="pgc-2-0-0">
				<div class="panel widget widget_black-studio-tinymce panel-first-child panel-last-child" id="panel-2-0-0-0">
					<div class="text-center panel-widget-style">
						<div class="textwidget">
							<h2>
								<strong id="1section">
									<?php echo get_theme_mod( 'zagolovok1_index' ); ?>
									<br>
									<?php if ( 0 < count( strlen( ( $background_image_url = get_theme_mod( 'true_image' ) ) ) ) ) { // применяем фоновое изображение, если указано
    												echo '<img src=\'' . $background_image_url . '\' /> ';
											} ?>
								</strong>
							</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel-grid" id="pg-2-1">
			<div class="siteorigin-panels-stretch panel-row-style" data-stretch-type="full" style="margin-left: -104.5px; margin-right: -104.5px; padding-left: 104.5px; padding-right: 104.5px; border-left-width: 0px; border-right-width: 0px;">
				<div class="panel-grid-cell" id="pgc-2-1-0">
					<div class="panel widget widget_black-studio-tinymce panel-first-child panel-last-child" id="panel-2-1-0-0">
						<div class="textwidget">
							<h2 class="text-center">
								<strong>
									Наши услуги!
								</strong>
							</h2>
							<div class="row">
								<?php echo do_shortcode('[cp_uslugi]'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel-grid" id="pg-2-2">
			<div class="siteorigin-panels-stretch panel-row-style" data-stretch-type="full" style="margin-left: -104.5px; margin-right: -104.5px; padding-left: 104.5px; padding-right: 104.5px; border-left-width: 0px; border-right-width: 0px;">
				<div class="panel-grid-cell" id="pgc-2-2-0">
					<div class="panel widget widget_black-studio-tinymce panel-first-child panel-last-child" id="panel-2-2-0-0">
						<div class="textwidget">
							<h2 class="text-center">
								<strong>
									Наши преимущества!
								</strong>
							</h2>
							<div class="row">
								<?php echo do_shortcode('[cp_advantage]'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="row">
		<div class="col-md-4 col-md-offset-4">
        						<h3 class="text-center">Заявка на обслуживание</h3>
          						<p><?php echo do_shortcode('[form-cp name_form="Заявка" spam_protect=1]

									[input-cp type=text name="name" placeholder="Имя" meta="Имя"]<br>

									[input-cp type=text name="tel" placeholder="Телефон" meta="Телефон"]<br>

									[input-cp type=email name="email" placeholder="Электронная почта" required="true" meta="Электронная почта"]<br>

									[textarea-cp placeholder="Краткое описание" name="comment" meta="Комментарий"]

									[input-cp type=submit class="btn btn-small btn-success" value="Отправить" name="submit"]

								[/form-cp]'); ?></p>
		</div>
	</div>
</article><!-- #post-## -->
