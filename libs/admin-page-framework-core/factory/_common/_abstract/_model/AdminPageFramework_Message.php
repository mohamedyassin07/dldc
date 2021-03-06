<?php 
/**
	Admin Page Framework v3.8.34 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/DLDC>
	Copyright (c) 2013-2021, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
class AdminPageFramework_Message {
    public $aMessages = array();
    public $aDefaults = array('option_updated' => 'The options have been updated.', 'option_cleared' => 'The options have been cleared.', 'export' => 'Export', 'export_options' => 'Export Options', 'import' => 'Import', 'import_options' => 'Import Options', 'submit' => 'Submit', 'import_error' => 'An error occurred while uploading the import file.', 'uploaded_file_type_not_supported' => 'The uploaded file type is not supported: %1$s', 'could_not_load_importing_data' => 'Could not load the importing data.', 'imported_data' => 'The uploaded file has been imported.', 'not_imported_data' => 'No data could be imported.', 'upload_image' => 'Upload Image', 'use_this_image' => 'Use This Image', 'insert_from_url' => 'Insert from URL', 'reset_options' => 'Are you sure you want to reset the options?', 'confirm_perform_task' => 'Please confirm your action.', 'specified_option_been_deleted' => 'The specified options have been deleted.', 'nonce_verification_failed' => 'A problem occurred while processing the form data. Please try again.', 'check_max_input_vars' => 'Not all form fields could not be sent. ' . 'Please check your server settings of PHP <code>max_input_vars</code> and consult the server administrator to increase the value. ' . '<code>max input vars</code>: %1$s. <code>$_POST</code> count: %2$s', 'send_email' => 'Is it okay to send the email?', 'email_sent' => 'The email has been sent.', 'email_scheduled' => 'The email has been scheduled.', 'email_could_not_send' => 'There was a problem sending the email', 'title' => 'Title', 'author' => 'Author', 'categories' => 'Categories', 'tags' => 'Tags', 'comments' => 'Comments', 'date' => 'Date', 'show_all' => 'Show All', 'show_all_authors' => 'Show all Authors', 'powered_by' => 'Thank you for creating with', 'and' => 'and', 'settings' => 'Settings', 'manage' => 'Manage', 'select_image' => 'Select Image', 'upload_file' => 'Upload File', 'use_this_file' => 'Use This File', 'select_file' => 'Select File', 'remove_value' => 'Remove Value', 'select_all' => 'Select All', 'select_none' => 'Select None', 'no_term_found' => 'No term found.', 'select' => 'Select', 'insert' => 'Insert', 'use_this' => 'Use This', 'return_to_library' => 'Return to Library', 'queries_in_seconds' => '%1$s queries in %2$s seconds.', 'out_of_x_memory_used' => '%1$s out of %2$s (%3$s) memory used.', 'peak_memory_usage' => 'Peak memory usage %1$s.', 'initial_memory_usage' => 'Initial memory usage  %1$s.', 'repeatable_section_is_disabled' => 'The ability to repeat sections is disabled.', 'repeatable_field_is_disabled' => 'The ability to repeat fields is disabled.', 'warning_caption' => 'Warning', 'allowed_maximum_number_of_fields' => 'The allowed maximum number of fields is {0}.', 'allowed_minimum_number_of_fields' => 'The allowed minimum number of fields is {0}.', 'add' => 'Add', 'remove' => 'Remove', 'allowed_maximum_number_of_sections' => 'The allowed maximum number of sections is {0}', 'allowed_minimum_number_of_sections' => 'The allowed minimum number of sections is {0}', 'add_section' => 'Add Section', 'remove_section' => 'Remove Section', 'toggle_all' => 'Toggle All', 'toggle_all_collapsible_sections' => 'Toggle all collapsible sections', 'reset' => 'Reset', 'yes' => 'Yes', 'no' => 'No', 'on' => 'On', 'off' => 'Off', 'enabled' => 'Enabled', 'disabled' => 'Disabled', 'supported' => 'Supported', 'not_supported' => 'Not Supported', 'functional' => 'Functional', 'not_functional' => 'Not Functional', 'too_long' => 'Too Long', 'acceptable' => 'Acceptable', 'no_log_found' => 'No log found.', 'method_called_too_early' => 'The method is called too early.', 'debug_info' => 'Debug Info', 'debug' => 'Debug', 'debug_info_will_be_disabled' => 'This information will be disabled when <code>WP_DEBUG</code> is set to <code>false</code> in <code>wp-config.php</code>.', 'click_to_expand' => 'Click here to expand to view the contents.', 'click_to_collapse' => 'Click here to collapse the contents.', 'loading' => 'Loading...', 'please_enable_javascript' => 'Please enable JavaScript for better user experience.', 'submit_confirmation_label' => 'Submit the form.', 'submit_confirmation_error' => 'Please check this box if you want to proceed.', 'import_no_file' => 'No file is selected.',);
    protected $_sTextDomain = 'DLDC';
    static private $_aInstancesByTextDomain = array();
    public static function getInstance($sTextDomain = 'DLDC') {
        $_oInstance = isset(self::$_aInstancesByTextDomain[$sTextDomain]) && (self::$_aInstancesByTextDomain[$sTextDomain] instanceof AdminPageFramework_Message) ? self::$_aInstancesByTextDomain[$sTextDomain] : new AdminPageFramework_Message($sTextDomain);
        self::$_aInstancesByTextDomain[$sTextDomain] = $_oInstance;
        return self::$_aInstancesByTextDomain[$sTextDomain];
    }
    public static function instantiate($sTextDomain = 'DLDC') {
        return self::getInstance($sTextDomain);
    }
    public function __construct($sTextDomain = 'DLDC') {
        $this->_sTextDomain = $sTextDomain;
        $this->aMessages = array_fill_keys(array_keys($this->aDefaults), null);
    }
    public function getTextDomain() {
        return $this->_sTextDomain;
    }
    public function set($sKey, $sValue) {
        $this->aMessages[$sKey] = $sValue;
    }
    public function get($sKey = '') {
        if (!$sKey) {
            return $this->_getAllMessages();
        }
        return isset($this->aMessages[$sKey]) ? __($this->aMessages[$sKey], $this->_sTextDomain) : __($this->{$sKey}, $this->_sTextDomain);
    }
    private function _getAllMessages() {
        $_aMessages = array();
        foreach ($this->aMessages as $_sLabel => $_sTranslation) {
            $_aMessages[$_sLabel] = $this->get($_sLabel);
        }
        return $_aMessages;
    }
    public function output($sKey) {
        echo $this->get($sKey);
    }
    public function __($sKey) {
        return $this->get($sKey);
    }
    public function _e($sKey) {
        $this->output($sKey);
    }
    public function __get($sPropertyName) {
        return isset($this->aDefaults[$sPropertyName]) ? $this->aDefaults[$sPropertyName] : $sPropertyName;
    }
    private function ___doDummy() {
        __('The options have been updated.', 'DLDC');
        __('The options have been cleared.', 'DLDC');
        __('Export', 'DLDC');
        __('Export Options', 'DLDC');
        __('Import', 'DLDC');
        __('Import Options', 'DLDC');
        __('Submit', 'DLDC');
        __('An error occurred while uploading the import file.', 'DLDC');
        __('The uploaded file type is not supported: %1$s', 'DLDC');
        __('Could not load the importing data.', 'DLDC');
        __('The uploaded file has been imported.', 'DLDC');
        __('No data could be imported.', 'DLDC');
        __('Upload Image', 'DLDC');
        __('Use This Image', 'DLDC');
        __('Insert from URL', 'DLDC');
        __('Are you sure you want to reset the options?', 'DLDC');
        __('Please confirm your action.', 'DLDC');
        __('The specified options have been deleted.', 'DLDC');
        __('A problem occurred while processing the form data. Please try again.', 'DLDC');
        __('Not all form fields could not be sent. Please check your server settings of PHP <code>max_input_vars</code> and consult the server administrator to increase the value. <code>max input vars</code>: %1$s. <code>$_POST</code> count: %2$s', 'DLDC');
        __('Is it okay to send the email?', 'DLDC');
        __('The email has been sent.', 'DLDC');
        __('The email has been scheduled.', 'DLDC');
        __('There was a problem sending the email', 'DLDC');
        __('Title', 'DLDC');
        __('Author', 'DLDC');
        __('Categories', 'DLDC');
        __('Tags', 'DLDC');
        __('Comments', 'DLDC');
        __('Date', 'DLDC');
        __('Show All', 'DLDC');
        __('Show All Authors', 'DLDC');
        __('Thank you for creating with', 'DLDC');
        __('and', 'DLDC');
        __('Settings', 'DLDC');
        __('Manage', 'DLDC');
        __('Select Image', 'DLDC');
        __('Upload File', 'DLDC');
        __('Use This File', 'DLDC');
        __('Select File', 'DLDC');
        __('Remove Value', 'DLDC');
        __('Select All', 'DLDC');
        __('Select None', 'DLDC');
        __('No term found.', 'DLDC');
        __('Select', 'DLDC');
        __('Insert', 'DLDC');
        __('Use This', 'DLDC');
        __('Return to Library', 'DLDC');
        __('%1$s queries in %2$s seconds.', 'DLDC');
        __('%1$s out of %2$s MB (%3$s) memory used.', 'DLDC');
        __('Peak memory usage %1$s MB.', 'DLDC');
        __('Initial memory usage  %1$s MB.', 'DLDC');
        __('The allowed maximum number of fields is {0}.', 'DLDC');
        __('The allowed minimum number of fields is {0}.', 'DLDC');
        __('Add', 'DLDC');
        __('Remove', 'DLDC');
        __('The allowed maximum number of sections is {0}', 'DLDC');
        __('The allowed minimum number of sections is {0}', 'DLDC');
        __('Add Section', 'DLDC');
        __('Remove Section', 'DLDC');
        __('Toggle All', 'DLDC');
        __('Toggle all collapsible sections', 'DLDC');
        __('Reset', 'DLDC');
        __('Yes', 'DLDC');
        __('No', 'DLDC');
        __('On', 'DLDC');
        __('Off', 'DLDC');
        __('Enabled', 'DLDC');
        __('Disabled', 'DLDC');
        __('Supported', 'DLDC');
        __('Not Supported', 'DLDC');
        __('Functional', 'DLDC');
        __('Not Functional', 'DLDC');
        __('Too Long', 'DLDC');
        __('Acceptable', 'DLDC');
        __('No log found.', 'DLDC');
        __('The method is called too early: %1$s', 'DLDC');
        __('Debug Info', 'DLDC');
        __('Click here to expand to view the contents.', 'DLDC');
        __('Click here to collapse the contents.', 'DLDC');
        __('Loading...', 'DLDC');
        __('Please enable JavaScript for better user experience.', 'DLDC');
        __('Debug', 'DLDC');
        __('This information will be disabled when <code>WP_DEBUG</code> is set to <code>false</code> in <code>wp-config.php</code>.', 'DLDC');
        __('The ability to repeat sections is disabled.', 'DLDC');
        __('The ability to repeat fields is disabled.', 'DLDC');
        __('Warning.', 'DLDC');
        __('Submit the form.', 'DLDC');
        __('Please check this box if you want to proceed.', 'DLDC');
        __('No file is selected.', 'DLDC');
    }
    }
    