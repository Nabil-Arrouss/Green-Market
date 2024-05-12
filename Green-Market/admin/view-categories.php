<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Market - View Categories</title>
</head>
<body>
    <h3 class="text-center text-success">All categories</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-success">
            <tr class="text-center">
                <th>Sl No</th>
                <th>Category Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
                $select_category="SELECT * FROM categories";
                $result=mysqli_query($con, $select_category);
                $number=0;
                while($row=mysqli_fetch_assoc($result)){
                    $category_id=$row['category_id'];
                    $category_title=$row['category_title'];
                    $number++;
            
            ?>

            <tr class="text-center">
                <td><?php echo $number; ?></td>
                <td><?php echo $category_title; ?></td>
                <td><a href='index.php?edit_category=<?php echo $category_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_category=<?php echo $category_id; ?>'type="button" class="text-light"
                 data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
                }?>
                
        </tbody>
    </table>


<!-- bootsrap Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are You sure you want to Delete This?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view-categories" 
        class='text-light text-decoration-none'>No</a></button>
        <button type="button" class="btn btn-success"><a
        href='index.php?delete_category=<?php echo $category_id; ?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>
</body>
</html>