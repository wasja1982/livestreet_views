{assign var="countRead" value=$oTopic->getCountRead()}
<li class="topic-info-comments">
    <i class="icon-synio-views{if $countRead == 0}-zero{/if}"></i>
    <span>{$countRead}</span>
</li>
