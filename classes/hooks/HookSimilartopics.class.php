<?php
/*---------------------------------------------------------------------------
 * @Project: Alto CMS
 * @Project URI: http://altocms.com
 * @Plugin Name: Similar Topics
 * @Plugin ID: similartopics
 * @Description: Similar Topics (defined by tags)
 * @Copyright: Alto CMS Team
 * @License: GNU GPL v2 & MIT
 *----------------------------------------------------------------------------
 */

class PluginSimilartopics_HookSimilartopics extends Hook {

    public function RegisterHook() {

        $this->AddHook('init_action', 'InitAction');

        if ($aWidgetParams = Config::Get('plugin.similartopics.widget_showtopic')) {
            if (isset($aWidgetParams['display']) && $aWidgetParams['display']) {
                $this->AddHook('template_topic_show_end', 'TplTopicShowEnd');
            }
        }
    }

    public function InitAction() {

        if ($aWidgetParams = Config::Get('plugin.similartopics.widget_sidebar')) {
            if (isset($aWidgetParams['display']) && $aWidgetParams['display']) {
                if (isset($aWidgetParams['wgroup'])) {
                    $sGroup = $aWidgetParams['wgroup'];
                    unset($aWidgetParams['wgroup']);
                } else {
                    $sGroup = 'right';
                }
                if (isset($aWidgetParams['name'])) {
                    $sName = $aWidgetParams['name'];
                    unset($aWidgetParams['name']);
                } else {
                    $sName = 'similartopics_sidebar.tpl';
                }
                if (!isset($aWidgetParams['id'])) {
                    $aWidgetParams['id'] = 'plugin.similartopics.similartopics_sidebar';
                }
                if (!isset($aWidgetParams['action'])) {
                    $aWidgetParams['action'] = array(
                        'blog' => array('{topic}'),
                    );
                }
                $aWidgetParams['plugin'] = 'similartopics';

                $this->Viewer_AddWidget($sGroup, $sName, $aWidgetParams);
            }
        }
    }

    public function TplTopicShowEnd() {

        return $this->Viewer_Fetch(Plugin::GetTemplateDir(__CLASS__) . 'tpls/widgets/widget.similartopics_bottom.tpl');
    }
}

// EOF