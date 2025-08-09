document.addEventListener('DOMContentLoaded', function () {
    // Placeholder data for reservations
    const reservations = [
        { name: 'John Doe', email: 'john@example.com', phone: '123-456-7890', date: '2023-11-25', time: '18:30', partySize: 4, foodOrder: 'Pasta, Salad, Water' },
        { name: 'Jane Smith', email: 'jane@example.com', phone: '987-654-3210', date: '2023-11-26', time: '19:00', partySize: 2, foodOrder: 'Steak, Dessert, Soda' },
        // Add more reservations as needed
    ];

    // Placeholder for real-time notifications
    const notificationsElement = document.getElementById('notifications');

    // Function to display reservations in the table
    function displayReservations() {
        const tbody = document.querySelector('table tbody');
        tbody.innerHTML = '';

        reservations.forEach(reservation => {
            const row = `<tr>
                            <td>${reservation.name}</td>
                            <td>${reservation.email}</td>
                            <td>${reservation.phone}</td>
                            <td>${reservation.date}</td>
                            <td>${reservation.time}</td>
                            <td>${reservation.partySize}</td>
                            <td>${reservation.foodOrder}</td>
                        </tr>`;
            tbody.innerHTML += row;
        });
    }

    // Function to simulate real-time reservation notifications
    function simulateNotifications() {
        setTimeout(() => {
            const newReservation = { name: 'New Customer', time: '18:30', date: '2023-11-27' };
            notificationsElement.innerHTML = `<p>New reservation: ${newReservation.name} at ${newReservation.time} on ${newReservation.date}</p>`;
        }, 5000); // Simulating a new reservation notification after 5 seconds
    }

    // Function to handle table click events
    function handleTableClick(event) {
        const tableId = event.target.dataset.tableId;
        if (tableId) {
            alert(`Clicked on table ${tableId}`);
            // You can implement further actions for table management here
        }
    }

    // Attach event listeners
    document.querySelector('.floor-plan').addEventListener('click', handleTableClick);

    // Initial setup
    displayReservations();
    simulateNotifications();
});
    function simulateNotifications() {
        setTimeout(() => {
            const notificationsElement = document.getElementById('notifications');
            notificationsElement.innerHTML = '<p>New reservation: John Doe at 18:30 on 2023-11-27</p>';
        }, 5000); // Simulating a new reservation notification after 5 seconds
    }

    // Function to handle table click events
    function handleTableClick(event) {
        const tableId = event.target.dataset.tableId;
        if (tableId) {
            // Redirect to the table management page with the table ID as a query parameter
            window.location.href = `tablem.html?tableId=${tableId}`;
        }
    }

    // Attach event listener for table clicks
    document.querySelector('.floor-plan').addEventListener('click', handleTableClick);

    // Initial setup
    simulateNotifications();



