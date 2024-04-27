
  <?php
                $con= mysqli_connect('localhost', 'root', '', 'watcher');

$pid= $_POST['pid'];
  $sql = "select * from product where product_id='".$pid."'";
        $res = mysqli_query($con, $sql);
        while ($data = mysqli_fetch_array($res)) { ?>


      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLongTitle"><?php echo $data["product_name"]?></h2>
        <button type="button button-light" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body m-2">
      <h4 class="text-warning"><?php  echo $data["product_description"] ?></h4>
      </div>
     
  <?php  }?>