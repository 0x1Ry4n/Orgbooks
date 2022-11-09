jQuery(function () {
	$.fn.dataTable.moment('DD/MM/YYYY');

	$('.data-table').DataTable({
		dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
		
		buttons: [	
			{
				extend: 'copyHtml5',
				text: '<i class="fa fa-files-o"></i> Copiar',
				exportOptions: {
					modifier: {
						page: 'current'
					}
				},
				titleAttr: 'Copiar',
				className: 'btn btn-primary'
			},
			{
				extend: 'excelHtml5',
				text: '<i class="fa fa-file-excel-o"></i> Excel',
				titleAttr: 'Exportar arquivo Excel',
				autoFilter: true,
				charset: 'utf-8',
				fieldSeparator: ';',
				fieldBoundary: '',
				className: 'btn btn-primary'
			},
			{
				extend: 'pdfHtml5',
				text: '<i class="fa fa-file-pdf-o"></i> PDF',
				titleAttr: 'Exportar arquivo PDF',
				pageSize: 'A3',
				filename: 'orgbooks_pdf',
				className: 'btn btn-primary'
			}
		],

		"order": [
			[1, "asc"]
		] ,

		responsive: true,
		autoWidth: false,
		orderCellsTop: true,
		fixedHeader: true,
		scrollCollapse: false,

		"columnDefs": [{
			targets: "datatable-nosort",
			orderable: false,
		}],

		lengthMenu: [[5, 10, 25, 50], [5, 10, 25, 50]],

		"language": {
			lengthMenu: "Mostrar _MENU_ registros",
			zeroRecords: "<i class='fa-solid fa-xmark'></i> Nada encontrado!",
			info: "_START_-_END_ de _TOTAL_ registros",
			infoEmpty: "Não há registros na base de dados.",
			infoFiltered: "(filtrado de _MAX_ registros)",
			search: "<i class='fa fa-search' aria-hidden='true'></i> Consulta:",
			searchPlaceholder: "Pesquisar...",
			paginate: {
				next: '<i class="ion-chevron-right"></i>',
				previous: '<i class="ion-chevron-left"></i>'
			}
		}

	});

	jQuery('.dt-buttons').addClass('d-none d-sm-block');

});




