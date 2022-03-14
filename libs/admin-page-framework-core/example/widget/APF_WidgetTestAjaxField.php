<?php
/**
 * Admin Page Framework - Demo
 *
 * Demonstrates the usage of Admin Page Framework.
 *
 * http://admin-page-framework.michaeluno.jp/
 * Copyright (c) 2013-2021, Michael Uno; Licensed GPLv2
 *
 */

/**
 * Creates a widget for debugging.
 */
class APF_WidgetTestAjaxField extends AdminPageFramework_Widget {

    public function setUp() {

        new AjaxTestCustomFieldType( $this->oProp->sClassName );
    }

    /**
     * Sets up the form.
     *
     * Alternatively you may use load_{instantiated class name} method.
     */
    public function load() {

        $this->addSettingFields(
            array(
                'field_id' => 'ajax_test_filed',
                'type'     => 'ajax_test',
                'title'    => __( 'Ajax', 'admin-page-framework-loader' ),
                'label'    => array(
                    'a' => 'A',
                    'b' => 'B',
                    'c' => 'C',
                ),
            )
        );

    }



}

if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
    new APF_WidgetTestAjaxField(
        __( 'APF - Test Ajax Field', 'admin-page-framework-loader' ) // the widget title
    );
}
