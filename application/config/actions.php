<?php defined('SYSPATH') or die('No direct script access allowed.');
/**
 * The Ushahidi Actions Configuration
 *
 * This file contains logic config settings for admin configurable events that can take place
 * when certain hooks are fired.
 *
 * Actions can be manually found throughout the code by searching for "ushahidi_action.*"
 * and seeing where the hook is called.
 *
 */

// ----- TRIGGERS & QUALIFIERS -----

// A list of hooks that are worthy of having a user set up a custom trigger for it

$config['trigger_options'] = array
(
// Name of the action (ie: ushahidi_action.report_add) with a human readable name
	'report_add' => 'Report Added',
	'checkin_recorded' => 'Checkin Recorded'
);

// This is a list of the advanced option areas for the qualifiers

$config['advanced_option_areas'] = array('user','location','keyword','category','on_specific_count',
										'between_times','days_of_the_week','specific_days');

// This shows which advanced options are relevant to the triggers

$config['trigger_advanced_options'] = array(
	'report_add' => array('user','location','keyword','category','on_specific_count','between_times','days_of_the_week','specific_days'),
	'checkin_recorded' => array('user','location','keyword','on_specific_count','between_times','days_of_the_week','specific_days')
);

// ----- RESPONSES -----

// Responses

$config['response_options'] = array(
	'email' => 'Email',
	'approve_report' => 'Approve Report',
	'log_it' => 'Log it',
	'assign_badge' => 'Assign Badge'
);

// This is a list of the advanced option areas for the qualifiers

$config['response_advanced_option_areas'] = array('email_send_address','email_subject','email_body','add_category','verify','badge');

// Andanced response options

$config['response_advanced_options'] = array(
	'email' => array('email_send_address','email_subject','email_body'),
	'approve_report' => array('add_category','verify'),
	'log_it' => array(),
	'assign_badge' => array('badge')
);

// Allowed responses for trigger

$config['trigger_allowed_responses'] = array(
	'report_add' => array('email','approve_report','log_it','assign_badge'),
	'checkin_recorded' => array('email','log_it','assign_badge')
);
