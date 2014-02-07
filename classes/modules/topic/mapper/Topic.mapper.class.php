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

class PluginViews_ModuleTopic_MapperTopic extends PluginViews_Inherit_ModuleTopic_MapperTopic {
    /**
     * Список топиков по фильтру
     *
     * @param  array $aFilter	Фильтр
     * @param  int   $iCount	Возвращает общее число элементов
     * @param  int   $iCurrPage	Номер страницы
     * @param  int   $iPerPage	Количество элементов на страницу
     * @return array
     */
    public function GetTopics($aFilter,&$iCount,$iCurrPage,$iPerPage) {
        if(!isset($aFilter['viewstat']) || !$aFilter['viewstat']) {
            return parent::GetTopics($aFilter,$iCount,$iCurrPage,$iPerPage);
        } else {
            $sWhere=$this->buildFilter($aFilter);

            if (!Config::Get('plugin.views.stat_date_filter')) {
                $sql = "SELECT
                                t.topic_id, count(s.stat_id)+t.topic_count_read as count
                            FROM
                                ".Config::Get('db.table.blog')." as b,
                                ".Config::Get('db.table.topic')." as t
                            LEFT JOIN vc_stat as s
                                ON t.topic_id=s.stat_topic_id
                            WHERE
                                1=1
                                ".$sWhere."
                                AND
                                t.blog_id=b.blog_id
                            GROUP BY t.topic_id
                            ORDER BY count DESC, t.topic_id DESC
                            LIMIT ?d, ?d";
            } else {
                $sql = "SELECT
                                t.topic_id, count(s.stat_id)+t.topic_count_read as count
                            FROM
                                ".Config::Get('db.table.topic')." as t,
                                ".Config::Get('db.table.blog')." as b,
                                vc_stat as s
                            WHERE
                                1=1
                                ".$sWhere."
                                AND
                                t.blog_id=b.blog_id
                                AND
                                t.topic_id=s.stat_topic_id
                                " . (isset($aFilter['stat_date_more']) ? " AND s.stat_date > '".mysql_real_escape_string($aFilter['stat_date_more'])."'" : "") . "
                            GROUP BY s.stat_topic_id
                            ORDER BY count DESC
                            LIMIT ?d, ?d";
            }
            $aTopics=array();
            if ($aRows=$this->oDb->selectPage($iCount,$sql,($iCurrPage-1)*$iPerPage, $iPerPage)) {
                foreach ($aRows as $aTopic) {
                    $aTopics[]=$aTopic['topic_id'];
                }
            }
            return $aTopics;
        }
    }
}
?>