$(document).ready(function() {
	var initEditor = function() {
		$("textarea").sceditor({
			plugins: 'bbcode',
			toolbarExclude: 'rtl,ltr,youtube,unlink,link,email,image,quote,code,table,orderedlist,font,superscript,subscript',
			emoticonsEnabled: false,
			//style: "./media/css/jquery.sceditor.default.min.css"
		});
	};

	initEditor();
});

$("#desc").charCount();
$("#pdesc").charCount();