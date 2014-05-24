<?php
/**
 * Views - сортировка топиков по числу просмотров
 *
 * Версия:	1.0.0
 * Автор:	Александр Вереник
 * Профиль:	http://livestreet.ru/profile/Wasja/
 * GitHub:	https://github.com/wasja1982/livestreet_views
 *
 **/

class PluginViews_ModuleTopic_EntityTopic extends PluginViews_Inherit_ModuleTopic_EntityTopic {
    /**
     * Возвращает счетчик для топика
     *
     * @return null|string
     */
    public function getViews() {
        if (class_exists('PluginViewstat') && in_array('viewstat', $this->Plugin_GetActivePlugins())) {
            return $this->PluginViewstat_Viewstat_TopicGetAllView($this->getId());
        }
        return $this->getCountRead();
    }
}
?>