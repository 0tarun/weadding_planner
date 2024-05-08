<!DOCTYPE html>
<html lang="en">

<head>
    
    <link rel="stylesheet" href="comment.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="head">
            <h1>Post a comment</h1>
        </div>
        <div><span id="comment">0</span>Comment</div>
        <div class="text">
            <p>We are happy to here from you </p>
        </div>
        <div class="comments"></div>
        <div class="commentbox">
            <img src="user1.jpg" alt="">
            <div class="content">
                <h2>Comment as:</h2>
                <input type="text" value="Anonymous" class="user">
                <div class="commentinput">
                   <input type="text" placeholder="Enter comment " class="usercomment"> 
                   <div class="buttons">
                    <button type="submit" disabled id="Publish">Publish</button>
                    <div class="notifay">
                        <input type="checkbox" class="notifayinput"><span>Notify me</span>
                    </div>

                   </div>
                </div>
                <p>this side is protected</p>
            </div>


        </div>


    </div>

</body>

</html>