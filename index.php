<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if(isset($_SESSION['message'])){?>
            <div class="alert alert-<?= $_SESSION['message_type']?>
             alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <div class="tenor-gif-embed" data-postid="9657987" data-share-method="host" data-width="100%" data-aspect-ratio="1.8241758241758241"><a href="https://tenor.com/view/dr-simi-gif-9657987">Dr Simi GIF</a> from <a href="https://tenor.com/search/dr-gifs">Dr GIFs</a></div><script type="text/javascript" async src="https://tenor.com/embed.js"></script>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php session_unset();}?>

            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Paciente" autofocus>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="description" class="form-control" rows="2"
                                placeholder="Descripción del paciente"></textarea>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save task">
            </div>
        </div>
        </form>

    <div class="col-lg-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Paciente</th>
                            <th>Descripción</th>
                            <th>Creada el</th>
                            <th>Acciones</th>
                        </tr>
                        <tbody>
                            <?php
                                $query ="SELECT * FROM task";
                                $result_task = mysqli_query($conn,$query);
                                
                                while($row=mysqli_fetch_array($result_task)){?>
                                    <tr>
                                        <td><?php echo $row['title'];?></td>
                                        <td><?php echo $row['description'];?></td>
                                        <td><?php echo $row['created_at'];?></td>
                                        <td>
                                            <a class="btn btn-secondary" href="edit.php?id=<?php echo $row['id'] ?>">
                                                <i class="fas fa-marker"></i>
                                            </a>
                                            <a class="btn btn-danger" href="delete_task.php?id=<?php echo $row['id'] ?>">
                                                <i class="fa fa-tash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                
                                <?php } ?>
                        </tbody>
                    </thead>
                </table>
    </div>
    </div>

</div>

<?php include('includes/footer.php') ?>