function myFun(val) {
    var value = val.value;
    var houre = value.split(':');
    // alert(houre[0]);

    if (houre > '12') {
        $('#drt option[value="PM"]').attr('selected', true);
    }
    else {
        $('#drt option[value="AM"]').attr('selected', true);
    }
}

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