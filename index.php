<?php

    include 'action.php';

?>    

<?php include('inc/header.php'); ?>


<?php include('inc/navtop.php'); ?>
<br>

<div class="container">
    <div class="row">

        <div class="col-md-4" id="content">
        
            <?php if(isset($_GET["updatebook"])){
		        if(isset($_GET["id"])){
				    $id = $_GET["id"];
				}
				$where = array("book_id"=>$id);
				$row = $obj->select_record("books",$where);
		    ?>

            <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Book</h3>
            </div>
            <div class="panel-body">

                <form action="<?= ROOT_URL; ?>action.php" method="POST">
                <input class="form-control" type="hidden" name="book_id" value="<?= $row['book_id']; ?>"><br>
                <input class="form-control" type="text" name="book_name" value="<?= $row['book_name']; ?>" placeholder="Book Title" required><br>
                <input class="form-control" type="text" name="author" value="<?= $row['author']; ?>" placeholder="Author" required><br>
                <input class="form-control" type="date" name="published" value="<?= $row['published']; ?>" placeholder="Date Published" required><br>
                <input class="form-control" type="text" name="no_pages" value="<?= $row['no_pages']; ?>" placeholder="No. of Pages" required><br>
                <input class="form-control" type="email" name="email" value="<?= $row['email']; ?>" placeholder="Email" required><br>
                
                <select class="form-control" name="category">

                    <?php $myrow = $obj->fetch_record('genre'); ?>
                    <?php foreach($myrow as $row1) : ?>
                        <?php if($row['genre_id'] == $row1['genre_id']) :?>
                            <option value="<?= $row1['genre_id']; ?>" selected="selected"><?= $row1['genre']; ?></option>
                        <?php else: ?>
                            <option value="<?= $row1['genre_id']; ?>"><?= $row1['genre']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </select><br>

                <input class="btn btn-default pull-right" type="submit" name="edit_book" value="Update Book">
                </form><br>

            </div><!--close panel body-->
            </div><!--close panel-->

        <?php }else{ ?>


            <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add New Book</h3>
            </div>
            <div class="panel-body">

                <form action="<?= ROOT_URL; ?>action.php" method="POST"><br>
                <input class="form-control" type="text" name="book_name" placeholder="Book Title" required><br>
                <input class="form-control" type="text" name="author" placeholder="Author" required><br>
                <input class="form-control" type="date" name="published" placeholder="Date Published" required><br>
                <input class="form-control" type="text" name="no_pages" placeholder="No. of Pages" required><br>
                <input class="form-control" type="email" name="email" placeholder="Email" required><br>
                
                <select class="form-control" name="category">

                    <?php $myrow = $obj->fetch_record_all('genre'); ?>
                    <?php foreach($myrow as $row) : ?>
                        <option value="<?= $row['genre_id']; ?>"><?= $row['genre']; ?></option>
                    <?php endforeach; ?>

                </select><br>

                <input class="btn btn-default pull-right" type="submit" name="submit" value="Store Book">
                </form><br>

             </div><!--close panel body-->
            </div><!--close panel-->


        <?php } ?>

       </div>

       <div class="col-md-8">

             <table class="table hover" id="mytable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Email</th>
                        <th>Genre</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                    <tr>
                        <?php $myrow = $obj->fetch_books('books','genre'); ?>
                        <?php foreach($myrow as $row) : ?>
                       
                        <td><?= $row['book_id']; ?></td>
                        <td><?= $row['book_name']; ?></td>
                        <td><?= $row['author']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['genre']; ?></td>
                        <td><a href="<?= ROOT_URL; ?>index.php?updatebook=1&id=<?= $row["book_id"]; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                        <td><a href="<?= ROOT_URL; ?>index.php?deletebook=1&id=<?= $row["book_id"]; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                        
                    </tr>

                <?php endforeach; ?>

            </table>


        </div>
        
    </div>
</div>



<?php include('inc/footer.php'); ?>



