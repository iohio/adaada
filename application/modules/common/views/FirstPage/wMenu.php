<?php require_once 'header.php' ?>
<body>
<div id="odvUpdate">
    <div class="container mt-4">
        <h1>Test CURD</h1>
        <hr>
        <p><a href="?lang=th">TH</a>|<a href="?lang=en">EN</a></p>  

        <div class="col-md-12"> <br>
        <!-- Add Data -->
        <a id="oahAdd" style="float:right ;margin-left:8px;" href="<?php echo base_url('masEMPPageAdd') ?>" class="btn btn-info"><?=$this->lang->line('add');?></a>
        <!-- RabbitMQ -->
        <a id="oahQadd" style="float:right ; margin-right:5px;" href="<?php echo base_url('masRBCEventAddQueue') ?>" class="btn btn-info"><?=$this->lang->line('addrabbit');?></a>
        <a id="oahQget" style="float:right ; margin-right:5px;" href="<?php echo base_url('masRBCEventGetQueue') ?>" class="btn btn-info"><?=$this->lang->line('getrabbit');?></a>
        <a id="oahQdel" style="float:right ; margin-right:5px;" href="<?php echo base_url('masRBCEventDelQueue') ?>" class="btn btn-info"><?=$this->lang->line('delrabbit');?></a>
        <!-- Export -->
        <a id="oahExport" style="float:right ;" href="<?php echo base_url('masEMPEvenReport') ?>" class="btn btn-info mr-4"><?=$this->lang->line('report');?></a>
        <a id="oahExportPdf" style="float:right ;" target = '_blank' href="<?php echo base_url('masPDFEvenpdf') ?>" class="btn btn-info mr-4"><?=$this->lang->line('reportPDF');?></a>

        <!-- Search Test -->
        <input type="text" id="oetSearch" >
        <button id="obtSearch" class="btn btn-primary"><?=$this->lang->line('search');?></button>

        </div>
					<br>
                    <table class="table table-hover table-responsive table-bordered table table-hover" id="otbListview" >
                        <thead>
                            <tr>
                                <th width="15%"><?=$this->lang->line('pic');?></th>
                                <th width="10%"><?=$this->lang->line('name');?></th>
                                <th width="10%"><?=$this->lang->line('lastname');?></th>
                                <th width="20%"><?=$this->lang->line('email');?></th>
                                <th width="15%"><?=$this->lang->line('province');?></th>
                                <th width="15%"><?=$this->lang->line('depart');?></th>
                                <th width="10%" style="text-align:center ;"><?=$this->lang->line('editu');?></th>
                                <th width="10%" style="text-align:center ;"><?=$this->lang->line('del');?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($aUser as $aVal) {
                            ?>
                            <tr>
                                <td>
                                    <img src="<?php echo base_url('img')?>/<?= $aVal['FTCusPic']?>" alt="" width="100px">
                                </td>
                                <td><a href="<?php echo base_url('masEMPPageSalary/'.$aVal['FNCusId']) ?>"><?= $aVal['FTCusName'];?></a></td>
                                <td><?= $aVal['FTCusLastName'];?></td>
                                <td><?= $aVal['FTCusEmail'];?></td>
                                <td><?= $aVal['FTCusAddress'];?></td>
                                <td><?= $aVal['FTDepId']; ?></td>
                                <td style="text-align:center;"><a href="<?php echo base_url('masEMPPageEdit/'.$aVal['FNCusId']) ?>" class="btn btn-info btn-sm"><?=$this->lang->line('editu');?></a></td>
                                <td style="text-align:center;"><a href="<?php echo base_url('masEMPEvenDelete/'.$aVal['FNCusId']) ?>" class="btn btn-dark btn-sm" onclick="return confirm('ยืนยันที่จะลบข้อมูล');">ลบ</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
          </div>
    </div>
    <script>
         $("#oahQadd").click(function() {
            alert('Add Q');
        });
    </script>
    <?php require_once 'footer.php' ?>