<div class="site-content">
  <div class="alert alert-outline alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
    <div class="media p-3">
      <i class="fa fa-trash mr-3">
      </i><div class="media-body">
        <h6>Successfully</h6>
        <div>ลบเอกสารเสร็จสมบูรณ์,ระบบจะนำท่านไปยังหน้าเอกสารโดยอัตโนมัติ.... <div id="countdown"></div></div>
      </div>
    </div>
  </div>
</div>
  <?php $this->load->view('admin/template/footer');?>
<script>
setTimeout(function(){ window.location = "<?=URL_Site?>admin/controlpanel/document"; }, 5500);

var downloadButton = document.getElementById("countdown");
var counter = 5;
var newElement = document.createElement("a");
newElement.innerHTML = "5 วินาที";
var id;

downloadButton.parentNode.replaceChild(newElement, downloadButton);

id = setInterval(function() {
    counter--;
    if(counter < 0) {
        newElement.parentNode.replaceChild(downloadButton, newElement);
        clearInterval(id);
    } else {
        newElement.innerHTML =  counter.toString() + " วินาที";
    }
}, 1000);
</script>
</body>

</html>
