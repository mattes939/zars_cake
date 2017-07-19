function calculateBillingPrice() {
    $('#OrderFinalPrice').val($('#OrderPrice').val() - $('#OrderDiscount').val());
    $('#OrderBillingPrice').val($('#OrderFinalPrice').val()*(1 + $('#OrderProvision').val()/100));
}

//$(function () {
//    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
//    $('.tree li.parent_li > span').on('click', function (e) {
//        var children = $(this).parent('li.parent_li').find(' > ul > li');
//        if (children.is(":visible")) {
//            children.hide('fast');
//            $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
//        } else {
//            children.show('fast');
//            $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
//        }
//        e.stopPropagation();
//    });
//});

$(document).ready(function () {
    $('#OrderEmployerContribution').change(function () {
        $('#fksp').toggleClass('hidden');
    });
    $('.datatable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Czech.json"
        }
    });

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        language: 'cs',
        autoclose: true,
        todayHighlight: true,
        weekStart: 1
    });


    calculateBillingPrice();


//    $('table.dt').DataTable({
//        "language": {
//            "sEmptyTable": "Tabulka neobsahuje žádná data",
//            "sInfo": "Zobrazuji _START_ až _END_ z celkem _TOTAL_ záznamů",
//            "sInfoEmpty": "Zobrazuji 0 až 0 z 0 záznamů",
//            "sInfoFiltered": "(filtrováno z celkem _MAX_ záznamů)",
//            "sInfoPostFix": "",
//            "sInfoThousands": " ",
//            "sLengthMenu": "Zobraz záznamů _MENU_",
//            "sLoadingRecords": "Načítám...",
//            "sProcessing": "Provádím...",
//            "sSearch": "Hledat:",
//            "sZeroRecords": "Žádné záznamy nebyly nalezeny",
//            "oPaginate": {
//                "sFirst": "První",
//                "sLast": "Poslední",
//                "sNext": "Další",
//                "sPrevious": "Předchozí"
//            },
//            "oAria": {
//                "sSortAscending": ": aktivujte pro řazení sloupce vzestupně",
//                "sSortDescending": ": aktivujte pro řazení sloupce sestupně"
//            }
//        }
//    });

//    $('#housesTable').DataTable({
//        "order": [[1, "asc"]],
//        "pageLength": 25,
//        "language": {
//            "sEmptyTable": "Tabulka neobsahuje žádná data",
//            "sInfo": "Zobrazuji _START_ až _END_ z celkem _TOTAL_ záznamů",
//            "sInfoEmpty": "Zobrazuji 0 až 0 z 0 záznamů",
//            "sInfoFiltered": "(filtrováno z celkem _MAX_ záznamů)",
//            "sInfoPostFix": "",
//            "sInfoThousands": " ",
//            "sLengthMenu": "Zobraz záznamů _MENU_",
//            "sLoadingRecords": "Načítám...",
//            "sProcessing": "Provádím...",
//            "sSearch": "Hledat:",
//            "sZeroRecords": "Žádné záznamy nebyly nalezeny",
//            "oPaginate": {
//                "sFirst": "První",
//                "sLast": "Poslední",
//                "sNext": "Další",
//                "sPrevious": "Předchozí"
//            },
//            "oAria": {
//                "sSortAscending": ": aktivujte pro řazení sloupce vzestupně",
//                "sSortDescending": ": aktivujte pro řazení sloupce sestupně"
//            }
//        }
//    });

    var state_province = $('#HouseArea option, #HouseArea optgroup');
    state_province.hide();
    $("#HouseArea optgroup[label='" + $('#HouseCountry').find(':selected').val() + "']")
            .children()
            .andSelf()
            .show();


    $('#HouseCountry').change(function () {
        console.log($(this).find(':selected').val());
        state_province.hide();
        $("#HouseArea optgroup[label='" + $(this).find(':selected').val() + "']")
                .children()
                .andSelf()
                .show();
    });
//    $('select').selectpicker({hideDisabled: false});


});

