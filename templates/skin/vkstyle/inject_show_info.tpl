{assign var="countRead" value=$oTopic->getCountRead()}
<li class="cursor-default topic-info-comments js-infobox" title="{$aLang.plugin.views.viewstitle}">
	<span class="font-icon-eye"></span>
	<span>{$countRead}</span>
</li>
