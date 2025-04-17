<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Records</title>
    <link rel="stylesheet" href="/Login-Register/css/table.css">
    <link rel="icon" href="/Login-Register/icon/syt_logo_3qq_icon.ico">
</head>
<body>

    <div class="container">
        <div class="form-section">
            <label for="Email">Email</label>
            <input type="text" id="email">
            
            <label for="Phone">Phone</label>
            <input type="text" id="phone">
            
            <label for="Username">Username</label>
            <input type="text" id="username">

            <label for="Password">Password</label>
            <input type="text" id="password">
        </div>

        <div class="table-section">
            <div class="title-section">
                <h1>Register Records</h1>
                <h2>Created by Jhon Ladines</h2>
            </div>
            <table id="data-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all"></th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Username</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                <?php include '../Database/table/tabledb.php'; ?>
                </tbody>
            </table>

            <div class="button-container">
                <button>Add</button>
                <button onclick="deleteSelected()">Delete</button>
                <button>Update</button>
                <button>Clear</button>
                <button>Print</button>
                <button onclick="confirmLogout()">Logout</button>
            </div>
        </div>
    </div>
    <script src="../js/table.js"></script>
</body>
</html>