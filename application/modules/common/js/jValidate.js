$(document).ready(function(){
    if ($('#ofmAdd').length>0){
        $('#ofmAdd').validate({
            rules: {
                oetFname: {
                    maxlength: 30,
                    required: true
                },
                oetLname: {
                    maxlength: 30,
                    required: true
                },
                oetAddress: {
                    required: true
                },
                oetEmail: {                           
                    required: true,
                    email: true
                }

            },
            messages: {
                oetFname: {
                    required: 'กรุณาใส่ชื่อ'
                },
                oetLname: {
                    required: 'กรุณาใส่นามสกุล'
                },
                oetAddress: {
                    required: 'กรุณากรอกที่อยู่'
                },
                oetEmail: {
                    required: 'กรุณากรอกอีเมล',
                    email: 'รูปแบบอีเมลไม่ถูกต้อง xxx@xxxxx.xxx'
                }
            }
        })
    }

})