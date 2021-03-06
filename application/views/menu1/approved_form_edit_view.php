
  <div class="site-content">
    <h2>แบบฟอร์มข้อมูล</h2>
    <div class="card">
      <div style="padding:2rem;">
        <?php $rowdata = $this->Controlpanel_model->get_forms_oper_detail($id_form);?>
        <form id="formdata" method="post" enctype="multipart/form-data">
          <input style="display:none;" value="<?=@$rowdata[0]['id_form']?>" name="id_form" type="text">
          <div class="form-group row"><label class="col-2 col-form-label" for="example-text-input">ชื่อผลงาน</label>
            <div class="col-5"><input class="form-control" name="name_oper" value="<?=@$rowdata[0]['name_oper']?>" type="text"></div>
            <label class="col-2 col-form-label" for="example-text-input">ปีการศึกษา</label>
            <div class="col-3">
              <select class="form-control" name="course_year">
              <?php for ($i=0; $i < 20 ; $i++) {
                $date = date("Y")+543;
                $cal  = $date-$i;
                echo '<option value="'.$cal.'">'.$cal.'</option>';
              } ?>
              </select>
            </div>
          </div>
          <div class="form-group row"><label class="col-2 col-form-label" for="example-text-input">ผู้ยื่นคำร้อง</label>
            <div class="col-10"><input class="form-control"  value="<?=@$rowdata[0]['first_name']?> <?=@$rowdata[0]['last_name']?>" type="text"></div>
          </div>
          <div class="form-group row"><label class="col-2 col-form-label" for="example-text-input">คณะ/สำนัก</label>
            <div class="col-10"><input class="form-control"  value="<?=@$rowdata[0]['location']?>" type="text"></div>
          </div>
          <div class="form-group row"><label class="col-2 col-form-label" for="example-text-input">ทรัพย์สินทางปัญญา</label>
            <div class="col-10 stat">
              <select class="form-control">
                <option value="1">จดสิทธิบัตร อนุสิทธิบัตร</option>
                <option value="2">จดลิขสิทธิ์</option>
                <option value="3">จดเครื่องหมายการค้า</option>
              </select>
            </div>
          </div>
          <div class="form-group row"><label class="col-2 col-form-label" for="example-text-input">ประเภท</label>
            <div class="col-10"><input class="form-control" name="type_oper" value="<?=@$rowdata[0]['type_oper']?>" type="text"></div>
          </div>
          <div class="form-group row"><label class="col-2 col-form-label" for="example-text-input">เลขที่คำขอ</label>
            <div class="col-10"><input class="form-control" name="num_form" value="<?=@$rowdata[0]['num_form']?>" type="text"></div>
          </div>
          <div class="form-group row"><label class="col-2 col-form-label" for="example-text-input">ทะเบียนข้อมูลเลขที่</label>
            <div class="col-10"><input class="form-control" name="num_register"  value="<?=@$rowdata[0]['num_register']?>" type="text"></div>
          </div>
          <div class="form-group row"><label class="col-2 col-form-label" for="example-text-input">ผลการดำเนินงาน</label>
            <div class="col-10">
              <select class="form-control" name="status_oper">
                <option value="0">กำลังดำเนินการ</option>
                <option value="1">ส่งกลับแก้ไข</option>
                <option value="2">ยกเลิกคำขอ</option>
                <option value="3">ดำเนินการในชั้นศาล</option>
                <option value="4">ไม่รับการจด</option>
                <option value="5">จดเรียบร้อยแล้ว</option>
              </select>
            </div>
          </div>
          <div class="form-group row"><label class="col-2 col-form-label" for="example-text-input">ค่าใช้จ่าย</label>
            <div class="col-10"><input class="form-control" name="price_oper"  value="<?=@$rowdata[0]['num_register']?>" type="text"></div>
          </div>
          <div class="form-group row"><label class="col-2 col-form-label" for="example-text-input">วันที่รับเอกสารครบ</label>
            <?php if(@$rowdata[0]['date_receipt'] !== '0000-00-00'):?>
              <div class="col-10"><input  class="form-control" name="date_receipt" value="<?=@$rowdata[0]['date_receipt']?>" type="date"></div>
            <?php else:?>
              <div class="col-10"><input  class="form-control" name="date_receipt" value="<?=date('Y-m-d')?>" type="date"></div>
            <?php endif;?>
          </div>
          <div class="form-group row"><label class="col-2 col-form-label" for="example-text-input">วันที่ยื่นเอกสาร CP ALL</label>
            <?php if(@$rowdata[0]['date_receipt_cpall'] !== '0000-00-00'):?>
              <div class="col-10"><input class="form-control" name="date_receipt_cpall" value="<?=@$rowdata[0]['date_receipt_cpall']?>" type="date"></div>
            <?php else:?>
           <div class="col-10"><input class="form-control" name="date_receipt_cpall" value="" type="date"></div>
           <?php endif;?>
          </div>
          <div class="form-group row"><label class="col-2 col-form-label" for="example-text-input">วันที่ยื่นกรม/รับจด</label>
            <?php if(@$rowdata[0]['date_receipt_agency'] !== '0000-00-00'):?>
              <div class="col-10"><input class="form-control" name="date_receipt_agency" value="<?=@$rowdata[0]['date_receipt_agency']?>" type="date"></div>
            <?php else:?>
           <div class="col-10"><input class="form-control" name="date_receipt_agency" value="" type="date"></div>
           <?php endif;?>
          </div>
          <div class="form-group row"><label class="col-2 col-form-label" for="example-text-input">วันที่จดเสร็จ</label>
            <?php if(@$rowdata[0]['date_complete'] !== '0000-00-00'):?>
              <div class="col-10"><input class="form-control" name="date_complete" value="<?=@$rowdata[0]['date_complete']?>" type="date"></div>
            <?php else:?>
           <div class="col-10"><input class="form-control" name="date_complete" value="" type="date"></div>
           <?php endif;?>
          </div>
          <div class="card">
    <div class="card-header">
    ข้อมูลตัวอย่าง
    </div>
    <div class="card-body">
      <div class="form-group row">
       <label for="example-text-input" class="col-2 col-form-label" >รายละเอียด :</label>
       <div class="col-12">
           <textarea id="Subdetail" name="Subdetail_oper"></textarea>
       </div>
     </div>
        <div class="form-group row">
         <label for="example-text-input" class="col-2 col-form-label" >รูปแนบ :</label>
         <div class="col-7">
           <label class="custom-file col-7 mb-1">
             <input type="file" id="image1" class="custom-file-input" accept="image/*" name="image1" >
             <span class="custom-file-control" data-content="Choose file..."></span>
           </label>
           <label class="custom-file col-7 mb-1">
             <input type="file" id="image2" class="custom-file-input" accept="image/*" name="image2" >
             <span class="custom-file-control" data-content="Choose file..."></span>
           </label>
           <label class="custom-file col-7 mb-1">
             <input type="file" id="image3" class="custom-file-input" accept="image/*" name="image3" >
             <span class="custom-file-control" data-content="Choose file..."></span>
           </label>
           <label class="custom-file col-7 mb-1">
             <input type="file" id="image4" class="custom-file-input" accept="image/*" name="image4" >
             <span class="custom-file-control" data-content="Choose file..."></span>
           </label>
           <label class="custom-file col-7 mb-1">
             <input type="file" id="image5" class="custom-file-input" accept="image/*" name="image5" >
             <span class="custom-file-control" data-content="Choose file..."></span>
           </label>
         </div>
       </div>
    </div>
  </div>
        </form>

        <div class="mb-5 text-right" style="margin-top:3rem;">
          <button type="button" onclick="submit()" class="btn btn-primary btn-lg">อนุมัติ</button>
          <button type="button" onclick="location.reload();" class="btn btn-light btn-lg">ยกเลิก</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /.site-content -->

  <?php
  $this->load->view('template/footer');
  echo js_asset('vendor/froala_editor_2.8.5/js/froala_editor.min.js');
  echo js_asset('vendor/froala_editor_2.8.5/js/froala_editor.pkgd.min.js');
  ?>

<script>
$("div.stat select").val("<?=@$rowdata[0]['form_type']?>");
function submit() {
  var forms=($('#formdata').serialize());
  var url ='<?=URL_Site?>/controlpanel/document/approved/form/insert';
  $("#formdata").attr('action', url);
  $("#formdata").submit();
}
</script>


<script>

  $("input[type=file]").change(function () {
    var fieldVal = $(this).val();
    if (fieldVal != undefined || fieldVal != "") {
      $(this).next(".custom-file-control").attr('data-content', fieldVal);
    }
  });
  $(function() {
    $('textarea#Subdetail').froalaEditor({
      toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', 'fontFamily', 'fontSize', '|', 'color', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', '-', 'insertTable', 'quote', 'insertHR', 'undo', 'redo', 'clearFormatting', 'selectAll', 'html']
    });
  });

</script>
