<?php getHeader() ?>

<?php
if (isset($username, $password)) {
    login($username, $password);
    //Refreshime selleks, et logi välja nupp tuleks menüüsse
    header('Location: index.php?page=admin');
}
?>
<?php if (!isLoggedIn()): ?>

    <div class="col-md-6 col-sm-6 col-xs-12">
        <form method="post">
            <div class="form-group ">
                <label class="control-label " for="username">
                    Kasutaja
                </label>
                <input class="form-control" id="username" name="username" placeholder="Admin" type="text"/>
            </div>
            <div class="form-group ">
                <label class="control-label " for="password">
                    Parool
                </label>
                <input class="form-control" id="password" name="password" type="password" placeholder="*********"/>
            </div>
            <div class="form-group">
                <div>
                    <button class="btn btn-primary " name="submit" type="submit">
                        Logi sisse
                    </button>
                </div>
            </div>
        </form>
    </div>
<?php else: ?>
<div class="row">
        <h2>Võistlejad</h2>

        <table class="table table-hover table-striped">

            <thead>
            <tr>
                <th>Id</th>
                <th>Nimi</th>
                <th>Number</th>
                <th>Kinnitatud</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach (getContestants() as $row) {
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['code'] ?></td>
                    <td><?= $row['is_confirmed'] ?></td>
                    <td><a href="index.php?page=admin&action=delete&id=<?= $row['id'] ?>">kustuta</a></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>

<?php

if (isset($action, $id)) {
    handleDelete($action, $id);
}

?>
    
<?php endif; ?>
<?php getFooter() ?>