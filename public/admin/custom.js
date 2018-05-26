function elFinderBrowser (callback, value, meta) {
	tinymce.activeEditor.windowManager.open({
		file: '/index.php/elfinder/default',
		title: 'File Browser',
		width: 900,
		height: 450,
		resizable: true
	}, {
		oninsert: function (file, fm) {
			var url, reg, info;

			// URL normalization
			url = fm.convAbsUrl(file.url);

			// Make file info
			info = file.name + ' (' + fm.formatSize(file.size) + ')';

			// Provide file and text for the link dialog
			if (meta.filetype == 'file') {
				callback(url, {text: info, title: info});
			}

			// Provide image and alt text for the image dialog
			if (meta.filetype == 'image') {
				callback(url, {alt: info});
			}

			// Provide alternative source and posted for the media dialog
			if (meta.filetype == 'media') {
				callback(url);
			}
		}
	});

	return false;
}

tinymce.init({
  selector: 'textarea',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help wordcount'
  ],
  toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'],
  file_picker_callback : elFinderBrowser
});
