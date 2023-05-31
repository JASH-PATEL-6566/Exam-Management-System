<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam-Management-System</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap');
        #timer {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 80px;
            font-weight: 600;
            width: 350px;
            height: 100px;
            /* border: 1px solid black; */
            color: black;
            text-align: center;
            align-self: center;
            margin: auto;
            position: relative;
        }
        .custom-login {
            padding: 70px 10px;
        }
        .carousel-container {
            padding: 4px;
            /* border: 2px solid black; */
            width: 60%;
            height: 10em;
        }
        
        .exam_container{
            position: relative;
            /* border: 2px solid black; */
            height: 14em;
        }

        .carousel-button {
            position: absolute;
            bottom: 0;
            display: flex;
            align-items: center;
            flex-direction: row;
            gap: 10px;
        }
    </style>
</head>

<body>
    {{View::make("header")}}
    @yield("content")
</body>

</html>