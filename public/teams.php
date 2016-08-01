<?php
require __DIR__ . '/../src/Input.php';

function pageController()
{   
  $sql = "SELECT * FROM teams";
  $query = Input::get('team_or_stadium', '');
  $sort = Input::get('sort_by', '');
  
    // Copy the query and test it in SQL Pro
  if (Input::has('team_or_stadium')) {
    $sql .= " WHERE name LIKE '%$query%' OR stadium LIKE '%$query%'";
  }
  if (Input::has('sort_by')) {
    // Concatenate the WHERE clause that orders the teams by name, league or
    // stadium.
    $sql .= " ORDER BY $sort ASC;";
  }
  // $page = Input::get('page', 1) < 0 ? 1 : Input::get('page');
  $page = max([Input::get('page', 1), 1]);
  $offset = $page * 5 - 5;
  $sql .= " LIMIT 5 OFFSET $offset";
  var_dump($sql);
  return [
  'title' => 'Teams',
  'query' => $query,
  'sort' => $sort,
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
    <div class="row">
      <div class="col-md-8">
        <header class="page-header">
          <h1>Teams</h1>
        </header>
      </div>
      <div class="col-md-4" style="padding-top: 3.5em">
        <form class="form-inline" method="get">
          <div class="form-group">
            <input
            type="text"
            class="form-control"
            id="team"
            name="team_or_stadium"
            placeholder="Team or Stadium">
          </div>
          <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search" aria-hidden="true">
            </span>
            Search
          </button>
        </form>
      </div>
    </div>
    <div class="row">
      <form method="post" action="delete-teams.php">
        <table class="table table-striped table-hover table-bordered">
          <thead>
            <tr>
              <th>Delete</th>
              <th>
                <a href="?team_or_stadium=<?= $query ?>&sort_by=name">Team</a>
              </th>
              <th>
                <a href="?team_or_stadium=<?= $query ?>&sort_by=stadium">Stadium</a>
              </th>
              <th>
                <a href="?team_or_stadium=<?= $query ?>&sort_by=league">League</a>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <input type="checkbox" name="teams[]" value="1">
              </td>
              <td>
                <a href="team-details.php?team_id=1">
                  Red Sox
                </a>
              </td>
              <td>Fenway Park</td>
              <td>American</td>
            </tr>
            <tr>
              <td>
                <input type="checkbox" name="teams[]" value="2">
              </td>
              <td>
                <a href="team-details.php?team_id=2">
                  Texas Rangers
                </a>
              </td>
              <td>Global Life Park</td>
              <td>American</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4">
                <!-- The values in this pagination control indicate you're currently viewing page 2 -->
                <nav aria-label="Page navigation" class="text-center">
                  <ul class="pagination">
                    <li>
                      <a href="?page=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <li><a href="?page=1">1</a></li>
                    <li><a href="?page=2">2</a></li>
                    <li><a href="?page=3">3</a></li>
                    <li><a href="?page=4">4</a></li>
                    <li><a href="?page=5">5</a></li>
                    <li>
                      <a href="?page=3" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </td>
            </tr>
          </tfoot>
        </table>
        <button type="submit" class="btn btn-danger">
          <span class="glyphicon glyphicon-trash"></span>
          Delete
        </button>
        <a href="new-team.php" class="btn btn-primary">
          <span class="glyphicon glyphicon-plus"></span>
          Add a new team
        </a>
      </form>
    </div>
  </div>
  <?php include '../partials/scripts.phtml' ?>
</body>
</html>
