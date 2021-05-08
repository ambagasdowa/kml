/**
// NOTE Datepicker Options

*/
 options_datepicker = {
         language: 'es-ES'
        ,format: 'yyyy-mm-dd'
        ,autoHide: true
 };


/**
// NOTE Datatable Options
*/


// NOTE Disponibilidad Options Module
// unset searchable in column 1 
// rebuild buttons for exporting options
options_disponibilidad = {
  "columnDefs": [
    { "searchable": false, "targets": 1 }
  ],
  buttons: [
       { extend: 'pageLength', text: '<i class="fa fa-filter" aria-hidden="true"></i>' }
      ,{
          extend: 'copy', text: '<i class="fa fa-clipboard" aria-hidden="true"></i>',
          exportOptions: {
          //   columns: ':visible'
             columns:[0,2,3,4,5,6,7,8,9,10]
          }
       }
      ,{
         extend: 'csv', text: '<i class="fa fa-file-text"></i>',
         exportOptions: {
         //     columns: ':visible'
             columns:[0,2,3,4,5,6,7,8,9,10]
         }
       }
      ,{
            extend: 'excel'
          , text: '<i class="fa fa-file-excel-o"></i>'
          // , extension: '.xlsx'
          , autoFilter: true
          , messageTop:'Detalle'
          // , header:false
          , filename:"ExportData"
          , title:"File"
          ,exportOptions: {
            //  columns: ':visible'
            columns:[0,2,3,4,5,6,7,8,9,10]
           }
        }

      ,{
            // extend: 'pdfHtml5',
        extend: 'pdf', text: '<i class="fa fa-file-pdf-o"></i>'
              , messageTop:'Detalle'
        // 			// , header:false
              , filename:"export_file"
              , title:""
              , orientation: 'landscape'
              ,customize: function ( doc ) {
                                              doc.content.splice( 0, 0, {
                                                  margin: [ 0, 0, 0, 12 ],
                                                  alignment: 'left',
                                                  image: imgeHeader
                                        } );
                                    }
              ,exportOptions: {
               // columns: ':visible'
               columns:[0,2,3,4,5,6,7,8,9,10]
              }
       }

      ,{
        extend: 'print', text: '<i class="fa fa-print"></i>' ,
        exportOptions: {
              columns: ':visible'
          }
       }
// NOTE end updates 
  ]                                                                                                                                      
};


// NOTE Disponibilidad Options Module for table 2nd
// unset searchable in column 1 
// rebuild buttons for exporting options
options_disponibilidad_second_table = {
  "columnDefs": [
    { "searchable": false, "targets": 1 }
  ],
  buttons: [
       { extend: 'pageLength', text: '<i class="fa fa-filter" aria-hidden="true"></i>' }
      ,{
          extend: 'copy', text: '<i class="fa fa-clipboard" aria-hidden="true"></i>',
          exportOptions: {
             columns: ':visible'
          //   columns:[0,2,3,4,5,6,7,8,9,10]
          }
       }
      ,{
         extend: 'csv', text: '<i class="fa fa-file-text"></i>',
         exportOptions: {
              columns: ':visible'
         //    columns:[0,2,3,4,5,6,7,8,9,10]
         }
       }
      ,{
            extend: 'excel'
          , text: '<i class="fa fa-file-excel-o"></i>'
          // , extension: '.xlsx'
          , autoFilter: true
          , messageTop:'Detalle'
          // , header:false
          , filename:"ExportData"
          , title:"File"
          ,exportOptions: {
              columns: ':visible'
//            columns:[0,2,3,4,5,6,7,8,9,10]
           }
        }

      ,{
            // extend: 'pdfHtml5',
        extend: 'pdf', text: '<i class="fa fa-file-pdf-o"></i>'
              , messageTop:'Detalle'
        // 			// , header:false
              , filename:"export_file"
              , title:"Detalle Tabla"
              , orientation: 'landscape'
              ,customize: function ( doc ) {
                                              doc.content.splice( 0, 0, {
                                                  margin: [ 0, 0, 0, 12 ],
                                                  alignment: 'left',
                                                  image: imgeHeader
                                              });
                                              doc.defaultStyle.fontSize = 10;
//                                              doc.styles.tableHeader.fontSize = 12;
                          }
// NOTE  add customize field 

              ,exportOptions: {
//               columns: ':visible'
              columns:[0,1,2,3,4,5,9,10,11,12,13,14,15,16]
              }
       }

      ,{
        extend: 'print', text: '<i class="fa fa-print"></i>' ,
        exportOptions: {
              columns: ':visible'
          }
       }
// NOTE end updates 
  ]                                                                                                                                      
};






options_datatable = {

        // initComplete: function () {
        //     var api = this.api();
        //     api.$('td').click( function () {
        //         api.search( this.innerHTML ).draw();
        //     } );
        // },
        // deferRender:    true,
        // scrollY:        500,
        // scrollCollapse: true,
        // scroller:       true,
        // keys:           true,
        // scrollY:        '50vh',
        // scrollCollapse: true,
        // scrollX : true,
        dom: 'Bfrtip',
        language: {
            // decimal: ".",
            // thousands: ",",
            // "lengthMenu": "Display _MENU_ records per page",
            "search":         "Buscar:",
            "paginate": {
                "first":      "Primera",
                "last":       "Ultima",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
            "zeroRecords": "No hay registros",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "Sin registros disponibles",
            "infoFiltered": "(filtrados _MAX_ registros totales)",
            buttons: {
                pageLength: {
                    _: "Filtra %d lineas",
                    '-1': "Muestra Todo"
                }
            }
        },
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 lineas', '25 lineas', '50 lineas', 'Mostrar Todo' ]
        ],
        buttons: [
             { extend: 'pageLength', text: '<i class="fa fa-filter" aria-hidden="true"></i>' }
            ,{
                extend: 'copy', text: '<i class="fa fa-clipboard" aria-hidden="true"></i>',
                exportOptions: {
                    columns: ':visible'
                }
             }
            ,{
               extend: 'csv', text: '<i class="fa fa-file-text"></i>',
               exportOptions: {
                                columns: ':visible'
               }
             }
            ,{
                  extend: 'excel'
                , text: '<i class="fa fa-file-excel-o"></i>'
                // , extension: '.xlsx'
                , autoFilter: true
                , messageTop:'Detalle'
                // , header:false
                , filename:"ExportData"
                , title:"File"
                ,exportOptions: {
                    columns: ':visible'
                 }
              }
            // ,{
            // 			 extend: 'pdf', text: '<i class="fa fa-file-pdf-o"></i>'
            // 			, messageTop:'Detalle'
            // 			// , header:false
            // 			, filename:'ExportData'
            // 			, title:"<?php print($export)?>"
            //  }
            ,{
                  // extend: 'pdfHtml5',
              extend: 'pdf', text: '<i class="fa fa-file-pdf-o"></i>'
                    , messageTop:'Detalle'
              // 			// , header:false
                    , filename:"export_file"
                    , title:""
                    ,customize: function ( doc ) {
                                                    doc.content.splice( 0, 0, {
                                                        margin: [ 0, 0, 0, 12 ],
                                                        alignment: 'left',
                                                        image: imgeHeader
                                              } );
                                          }
                    ,exportOptions: {
                      columns: ':visible'
                    }
             }
// NOTE: Active the Column filter :: just uncomment from 112 to 125
             // ,{
             //     extend: 'colvis',
             //     text: '<i class="fa fa-eye-slash"></i>',
             //     title:'Filtrar Columnas',
             //     alt:'Filtrar Columnas'
             //  }
             //
             // ,{
             //     extend: 'colvisGroup',
             //     text: '<i class="fa fa-eye"></i>',
             //     title: 'Mostrar Columnas',
             //     alt: 'Mostrar Columnas',
             //     show: ':hidden'
             // }

            ,{
              extend: 'print', text: '<i class="fa fa-print"></i>' ,
              exportOptions: {
                    columns: ':visible'
                }
             }

        ]                                                                                                                                      

        // NOTE for hidde columns , in the example the last column is hidden
        // ,columnDefs: [ {
        //             targets: -1,
        //             visible: false
        // } ]
};

// // merge obj
// var o1 = { a: 1, b: 1, c: 1 };
// var o2 = { b: 2, c: 2 };
// var o3 = { c: 3 };
// var obj = Object.assign({}, o1, o2, o3);
// console.log(obj); // { a: 1, b: 2, c: 3 }
// function myfunc() {
//    return {"name": "bob", "number": 1};
// }
//
// var myobj = myfunc();
// console.log(myobj.name, myobj.number); // logs "bob 1"

calculate_row = function (rowset,rendimiento){
  return {
          footerCallback: function ( row, data, start, end, display ) {
              var api = this.api(), data;
              // Remove the formatting to get integer data for summation
              var intVal = function ( i ) {
                // console.log(i);
                  return typeof i === 'string' ?
                      i.replace(/[\$,]/g, '')*1 :
                      typeof i === 'number' ?
                          i : 0;
              };

              var row_column = rowset;
              denominator = numerator = denominatox = numeratox = 0 ;
              // console.log(foo === undefined); // true
              if (rendimiento !== undefined) {
                set2ndParam = true;
                row_rend = rendimiento;
              }


              for (var x = 0; x < row_column.length; x++) {
                // console.log(row_column[x]);
                var ktotal = api
                      .column( row_column[x] )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );

                  // Total over this page
                var kpageTotal = api
                      .column( row_column[x] , { page: 'current'} )
                      .data()
                      .reduce( function (a, b) {
                          return intVal(a) + intVal(b);
                      }, 0 );

                      // console.log('set2ndParam = '+set2ndParam);
                  if (rendimiento !== undefined) {
                      if ( row_column[x] == row_rend[0] ) {
                        denominator = kpageTotal;
                        denominatox = ktotal;
                      }
                      if ( row_column[x] == row_rend[1] ) {
                        // console.log(x + ' => numerator');
                        // console.log('numerator');
                        numerator = kpageTotal;
                        numeratox = ktotal;
                      }

                      // console.log(denominator/numerator); //175597
                      if (row_column[x] == row_rend[2]) {
                          kpageTotal = denominator / numerator ;
                          ktotal = denominatox / numeratox ;
                      }

                  }
                    // console.log(ktotal);
                  // Update footer
                $( api.column( row_column[x] ).footer() ).html(
                 ''+ (Math.round(kpageTotal * 100) / 100).toLocaleString()  +' / Total : '+ (Math.round(ktotal * 100) / 100).toLocaleString() +''
                  );

              }

              //NOTE add addenum


        }    //NOTE End footerCallback
  };
} // NOTE End calculate_row


// var shallowMerge = extend(obj1, obj2);
// var deepMerge = extend(true, obj1, obj2);

    var extend = function () {
      // Variables
      var extended = {};
      var deep = false;
      var i = 0;
      // Check if a deep merge
      if (typeof (arguments[0]) === 'boolean]') {
        deep = arguments[0];
        i++;
      }
      // Merge the object into the extended object
      var merge = function (obj) {
        if (obj.hasOwnProperty(prop)) {
          if (deep && Object.prototype.toString.call(obj[prop]) === '[object Object]') {
            // If we're doing a deep merge and the property is an object
            extended[prop] = extend(true, extended[prop], obj[prop]);
          } else {
            // Otherwise, do a regular merge
            extended[prop] = obj[prop];
          }
        }
      };
      // Loop through each object and conduct a merge
      for (; i < arguments.length; i++) {
        merge(arguments[i]);
      }

      return extended;
    }



imgeHeader = 'data:image/png;base64,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';
