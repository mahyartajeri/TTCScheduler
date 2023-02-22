

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Current Date Input Field with Next Day Button</title>
        <style>
            /* Style the input fields and labels */
            label {
                display: block;
                margin-bottom: 10px;
                font-weight: bold;
            }

            input[type="text"] {
                padding: 5px;
                border-radius: 5px;
                border: 1px solid #ccc;
            }

            .date-input {
                position: relative;
                display: inline-block;
            }

            .date-input input[type="date"]::-webkit-calendar-picker-indicator {
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                opacity: 0;
                cursor: pointer;
            }
        </style>
    </head>

    <body>
        <h1>Current Date Input Field with Next Day Button</h1>
        <form method="post" action="insert_event.php">
        <div class="date-input">
                    <input type="date" name="eventDate" id="eventDate" readonly>
                </div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <br>
            <label for="phone">Phone:</label>
            <input type="tel" name="phone" id="phone">
            <br>
            <button type="submit">Submit</button>
            <button type="button" id="nextDayButton">Next Day</button>
        </form>
  

        <script>
            // get current date
            let today = new Date();

            // format date as YYYY-MM-DD
            const year = today.getFullYear();
            const month = (today.getMonth() + 1).toString().padStart(2, "0");
            const day = today.getDate().toString().padStart(2, "0");
            const formattedDate = `${year}-${month}-${day}`;

            // set input value to current date
            document.getElementById("eventDate").value = formattedDate;

            // add event listener to "Next Day" button
            document.getElementById("nextDayButton").addEventListener("click", () => {

                // advance to next day
                today.setDate(today.getDate() + 1);

                // update input values
                document.getElementById("eventDate").value = formatDateInput(today);
                document.getElementById("eventText").value = "";
            });

            // function to format date as "YYYY-MM-DD"
            function formatDateInput(date) {
                const year = date.getFullYear();
                const month = (date.getMonth() + 1).toString().padStart(2, "0");
                const day = date.getDate().toString().padStart(2, "0");
                return `${year}-${month}-${day}`;
            }
        </script>
    </body>

    </html>


</body>

</html>