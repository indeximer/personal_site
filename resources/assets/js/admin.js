$('.admin-form button[type=submit]').on('click',function(e){
    e.preventDefault();
    enviaFormAmin($(this));
});

function enviaFormAmin(btn){
    btn.attr("disabled", true);

    var form = btn.parents('form');
    var formName = btn.parents('form').attr('name');
    var formData = new FormData($('form[name=' + formName + ']')[0]);
    var action = form.attr('action');
    var successUrl = form.data('success');

    form.find('.erros').slideUp('fast');
    form.find('.progress').slideDown();

    $.ajax({
        type: "POST",
        url: action,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        async: true,
        data: formData,
        processData: false,
        contentType: false,
        success: function() {
            if(successUrl){
                window.location.replace(successUrl);
            }
        },
        error: function(response) {
            displayErrors(response.responseJSON.errors, form);
        },
        complete: function() {
            form.find('.progress').slideUp();
            btn.attr("disabled", false);
        }
    });
}