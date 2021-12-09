$('#client-btn').on('click', function () {
    $('#client').attr('checked', true);

    $(this).removeClass('btn-outline-primary');
    $(this).addClass('btn-primary');

    $('#student-btn').addClass('btn-outline-primary');
    $('#student-btn').removeClass('btn-primary');
});

$('#student-btn').on('click', function () {
    $('#student').attr('checked', true);

    $(this).removeClass('btn-outline-primary');
    $(this).addClass('btn-primary');

    $('#client-btn').addClass('btn-outline-primary');
    $('#client-btn').removeClass('btn-primary');
});

var click = 0;
$('.cs').on('click', function (event) {
    console.log(event.target.id);
    if (click == 0) {
        let prevValue = $('a.daftar-kelas').attr('href');
        let newValue = prevValue + "/" + event.target.id;
        $('a.daftar-kelas').attr('href', newValue);
        click = 1;
    } else {
        let prevValue = $('a.daftar-kelas').attr('href');
        let prevValueClean = prevValue.substr(0, prevValue.lastIndexOf("/"));
        let newValue = prevValueClean + "/" + event.target.id;
        $('a.daftar-kelas').attr('href', newValue);
    }
});