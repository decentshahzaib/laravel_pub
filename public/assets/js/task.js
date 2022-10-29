// function myFun(val) {
//     var value = val.value;
//     var date = new Date(value);
//     alert(value);
//     var houre = date.getHours();

//     if (houre > '12') {
//         var date2 = value.split('-');
//         var day = date2[2].split('T');
//         var new_date = new Date(date2[0], date2[1] - 1, day[0])
//         val.value = day[0] + '-' + date2[1] + '-' + date2[0] + 'T' + day[1];
//     }
//     else {
//         val.value = 'AM';
//     }
// }

$(document).ready(function () {
    // alert('go');
    $('#sub1').on('click', function (e) {
        e.preventDefault();
        var fdata = new FormData(form1);
        // alert(fdata);

        $.ajax({
            url: '/task/insert',
            type: 'post',
            contentType: false,
            processData: false,
            data: fdata,
            success: function (res) {
                if (res.status == 'success') {
                    showMsg(res.status, res.msg);
                    
                }
                else {

                    // alert(typeof (res['msg']));

                    if (typeof (res['msg']) != 'string') {
                        
                        var list = "<ul>";
                        $.each(res['msg'], function (key, val) {
                            list += "<li>" + val + "</li>";
                        });
                        list += "</ul>";
                        showMsg(res.status, list);
                    }
                    else {
                        showMsg(res.status, res.msg);
                    }
                }

            }
        });
    });
});

function showMsg(val1, val2) {
    if (val1 == 'error') {
        var msg = $('#error');
    }
    else {
        var msg = $('#success');
    }

    msg.html(val2);
    msg.css({
        'display': 'block',
    });

    setTimeout(() => {
        msg.css({
            'display': 'none',
        });

        if (val1 == 'success') {
            window.location.reload();
        }
    }, 3000);

}