{assign var="countRead" value=$oTopic->getCountRead()}
<li class="topic-info-comments">
	<a title="{$aLang.plugin.views.viewstitle}" class="voters-count">
    <i class="icon-views{if $countRead == 0}-zero{/if}"></i>
    <span>{$countRead}</span>
    </a>
</li>
