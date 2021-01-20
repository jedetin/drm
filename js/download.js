//=============== DOWNLOAD CODE ===============
var data = new Blob([text], {type: 'text/plain'});
var url = window.URL.createObjectURL(data);
document.getElementById('download_link').href = url;