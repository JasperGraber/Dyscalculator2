<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-6" style="margin-top: 150px">
                <form action="./index.php?content=login_script" method="post">
                    <h1>Log in!</h1>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Voer je login gegevens in.</label>
                        <input name="email" type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control" id="InputPassword1" aria-describedby="passwordHelp" placeholder="Wachtwoord">
                    </div>
                    <button type="submit" class="btn btn-color btn-block btn-lg">Inloggen</button>
                </form>
            </div>
            <div class="col-6">
                <img src="./img/child.png" id="childImg">
            </div>
        </div>
    </div>
</div>