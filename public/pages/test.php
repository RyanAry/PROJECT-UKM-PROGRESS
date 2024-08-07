<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SweetAlert Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    
    <button onclick="showAlert()">Show Alert</button>

    <!-- SweetAlert2 script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Function to trigger the SweetAlert
        function showAlert() {
            swal.fire({
                title: 'Hello!',
                text: 'This alert will close automatically.',
                icon: 'info',
                timer: 2000, // 2 seconds
                showConfirmButton: false
            });
        }
    </script>
</body>
</html>
