$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    $.ajax({
        url: '/consume-api',
        type: 'GET',
        success:function(data) {
            $('#activity').val('')
            var tempHtml=''
            $.each(JSON.parse(data), function(key, item) {
                tempHtml += '<option value="'+item['name']+'">'+item['name']+'</option>';
            });
            $('#activity').html(tempHtml)
        }
    });
});
