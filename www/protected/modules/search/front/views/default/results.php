<div class="block_header">
    <div class="breads">Поиск</div>
</div>
<article id="text" class="searchResult" style="padding: 15px">
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $results,
        'itemView' => '_searchItem',
        'itemsTagName' => 'table',
        'template' => '{summary}{items} {pager}',
        'summaryText' => 'Найдено {count} страниц. Показано {start} - {end}',
        'pager' => array(
            'header' => '',
            'prevPageLabel' => '<img src="/themes/front/images/left_btn_partners.png">',
            'nextPageLabel' => '<img src="/themes/front/images/right_btn_partners.png">'
        )
    ));
    ?>
</article>