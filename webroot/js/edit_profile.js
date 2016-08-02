$(document).ready(function(){

    // $('.fileUpload').fileupload({
    //     dataType: 'json',
    //     add: function(e, data) {
    //         var uploadErrors = [];
    //         var acceptFileTypes =  /(pdf|xml|xsl|doc|docx)$/i;
    //         if(data.originalFiles[0]['name'].substring(data.originalFiles[0]['name'].indexOf('.') + 1).length && !acceptFileTypes.test(data.originalFiles[0]['name'].substring(data.originalFiles[0]['name'].indexOf('.') + 1))) {
    //             uploadErrors.push('Not an accepted file type');
    //         }
    //         if(data.originalFiles[0]['size'].length && data.originalFiles[0]['size'] > 5000000) {
    //             uploadErrors.push('Filesize is too big');
    //         }
    //         $('.errorSpan').remove();
    //         if(uploadErrors.length > 0) {
    //              $('<p class="errorSpan" style="color: red;">Upload file error: ' + uploadErrors.join("\n") + '<i class="elusive-remove" style="padding-left:10px;"/></p>')
    //             .appendTo($(this).closest('.validateParent').find('.validate'));
    //         } else {
    //             data.submit();
    //         }
    //     },
    //     done: function(e, data) {
    //         var fileName = data.result.fileName;
    //         var fileId = data.result.fileId;
    //             if (data.result.success == true) {
    //               $('<div><span>'+fileName+'</span><button type="button" class="deleteBtn delete" value="'+fileId+'"><i class="fa fa-times" aria-hidden="true"></i></button></div>"'
    //                 ).appendTo($(this).closest('.validateParent').find('.uploadedFiles'));
    //             }
    //     }
    // });

    $('.image').fileupload();

    $(document).on("click",".delete",function() {
        var id = $(this).val();
        var obj = $(this);
        $.ajax({
            url: "/profiles/deleteFile",
            type: 'POST',
            data: {id:id},
            dataType: "json",
             success: function(data){
                  obj.parent().remove();
            }
        });
    });

});


