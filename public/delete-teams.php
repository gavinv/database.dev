<?php
require __DIR__ . '/../src/Input.php';

function pageController()
{
    $teams = Input::get('teams', []);  
    $ids = implode(', ', $teams);
    foreach ($teams as $teamId) {
        // Generate the DELETE statement for each team_id
        $delete = "DELETE FROM teams WHERE id ()";
        // Copy and paste the statements in SQL PRO and verify they're correct.
        var_dump($delete);
    }

    // In a real scenario you would normally redirect to the list of teams.
    // header('Location: teams.php');
}
pageController();
