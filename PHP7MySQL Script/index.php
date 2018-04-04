<?php
require 'includes/header.php';  // include header section
/* Check if databse configuration file (connection.php) exist or not*/
if(file_exists('includes/connection.php')){
 require 'includes/function.php'; // if exist include the connection file
}else{
 header("Location: setup.php");  // else redirect to database setup screen
 die();
}
?>
		
			
  <!-- END STYLE CUSTOMIZER -->
  <!-- BEGIN PAGE HEADER-->
  <h3 class="page-title">
  Datatables
  </h3>
  
  <!-- END PAGE HEADER-->
  <!-- BEGIN PAGE CONTENT-->
  <div class="row">
      <div class="col-md-12">
          <!-- BEGIN EXAMPLE TABLE PORTLET-->
          <div class="portlet box grey-cascade">
              <div class="portlet-title">
                <div class="caption">
                <i class="fa fa-globe"></i>Table
                </div>
              </div>
              <div class="portlet-body">
                  <?php
                  $array = getData();
                  $rowHeadC = $array->fetch_assoc();
                  
                  if(count($rowHeadC) < 2 ){
                      echo "<a href='setup.php?importdata=true'>Import Sample Data</a>";
                  }else{
                  ?>
                  <table class="table table-striped table-bordered table-hover" id="sample_1">
                      <thead>
                        <tr>
                        <?php 
                        $rowHead = $array->fetch_assoc();
                        foreach($rowHead as $keyh=>$valueh){
                        echo "<th>".ucfirst(str_replace('_',' ',$keyh))."</th>";
                        }	
                        ?>	
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $array = getData();  
                        while($row = $array->fetch_assoc()) {
                        echo "<tr class='odd gradeX'>";
                        foreach($row as $key=>$value){
                        echo "<td>".$value."</td>";
                        }
                        echo "</tr>";
                        }
                        ?>
                      </tbody>
                  </table>
                  <?php } ?>
              </div>
          </div>
      <!-- END EXAMPLE TABLE PORTLET-->
      </div>
</div>
<?php
require 'includes/footer.php'; // include footer section
?>			
		