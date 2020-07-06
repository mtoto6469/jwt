$(document).ready(function () {

    $('.media-browse-list .media-item').click(function () {
        $('.media-browse-list .media-item').not(this).removeClass('active');
        $(this).toggleClass('active');
    });

    var ajax_upload_form = $('#media-manager-upload-form');
    var options = {
        dataType:  'json',
        beforeSend: function () {
            ajax_upload_form.find('#progressbar').removeClass('d-none')
            ajax_upload_form.find('#progressbar').find('.progress-bar').css('width', '0%')
            ajax_upload_form.find('#progressbar').find('.progress-bar').attr('aria-valuenow', '0')
        },
        uploadProgress: function (event, position, total, percentComplete) {
            ajax_upload_form.find('#progressbar').find('.progress-bar').css('width', percentComplete+'%');
            ajax_upload_form.find('#progressbar').find('.progress-bar').attr('aria-valuenow', percentComplete)
        },
        complete: function (response) {
            ajax_upload_form.find('#progressbar').addClass('d-none');
            console.log(response);
            response = JSON.parse(response.responseText);
            if(response.result == 'success'){
                location.reload();
            }else{
                ajax_upload_form.find('#result').html('<div class="alert alert-danger"><ul class="my-0">'+response.result_data+'</ul></div>');
            }
        },
    };
    ajax_upload_form.ajaxForm(options);

});

// Helper function to get parameters from the query string.
function getUrlParam( paramName ) {
    var reParam = new RegExp( '(?:[\?&]|&)' + paramName + '=([^&]+)', 'i' );
    var match = window.location.search.match( reParam );

    return ( match && match.length > 1 ) ? match[1] : null;
}
// Simulate user action of selecting a file to be returned to CKEditor.
function returnFileUrl() {
    var funcNum = getUrlParam( 'CKEditorFuncNum' );
    var fileUrl = $('.media-browse-list').find('.media-item.active').attr('data-file-url');
    var alt = $('.media-browse-list').find('.media-item.active').attr('data-alt');

    if(!fileUrl){
        alert('فایل انتخاب نشده است');
        return false;
    }

    window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl, function() {
        // Get the reference to a dialog window.
        var dialog = this.getDialog();
        // Check if this is the Image Properties dialog window.
        if (dialog.getName() == 'image') {
            // Get the reference to a text field that stores the "alt" attribute.
            var element = dialog.getContentElement('info', 'txtAlt');
            // Assign the new value.
            if (element && alt)
                element.setValue(alt);
        }
    });
    window.close();
}

