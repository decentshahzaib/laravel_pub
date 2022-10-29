function myfun(val) {
    var value = val.value;
    var h = value.split(':');
    // alert(h[0]);

    if (h > '12') {
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
                if (res == 1) {
                    alert("Data has been inserted");
                    window.location.reload();
                }
                else {
                    alert(res);
                }

            }
        });
    });
});