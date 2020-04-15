<?php
if (!(isset($_GET["content"]) && isset($_GET["id"]) && isset($_GET["pwh"]))){
    header("Location: ./index.php?content=message&alert=hacker-alert");
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-6" style="margin-top: 60px">
            <form action="./index.php?content=activation_script" method="post">
                <h1>Kies een wachtwoord!</h1>
                <div class="form-group">
                    <label for="inputPassword">Voer een sterk wachtwoord in.</label>
                    <input name="password" type="password" class="form-control" id="inputPassword" aria-describedby="passwordHelp" placeholder="Wachtwoord">
                </div>
                <div class="form-group">
                <label for="inputPasswordCheck">Herhaal je wachtwoord.</label>
                    <input name="passwordCheck" type="password" class="form-control" id="inputPassword" aria-describedby="passwordHelp" placeholder="Wachtwoord">
                </div>
                <input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
                <input type="hidden" name="pwh" value="<?php echo $_GET["pwh"];?>">
                <button type="submit" class="btn btn-color btn-block btn-lg" id="button">Bevestigen</button>
            </form>
        </div>
        <div class="col-6">
            <img src="./img/child.png" id="childImg">
        </div>
    </div>
</div>