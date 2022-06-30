<?php require_once 'header.php' ?>
<body>
    <div id="odvUpdate">
    <div class="container mt-4">
        <h1>Test CURD</h1>
        <hr>
        <div class="col-md-12"> <br>
        
        <a style="float:right ;" href="<?php echo base_url('') ?>" class="btn btn-info">กลับหน้าหลัก</a>
        <a id="oahExport" style="float:right ;" href="<?php echo base_url('masPDFEvenpdf') ?>" class="btn btn-info mr-4"><?=$this->lang->line('reportPDF');?></a>

        </div>
                    <table class="table table-hover table-bordered table table-hover mt-5" id="otbListview" >
                        <thead>
                            <tr>
                                <th width="20%">เดือน</th>
                                <th width="40%">แผนก</th>
                                <th width="40%">จำนวนเงิน</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($aUser as $aVal) {?> 
                            <tr>
                                <td><?= $aVal['Tmonth']?></td>
                                <input id="ohdMonth" type="hidden" values="<?= $aVal['Tmonth']?>">
                                <td><?= $aVal['FTDepName']?></td>
                                <input id="ohdDname" type="hidden" values="<?= $aVal['FTDepName']?>">
                                <td><?= $aVal['Nsalary']?></td>
                                <input id="ohdSalary" type="hidden" values="<?= $aVal['Nsalary']?>">
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
    </div>
    </div>
<?php require_once 'footer.php' ?>