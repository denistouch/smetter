/**
 *
 * @param str
 * @returns {boolean}
 */
function isJSON(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

/**
 *
 * @param laureateID
 * load Laureate Info Modal window and show it
 */
function loadLaureateInfo(laureateID) {
    $.ajax({
        url: 'ajax/laureate.php',
        type: 'POST',
        data: {
            id: laureateID
        },
    }).done(function (data) {
        if (isJSON(data)) {
            data = JSON.parse(data);
        } else {
            console.log(data);
            alert('Не удалось сформировать информацию о лауреате!');
            return;
        }
        $('#container').after(data);
        $('#laureate').modal('show');
        $('#laureate').find('#deleteLaureate').click(function () {
            if (confirm('Вы уверены что хотите удалить запись?')) {
                $.ajax({
                    url: 'ajax/deleteLaureate.php',
                    type: 'POST',
                    data: {
                        id: laureateID
                    },
                }).done(function () {
                    alert('Лауреат ' + laureateID + ' удалён!');
                    $('#laureate').modal('hide');
                    ajaxLoadTable();
                }).fail(function () {
                    console.log('fail')
                });
            }
        });
        $('#laureate').find('.prize').each(function () {
            $(this).find('.delete-prize').click(function () {
                let prizeID = $(this).attr('data-id');
                if (confirm('Вы уверены что хотите удалить запись?')) {
                    $.ajax({
                        url: 'ajax/deletePrize.php',
                        type: 'POST',
                        data: {
                            id: prizeID
                        },
                    }).done(function (data) {
                        alert('Приз ' + prizeID + ' удалён!');
                        let removed = '.prize[data-id=' + prizeID + "]";
                        $(removed).remove();
                    }).fail(function () {
                        console.log('fail')
                    });
                }
            });
        });
        $('#laureate').find('.affiliation').each(function () {
            $(this).find('.delete-affiliation').click(function () {
                let affiliationID = $(this).attr('data-id');
                if (confirm('Вы уверены что хотите удалить запись?')) {
                    $.ajax({
                        url: 'ajax/deletePrize.php',
                        type: 'POST',
                        data: {
                            id: affiliationID
                        },
                    }).done(function (data) {
                        alert('Принадлежность ' + affiliationID + ' удалён!');
                        let removed = '.affiliation[data-id=' + affiliationID + "]";
                        $(removed).remove();
                    }).fail(function () {
                        console.log('fail')
                    });
                }
            });
        });
    }).fail(function () {
        console.log('fail');
        alert('Не удалось выполнить запрос!');
    })
}

/**
 *  load result table in #resultTable
 */
function ajaxLoadTable() {
    $.ajax({
        url: 'ajax/table.php',
        type: 'POST',
        data: {
            category: $('#category').val(),
            year: $('#year').val(),
            country: $('#country').val(),
            start: $('#resultTable').attr('data-start')
        },
    }).done(function (data) {
        if (isJSON(data)) {
            data = JSON.parse(data);
        } else {
            console.log(data);
            alert('Не удалось сформировать информацию о лауреате!');
            return;
        }
        console.log('done');
        if ($('#resultTable').attr('data-start') == 0) {
            $('#resultTable').html(data);
        } else {
            $('#resultTable').find('.btn-dark').replaceWith(data);
        }
        $('#resultTable').find('.btn-default').each(function () {
            console.log('row loaded');
            $(this).click(function () {
                loadLaureateInfo($(this).attr('data-laureate'));
            })
        });
        $('#resultTable').find('.btn-dark').each(function () {
            $(this).click(function () {
                $('#resultTable').attr('data-start', $(this).attr('data-start'));
                console.log($('#resultTable').attr('data-start'));
                ajaxLoadTable();
            })
        });
    }).fail(function () {
        console.log('fail')
    })
}

$(document).ready(function () {
    ajaxLoadTable();
    console.log($('#resultTable').attr('data-start'));
});
$('#search').click(function () {
    console.log($(this).attr('id') + ' click');
    $('#resultTable').attr('data-start', 0);
    ajaxLoadTable();
    //hide navbar on mobile
    if ($('#navbarSupportedContent').hasClass('show')) {
        $('.navbar-toggler').click();
    }
});