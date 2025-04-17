document.getElementById('select-all').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.row-select');
    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
});

function confirmLogout() {
    var confirmation = confirm("Are you sure you want to logout?");
    if (confirmation) {
        window.location.href = "/index.php";
    }
}

function deleteSelected() {
    const checkboxes = document.querySelectorAll('.row-select:checked');
    if (checkboxes.length === -1) {
        alert('No rows selected');
        return;
    }
    const emails = Array.from(checkboxes).map(checkbox => checkbox.getAttribute('data-email'));
    if (confirm('Are you sure you want to delete the selected records?')) {
        fetch('../Database/table/delete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ emails })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error deleting records');
                }
            });
    }
}

document.querySelectorAll('#data-table tbody tr').forEach(row => {
    row.addEventListener('click', function() {
        const cells = this.querySelectorAll('td');
        document.getElementById('email').value = cells[1].innerText;
        document.getElementById('phone').value = cells[2].innerText;
        document.getElementById('username').value = cells[3].innerText;
        document.getElementById('password').value = cells[4].innerText;
    });
});

function updateRecord() {
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (!email || !phone || !username || !password) {
        alert('Please fill in all fields');
        return;
    }

    if (confirm('Are you sure you want to update this record?')) {
        fetch('../Database/table/update.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ email, phone, username, password })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error updating record');
                }
            });
    }
}

document.querySelector('.button-container button:nth-child(3)').addEventListener('click', updateRecord);

function addRecord() {
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (!email || !phone || !username || !password) {
        alert('Please fill in all fields');
        return;
    }

    fetch('../Database/table/add.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ email, phone, username, password })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error adding record: ' + data.message);
            }
        });
}

document.querySelector('.button-container button:nth-child(1)').addEventListener('click', addRecord);

function clearFields() {
    const checkboxes = document.querySelectorAll('.row-select');
    checkboxes.forEach(checkbox => checkbox.checked = false);
    document.getElementById('email').value = '';
    document.getElementById('phone').value = '';
    document.getElementById('username').value = '';
    document.getElementById('password').value = '';
}

document.querySelector('.button-container button:nth-child(4)').addEventListener('click', clearFields);

function printTable() {
    const printWindow = window.open('', '', 'height=600,width=800');
    printWindow.document.write('<html><head><title>Print Table</title>');
    printWindow.document.write('<style>');
    printWindow.document.write('table { width: 100%; border-collapse: collapse; }');
    printWindow.document.write('th, td { border: 1px solid black; padding: 5px; text-align: left; }');
    printWindow.document.write('th { background-color: #eaeaea; }');
    printWindow.document.write('</style></head><body>');
    printWindow.document.write('<h2>Register records</h2>');
    printWindow.document.write(document.getElementById('data-table').outerHTML);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}

document.querySelector('.button-container button:nth-child(5)').addEventListener('click', printTable);