<?php
/**
 *
 * Server Monitoring. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2019, Evil
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace evilsystem\amxxmonitoring\controller;

/**
 * Server Monitoring ACP controller.
 */
class acp_controller
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\language\language */
	protected $language;

	/** @var \phpbb\log\log */
	protected $log;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var string Custom form action */
	protected $u_action;

	/** @var string Custom string for servers table */
	protected $servers_table;

	/** @var string Custom string for mods table */
	protected $mods_table;

	/**
	 * Constructor.
	 *
	 * @param \phpbb\config\config						$config				Config object
	 * @param \phpbb\language\language					$language			Language object
	 * @param \phpbb\log\log							$log				Log object
	 * @param \phpbb\request\request					$request			Request object
	 * @param \phpbb\template\template					$template			Template object
	 * @param \phpbb\user								$user				User object
	 * @param \phpbb\db\driver\driver_interface 		$db 				Database Object
	 * @param \evilsystem\amxxmonitoring\table			$mods_table			String
	 * @param \evilsystem\amxxmonitoring\table			$servers_table		String
	 */
	public function __construct(
		\phpbb\config\config $config, 
		\phpbb\language\language $language, 
		\phpbb\log\log $log, 
		\phpbb\request\request $request, 
		\phpbb\template\template $template, 
		\phpbb\user $user,
		\phpbb\db\driver\driver_interface $db,
		$mods_table,
		$servers_table
	)
	{
		$this->config			= $config;
		$this->language			= $language;
		$this->log				= $log;
		$this->request			= $request;
		$this->template			= $template;
		$this->user				= $user;
		$this->db 				= $db;
		$this->mods_table 		= $mods_table;
		$this->servers_table 	= $servers_table;
	}

	/**
	 * Display the options a user can configure for this extension.
	 *
	 * @return void
	 */
	public function display_options()
	{
		// Add our common language file
		$this->language->add_lang('common', 'evilsystem/amxxmonitoring');

		// Create a form key for preventing CSRF attacks
		add_form_key('evilsystem_amxxmonitoring_acp');

		$data = array(
			'mod_name' => $this->request->variable('mod_name', ''),
		);

		// Create an array to collect errors that will be output to the user
		$errors = array();

		// Is the form being submitted to us?
		if ($this->request->is_set_post('submit'))
		{
			// Test if the submitted form is valid
			if (!check_form_key('evilsystem_amxxmonitoring_acp'))
			{
				$errors[] = $this->language->lang('FORM_INVALID');
			}

			$sql = 'INSERT INTO '. $this->mods_table .' ' . $this->db->sql_build_array('INSERT', $data);

			$result = $this->db->sql_query($sql);

			$this->db->sql_freeresult($result);

			// If no errors, process the form data
			if (empty($errors))
			{
				// Add option settings change action to the admin log
				$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_ACP_AMXXMONITORING_SETTINGS_MOD');

				// Option settings have been updated and logged
				// Confirm this to the user and provide link back to previous page
				trigger_error($this->language->lang('ACP_AMXXMONITORING_SETTING_SAVED') . adm_back_link($this->u_action));
			}
		}

		$s_errors = !empty($errors);

		// Set output variables for display in the template
		$this->template->assign_vars(array(
			'S_ERROR'		=> $s_errors,
			'ERROR_MSG'		=> $s_errors ? implode('<br />', $errors) : '',

			'U_ACTION'		=> $this->u_action,
		));
	}

	/**
	 * Set custom form action.
	 *
	 * @param string	$u_action	Custom form action
	 * @return void
	 */
	public function set_page_url($u_action)
	{
		$this->u_action = $u_action;
	}
}
