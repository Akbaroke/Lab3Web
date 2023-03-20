var selDiv = '';
var storedFiles = [];
$(document).ready(function () {
  $('#img-bukti').on('change', handleFileSelect);
  selDiv = $('#selectedBanner');
});

function handleFileSelect(e) {
  var files = e.target.files;
  var filesArr = Array.prototype.slice.call(files);
  filesArr.forEach(function (f) {
    if (!f.type.match('image.*')) {
      return;
    }
    storedFiles.push(f);

    var reader = new FileReader();
    reader.onload = function (e) {
      var html = '<img src="' + e.target.result + '" data-file=\'' + f.name + "' height='max-content' width='200px'>";
      selDiv.html(html);
    };
    reader.readAsDataURL(f);
  });
}
