$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function scrollToTop() {
        window.scroll({
            top: 0,
            behavior:'smooth'
        });
    }

    function refresh() {
        window.location = '';
    }

    let url,
        formData,
        pwdError,
        errorMsg = $('.errorMsg');

    $('.select2').select2();

    $('.farmer_profile_update').submit(function (e) {
        e.preventDefault();
        url = $(this).prop('action');
        formData = new FormData(this);
        $.ajax({
            url: url,
            data: formData,
            method: 'POST',
            cache:false,
            contentType: false,
            processData: false,
        }).done((response)=>{
            if (response.code == '200'){
                errorMsg.html('');
                refresh();
            }else{
                scrollToTop();
                errorMsg.html('<p class="alert alert-danger text-white"><span class="fa fa-exclamation-circle"></span> '+response.msg+'</p>')
            }
        })
    });

    $('.farm_form').submit(function (e) {
        e.preventDefault();
        url = $(this).prop('action');
        formData = new FormData(this);
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
        }).done((response) => {
            if (response.code == '200'){
                // refresh();
                console.log(response)
            }else{
                errorMsg.html('<p class="alert alert-danger text-white"><span class="fa fa-exclamation-circle"></span> '+response.msg+'</p>')
            }
        })

    })


    function displayItems(type){
        if (type === 'is_crop'){
            $('.animal_number').hide();
            $('.crop_info').show()
        }else{
            $('.crop_info').hide();
            $('.animal_number').show()
        }
    }



});
