var selDiv = '';
var storedFiles = [];
$(document).ready(() => {
  $('#image').on('change', handleFileSelect);
  selDiv = $('#selectedBanner');

  $('#selectedBanner').click(() => {
    $('label[for="image"]').click();
  });
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
      $('form>.image label:nth-of-type(2)').css('display', 'none');
      console.log('tes');
    };
    reader.readAsDataURL(f);
  });
}
