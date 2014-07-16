{$aSimilarTopics = $oTopic->getSimilarTopics($aWidgetParams.limit)}
{if $aSimilarTopics}
    <hr>
    <div class="panel panel-default widget">

            <header class="widget-header">
                <h3 class="widget-title">{$aLang.plugin.similartopics.widget_title}</h3>
            </header>

            <div class="widget-content">

                <ul class="list-unstyled row">
                    {foreach $aSimilarTopics as $oSimilarTopic}
                        <li class="similartopics-topic-intro col-lg-4 col-md-6">
                            <a href="{$oSimilarTopic->getUrl()}" class="similartopics-topic-title">{$oSimilarTopic->getTitle()|escape:"html"}</a>
                            <div class="">
                                {$oSimilarTopic->getIntroText()}
                            </div>
                        </li>
                    {/foreach}
                </ul>

            </div>

    </div>
{/if}
