$(document).ready(function () {

    //1.0 Dashboard

        //sidebar
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');

            $('#sidebar .sidebar-header p').toggleClass('d-none');
            $('#sidebar .sidebar-header span').toggleClass('d-none');

        });

        //Boostrap 4 Toaster Notify
        $('.toast').toast({delay:10000, animation:true}).toast('show');

        //Table (Explore More)
        $(document).on('click', '.caret-td', function() {

            //activate toggle
            $(this).find("i").toggleClass('fa-caret-down fa-caret-right');

            //activate explore more table
            if ($(this).find("i").hasClass('fa-caret-down')) {
                $('.explore-more-td').toggleClass('active');
            }
            else {
                $('.explore-more-td').toggleClass('active');
            }

        });
         


});