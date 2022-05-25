<? 
include 'header.php'
?>
<body>
    <div id="odvUpdate">
    <div class="container mt-4">
        <h1>Test CURD</h1>
        <hr>

        <div class="col-md-12"> <br>
        <a style="float:right ;" href="<?php echo base_url('masPDTPageAdd') ?>" class="btn btn-info">เพิ่มข้อมูล</a>
					
                        <input type="text" id="oetSearch">
                        <button id="obtSearch" class="btn btn-primary">Search</button>
                    </div>
					<br>
                    <table class="table table-hover table-responsive table-bordered table table-hover" id="otbListview" >
                        <thead>
                            <tr>
                                <th width="15%">รูปภาพ</th>
                                <th width="10%">ชื่อ</th>
                                <th width="10%">นามสกุล</th>
                                <th width="25%">Email</th>
                                <th width="15%">จังหวัด</th>
                                <th width="15%">แผนก</th>
                                <th width="5%" style="text-align:center ;">แก้ไข</th>
                                <th width="10%" style="text-align:center ;">ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($aUser as $aVal) {
                            ?>
                            <tr>
                                <td>
                                    <img src="<?php echo base_url('img')?>/<?= $aVal['pic_name']?>" alt="" width="100px">
                                </td>
                                <td><a href="<?php echo base_url('masPDTPageSalary/'.$aVal['id']) ?>"><?= $aVal['name'];?></a></td>
                                <td><?= $aVal['lastn'];?></td>
                                <td><?= $aVal['email'];?></td>
                                <td><?= $aVal['address'];?></td>
                                <td><?= $aVal['d_name']; ?></td>
                                <td style="text-align:center;"><a href="<?php echo base_url('masPDTPageEdit/'.$aVal['id']) ?>" class="btn btn-info btn-sm">แก้ไข</a></td>
                                <td style="text-align:center;"><a href="<?php echo base_url('masPDTEvenDelete/'.$aVal['id']) ?>" class="btn btn-dark btn-sm" onclick="return confirm('ยืนยันที่จะลบข้อมูล');">ลบ</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
    </div>
    </div>
<? include 'footer.php' ?>