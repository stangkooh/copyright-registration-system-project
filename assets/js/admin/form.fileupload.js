$(function() {
  "use strict";
  $("#fileupload").fileupload({
    url: "//jquery-file-upload.appspot.com/",
    dropZone: $("#fileupload-drop-area")
  }), $("#fileupload").fileupload("option", "redirect", window.location.href.replace(/\/[^\/]*$/, "/cors/result.html?%s")), "blueimp.github.io" === window.location.hostname ? ($("#fileupload").fileupload("option", {
    url: "//jquery-file-upload.appspot.com/",
    disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
    maxFileSize: 999e3,
    acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
  }), $.support.cors && $.ajax({
    url: "//jquery-file-upload.appspot.com/",
    type: "HEAD"
  }).fail(function() {
    $('<div class="alert alert-danger"/>').text("Upload server currently unavailable - " + new Date).appendTo("#fileupload")
  })) : ($("#fileupload").addClass("fileupload-processing"), $.ajax({
    url: $("#fileupload").fileupload("option", "url"),
    dataType: "json",
    context: $("#fileupload")[0]
  }).always(function() {
    $(this).removeClass("fileupload-processing")
  }).done(function(e) {
    $(this).fileupload("option", "done").call(this, $.Event("done"), {
      result: e
    })
  }))
});
