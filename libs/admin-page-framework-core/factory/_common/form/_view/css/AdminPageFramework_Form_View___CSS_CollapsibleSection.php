<?php 
/**
	Admin Page Framework v3.8.34 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/DLDC>
	Copyright (c) 2013-2021, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
abstract class AdminPageFramework_Form_View___CSS_Base extends AdminPageFramework_FrameworkUtility {
    public $aAdded = array();
    public function add($sCSSRules) {
        $this->aAdded[] = $sCSSRules;
    }
    public function get() {
        $_sCSSRules = $this->_get() . PHP_EOL;
        $_sCSSRules.= $this->_getVersionSpecific();
        $_sCSSRules.= implode(PHP_EOL, $this->aAdded);
        return $_sCSSRules;
    }
    protected function _get() {
        return '';
    }
    protected function _getVersionSpecific() {
        return '';
    }
    }
    class AdminPageFramework_Form_View___CSS_CollapsibleSection extends AdminPageFramework_Form_View___CSS_Base {
        protected function _get() {
            return $this->___getCollapsibleSectionsRules();
        }
        private function ___getCollapsibleSectionsRules() {
            $_sCSSRules = ".DLDC-collapsible-sections-title.DLDC-collapsible-type-box, .DLDC-collapsible-section-title.DLDC-collapsible-type-box{font-size:13px;background-color: #fff;padding: 1em 2.6em 1em 2em;border-top: 1px solid #eee;border-bottom: 1px solid #eee;}.DLDC-collapsible-sections-title.DLDC-collapsible-type-box.collapsed.DLDC-collapsible-section-title.DLDC-collapsible-type-box.collapsed {border-bottom: 1px solid #dfdfdf;margin-bottom: 1em; }.DLDC-collapsible-section-title.DLDC-collapsible-type-box {margin-top: 0;}.DLDC-collapsible-section-title.DLDC-collapsible-type-box.collapsed {margin-bottom: 0;}#poststuff .DLDC-collapsible-sections-title.DLDC-collapsible-type-box.DLDC-section-title > .section-title-outer-container > .section-title-container > .section-title,#poststuff .DLDC-collapsible-section-title.DLDC-collapsible-type-box.DLDC-section-title > .section-title-outer-container > .section-title-container > .section-title{font-size: 1em;margin: 0 1em 0 0; }#poststuff .DLDC-collapsible-section-title.DLDC-collapsible-type-box.DLDC-section-title > .section-title-outer-container > .section-title-container > fieldset {line-height: 0; }#poststuff .DLDC-collapsible-section-title.DLDC-collapsible-type-box.DLDC-section-title > .section-title-outer-container > .section-title-container > fieldset .DLDC-field {margin: 0;padding: 0;}.DLDC-collapsible-sections-title.DLDC-collapsible-type-box.accordion-section-title:after,.DLDC-collapsible-section-title.DLDC-collapsible-type-box.accordion-section-title:after {top: 0.88em;top: 34%;right: 15px;}.DLDC-collapsible-sections-title.DLDC-collapsible-type-box.accordion-section-title:after,.DLDC-collapsible-section-title.DLDC-collapsible-type-box.accordion-section-title:after {content: '\\f142';}.DLDC-collapsible-sections-title.DLDC-collapsible-type-box.accordion-section-title.collapsed:after,.DLDC-collapsible-section-title.DLDC-collapsible-type-box.accordion-section-title.collapsed:after {content: '\\f140';} .DLDC-collapsible-sections-content.DLDC-collapsible-content.accordion-section-content,.DLDC-collapsible-section-content.DLDC-collapsible-content.accordion-section-content,.DLDC-collapsible-sections-content.DLDC-collapsible-content-type-box, .DLDC-collapsible-section-content.DLDC-collapsible-content-type-box{border: 1px solid #dfdfdf;border-top: 0;background-color: #fff;}tbody.DLDC-collapsible-content {display: table-caption; padding: 10px 20px 15px 20px;}tbody.DLDC-collapsible-content.table-caption {display: table-caption; }.DLDC-collapsible-toggle-all-button-container {margin-top: 1em;margin-bottom: 1em;width: 100%;display: table; }.DLDC-collapsible-toggle-all-button.button {height: 36px;line-height: 34px;padding: 0 16px 6px;font-size: 20px;width: auto;}.flipped > .DLDC-collapsible-toggle-all-button.button.dashicons {-moz-transform: scaleY(-1);-webkit-transform: scaleY(-1);transform: scaleY(-1);filter: flipv; }.DLDC-collapsible-section-title.DLDC-collapsible-type-box .DLDC-repeatable-section-buttons {margin: 0; }.DLDC-collapsible-section-title.DLDC-collapsible-type-box .DLDC-repeatable-section-buttons.section_title_field_sibling {margin-top: 0;}.DLDC-collapsible-section-title.DLDC-collapsible-type-box .repeatable-section-button {background: none; line-height: 1.8em; margin: 0;padding: 0;width: 2em;height: 2em;text-align: center;}.DLDC-collapsible-sections-title.DLDC-collapsible-type-box .section-title-height-fixer, .DLDC-collapsible-section-title.DLDC-collapsible-type-box .section-title-height-fixer {height: 100%;width: 0;display: inline-block;vertical-align: middle;}.DLDC-collapsible-sections-title.DLDC-collapsible-type-box .section-title-outer-container, .DLDC-collapsible-section-title.DLDC-collapsible-type-box .section-title-outer-container {width: 88%;display: inline-block;text-align: left;vertical-align: middle;}.DLDC-collapsible-sections-title.DLDC-collapsible-type-box .DLDC-repeatable-section-buttons-outer-container,.DLDC-collapsible-section-title.DLDC-collapsible-type-box .DLDC-repeatable-section-buttons-outer-container {width: 10.88%;min-width: 60px; display: inline-block;text-align: right;vertical-align: middle;}@media only screen and ( max-width: 782px ) {.DLDC-collapsible-sections-title.DLDC-collapsible-type-box .section-title-outer-container, .DLDC-collapsible-section-title.DLDC-collapsible-type-box .section-title-outer-container {width: 87.8%;}}.accordion-section-content.DLDC-collapsible-content-type-button {background-color: transparent;}.DLDC-collapsible-button {color: #888;margin-right: 0.4em;font-size: 0.8em;}.DLDC-collapsible-button-collapse {display: inline;} .collapsed .DLDC-collapsible-button-collapse {display: none;}.DLDC-collapsible-button-expand {display: none;}.collapsed .DLDC-collapsible-button-expand {display: inline;}.DLDC-collapsible-section-title .DLDC-fields {display: inline;vertical-align: middle; line-height: 1em; }.DLDC-collapsible-section-title .DLDC-field {float: none;}.DLDC-collapsible-section-title .DLDC-fieldset {display: inline;margin-right: 1em;vertical-align: middle; }#poststuff .DLDC-collapsible-title.DLDC-collapsible-section-title .section-title-container.has-fields .section-title{width: auto;display: inline-block;margin: 0 1em 0 0.4em;vertical-align: middle;}";
            $_sCSSRules.= $this->___getForWP38OrBelow();
            $_sCSSRules.= $this->___getForWP53OrAbove();
            return $_sCSSRules;
        }
        private function ___getForWP53OrAbove() {
            if (version_compare($GLOBALS['wp_version'], '5.3', '<')) {
                return '';
            }
            return ".DLDC-collapsible-section-title.DLDC-collapsible-type-box .repeatable-section-button {width: 32px;height: 32px;margin: 0 0.1em;}.DLDC-collapsible-section-title.DLDC-collapsible-type-box .repeatable-section-button .dashicons {height: 100%;}";
        }
        private function ___getForWP38OrBelow() {
            if (version_compare($GLOBALS['wp_version'], '3.8', '>=')) {
                return '';
            }
            return ".DLDC-collapsible-sections-title.DLDC-collapsible-type-box.accordion-section-title:after,.DLDC-collapsible-section-title.DLDC-collapsible-type-box.accordion-section-title:after {content: '';top: 18px;}.DLDC-collapsible-sections-title.DLDC-collapsible-type-box.accordion-section-title.collapsed:after,.DLDC-collapsible-section-title.DLDC-collapsible-type-box.accordion-section-title.collapsed:after {content: '';} .DLDC-collapsible-toggle-all-button.button {font-size: 1em;}.DLDC-collapsible-section-title.DLDC-collapsible-type-box .DLDC-repeatable-section-buttons {top: -8px;}";
        }
    }
    