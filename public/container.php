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
                    <th>Team</th>
                    <th>League</th>
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
                    <td>American</td>
                </tr>
                </tbody>
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