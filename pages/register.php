<?php getHeader() ?>

    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">Registreeru võitlema</h3>
        </div>
        <div class="panel-body">
            <?php

            if (isset($contestant)):
                $code = register($contestant);
                ?>
                <div class="alert alert-success">
                    <b>Registreerimine on olnud edukas!</b>
                    <b>Sinu kood:<b></b>

                        <h3><?= $code ?></h3>
                </div>

            <?php
            else:
                ?>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <form method="post">
                        <div class="form-group ">
                            <label class="control-label " for="contestant">
                                Nimi
                            </label>
                            <input class="form-control" id="contestant" name="contestant"
                                   placeholder="V&otilde;istleja nimi"
                                   type="text"/>
                        </div>
                        <div class="form-group">
                            <div>
                                <button class="btn btn-primary " name="submit" type="submit">
                                    Registreeru
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