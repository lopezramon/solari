/*
 *  Document   : tablesDatatables.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Tables Datatables page
 */

var TablesDatatables = function() {

    return {
        init: function() {
            /* Initialize Bootstrap Datatables Integration */
            App.datatables();

            /* Initialize Datatables con ( 3 ) Columnas*/
            $('#table-2').dataTable({
                columnDefs: [ { orderable: false, targets: [ 1, 1 ] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });
            /* Initialize Datatables con ( 3 ) Columnas*/
            $('#table-3').dataTable({
                columnDefs: [ { orderable: false, targets: [ 1, 2 ] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });
            /* Initialize Datatables con ( 3 ) Columnas*/
            $('#table-4').dataTable({
                columnDefs: [ { orderable: false, targets: [ 1, 3 ] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });
            /* Initialize Datatables con ( 3 ) Columnas*/
            $('#table-5').dataTable({
                columnDefs: [ { orderable: false, targets: [ 1, 4 ] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });
            /* Initialize Datatables con ( 3 ) Columnas*/
            $('#table-6').dataTable({
                columnDefs: [ { orderable: false, targets: [ 1, 5 ] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });
            /* Initialize Datatables con ( 3 ) Columnas*/
            $('#table-7').dataTable({
                columnDefs: [ { orderable: false, targets: [ 1, 6 ] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });
            /* Initialize Datatables con ( 3 ) Columnas*/
            $('#table-8').dataTable({
                columnDefs: [ { orderable: false, targets: [ 1, 7 ] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });
            /* Initialize Datatables con ( 3 ) Columnas*/
            $('#table-9').dataTable({
                columnDefs: [ { orderable: false, targets: [ 1, 8 ] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });
            /* Initialize Datatables con ( 3 ) Columnas*/
            $('#table-10').dataTable({
                columnDefs: [ { orderable: false, targets: [ 1, 9 ] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });
            /* Initialize Datatables con ( 3 ) Columnas*/
            $('#table-11').dataTable({
                columnDefs: [ { orderable: false, targets: [ 1, 10 ] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });
            /* Initialize Datatables con ( 3 ) Columnas*/
            $('#table-12').dataTable({
                columnDefs: [ { orderable: false, targets: [ 1, 11 ] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });
            /* Initialize Datatables */
            $('#requestCategories-table').dataTable({
                columnDefs: [ { orderable: false, targets: [ 1, 4 ] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'All']]
            });

            /* Add placeholder attribute to the search input */
            $('.dataTables_filter input').attr('placeholder', 'Search');
        }
    };
}();