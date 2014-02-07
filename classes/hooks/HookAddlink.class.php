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

class PluginViews_HookAddlink extends Hook
{
    public function RegisterHook()
    {
        $this->AddHook('template_menu_blog_log_item', 'InjectLogLink');
        $this->AddHook('template_menu_blog_blog_item', 'InjectBlogLink');
        $this->AddHook('template_menu_blog_index_item', 'InjectIndexLink');
    }

    public function InjectBlogLink($aParam)
    {
        $sTemplatePath = Plugin::GetTemplatePath(__CLASS__) . 'inject_blog_link.tpl';
        if ($this->Viewer_TemplateExists($sTemplatePath)) {
            return $this->Viewer_Fetch($sTemplatePath);
        }
    }

    public function InjectIndexLink($aParam)
    {
        $sTemplatePath = Plugin::GetTemplatePath(__CLASS__) . 'inject_index_link.tpl';
        if ($this->Viewer_TemplateExists($sTemplatePath)) {
            return $this->Viewer_Fetch($sTemplatePath);
        }
    }

    public function InjectLogLink($aParam)
    {
        $sTemplatePath = Plugin::GetTemplatePath(__CLASS__) . 'inject_log_link.tpl';
        if ($this->Viewer_TemplateExists($sTemplatePath)) {
            return $this->Viewer_Fetch($sTemplatePath);
        }
    }
}
?>