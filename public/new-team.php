<?php
require __DIR__ . '/../src/Input.php';

function pageController()
{
    $name = Input::get('name', '');
    $league = Input::get('league', '');
    $stadium = Input::get('stadium', '');
    if (Input::isPost()) {
        // Write the INSERT statement to insert a team
        // Either interpolate or concatenate the PHP variables
        $insert = "INSERT INTO teams(name, stadium, league) VALUES('$name', '$stadium', '$league');";
        // Copy the resulting query and verify that it runs using the terminal
        var_dump($insert);
    }
    return [
        'title' => 'New Team',
        'name' => $name,
        'league' => $league,
        'stadium' => $stadium
    ];
}
extract(pageController());
?>
<!DOCTYPE html>
<html>
<head>
    <?php include '../partials/head.phtml' ?>
</head>
<body>
<div class="container">
    <div class="Row">
        <div class="page-header"><h1>New Team</h1></div>
        <form method="post" class="form-horizontal">
            <?php include '../partials/team-form.phtml' ?>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true">
                        </span>
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include '../partials/scripts.phtml' ?>
</body>
</html>
