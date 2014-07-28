<div class="cart">
    <table>
	<tr>
                         <th>Мои покупки</th>
                         <th>Кол-во</th>
                         <th>Цена за шт</th>
                         <th>Итого</th>
	</tr>
        <?

        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $data_provider,
            'itemView' => '_list_orders',
            'summaryText' => '',
            'template' => '{items}{pager}',
            'pager' => array(
                'prevPageLabel' => '<',
                'nextPageLabel' => '>',
                'header' => ''
            )
        ));
        ?>

    </table>
</div>