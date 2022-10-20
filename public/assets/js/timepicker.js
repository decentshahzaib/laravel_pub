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