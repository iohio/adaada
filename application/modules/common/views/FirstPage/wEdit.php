<?php require_once 'header.php' ?>
        <div class="container mt-4">
        <h1>Test CURD</h1>
        <hr>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">

                    <form method="post" name="frmEdit">

                        <div>
                            <h3>Update User</h3>
                        </div>
                    <?php foreach($aUser as $aVal){ ?>
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" value="<?=$aVal['FTCusName']?>" class="form-control" name="oetFname">
                        </div>

                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" value="<?=$aVal['FTCusLastName']?>" class="form-control" name="oetLname">
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" value="<?=$aVal['FTCusAddress']?>" class="form-control" name="oetAddress">
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" value="<?=$aVal['FTCusEmail']?>" class="form-control" name="oetEmail">
                        </div>

                        <div class="form-group">
                            <label for="">แผนก</label>
                            <select name="ocmDepart" class="form-control">
                                <option value="<?=$aVal['FTDepId']?>"><?=$aVal['FTDepName']?></option>
                                <option value="PHP">Programmer PHP</option>
                                <option value="C#">Programmer C#</option>
                                <option value="Python">Programmer Python</option>
                            </select>
                        </div>
                     <?php } ?>       
                        <div class="form-group">
                            <input type="submit" value="แก้ไข้" name="osmEdit" class="btn btn-primary btn-lg">
                            <a style="float:right ;" href="<?php echo base_url('') ?>" class="btn btn-primary btn-lg">กลับหน้าตาราง</a>
                        </div>

                    </form>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
        <?php require_once 'footer.php' ?>