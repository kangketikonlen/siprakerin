function dtTable(dataUrl, listsColumn, data, element) {
	$.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
		return {
			"iStart": oSettings._iDisplayStart,
			"iEnd": oSettings.fnDisplayEnd(),
			"iLength": oSettings._iDisplayLength,
			"iTotal": oSettings.fnRecordsTotal(),
			"iFilteredTotal": oSettings.fnRecordsDisplay(),
			"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
			"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
		};
	};

	if (element == null) {
		element = $("#dtTable");
	} else {
		element = element;
	}

	element.dataTable({
		initComplete: function () {
			var api = this.api();
			$('#dtTable_filter input').off('.DT').on('input.DT', function () {
				api.search(this.value).draw();
			});
		},
		processing: true,
		serverSide: true,
		ajax: {
			"url": dataUrl,
			"type": "POST",
			"data": data,
			"error": function (xhr) {
				pesan("Error " + xhr.status, "error", "Request " + xhr.statusText);
			}
		},
		columns: listsColumn,
		rowCallback: function (row) {
			$('td:eq(0)', row).html();
		}
	});
}