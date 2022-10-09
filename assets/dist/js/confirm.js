function confirmLogin() {
	return new Promise(function (resolve, reject) {
		swal({
			title: "Anda Yakin Ingin Melakukan Login?",
			text: "Klik CANCEL jika ingin membatalkan!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((Oke) => {
			if (Oke) {
				return resolve(true);
			} else {
				swal("Poof!", "Penyimpanan Data Dibatalkan", "error").then((value) => {
					return reject;
				})
			}
		});
	});
}

function confirmSave() {
	return new Promise(function (resolve, reject) {
		swal({
			title: "Anda Yakin Ingin Menyimpan Data?",
			text: "Klik CANCEL jika ingin membatalkan!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((Oke) => {
			if (Oke) {
				return resolve(true);
			} else {
				swal("Poof!", "Penyimpanan Data Dibatalkan", "error").then((value) => {
					return reject;
				})
			}
		});
	});
}

function confirmUpdate() {
	return new Promise(function (resolve, reject) {
		swal({
			title: "Anda Yakin Ingin Melakukan Perubahan Data?",
			text: "Klik CANCEL jika ingin membatalkan!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((Oke) => {
			if (Oke) {
				return resolve(true);
			} else {
				swal("Poof!", "Penyimpanan Data Dibatalkan", "error").then((value) => {
					return reject;
				})
			}
		});
	});
}

function confirmDelete() {
	return new Promise(function (resolve, reject) {
		swal({
			title: "Anda Yakin Ingin Menghapus Data?",
			text: "Klik CANCEL jika ingin membatalkan!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((Oke) => {
			if (Oke) {
				return resolve(true);
			} else {
				swal("Poof!", "Penyimpanan Data Dibatalkan", "error").then((value) => {
					return reject;
				})
			}
		});
	});
}

function confirmGenerate() {
	return new Promise(function (resolve, reject) {
		swal({
			title: "Anda Yakin Ingin Melakukan Generate Untuk Input Ini?",
			text: "Klik CANCEL jika ingin membatalkan!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((Oke) => {
			if (Oke) {
				return resolve(true);
			} else {
				swal("Poof!", "Penyimpanan Data Dibatalkan", "error").then((value) => {
					return reject;
				})
			}
		});
	});
}

function confirmAbsenMasuk() {
	return new Promise(function (resolve, reject) {
		swal({
			title: "Anda Yakin Ingin Melakukan Absen Masuk?",
			text: "Klik CANCEL jika ingin membatalkan!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((Oke) => {
			if (Oke) {
				return resolve(true);
			} else {
				swal("Poof!", "Penyimpanan Data Dibatalkan", "error").then((value) => {
					return reject;
				})
			}
		});
	});
}

function confirmAbsenPulang() {
	return new Promise(function (resolve, reject) {
		swal({
			title: "Anda Yakin Ingin Melakukan Absen Pulang?",
			text: "Klik CANCEL jika ingin membatalkan!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((Oke) => {
			if (Oke) {
				return resolve(true);
			} else {
				swal("Poof!", "Penyimpanan Data Dibatalkan", "error").then((value) => {
					return reject;
				})
			}
		});
	});
}