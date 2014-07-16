{$aSimilarTopics = $oTopic->getSimilarTopics()}
{if $aSimilarTopics}
<div class="panel panel-default widget sidebar widget-type-similartopics">
    <div class="panel-body">

        <header class="widget-header">
            <h3 class="widget-title">{$aLang.plugin.similartopics.widget_title}</h3>
        </header>

        <div class="widget-content">

            <ul class="list-unstyled">
            {foreach $aSimilarTopics as $oSimilarTopic}
                <li class="">
                    <a href="{$oSimilarTopic->getUrlFull()}" class="similartopics-topic-title">{$oSimilarTopic->getTitle()|escape:"html"}</a>
                </li>
            {/foreach}
            </ul>

        </div>

    </div>
</div>
{/if}
