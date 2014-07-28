/**
 * Created with JetBrains PhpStorm.
 * User: Miracle
 * Date: 09.02.14
 * Time: 17:22
 * To change this template use File | Settings | File Templates.
 */
var strTable;
var iCount = 0, curId = 0;
var curDeleteId, countOfHiddenCoffee;
var blockDisplay = "display: block;";
var noneDisplay = "display: none;";
var queryDelete, queryDelTrId;
var queryCheckCoffee = 'li[style="'+blockDisplay+'"]';
var beginTable = '<table id="listCoffeeAll" class="items table table-bordered table-condensed">' +
    '<thead><tr>' +
    '<th id="sections-grid_c0">Название</th>' +
    '<th id="sections-grid_c1">Количество</th>' +
    '<th id="sections-grid_c2">Цена</th>' +
    '<th id="sections-grid_c3">Сумма</th>' +
    '<th class="button-column" id="sections-grid_c7"> </th>' +
    '</tr></thead>' +
    '<tbody>', endTable ='</table>';
$(function () {
    var emptyList = $('.emptyListCoffee');
    var sumOfMoney = $('#sumOfMoney');
    var list = $('#listOfAddingCoffee');
    var bindEventsForRemove = {}, bindEventsForChange = {};
    bindEventsForRemove['click'] = function(e){
        e.preventDefault();
        var curDelId = $(this).attr('dataId');
        queryDelete = 'li[dataId='+curDelId+']';
        queryDelTrId = 'tr[dataId='+curDelId+']';
        $('tbody').children(queryDelTrId).remove();
        if(!$('tbody').html()){
            list.html('<blockquote><i>Список пуст.</i></blockquote>');
        }
        $('ul').children(queryDelete).attr('style',blockDisplay);
        countOfHiddenCoffee = $('ul').children(queryCheckCoffee).length;
        if(countOfHiddenCoffee > 0){
            $('.emptyListCoffee').attr('style',noneDisplay);
        }
        setSumOfMoney();
    };
    bindEventsForChange['change'] = function(){
        var currentId = $(this).attr('dataId');
        var currentValue = $(this).val();
        var currentPrice = $('tbody').children('tr').eq(currentId).children('td').eq(2).text();
        var currentSum = currentPrice * currentValue;
        $('tbody').children('tr').eq(currentId).children('.sum').text(currentSum);
        setSumOfMoney();
    };
    function setSumOfMoney(){
        var sumOfMoneyValue = 0;
        $('.sum').each(function(){
            var $this = $(this);
            sumOfMoneyValue += parseInt($this.text());
        });
        sumOfMoney.text(sumOfMoneyValue);
    }
    $('.addCoffeeToList').click(function (e) {
        e.preventDefault(); strTable = '';
        if(!list.children('table').html())
            strTable += beginTable;
        else
            curId = $('tbody').children('tr').length;
        // tr begin
        strTable += '<tr dataId="'+ $(this).attr("dataId") +'"';
        if(iCount%2 == 0)
            strTable += ' class="odd"';
        else
            strTable += ' class="even"';
        strTable += '>';
        strTable += '<td>' + $(this).attr("dataTitle") + '</td>';
        strTable += '<td><input class="coffeeAddInput" type="text" value="1" name="Coffee['+ $(this).attr("dataId") +']" dataId="' + curId +'"/></td>';
        strTable += '<td>' + $(this).attr("dataPrice") + '</td>';
        strTable += '<td class="sum">'+ $(this).attr("dataPrice") +'</td>';
        strTable += "<td class='button-column'><a class='btn btn-large deleteCoffeeOutList' dataId='" + $(this).attr("dataId") + "' data-original-title='Удалить' rel='tooltip' href='#'><i class='icon-trash'></i></a></td>";
        strTable += '</tr>';
        // tr end
        if(!list.children('table').html()){
            strTable += endTable;
            list.html(strTable);
        } else {
            var currentHTML = list.children('table').children('tbody').html();
            currentHTML += strTable;
            list.children('table').children('tbody').html(currentHTML);
        }
        setSumOfMoney();

        curDeleteId = $(this).attr("dataId");
        queryDelete = 'li[dataId='+ curDeleteId +']';
        $(queryDelete).attr('style',noneDisplay);
        countOfHiddenCoffee = $('ul').children(queryCheckCoffee).length;
        if(countOfHiddenCoffee == 0){
            emptyList.attr('style',blockDisplay);
        }

        $('.deleteCoffeeOutList').bind(bindEventsForRemove);
        $('input.coffeeAddInput').bind(bindEventsForChange);
        iCount++;
    });
    $('.deleteCoffeeOutList').bind(bindEventsForRemove);
    $('input.coffeeAddInput').bind(bindEventsForChange);
});