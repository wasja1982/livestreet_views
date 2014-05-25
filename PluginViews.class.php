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
        'entity' => array('ModuleTopic_EntityTopic'),
        'module' => array('ModuleTopic', 'PluginMobiletpl_ModuleMain' => 'PluginViews_ModuleMain'),
    );

    /**
     * Активация плагина
     */
    public function Activate() {
        /*
         * Запрет на использование плагина ViewCount
         */
        if (class_exists('PluginViewcount')) {
            $plugins = $this->Plugin_GetActivePlugins();
            if (in_array('viewcount', $plugins)) {
                $this->Message_AddError($this->Lang_Get('enabled_viewcount'), 'Views', true);
                return false;
            }
        }
        if (!$this->isTableExists('prefix_topic_view')) {
            $this->ExportSQL(dirname(__FILE__).'/dump.sql');
        }
        return true;
    }

    /**
     * Инициализация плагина
     */
    public function Init() {
    }
}
?>