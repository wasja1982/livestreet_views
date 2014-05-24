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

class PluginViews_HookViews extends Hook {
    public function RegisterHook() {
        $this->AddHook('template_menu_blog_log_item', 'InjectLogLink');
        $this->AddHook('template_menu_blog_blog_item', 'InjectBlogLink');
        $this->AddHook('template_menu_blog_index_item', 'InjectIndexLink');
        if (Config::Get('plugin.views.show_info')) {
            $this->Viewer_AppendStyle(Plugin::GetTemplateWebPath(__CLASS__) . 'css/views.css');
            $this->AddHook('template_topic_show_info', 'InjectShowInfo');
        }
    }

    public function InjectBlogLink($aParam) {
        $sTemplatePath = Plugin::GetTemplatePath(__CLASS__) . 'inject_blog_link.tpl';
        if ($this->Viewer_TemplateExists($sTemplatePath)) {
            return $this->Viewer_Fetch($sTemplatePath);
        }
    }

    public function InjectIndexLink($aParam) {
        $sTemplatePath = Plugin::GetTemplatePath(__CLASS__) . 'inject_index_link.tpl';
        if ($this->Viewer_TemplateExists($sTemplatePath)) {
            return $this->Viewer_Fetch($sTemplatePath);
        }
    }

    public function InjectLogLink($aParam) {
        $sTemplatePath = Plugin::GetTemplatePath(__CLASS__) . 'inject_log_link.tpl';
        if ($this->Viewer_TemplateExists($sTemplatePath)) {
            return $this->Viewer_Fetch($sTemplatePath);
        }
    }

    public function InjectShowInfo($aParam) {
        $sTemplatePath = Plugin::GetTemplatePath(__CLASS__) . 'inject_show_info.tpl';
        if ($this->Viewer_TemplateExists($sTemplatePath)) {
            if ((class_exists('MobileDetect') && MobileDetect::IsMobileTemplate()) || // Мобильный шаблон (отображает свой счетчик в активном режиме)
                (class_exists('PluginViewstat') && in_array('viewstat', $this->Plugin_GetActivePlugins())) || // Плагин ViewStat (отображает свой счетчик)
                (class_exists('PluginViewcount') && in_array('viewcount', $this->Plugin_GetActivePlugins()))) { // Плагин ViewCount (отображает свой счетчик)
                return;
            }
            if (isset($aParam) && isset($aParam['topic'])) {
                $oTopic = $aParam['topic'];
                $this->Viewer_Assign('oTopic', $oTopic);
                return $this->Viewer_Fetch($sTemplatePath);
            }
        }
    }
}
?>