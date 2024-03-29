<?php
/**
 * Settings view page.
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi - http://source.ushahididev.com
 * @module     API Controller
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL)
 */
?>
<div class="bg">
	<h2>
	<?php admin::settings_subtabs("map"); ?>
	</h2>
	<?php print form::open(); ?>
	<div class="report-form">
	<?php
	if ($form_error) {
		?>
		<!-- red-box -->
		<div class="red-box">
			<h3>
			<?php echo Kohana::lang('ui_main.error');?>
			</h3>
			<ul>
			<?php
			foreach ($errors as $error_item => $error_description)
			{
				print (!$error_description) ? '' : "<li>" . $error_description . "</li>";
			}
			?>
			</ul>
		</div>
		<?php
	}

	if ($form_saved) {
		?>
		<!-- green-box -->
		<div class="green-box">
			<h3>
			<?php echo Kohana::lang('ui_main.configuration_saved');?>
			</h3>
		</div>
		<?php
	}
	?>
		<div class="head">
			<h3>
			<?php echo Kohana::lang('settings.map_settings');?>
			</h3>
			<input type="image"
				src="<?php echo url::file_loc('img'); ?>media/img/admin/btn-cancel.gif"
				class="cancel-btn" /> <input type="image"
				src="<?php echo url::file_loc('img'); ?>media/img/admin/btn-save-settings.gif"
				class="save-rep-btn" />
		</div>
		<!-- column -->
		<div class="l-column">
			<div class="has_border_first">
				<div class="row">
					<h4>
						<a href="#" class="tooltip"
							title="<?php echo Kohana::lang("tooltips.settings_default_location"); ?>"><?php echo Kohana::lang('settings.default_location');?>
						</a>
					</h4>
					<p class="bold_desc">
					<?php echo Kohana::lang('settings.select_default_location');?>
						.
					</p>
					<span class="my-sel-holder"> <?php print form::dropdown('default_country',$countries,$form['default_country']); ?>
					</span>

					<div id="retrieve_cities">
						<a href="javascript:retrieveCities()" id="retrieve"><?php echo Kohana::lang('settings.download_city_list');?>
						</a> <span id="cities_loading"></span>
						<div id="city_count"></div>
					</div>
					<div>
					<?php echo Kohana::lang('settings.multiple_countries');?>
						?<br /> <input type="radio" name="multi_country" value="1"
						<?php if ($form['multi_country'] == 1)
						{
							echo " checked=\"checked\" ";
						}?>>
						<?php echo Kohana::lang('ui_main.yes');?>
						<input type="radio" name="multi_country" value="0"
						<?php if ($form['multi_country'] != 1)
						{
							echo " checked=\"checked\" ";
						}?>>
						<?php echo Kohana::lang('ui_main.no');?>

					</div>
				</div>
			</div>
			<div class="has_border">
				<h4>
					<a href="#" class="tooltip"
						title="<?php echo Kohana::lang("tooltips.settings_map_provider"); ?>"><?php echo Kohana::lang('settings.map_provider.name');?>
					</a>
				</h4>
				<p class="bold_desc">
				<?php echo Kohana::lang('settings.map_provider.info');?>
				</p>
				<span class="blue_span"><?php echo Kohana::lang('ui_main.step');?>
					1: </span><span class="dark_span"><?php echo Kohana::lang('settings.map_provider.choose');?>
				</span><br />
				<div class="c_push">
					<span class="my-sel-holder"> <?php										
					print form::dropdown('default_map',$map_array,$form['default_map']);
					?> </span>
				</div>

				<span class="blue_span"><?php echo Kohana::lang('ui_main.step');?>
					2: </span><span class="dark_span"><?php echo Kohana::lang('settings.map_provider.get_api');?>
				</span><br />
				<div class="c_push">
					<a href="http://code.google.com/apis/maps/signup.html"
						id="api_link" title="Get API Key"><img
						src="<?php echo url::file_loc('img'); ?>media/img/admin/btn-get-api-key.gif"
						border="0" alt="Get API Key"> </a>
				</div>

				<div id="api_div_google"
				<?php if ($form['default_map'] != 1 && $form['default_map'] != 4) echo "style=\"display:none\""; ?>>
					<span class="blue_span"><?php echo Kohana::lang('ui_main.step');?>
						3: </span><span class="dark_span"><?php echo Kohana::lang('settings.map_provider.enter_api');?>
					</span><br />
					<div class="c_push">
					<?php print form::input('api_google', $form['api_google'], ' class="text"'); ?>
					</div>
				</div>
				<div id="api_div_yahoo"
				<?php if ($form['default_map'] != 3) echo "style=\"display:none\""; ?>>
					<span class="blue_span">Step 3: </span><span class="dark_span"><?php echo Kohana::lang('settings.map_provider.enter_api');?>
					</span><br />
					<div class="c_push">
					<?php print form::input('api_yahoo', $form['api_yahoo'], ' class="text"'); ?>
					</div>
				</div>
			</div>

			<input type="image"
				src="<?php echo url::file_loc('img'); ?>media/img/admin/btn-save-settings.gif"
				class="save-rep-btn" style="margin-left: 0px;" /> <input
				type="image"
				src="<?php echo url::file_loc('img'); ?>media/img/admin/btn-cancel.gif"
				class="cancel-btn" />
		</div>
		<div class="r-column">
			<h4>
				<a href="#" class="tooltip"
					title="<?php echo Kohana::lang("tooltips.settings_configure_map"); ?>"><?php echo Kohana::lang('settings.configure_map');?>
				</a>
			</h4>

			<div style="width: 279px; float: left; margin-top: 10px;">
				<span class="bold_span"><?php echo Kohana::lang('settings.default_zoom_level');?>
				</span>
				<div class="slider_container">
				<?php print form::dropdown('default_zoom',$default_zoom_array,$form['default_zoom']); ?>
				</div>
			</div>
			<div
				style="width: 279px; height: 90px; float: left; margin-top: 10px;">
				<span class="bold_span"><?php echo Kohana::lang('settings.default_map_view');?>
				</span> <span class="my-sel-holder"><select><option>
				<?php echo Kohana::lang('ui_main.map');?>
						</option>
				</select> </span>
				<div class="location-info">
					<span><?php echo Kohana::lang('ui_main.latitude');?>:</span>
					<?php print form::input('default_lat', $form['default_lat'], ' readonly="readonly" class="text"'); ?>
					<span><?php echo Kohana::lang('ui_main.longitude');?>:</span>
					<?php print form::input('default_lon', $form['default_lon'], ' readonly="readonly" class="text"'); ?>
				</div>
			</div>
			<div style="clear: both;"></div>
			<h4>
			<?php echo Kohana::lang('ui_main.preview');?>
			</h4>
			<p class="bold_desc">
			<?php echo Kohana::lang('settings.set_location');?>
				.
			</p>

			<div id="map_holder">
				<div id="map" class="mapstraction"></div>
			</div>
			<div style="margin-top: 25px" id="map_loaded"></div>
		</div>
	</div>
	<?php print form::close(); ?>
</div>
