
$(".custom-select").change(function() {
    $(location).attr('href', '/' + '?page=1&per_page=' + $(this).val());
});