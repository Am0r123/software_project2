<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }

        .container {
            display: flex;
            width: 100%;
        }

        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #ff0000;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 10px 0;
            cursor: pointer;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            display: block;
            padding: 10px;
            border-radius: 5px;
        }

        .sidebar ul li a:hover, .sidebar ul li a.active {
            background-color: #ff0000;
            color: #fff;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #fff;
            overflow-y: auto;
        }

        .main-content h2 {
            font-size: 24px;
            margin: 40px 0px;
            color: #333;
        }

        .notification-details {
            background-color: rgb(229, 229, 229);
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 10px;
            position: relative;
            max-width: 75%;
            word-wrap: break-word;
        }

        .notification-details h3 {
            margin: 0 0 10px;
            font-size: 18px;
            color: #333;
        }

        .notification-details p {
            margin: 0 0 5px;
            color: #555;
        }

        .timestamp {
            font-size: 12px;
            color: #999;
            text-align: right;
        }
    </style>
</head>
<?php include(__DIR__ . '/../shared/navigationbar.php'); ?>
<body style="margin-top:20px;"> 
    <div class="container">
        <aside class="sidebar">
            <h2>Notifications</h2>
            <ul id="notifications-list">
                <!-- Notification titles will be injected here by JavaScript -->
            </ul>
        </aside>
        <main class="main-content">
            <h2>Notification Details</h2>
            <div id="notification-details">
                <p>Select a notification to see details</p>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const notifications = [
                {
                    id: 1,
                    title: 'New day Workouts',
                    message: 'Todays Workouts',
                    link: ' tracker',
                    timestamp: new Date().toLocaleString()
                },
                {
                    id: 2,
                    title: 'Your steps today',
                    message: 'new step record today',
                    link: ' tracker',
                    timestamp: new Date().toLocaleString()
                },
                {
                    id: 3,
                    title: 'New Notification',
                    message: 'You have a new Notification',
                    link: ' tracker',
                    timestamp: new Date().toLocaleString()
                }
            ];

            const notificationsList = document.getElementById('notifications-list');
            const notificationDetails = document.getElementById('notification-details');

            notifications.forEach(notification => {
                const listItem = document.createElement('li');
                const link = document.createElement('a');
                link.href = "#";
                link.textContent = notification.title;
                link.addEventListener('click', () => {
                    displayNotificationDetails(notification);
                    setActiveLink(link);
                });

                listItem.appendChild(link);
                notificationsList.appendChild(listItem);
            });

            function displayNotificationDetails(notification) {
                notificationDetails.innerHTML = `
                    <div class="notification-details">
                        <h3>${notification.title}</h3>
                        <p>${notification.message}</p>
                        <a href="${notification.link}">click here</a><br>
                        <span class="timestamp">${notification.timestamp}</span>
                    </div>
                `;
            }

            function setActiveLink(activeLink) {
                const links = document.querySelectorAll('.sidebar ul li a');
                links.forEach(link => link.classList.remove('active'));
                activeLink.classList.add('active');
            }
        });
    </script>
</body>
</html>
