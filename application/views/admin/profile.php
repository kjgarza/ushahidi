<?php
/**
 * Site view page.
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
	<?php echo Kohana::lang('ui_admin.my_profile');?>
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
			<?php echo Kohana::lang('ui_main.profile_saved');?>
			</h3>
		</div>
		<?php
	}
	?>
		<div class="head">
			<input type="image"
				src="<?php echo url::file_loc('img'); ?>media/img/admin/btn-save-settings.gif"
				class="save-rep-btn" />
		</div>
		<!-- column -->
		<div class="sms_holder">
			<div class="row">
				<h4>
					<a href="#" class="tooltip"
						title="<?php echo Kohana::lang("tooltips.profile_username"); ?>"><?php echo Kohana::lang('ui_main.username');?>
					</a>
				</h4>
				<?php print form::input('username', $form['username'], ' class="text long2" readonly="readonly"'); ?>
			</div>
			<div class="row">
				<h4>
					<a href="#" class="tooltip"
						title="<?php echo Kohana::lang("tooltips.profile_name"); ?>"><?php echo Kohana::lang('ui_main.full_name');?>
					</a>
				</h4>
				<?php print form::input('name', $form['name'], ' class="text long2"'); ?>
			</div>
			<div class="row">
				<h4>
					<a href="#" class="tooltip"
						title="<?php echo Kohana::lang("tooltips.profile_email"); ?>"><?php echo Kohana::lang('ui_main.email');?>
					</a>
				</h4>
				<?php print form::input('email', $form['email'], ' class="text long2"'); ?>
			</div>
			<div class="row">
				<h4>
					<a href="#" class="tooltip"
						title="<?php echo Kohana::lang("tooltips.profile_password"); ?>"><?php echo Kohana::lang('ui_main.new_password');?>
					</a>
				</h4>
				<?php print form::password('password', $form['password'], ' class="text"'); ?>
				<div style="clear: both;"></div>
				<h4>
				<?php echo Kohana::lang('ui_main.password_again');?>
				</h4>
				<?php print form::password('password_again', $form['password_again'], ' class="text"'); ?>
			</div>
			<div class="row">
				<h4>
					<a href="#" class="tooltip"
						title="<?php echo Kohana::lang("tooltips.profile_notify"); ?>"><?php echo Kohana::lang('ui_main.receive_notifications');?>?</a>
				</h4>
				<?php print form::dropdown('notify', $yesno_array, $form['notify']); ?>
			</div>
		</div>

		<div class="simple_border"></div>

		<input type="image"
			src="<?php echo url::file_loc('img'); ?>media/img/admin/btn-save-settings.gif"
			class="save-rep-btn" />
	</div>
	<?php print form::close(); ?>
</div>
