<?php
    require "config/initiate.php";
    require "php/index.php";
    require "php/message.php";
    include "sidebar/index.html";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <style>
        .welcome span{
            font-family: 'Poppins', sans-serif;
        }
        .container-fluid{
            font-family: 'Open Sans', sans-serif;
        }

        .view-board{
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            z-index: 10;
            display: none;
        }
        .view-board > div:first-child{
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #5e5e5e;
            opacity: 0.8;
            z-index: 8;
        }
        .view-board > div:last-child{
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: fit-content;
            width: fit-content;
            max-width: 400px;
            max-height: 90vh;
            overflow-y: auto;
            margin: auto;
            background-color: #f9f9f9;
            padding: 3%;
            box-shadow: 4px 4px 8px 0px #f1f1f1;
            z-index: 9;
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            color: #0CC9F9;
        }
        .view-board > div:last-child span{
            letter-spacing: 2px;
            line-height: 30px;
        }
    </style>
    <title>Dashboard</title>
</head>
<body>
    <main>
        <!-- User profile -->
        <div class="container-fluid col-lg-9">
            <?php include "header/header.php"; ?>

            <section class="pt-5">

                <?php if(count($unopened) < 1): ?>
                    <h3 class="text-center">No Unread Message.</h3>
                <?php else: ?>
                    <p class="h4">Unread</p>
                    <?php foreach($unopened as $listing): ?>

                    <div class="row col-12 align-items-center">
                        <div class="pt-1 row col-xs-12 col-lg-8 justify-content-between align-items-center">

                            <div class="col-8 col-md-9" style="overflow-x: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                <?= $listing['message']; ?>
                            </div>

                            <div class="col-4 col-md-6"><small><?= $listing['date']; ?></small></div>

                        </div>

                        <div class="pt-1 row col-xs-12 col-lg-4 justify-content-around">
                            <div>
                                <button class="btn btn-success" onclick="read(this, `<?= $listing['msgid']; ?>`)">Mark as read</button>
                            </div>

                            <div>
                                <button class="btn btn-primary btn-fill" onclick="view_message(this, `<?= $listing['title']; ?>`, `<?= $listing['message']; ?>`)">View message</button>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <?php endforeach; ?>
                <?php endif; ?>

            </section>
            
            <hr class="bg-info">

            <section class="pt-4">

                <?php if(count($opened) < 1): ?>
                    <h3 class="text-center">No Opened Message.</h3>
                <?php else: ?>
                    <p class="h4">Opened</p>
                    <?php foreach($opened as $listing): ?>

                        <div class="row col-12 align-items-center">
                            <div class="pt-1 row col-xs-12 col-lg-8 align-items-center">

                                <div class="col-8 col-md-9" style="overflow-x: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                    <?= $listing['message']; ?>
                                </div>

                                <div class="col-4 col-md-6"><small><?= $listing['date']; ?></small></div>

                            </div>

                            <div class="pt-1 row col-xs-12 col-lg-4 justify-content-around">
                                <div>
                                    <button class="btn btn-primary btn-fill" onclick="view_message(this, `<?= $listing['title']; ?>`, `<?= $listing['message']; ?>`)">View message</button>
                                </div>
                            </div>
                        </div>
                        <hr>
                    
                    <?php endforeach; ?>
                <?php endif; ?>

            </section>


            <div class="view-board">
                <div>

                </div>
                <div>
                    <h3 id="message-title"></h3>
                    <br><br>
                    <span id="message-board">
                        
                    </span>

                    <br><br>
                    <button class="btn" style="float: right;" onclick="this.closest('.view-board').style.display = 'none';">Close</button>
                </div>
            </div>
        </div>
    </main>
</body>

<script>
    var reg = new RegExp("\n|\r|\n\r|\r\n", "gm");

    function view_message(self, tle, mssg) {
        var title = tle.replace(reg, "<br>")
        var message = mssg.replace(reg, "<br>")

        document.getElementById("message-title").innerHTML = title
        document.getElementById("message-board").innerHTML = message
        document.querySelector(".view-board").style.display = "block";
    }

    function read(self, msgid) {
        var url = "action=read&msgid=" + msgid
        var ajax_request;
        if(window.XMLHttpRequest){
                ajax_request = new XMLHttpRequest;
        }else{
                ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
        }
        ajax_request.onreadystatechange = function() {
            if(this.readyState === 4 && this.status === 200)
            {
                var result = ajax_request.responseText;
                console.log(result)

                if(result == "completed"){
                    self.style.backgroundColor = "rgb(4, 159, 12)"
                    self.style.color = "#fff"
                    self.innerText = "Read"
                }
            }
        }
        ajax_request.open("POST", "php/read.php", true);
        ajax_request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        ajax_request.send(url);
    }

</script>

</html>
