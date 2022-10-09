function requests(dataUrl, method, data) {
	return new Promise(function (resolve, reject) {
		var request = new XMLHttpRequest();
		request.open(method, dataUrl);
		request.onreadystatechange = function () {
			if (this.readyState <= 3) {
				$("#overlay").fadeIn(200);
			} else {
				$("#overlay").fadeOut(200);
			}
		}
		request.onload = function () {
			if (this.status == 200) {
				resolve(request.responseText);
			} else {
				reject({
					status: this.status,
					statusText: request.statusText
				});
			}
		};
		request.onerror = function () {
			reject({
				status: this.status,
				statusText: request.statusText
			});
		};
		request.send(data);
	});
}