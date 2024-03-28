<div class="">
  <form method="POST" action="../_lib/phpmailer-fe.php" enctype="multipart/form-data">
    <input type="hidden" value="samplecontactus.html" name="referer">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="card border-0 shadow">
          <div class="card-body p-5">
            <h3 class="card-title text-center mb-5"></h3>
            <div class="form-group mb-3">
              <label for="frmName" class="form-label">Name</label>
              <span class="text-danger">*</span>
              <input class="form-control" type="text" name="frmName" id="frmName" required>
            </div>
            <div class="form-group mb-3">
              <label for="frmCity" class="form-label">City</label>
              <input class="form-control" type="text" name="frmCity" id="frmCity">
            </div>
            <div class="form-group mb-3">
              <label for="frmCityArr1" class="form-label">CityArr</label>
              <input class="form-control" type="text" name="frmCityArr[]" id="frmCityArr1">
            </div>
            <div class="form-group mb-3">
              <label for="frmCityArr2" class="form-label">CityArr</label>
              <input class="form-control" type="text" name="frmCityArr[]" id="frmCityArr2">
            </div>
            <div class="form-group mb-3">
              <label for="email" class="form-label">Email</label>
              <span class="text-danger">*</span>
              <input class="form-control" type="text" name="email" id="email" required>
            </div>
            <div class="form-group mb-3">
              <label for="frmTelephone" class="form-label">Telephone</label>
              <div class="input-group">
                <input class="form-control" type="text" name="frmTelephone" id="frmTelephone">
                <select class="form-select" name="frmPhoneType">
                  <option value="Home">Home</option>
                  <option value="Worx">Worx</option>
                  <option value="Pager">Pager</option>
                </select>
              </div>
            </div>
            <div class="form-group mb-3">
              <label for="frmContactBy" class="form-label">Contact by</label>
              <div class="input-group">
                <select class="form-select" name="frmContactBy">
                  <option value="Telephone">Telephone</option>
                  <option value="Email">Email</option>
                </select>
                <select class="form-select" name="frmBestTime">
                  <option value="Morning">in Morning</option>
                  <option value="Afternoon">in Afternoon</option>
                  <option value="Evening">in Evening</option>
                </select>
              </div>
            </div>
            <div class="form-group mb-3">
              <label for="frmMessage" class="form-label">Message</label>
              <span class="text-danger">*</span>
              <textarea class="form-control" name="frmMessage" id="frmMessage" rows="5" required></textarea>
            </div>
            <div class="form-group mb-3">
  
    &nbsp;
     <input type="submit" value="Submit" class="form-control"name="submit"><input type="reset" class="form-control" value="Reset" name="reset"></td>
  
  <tr>
    <td colspan="3"><div style="height:5px;"></div></td>
  </tr>

</form>
