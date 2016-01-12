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
        <a class="btn btn-lg" href="index.php?page=admin&action=confirm">Test</a>
    </div>
	  <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Läbitud kontrollpunktid</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
					
                            
<?php endif; ?>
<?php getFooter() ?>