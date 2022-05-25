<? 
include 'header.php'
?>
<body>
    <div id="odvUpdate">
    <div class="container mt-4">
        <h1>Test CURD</h1>
        <hr>
        <div class="col-md-12"> <br>
        <a style="float:right ;" href="<?php echo base_url('') ?>" class="btn btn-info">กลับหน้าหลัก</a>
            <?php foreach($aUser as $aVal) {?>
                <h2>name: <?= $aVal['name']?></h2>
               
                    </div>
					<br>
                    <table class="table table-hover table-bordered table table-hover mt-5" id="otbListview" >
                        <thead>
                            <tr>
                                <th width="20%">เดือน</th>
                                <th width="40%">แผนก</th>
                                <th width="40%">จำนวนเงิน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $aVal['Tmonth']?></td>
                                <td><?= $aVal['d_name']?></td>
                                <td><?= $aVal['Nsalary']?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
    </div>
    </div>
<? include 'footer.php' ?>