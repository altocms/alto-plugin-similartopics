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

class PluginSimilartopics_ModuleTopic_EntityTopic extends PluginSimilartopics_Inherits_ModuleTopic_EntityTopic {

    public function GetSimilarTopics() {

        return $this->Topic_GetSimilarTopics($this);
    }

    public function CountSimilarTopics() {

        return $this->Topic_CountSimilarTopics($this);
    }

}

// EOF