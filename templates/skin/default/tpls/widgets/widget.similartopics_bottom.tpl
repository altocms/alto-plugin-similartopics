{$aSimilarTopics = $oTopic->getSimilarTopics()}
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
                            <a href="{$oSimilarTopic->getUrlFull()}" class="similartopics-topic-title">{$oSimilarTopic->getTitle()|escape:"html"}</a>
                            <div class="">
                                {if $oSimilarTopic->getIntroText()}
                                    {$oSimilarTopic->getIntroText('...')}
                                {else}
                                    {$oSimilarTopic->getTextShort()}
                                {/if}
                            </div>
                        </li>
                    {/foreach}
                </ul>

            </div>

    </div>
{/if}
