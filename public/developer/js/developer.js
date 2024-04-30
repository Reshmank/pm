
$.extend(true, $.fn.dataTable.defaults, {
    dom: 'lBfrtip',//p:paginate t:table l:length-change i:info f:search r:processing
    destroy: true,
    bProcessing: true,
    bOrdering: true,
    responsive: true,
    bDeferRender: true,//writes few rows to dom and rest will draw on demand
    bFixedHeader: false,
    language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_',
        processing: `<div class='text-muted d-flex align-items-center justify-content-center' style="margin-top: 10px"><div class="spinner-border spinner-border-sm mr-1" role="status"></div> Fetching...</div>`,
    },
    iDisplayLength: 10,
    aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']],
});
// ----------------------------tooltip    Neethu M  11/09/2019  -------------------------------------------
$('.fa-tip-bottom').tooltip({
    placement: 'bottom'
});
$('.fa-tip-right').tooltip({
    placement: 'right'
});
$('.fa-tip-left').tooltip({
    placement: 'left'
});
$('.fa-tip-top').tooltip({
    placement: 'top'
});
// ----------------------------validations    Neethu M  12/09/2019  -------------------------------------------

$('.namevalidation').keypress(function (e) { 
    var str= e.charCode;
    if(str==8 || str==46 ||  str==32 ||  str==16 || (str <=90 && str >=65) || (str <=122 && str >=97) || str==13)
    {

    }
    else
    {
         e.preventDefault();
    }
      
});

$('.placevalidation').keypress(function (e) {  //alphabet+space
    var str= e.charCode;
    if(str==8 ||   str==32 ||  str==16 || (str <=90 && str >=65) || (str <=122 && str >=97) || str==13)
    {

    }
    else
    {
         e.preventDefault();
    }
      
});



$('.coursevalidation').keypress(function (e) { //alphabet+space+/+&
    var str= e.charCode;
    if(str==8 ||  str==32 ||  str==16 || str==47 || str==38 ||  (str <=90 && str >=65) || (str <=122 && str >=97) || str==13)
    {

    }
    else
    {
         e.preventDefault();
    }
      
});

$('.campusvalidation').keypress(function (e) { //alphabet+space+-
    var str= e.charCode;
    if(str==8 ||  str==32 || str==45 || str==16 ||   (str <=90 && str >=65) || (str <=122 && str >=97) || str==13)
    {

    }
    else
    {
         e.preventDefault();
    }
      
});




$('.inputvalidation').keypress(function (e) {
    var str= e.charCode;
    if(str==8 || str==38 || str==46 || str==44 || str==47 || str==45 || str==95 || str==32 ||  str==16 || (str <=57 && str >=48) || (str <=90 && str >=65) || (str <=122 && str >=97) || str==13)
    {

    }
    else
    {
         e.preventDefault();
    }
      
});

$('.examvalidation').keypress(function (e) {
    // var str= e.charCode;
    // if(str==8 || str==38 || str==46 || str==44 || str==47 || str==45 || str==95 || str==32 ||  str==16 ||  str==91 ||  str==93 || str==41 ||  str==40 || (str <=57 && str >=48) || (str <=90 && str >=65) || (str <=122 && str >=97) || str==13)
    // {

    // }
    // else
    // {
    //      e.preventDefault();
    // }
      
});

$('.examnamevalidation').keypress(function (e) {
    var str= e.charCode;
    if(str==8 || str==38 || str==46 || str==44 || str==47 || str==45 || str==95 || str==32 ||  str==16 ||  str==91 ||  str==93 || str==41 ||  str==40 || (str <=57 && str >=48) || (str <=90 && str >=65) || (str <=122 && str >=97) || str==13)
    {

    }
    else
    {
         e.preventDefault();
    }
      
});


$(".numberValidation").keypress(function (e) 
{
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) 
    {
    e.preventDefault();
   }
});

$(function() {
        $('.amount').on('input', function() {
                match = (/(\d{0,10})[^.]*((?:\.\d{0,2})?)/g).exec(this.value.replace(/[^\d.]/g, ''));
                this.value = match[1] + match[2];
        });
    });
    $(function() {
        $('.assign_score').on('input', function() {
                match = (/(\d{0,4})[^.]*((?:\.\d{0,2})?)/g).exec(this.value.replace(/[^\d.]/g, ''));
                this.value = match[1] + match[2];
        });
    });
    $(function() {
        $('.live_duration').on('input', function() {
                match = (/(\d{0,3})[^.]*((?:\.\d{0,2})?)/g).exec(this.value.replace(/[^\d.]/g, ''));
                this.value = match[1] + match[2];
        });
    });
    $(function() {
        $('.percentageValidation').on('input', function() {
                match = (/(\d{0,2})[^.]*((?:\.\d{0,2})?)/g).exec(this.value.replace(/[^\d.]/g, ''));
                this.value = match[1] + match[2];
        });
    });
    $(function() {
        $('.amount1').on('input', function() {
                match = (/(\d{0,10})[^.]*((?:\.\d{0,3})?)/g).exec(this.value.replace(/[^\d.]/g, ''));
                this.value = match[1] + match[2];
        });
    });


//allow alphanumeric,hyphen,dot,slash,and
$('.inputvalidation_1').keypress(function (e) {
    var str= e.charCode;
    if((str <=57 && str >=48) || (str <=90 && str >=65) || (str <=122 && str >=97) || str==13||str==38||str==47||str==46||str==95 || str==32)
    {

    }
    else
    {
         e.preventDefault();
    }
      
}); 

//allow alphanumeric,hyphen,space
$('.inputvalidation_2').keypress(function (e) {
    var str= e.charCode;
    if((str <=57 && str >=48) || (str <=90 && str >=65) || (str <=122 && str >=97) || str==13|| str==45 ||str==95 || str==32)
    {

    }
    else
    {
         e.preventDefault();
    }
      
}); 

//web url validation
function isValidUrl(url){
    var myVariable = url;
    if(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,25}(:[0-9]{1,5})?(\/.*)?$/i.test(myVariable)) 
    {
        return 1;
    } 
    else 
    {
        return 0;
    }
}

//email validation
function validateEmail($email) {
   var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( $email );
}


function hasOnlySpecialCharater(val) {
    var pattern = /^[^a-zA-Z0-9]+$/;
    return (pattern.test(val));
}



$('.email').keyup(function (e) {
    var val=$(this).val();
    var str= e.charCode;
    var first_char=val.charAt(0);
    
    if(/^[a-zA-Z0-9- ]*$/.test(first_char) == false) 
    {
      $(this).val(val.substring(1, val.length));
    }
   
}); 

$('.firstcharvalidations').keyup(function (e) {
    var val=$(this).val();
    var str= e.charCode;
    var first_char=val.charAt(0);
    
    if(/^[a-zA-Z0-9- ]*$/.test(first_char) == false) 
    {
      $(this).val(val.substring(1, val.length));
    }
   
}); 


function validatePhone(txtPhone) {
    var a = txtPhone;
    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
}




function exportButtons(title, options) {
    let button, buttonCommon, defaults = {
        columns: ":visible , .to-export",
        exportFormat: false,
        refreshCallBack: true,
        footerCallBack: false,
    };
    jQuery.extend(defaults, options);

    buttonCommon = {
        title: title,
        footer: true,
        className:'btn btn-outline-dark',
        exportOptions: defaults.exportFormat || {
            columns: defaults.columns,
            stripHtml: true,
            format: {
                /* header : function (data, columnIndex, th) {
                     return data.replace(/(<([^>]+)>)/g, " ").trim();
                 },*/
                body: function (data, rowIndex, columnIndex, td) {
                    return $(td).contents().first().text().trim();
                }
            }
        }
    };
    button = [
        $.extend(true, {}, buttonCommon, {
            extend: 'colvis',
            text: "<i class='fas fa-eye'></i>",
            titleAttr: 'Column Visibility',
        }),
        $.extend(true, {}, buttonCommon, {
            extend: 'copy',
            text: "<i class='fas fa-copy'></i>",
            titleAttr: 'Copy',
            /*customize: function (a) {
                return a.replace(/(<([^>]+)>)/g, " ").trim();
            }*/
        }),
        $.extend(true, {}, buttonCommon, {
            extend: 'csv',
            text: "<i class='fas fa-file-csv'></i>",
            titleAttr: 'CSV',
        }),
        $.extend(true, {}, buttonCommon, {
            extend: 'pdf',
            text: "<i class='fas fa-file-pdf'></i>",
            titleAttr: 'PDF',
            orientation: 'landscape'
        }),
        $.extend(true, {}, buttonCommon, {
            extend: 'excel',
            text: "<i class='fas fa-file-excel'></i>",
            titleAttr: 'Excel',
            autoFilter: true,
            customize: function (doc) {
                let sheet = doc.xl.worksheets['sheet1.xml'];
                $('row:eq(1) c', sheet).attr('s', '42');
            }
        }),
    ];

    button.push(printButton());
    if (defaults.refreshCallBack)
        button.push(refreshButton());
    return button;

    function refreshButton() {
        return {
            text: '<i class="fas fa-redo-alt"></i>',
            titleAttr: 'Refresh',
            className:'btn btn-outline-dark',
            action: function (e, dt) {
                dt.state.clear();
                if (defaults.refreshCallBack)
                    if (typeof defaults.refreshCallBack === 'function')
                        defaults.refreshCallBack();
                    else if (typeof callBackDataTables === 'function')
                        callBackDataTables();
                    else $('#search').trigger('click');
            }
        }
    }

    function printButton() {
        return {
            extend: 'print',
            text: "<i class='fas fa-print'></i>",
            titleAttr: 'Print',
            title: '',
            className:'btn btn-outline-dark',
            autoPrint: true,
            exportOptions: {
                columns: ":visible",
                format: {
                    body: function (data, rowIndex, columnIndex, td) {
                        return td.innerHTML;
                    }
                }
            },
            customize: function (win) {
                let doc = $(win.document), body = doc.find('body');

                doc.find('head').find('title').html(title + ' Print');

                body.css('font-size', '10pt')
                    .find('table')
                    .addClass('compact')
                    .removeClass('dataTable')
                    .css('font-size', 'inherit');

                // setPrintHeaderFooter(body);
            }
        }
    }

    function setPrintHeaderFooter(element) {
        $.ajax({
            url: '/logo',
            type: 'GET',
            data: '',
            success: function (response) {
                element.prepend(response).find('#printTitle').html(title)
                    .end().find('#printSubTitle').html('Print');
                if (defaults.footerCallBack)
                    defaults.footerCallBack(element.find('table'));
            },
        });
    }
}


function notify(type,msg)
{
    if(type=="success")
    {
        iziToast.success({
            title: 'success!',
            message: msg,
            position: 'topRight'
        });
    }
    else if(type=="warning")
    {
        iziToast.warning({
            title: 'Warning!',
            message: msg,
            position: 'topRight'
        });
    }
    else
    {
        iziToast.error({
            title: 'Error!',
            message: msg,
            position: 'topRight'
        });
    }
}

function changeRead(notification_id)
{
          $.ajax({
                        url: '/changeToRead',
                        type: 'POST',
                        data: {
                            "id":notification_id,
                        },
                        success: function (output) {
                           
                        },
                        error: function (output) {
                           // notify("error",output);
                        }
                    });
    
}

// $('#summernote').summernote({
//     toolbar:[
//         ['style', ['style']],
//       ['style', ['bold', 'italic', 'underline', 'clear']],
//       ['fontname', ['fontname', 'fontsize', 'height']],
//       ['font', ['strikethrough', 'superscript', 'subscript',]],
//     //   ['custom', ['examplePlugin']],
//     ['color', ['color']],
//       ['para', ['ul', 'ol', 'paragraph']],
//       ['insert', ['table', 'hr', 'link', 'picture', 'video']],
//       ['view', ['fullscreen', 'codeview', /*'undo', 'redo',*/ 'help']],
//     ]
//   });
