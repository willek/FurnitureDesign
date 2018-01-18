$(document).ready(function () {
    $(document).on('click', '#getMessage', function(e){
        e.preventDefault();
        var message_id = $(this).data('id');
        $('#dynamic-content').html('');
        $('#modal-loader').show();
        $.ajax({
            type: 'POST',
            url: 'getuser.php',
            data: 'id='+uid,
            dataType: 'html'
        })
            .done(function(data){
                console.log(data);
                $('#dynamic-content').html(''); // blank before load.
                $('#dynamic-content').html(data); // load here
                $('#modal-loader').hide(); // hide loader
            })
            .fail(function(){
                $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                $('#modal-loader').hide();
            })
    })
});