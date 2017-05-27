<?php

    include 'action.php';

?>    

<?php include('inc/header.php'); ?>


<?php include('inc/navtop.php'); ?>
<br>
<div class="container">
    <div class="row">

        <div class="col-md-4" id="content">
            
            <?php if(isset($_GET["updategenre"])){
		        if(isset($_GET["id"])){
				    $id = $_GET["id"];
				}
				$where = array("genre_id"=>$id);
				$row = $obj->select_record("genre",$where);
		    ?>

                <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Genre</h3>
                </div>
                <div class="panel-body">

                    <form action="<?= ROOT_URL; ?>action.php" method="POST">
                    <input type="hidden" name="genre_id" value="<?= $row['genre_id']; ?>"><br>
                    <input class="form-control" type="text" name="genre" value="<?= $row['genre']; ?>" placeholder="Genre"><br>
                    <input class="form-control" type="text" name="description" value="<?= $row['description']; ?>" placeholder="Description"><br>
                    <input class="btn btn-default pull-right" type="submit" name="edit_genre" value="Update Genre">
                    </form><br>

                </div><!--close panel body-->
                </div><!--close panel-->

            <?php }else{ ?>

                <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add New Genre</h3>
                </div>
                <div class="panel-body">

                    <form action="<?= ROOT_URL; ?>action.php" method="POST">
                    <br>
                    <input class="form-control" type="text" name="genre" placeholder="Genre"><br>
                    <input class="form-control" type="text" name="description" placeholder="Description"><br>
                    <input class="btn btn-default pull-right" type="submit" name="submit_genre" value="Store Genre">
                    </form><br>

                </div><!--close panel body-->
                </div><!--close panel-->


            <?php } ?>

       </div>

       <div class="col-md-8">

            <table class="table" id="mytable1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Genre</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                    <tr>
                        <?php $myrow = $obj->fetch_record('genre'); ?>
                        <?php foreach($myrow as $row) : ?>
                        <td><?= $row['genre_id']; ?></td>
                        <td><?= $row['genre']; ?></td>
                        <td><?= $row['description']; ?></td>

                        <?php if($row['genre_id'] != 1) :?>                        
                            <td><a href="<?= ROOT_URL; ?>genre.php?updategenre=1&id=<?= $row["genre_id"]; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                            <td><a href="<?= ROOT_URL; ?>genre.php?deletegenre=1&id=<?= $row["genre_id"]; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                        <?php else: ?>
                            <td><i class="fa fa-ban" aria-hidden="true"></i></td>
                            <td><i class="fa fa-ban" aria-hidden="true"></i></td>
                        <?php endif; ?>
                    </tr>

                <?php endforeach; ?>

            </table>

        </div>
        
    </div>
</div>


<?php include('inc/footer.php'); ?>




