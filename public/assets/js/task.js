$(document).ready(function () {
    // alert('go');
    $('#submit').on('click', function (e) {
        e.preventDefault();
        var fdata = new FormData(form1);
        // alert(fdata);

        $.ajax({
            url: '/Task',
            type: 'post',
            contentType: false,
            processData: false,
            data: fdata,
            success: function (res) {
                if (res.status == 'success') {
                    showMsg(res.status, res.msg);
                    
                }
                else {

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

function showMsg(status, message) {
    if (status == 'error') {
        var msg = $('#error');
    }
    else {
        var msg = $('#success');
    }

    msg.html(message);
    msg.css({
        'display': 'block',
    });

    setTimeout(() => {
        msg.css({
            'display': 'none',
        });

        if (status == 'success') {
            window.location.reload();
        }
    }, 3000);

}