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

        if ($aWidgetParams = Config::Get('plugin.similartopics.widget_showtopic')) {
            if (isset($aWidgetParams['display']) && $aWidgetParams['display']) {
                $this->AddHook('template_topic_show_end', 'TplTopicShowEnd');
            }
        }
    }

    public function TplTopicShowEnd($aParams) {

        if ((!isset($aParams['bTopicList']) || !$aParams['bTopicList']) && (isset($aParams['topic'])) || isset($aParams['oTopic'])) {
            if (isset($aParams['topic'])) {
                $this->Viewer_Assign('oTopic', $aParams['topic']);
            }
            $this->Viewer_Assign('aWidgetParams', Config::Get('plugin.similartopics.widget_showtopic'));
            return $this->Viewer_Fetch(Plugin::GetTemplateDir(__CLASS__) . 'tpls/widgets/widget.similartopics_bottom.tpl');
        }
        return null;
    }
}

// EOF