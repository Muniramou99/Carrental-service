<?php
include_once "../php/cardb_connect.php";
if(isset($_POST['division_id'])){
    $division_id=$_POST['division_id'];
    $sql=mysqli_query($connect,"select * from district where division_id='$division_id'order by district_name");
    ?>
    <select name="district" class="form-control">
        <option value="">select district</option>
        <?php
        while($row=mysqli_fetch_array($sql)){
            ?>
            <option value="<?php echo $row['ID'];?>"><?php echo $row['district_name'];?></option>
            <?php

        }
        ?>
    </select>
    <?php
}
if(isset($_POST['dis_division_id']) && isset($_POST['district_id']) ){
    $dis_division_id=$_POST['dis_division_id'];
    $district_id=$_POST['district_id'];
    

    $sql=mysqli_query($connect,"select * from thana where  district_id='$district_id' and 
    division_id='$dis_division_id' order by thana_name");
    ?>
    <select name="thana" class="form-control">
        <option value="">select thana</option>
        <?php
        while($row=mysqli_fetch_array($sql)){
            ?>
            <option value="<?php echo $row['ID'];?>"><?php echo $row['thana_name'];?></option>
            <?php

        }
        ?>
    </select>
   <?php 
}




?>