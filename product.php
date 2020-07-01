<?php
require ('header.inc.php');
$type="";
if(isset($_GET['type']) && $_GET['type']!=""){
    $type = get_safe_value($conn,$_GET['type']);
    if($type=='status'){
        $operation = get_safe_value($conn,$_GET['operation']);
        $id = get_safe_value($conn,$_GET['id']);
        if($operation=='active'){
            $status='1';
        }else{
            $status='0';
        }
        $update_status = "update product set status='$status' where id='$id'";
    mysqli_query($conn,$update_status);
    }
    
}
if($type=='delete'){
        $id = get_safe_value($conn,$_GET['id']);
        $delete_sql = "delete from product where id='$id'";
        mysqli_query($conn,$delete_sql);
         
    }
$sql="select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id desc";
$res = mysqli_query($conn,$sql);



?>         
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Products </h4>
                           <h4 class="box-link"><a href="add_product.php">Add Product</a></h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>Id</th>
                                       <th>Categories_id</th>
                                       <th>Name</th>
                                       <th>MRP</th>
                                       <th>Price</th>
                                       <th>Qty</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   <?php 
                                     $i=1;
                                     while($row=mysqli_fetch_assoc($res)){
                                     ?>
                                    <tr>
                                       <td class="serial"><?php echo $i ?></td>
                                       <td><?php echo $row['id']?></td>
                                       <td> <span class="name"><?php echo $row['categories']?></span> </td>
                                       <td> <span class="name"><?php echo $row['name']?></span> </td>
                                       <td> <span class="name"><?php echo $row['mrp']?></span> </td>
                                       <td> <span class="name"><?php echo $row['price']?></span> </td>
                                       <td> <span class="name"><?php echo $row['qty']?></span> </td>
                                       <td>
                                        <?php
                                    if($row['status']==1){
                                    echo "<a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a>&nbsp;";
                                    }else{
                                    echo "<a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a>&nbsp;";
                                     }
                                    echo "<a href='?type=delete&id=".$row['id']."'>Delete</a>";
                                    echo "&nbsp<a href='add_product.php?type=edit&id=".$row['id']."'>Edit</a>";
                                          ?>
                                       </td>
                                    </tr>
                                    <?php  } ?>
                                </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         <div class="clearfix"></div>
<?php
require ('footer.inc.php');
?>