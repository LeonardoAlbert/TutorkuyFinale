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