$(document).ready(function () {
	$('[data-toggle="tooltip"]').tooltip();
	$("#overlay").fadeOut(300);
	$('.modal').on('hidden.bs.modal', function () {
		$(this).find('form').trigger('reset');
		$(this).find('select').val('').trigger('change');
		$('#Frm').find('input:checkbox').removeAttr('checked');
		$('#Frm').find('input').removeAttr('disabled');
		$('#Frm').find('select').removeAttr('disabled');
		$('#Frm').find('#simpan').removeAttr('disabled');
		$('#Frm').find('input').val('');
	});
});

function tgl_indo(tgl) {
	var parts = tgl.split('-');
	var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
	var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
	var tanggal = new Date(parts[0], parts[1] - 1, parts[2]).getDate();
	var _hari = new Date(parts[0], parts[1] - 1, parts[2]).getDay();
	var _bulan = new Date(parts[0], parts[1] - 1, parts[2]).getMonth();
	var _tahun = new Date(parts[0], parts[1] - 1, parts[2]).getFullYear();
	var hari = hari[_hari];
	var bulan = bulan[_bulan];
	var tahun = (_tahun < 1000) ? _tahun + 1900 : _tahun;
	return hari + ', ' + tanggal + ' ' + bulan + ' ' + tahun;
}

function number_format(nStr) {
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + '.' + '$2');
	}
	return x1 + x2;
}

function createSelect2(selector, text) {
	selector.select2({
		theme: 'bootstrap4',
		placeholder: '-- ' + text.toUpperCase() + ' --',
		allowClear: true
	});
}

function populateOption(optID, data) {
	var opts = $.parseJSON(data);
	$.each(opts, function (key, value) {
		optID.append('<option value="' + value.id + '">' + value.text + '</option>');
	});
}

function pesan(kode, status, pesan, table, uri) {
	swal(String(kode), String(pesan), String(status)).then(() => {
		if (table) {
			$("#dtTable").DataTable().ajax.reload(function () {
				$("#overlay").fadeOut(300)
			}, false);
			$("#frmData").modal('hide');
		} else {
			if (uri) {
				window.location.href = uri;
			} else {
				location.reload();
			}
		}
	});
}

function pesanThenReload(kode, status, pesan, table) {
	swal(String(kode), String(pesan), String(status)).then(() => {
		if (table) {
			location.reload();
		} else {
			location.reload();
		}
	});
}

function spreadEdit(results, formID) {
	var data = JSON.parse(results);
	$.each(data, function (key, value) {
		var ctrl = $('[name=' + key + ']', formID);
		if (ctrl.prop("type") != "file") {
			switch (ctrl.prop("type")) {
				case "select-one":
					ctrl.val(value).change();
					break;
				default:
					ctrl.val(value);
			}
		}
	});
}

function spreadMenu(results, formID) {
	var data = JSON.parse(results);
	var split = data.menu_roles.split(",");
	$.each(split, function (key, value) {
		ident = $("#menu_roles_" + value);
		ident.prop('checked', true);
	})
	var n = $('input[type=checkbox]').length + 1;
	for (i = 1; i <= n; i++) {
		$("#menu_roles_" + i).val(i);
	}
	$.each(data, function (key, value) {
		if (key == "menu_nama") {
			$("#menu_nama").text(">" + value + "<");
		}
		var ctrl = $('[name=' + key + ']', formID);
		switch (ctrl.prop("type")) {
			case "select-one":
				ctrl.val(value).change();
				break;
			default:
				ctrl.val(value);
		}
	});
}

function spreadSubmenu(results, formID) {
	var data = JSON.parse(results);
	var split = data.submenu_roles.split(",");
	$.each(split, function (key, value) {
		ident = $("#submenu_roles_" + value);
		ident.prop('checked', true);
	})
	var n = $('input[type=checkbox]').length + 1;
	for (i = 1; i <= n; i++) {
		$("#submenu_roles_" + i).val(i);
	}
	$.each(data, function (key, value) {
		if (key == "submenu_nama") {
			$("#submenu_nama").text(">" + value + "<");
		}
		var ctrl = $('[name=' + key + ']', formID);
		switch (ctrl.prop("type")) {
			case "select-one":
				ctrl.val(value).change();
				break;
			default:
				ctrl.val(value);
		}
	});
}

function spreadLanding(results, formID) {
	var data = JSON.parse(results);
	var split = data.level_show_landing.split(",");
	$.each(split, function (key, value) {
		ident = $("#level_show_landing_" + value);
		ident.prop('checked', true);
	})
	var n = $('input[type=checkbox]').length + 1;
	for (i = 1; i <= n; i++) {
		$("#level_show_landing_" + i).val(i);
	}
	$.each(data, function (key, value) {
		if (key == "level_nama") {
			$("#level_nama").text(">" + value + "<");
		}
		var ctrl = $('[name=' + key + ']', formID);
		switch (ctrl.prop("type")) {
			case "select-one":
				ctrl.val(value).change();
				break;
			default:
				ctrl.val(value);
		}
	});
}