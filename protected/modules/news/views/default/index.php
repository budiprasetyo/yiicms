<?php
/**
 * @var $this Controller
 * @var $dataProvider CDataProvider
 * @property $module NewsModule
 */
$this->pageTitle = Yii::app()->name . ' — ' . Yii::t('news', 'Новости');
$this->breadcrumbs = array(Yii::t('news', 'Новости'));
$css = <<<CSS
h2.media-heading {
    font-size: 17.5px;
    line-height: 1;
}
.media-body .label {
    font-size: 11px;
    margin-bottom: 5px;
}
div.well {
    width: {$this->module->thumbMaxWidth}px;
    height: 80px;
    padding: 0 0 0 0;
    text-align: center;
    display: table;
}
div.well a {
    text-decoration: none;
}
div.well .media-object {
    display: table-cell;
    vertical-align: middle;
}
CSS;
Yii::app()->clientScript->registerCss('news', $css);
?>
<h1 style="margin-top:0"><?php echo Yii::t('news', 'Новости'); ?></h1>
<?php
$this->menu = array(
	array('label' => Yii::t('news', 'Новости')),
	array('icon' => 'list-alt', 'label' => Yii::t('news', 'Управление'), 'url' => array('admin')),
	array('icon' => 'th-list white', 'label' => Yii::t('news', 'Показать анонсами'), 'url' => array('/news/default/index')),
	array('icon' => 'file', 'label' => Yii::t('news', 'Добавить'), 'url' => array('create')),
);
$this->widget(
    'bootstrap.widgets.TbListView',
    array(
        'dataProvider'       => $dataProvider,
        'enableHistory'      => true,
        'itemView'           => '_view',
        'sortableAttributes' => array(
            'title',
            'date',
        ),
        'htmlOptions'        => array('style' => 'padding-top:0'),
        'template'           => '{items}{pager}{summary}{sorter}',
    )
); ?>