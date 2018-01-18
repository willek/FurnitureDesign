function redirect(url){
    window.location.href = url;
}

function deleteIt(that){
    swal({
        title: 'Are you sure?',
        text: 'You will delete this data!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!"
    }). then(function (){
        redirect($(that).attr('data-url'));
    }). then(function (){
        swal({
            title: 'Deleted',
            text: 'Your data has been deleted',
            type: 'success',
            showConfirmButton: false
        });
    });
}

jQuery('.numeric-only').keyup(function () {
    this.value = this.value.replace(/[^0-9]/g, '');
});