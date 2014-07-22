{assign var="countRead" value=$oTopic->getCountRead()}
<li class="topic-info-comments">
    <a title="{$aLang.plugin.views.viewstitle}" class="views-count">
    <i class="icon-views-{if $countRead > 0}non{/if}zero"></i>
    <span>{$countRead}</span>
    </a>
</li>
