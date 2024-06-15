<?php include 'upload-profile-pic.php' ?>
<style>
    .f-p{
        display: flex;
        justify-content: center;
        align-items: baseline;

    }
    .in{
    width: 200px;
    background-color: aquamarine;
    color: aliceblue;
    }
    .sub{
        width: 100px;
        padding: 5px;
        
    }
</style>
<div class="f-p">
<form action="upload-profile-pic.php" method="POST" enctype="multipart/form-data">
    <input class="in" type="file" name="profile_picture">
    <input class="sub" type="submit" value="Upload">
</form>
</div>
