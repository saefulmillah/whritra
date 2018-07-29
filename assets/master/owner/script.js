var add;
var main;
var table;
var handle_tables = function () {
	table = $('#table').DataTable({
		"processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "paging" : false,
        // "sDom": '<"top"i>rt<"bottom"lp><"clear">',
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "owner/getDataTables",
            "type": "POST",
            // "data": function ( data ) {
            //     data.start_date = $('#start_date').val();
            // }
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
	        { 
	            "targets": [ 0 ], //first column / numbering column
	            "orderable": false, //set not orderable
	        },
        ],
	});
}

var handle_save = function () {
	// e.preventDefault();
	$.ajax({
		type : "POST",
		url : "owner/save",
		dataType : "json",
		data : $("#myForm").serialize(),
        success: function (data) {
            console.log(data);
            $('#message').text('Record tersimpan');
            $('#myForm').trigger('reset');
        }
	});
}

var handle_new = function () {
	add = "owner/add";
	$('#content-ajax').load(add);
}

var handle_main = function () {
	main = "owner/main"
	$('#content-ajax').load(main, function () {
		handle_tables();
	})
}

$(document).ready(function() {
    handle_tables();
    handle_main();
});