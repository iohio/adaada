<?php require_once 'header.php' ?>
<body>
<div id="odvUpdate">
<h3>  ?>  </h3> 
<table class="table table-hover table-responsive table-bordered table table-hover" id="otbListview" >
                        <thead>
                            <tr>
                               <th width="33.3%">ID</th>
                               <th width="33.3%">NAME</th>
                               <th width="33.3%">ADDRESS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($User as $aVal) {
                            ?>
                            <tr>
                                <td><?=$aVal['id']?></td>
                                <td><?=$aVal['name']?></td>
                                <td><?=$aVal['address']?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>  
</div>
  
    <?php require_once 'footer.php' ?>