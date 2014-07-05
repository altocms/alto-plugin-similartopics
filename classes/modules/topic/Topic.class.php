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

class PluginSimilartopics_ModuleTopic extends PluginSimilartopics_Inherits_ModuleTopic {

    /** @var PluginSimilartopics_ModuleTopic_MapperTopic */
    protected $oMapper;

    /**
     * Returns tags array from topic
     *
     * @param object|int $xTopic
     *
     * @return array
     */
    protected function _getTagsFromTopic($xTopic) {

        if (is_object($xTopic)) {
            $aTopicTags = F::Str2Array($xTopic->getTags());
        } else {
            $aTopicTags = array();
            $iTopicId = intval($xTopic);
            $aTopics = $this->GetTopicsByArrayId(array($iTopicId));
            if ($aTopics) {
                $oTopic = reset($aTopics);
                $aTopicTags = F::Str2Array($oTopic->getTags());
            }
        }
        return $aTopicTags;
    }

    /**
     * @param object|int $xTopic
     * @param int|null $iLimit
     *
     * @return array
     */
    public function GetSimilarTopics($xTopic, $iLimit = null) {

        $aTopicTags = $this->_getTagsFromTopic($xTopic);
        $aTopics = $this->GetSimilarTopicsByTags($aTopicTags, $iLimit);

        return $aTopics;
    }

    public function GetSimilarTopicsByTags($aTags, $iLimit = null) {

        if (is_null($iLimit)) {
            $iLimit = 10;
        }
        $aFilter = array(
            'limit' => $iLimit,
        );

        $aTopicsId = $this->oMapper->GetTopicsIdByTags($aTags, $aFilter);
        if ($aTopicsId) {
            $aTopics = $this->Topic_GetTopicsAdditionalData($aTopicsId);
        } else {
            $aTopics = array();
        }

        return $aTopics;
    }

    /**
     * Returns IDs of similar topics by tags
     *
     * @param array $aTags
     *
     * @return array
     */
    public function GetSimilarTopicsIdByTags($aTags) {

        $iUserId = E::UserId();
        $sCacheKey = 'similar_topics_id_' . $iUserId;
        if (false === ($aTopicsId = $this->Cache_Get($sCacheKey))) {
            $aFilter = array(
                'exclude_blogs' => $this->Blog_GetInaccessibleBlogsByUser(E::User()),
            );

            $aTopicsId = $this->oMapper->GetTopicsIdByTags($aTags, $aFilter);
            $this->Cache_Set($aTopicsId, $sCacheKey, array('content_new', 'content_update', 'blog_new', 'blog_update'), 'P1D');
        }

        return $aTopicsId;
    }

    /**
     * @param object|int $xTopic
     *
     * @return int
     */
    public function CountSimilarTopics($xTopic) {

        $aTopicTags = $this->_getTagsFromTopic($xTopic);
        $aTopics = $this->CountSimilarTopicsByTags($aTopicTags);

        return $aTopics;
    }

    /**
     * Counts similar topics by tags
     *
     * @param array $aTags
     *
     * @return int
     */
    public function CountSimilarTopicsByTags($aTags) {

        $aTopicsId = $this->GetSimilarTopicsIdByTags($aTags);
        return is_array($aTopicsId) ? count($aTopicsId) : 0;
    }

}

// EOF