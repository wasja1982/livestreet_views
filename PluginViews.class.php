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

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
    die('Hacking attemp!');
}

class PluginViews extends Plugin {

    protected $aInherits = array(
        'action' => array('ActionBlog', 'ActionPersonalBlog', 'ActionIndex'),
        'mapper' => array('ModuleTopic_MapperTopic'),
        'module' => array('ModuleTopic'),
    );

    /**
     * Активация плагина
     */
    public function Activate() {
        return true;
    }

    /**
     * Инициализация плагина
     */
    public function Init() {
    }
}
?>