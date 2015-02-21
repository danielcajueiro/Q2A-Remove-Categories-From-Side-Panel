<?php

/*
	This file is part of Caju - Write on your wall, a Question2Answer plugin that
	allows users only writting on their own walls. A big part of this file is a
        redistribution of "pupi_ra_module_admin.php"! So the same license applies.   

*/

class CAJU_remove_cat_module_admin {

	const BUTTON_SAVE = 'caju_remove_cat_button_save';

	// Settings
	const SETTING_PLUGIN_ENABLED = 'caju_remove_cat_plugin_enabled';

	// Default setting values
	const SETTING_PLUGIN_ENABLED_DEFAULT = false;

	// Language keys
	const LANG_ID_ADMIN_SETTINGS_SAVED = 'admin_settings_saved';
	const LANG_ID_ADMIN_SAVE_SETTINGS_BUTTON = 'admin_save_settings_button';
	const LANG_ID_ADMIN_PLUGIN_ENABLED = 'admin_plugin_enabled';
        const LANG_ID_PLUGIN_MESSAGE_OTHER_WALL='plugin_message_other_wall';
        const LANG_ID_PLUGIN_MESSAGE_NOT_REGISTERED='plugin_message_not_registered';

	public static function translate($id) {
		return qa_lang_html('caju_catrem/' . $id);
	}

	public function option_default($option) {
		switch ($option) {
			case self::SETTING_PLUGIN_ENABLED:
				return self::SETTING_PLUGIN_ENABLED_DEFAULT;
			default:
		}
	}

	public function admin_form(&$qa_content) {
		$ok = null;
		if (qa_clicked(self::BUTTON_SAVE)) {
			$this->savePluginEnabledSetting();
			$ok = self::translate(self::LANG_ID_ADMIN_SETTINGS_SAVED);
		}
		$fields = array_merge(
			$this->getPluginEnabledField()
		);
		return array(
			'ok' => $ok,
			'style' => 'wide',
			'fields' => $fields,
			'buttons' => $this->getButtons(),
		);
	}

	private function getButtons() {
		return array(
			'save' => array(
				'tags' => 'name="' . self::BUTTON_SAVE . '"',
				'label' => self::translate(self::LANG_ID_ADMIN_SAVE_SETTINGS_BUTTON),
			),
		);
	}

	// All field returning methods

	private function getPluginEnabledField() {
		return array(array(
			'label' => self::translate(self::LANG_ID_ADMIN_PLUGIN_ENABLED),
			'style' => 'tall',
			'tags' => 'name="' . self::SETTING_PLUGIN_ENABLED . '"',
			'type' => 'checkbox',
			'value' => (bool) qa_opt(self::SETTING_PLUGIN_ENABLED),
		));
	}

	// All field saving methods

	private function savePluginEnabledSetting() {
		qa_opt(self::SETTING_PLUGIN_ENABLED, (bool) qa_post_text(self::SETTING_PLUGIN_ENABLED));
	}

}
