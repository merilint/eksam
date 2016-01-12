<?php getHeader() ?>

    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">Läbi kontrollpunkti</h3>
        </div>
        <div class="panel-body">
            <?php

            if (isset($code, $x, $y)):

                $success = registerCheckpoint($code, $x, $y);
                if ($success === true) {
                    ?>
                    <div class="alert alert-success">
                        <b>Punkt edukalt läbitud!</b>
                    </div>
                <?php
                } else {
                    ?>
                    <div class="alert alert-danger">
                        <b>Läbimine ebaõnnestus!</b>
                        <b>Viga:<b></b>

                            <h3><?= $success ?></h3>
                    </div>
                <?php
                }
            else:
                ?>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <form method="post">
                        <div class="form-group ">
                            <label class="control-label " for="contestant">
                                Sinu kood
                            </label>
                            <input class="form-control" id="contestant" name="code"
                                   placeholder="12345"
                                   type="text"/>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="contestant">
                                X
                            </label>
                            <input class="form-control" id="contestant" name="x"
                                   placeholder="12"
                                   type="text"/>
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="contestant">
                                y
                            </label>
                            <input class="form-control" id="contestant" name="y"
                                   placeholder="45"
                                   type="text"/>
                        </div>
                        <div class="form-group">
                            <div>
                                <button class="btn btn-primary " name="submit" type="submit">
                                    Läbi punkti
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>



<?php getFooter() ?>