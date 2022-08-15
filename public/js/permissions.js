$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('btn-secondary')) {
            navListItems.removeClass('btn-primary').addClass('disabled');
            $item.addClass('btn-primary').removeClass('disabled');
        }else{
            navListItems.addClass('btn-secondary').addClass('btn-secondary');
            $item.addClass('btn-primary').removeClass('btn-secondary disabled');
        }
        allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});

/* Pagination

$(document).ready(function(){
    $('#rolPerm').after('<div id="nav"></div>');
    var rowsShown = 6;
    var rowsTotal = $('#rolPerm tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav').append(
            '<ul class="pagination pull-left" style="margin-left:0.5%;"><li class="page-item"><a class="page-link" href="#" rel="'+i+'">'+pageNum+'</a></li></ul>'
        );
    }
    $('#rolPerm tbody tr').hide();
    $('#rolPerm tbody tr').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function(){

        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#rolPerm tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
                css('display','table-row').animate({opacity:1}, 300);
            });
        });
*/
// Show permissions list

$(document).ready(function () {
    $('label.tree-toggler').click(function () {
        $(this).parent().children('ul.tree').toggle(300);
    });
});

//filters

$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});

//posts switch video - archive

$(document).ready(function(){
    // Use only for V1
    $('#radioBtn span').on('click', function(){
        var sel = $(this).data('value');
        var tog = $(this).data('toggle');
        $('#'+tog).val(sel);
        // You can change these lines to change classes (Ex. btn-default to btn-danger)
        $('span[data-toggle="'+tog+'"]').not('[data-value="'+sel+'"]').removeClass('active btn-primary').addClass('notActive btn-default');
        $('span[data-toggle="'+tog+'"][data-value="'+sel+'"]').removeClass('notActive btn-default').addClass('active btn-primary');
    });
});

function getAnsSwitchArq() {
    
    $('#radioBtn').click(function (e) {
        e.preventDefault();
        $('#folderVideo').prop("disabled", true);
        $('#folderLink').prop("disabled", false);
    });

}
function getAnsSwitchVid() {

    $('#radioBtn').click(function (e) {
        e.preventDefault();
        $('#folderVideo').prop("disabled", false);
        $('#folderLink').prop("disabled", true);
    });

}

$(document).ready(function(){
    // Use only for V1
    $('#radioBtn2 span').on('click', function(){
        var sel = $(this).data('value');
        var tog = $(this).data('toggle');
        $('#'+tog).val(sel);
        // You can change these lines to change classes (Ex. btn-default to btn-danger)
        $('span[data-toggle="'+tog+'"]').not('[data-value="'+sel+'"]').removeClass('active btn-primary').addClass('notActive btn-default');
        $('span[data-toggle="'+tog+'"][data-value="'+sel+'"]').removeClass('notActive btn-default').addClass('active btn-primary');
    });
});
function getAnsSwitchArq2() {
    
    $('#radioBtn2').click(function (e) {
        e.preventDefault();
        $('#folderVideo2').prop("disabled", true);
        $('#folderLink2').prop("disabled", false);
    });

}
function getAnsSwitchVid2() {

    $('#radioBtn2').click(function (e) {
        e.preventDefault();
        $('#folderVideo2').prop("disabled", false);
        $('#folderLink2').prop("disabled", true);
    });

}

$(document).ready(function(){
    // Use only for V1
    $('#radioBtn3 span').on('click', function(){
        var sel = $(this).data('value');
        var tog = $(this).data('toggle');
        $('#'+tog).val(sel);
        // You can change these lines to change classes (Ex. btn-default to btn-danger)
        $('span[data-toggle="'+tog+'"]').not('[data-value="'+sel+'"]').removeClass('active btn-primary').addClass('notActive btn-default');
        $('span[data-toggle="'+tog+'"][data-value="'+sel+'"]').removeClass('notActive btn-default').addClass('active btn-primary');
    });
});
function getAnsSwitchArq3() {
    
    $('#radioBtn3').click(function (e) {
        e.preventDefault();
        $('#folderVideo3').prop("disabled", true);
        $('#folderLink3').prop("disabled", false);
    });

}
function getAnsSwitchVid3() {

    $('#radioBtn3').click(function (e) {
        e.preventDefault();
        $('#folderVideo3').prop("disabled", false);
        $('#folderLink3').prop("disabled", true);
    });

}