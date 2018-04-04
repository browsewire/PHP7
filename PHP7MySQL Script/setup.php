<?php
require 'includes/header.php'; // include Header section
require 'includes/config.php';

?>

<div class="login-form">
    <div class="login-form-inner">
      <h1>Configure DataBase</h1>
      <?php 
      /*Show error ot status messages*/
      if(isset($error) && $error!=''){
        foreach($error as $list){
            echo "<p class='error'>".$list."</p>";
        }
      } 
      ?>
      <!--- Database configuratin form  -->
      <form name="config" action="" method="post">
        <label>Servername*</label>
        <input type="text" name="servername" placeholder="localhost" value="<?php echo @$_POST['servername'];?>">
        <label>Username*</label>
        <input type="text" name="username" placeholder="root" value="<?php echo @$_POST['username'];?>">
        <label>Password</label>
        <input type="password" name="password" placeholder="" value="<?php echo @$_POST['password'];?>">
        <label>DataBase Name*</label>
        <input type="text" name="dbname" placeholder="sampledata" value="<?php echo @$_POST['dbname'];?>">
        <input class="button" type="submit" name="saveconfig" value="Save">
      </form>
    </div>
</div>

<?php
require 'includes/footer.php'; // include footer section
?>