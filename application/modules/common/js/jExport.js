 $( "#oahExport" ).click(function() {
     var tName = $("#oetSearch").val();
    $.ajax({
        type: "POST",
        url: "masEMPEvenReport",
        data: {
            'search': $("#oetSearch").val(), 
        },
        cache: false,
        timeout: 0,
        success: function(tResult) {
            
        },
        error: function(jqXHR, textStatus, errorThrown) {
           alert('error');
        }
    });
});