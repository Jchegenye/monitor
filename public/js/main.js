$(document).ready(function () {

    //1.0 Dashboard

        //sidebar
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');

            $('#sidebar .sidebar-header p').toggleClass('d-none');
            $('#sidebar .sidebar-header span').toggleClass('d-none');

        });

});