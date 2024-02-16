flatpickr('#date', {
  enableTime: false,
  dateFormat: "Y-m-d",
  locale: "ru"
});

var getShowField = function() {
	var showField = document.querySelector('.adv_show-field');
	var hideField = document.querySelectorAll('.adv_hide-field');
	var field = document.querySelector('.field');

	showField.addEventListener('click', function() {
		field.classList.remove('hidden');
	});

	for (var i = 0; i < hideField.length; i++) {
		hideField[i].addEventListener('click', function() {
				field.classList.add('hidden');
		});
	}
};

getShowField();

var getButtonDownload = function() {
	var button = document.querySelector('.button');
	var getLink = button.querySelector('.get_link');
	var download = button.querySelector('.download');

	console.log(button);
	console.log(getLink);
	console.log(download);

	button.addEventListener('click', function() {
		getLink.classList.add('hidden');
		download.classList.remove('hidden');
		button.classList.add('bg_gray');
	});
}

getButtonDownload();