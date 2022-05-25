<? 
include 'header.php'
?>
<style>
 .error{
     display: block;
     padding-top: 4px;
     font-size: 16px;
     color: red;
 }
</style>
<div class="container mt-4">
        <h1>Test CURD</h1>
        <hr>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form id="ofmAdd" method="post" name="frmAdd" action="" enctype="multipart/form-data">
                        <h3>Add User</h3>

                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" name="oetFname">
                        </div>

                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="oetLname">
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="oetAddress">
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="oetEmail">
                        </div>

                        <div class="form-group">
                            <label for="">แผนก</label>
                            <select name="ocmDepart" class="form-control">
                                <option value="PHP">Programmer PHP</option>
                                <option value="C#">Programmer C#</option>
                                <option value="Python">Programmer Python</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">รูปภาพ</label>
                            <input type="file" class="form-control" name="oflPic" require accept="image/*">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="เพิ่มผู้ใช้" name="osmAdd" class="btn btn-primary btn-lg">
                            <a style="float:right ;" href="<?php echo base_url('') ?>" class="btn btn-primary btn-lg">กลับหน้าตาราง</a>
                        </div>
                        
                    </form>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
 <? include 'footer.php' ?>
      