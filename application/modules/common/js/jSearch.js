 $("#obtSearch").click(function() {
     var tName = $("#oetSearch").val();    
     
    $.ajax({
        type: "POST",
        url: "masEMPEvensearch",
        data: {
            'search': $("#oetSearch").val(), 
        },
        cache: false,
        timeout: 0,
        success: function(tResult) {
            // var aReturnData = JSON.parse(tResult);     
            $('#odvUpdate').html(tResult);
            
            $('#oetSearch').val(tName);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           alert('error');
        }
    });
});

// $( ".delItem" ).click(function() {
//     alert($(this).attr('value'));
//     // $.ajax({
//     //     type: "POST",
//     //     url: "masPDTEvensearch",
//     //     data: {
//     //         'search': $("#test").val(), 
//     //     },
//     //     cache: false,
//     //     timeout: 0,
//     //     success: function(tResult) {
//     //         // var aReturnData = JSON.parse(tResult);
//     //         $('#ostSatSvDataTableDocument').html(tResult);
//     //         console.log(tResult);
//     //     },
//     //     error: function(jqXHR, textStatus, errorThrown) {
//     //        alert('error');
//     //     }
//     // });
// });



