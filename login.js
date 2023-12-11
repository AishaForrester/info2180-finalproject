document.addEventListener('DOMContentLoaded', function () {
    const ContactsTable = document.querySelector('.contacts-table tbody');

    fetch('your-php-script.php')
        .then(response => response.json())
        .then(data => {
            // Clear existing table rows
            ContactsTable.innerHTML = '';

            // Populate the table with fetched data
            data.forEach(contact => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${contact[0]}</td>
                    <td>${contact[1]}</td>
                    <td>${contact[2]}</td>
                    <td>${contact[3]}</td>
                `;
                ContactsTable.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
});