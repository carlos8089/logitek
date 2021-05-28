@extends('template.out')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-5">
                <h3>Selectionnez une catégorie</h3>
            </div>
            <div class="col-5">
                <select name="user-type" id="user-type" class="form-control">
                    <option value="dev">Développeur(s) / Entreprise</option>
                    <option value="dev">Utilisateur</option>
                </select>
            </div>
        </div>
        
        <form action="" method="get" id="dev">
            <div>
                <h3>Informations générales</h3>
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="user-name">Nom complet</label>
                        </div>
                        <div class="col-7">
                            <input type="text" name="user-name" id="username" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="user-country">Pays</label>
                        </div>
                        <div class="col-7">
                            <input type="text" name="user-country" id="" class="form-control">
                        </div>
                    </div> 
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="user-tel">Numero</label>
                        </div>
                        <div class="col-7">
                            <input type="tel" name="user-tel" id="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="user-mail">Email</label>
                        </div>
                        <div class="col-7">
                            <input type="email" name="user-mail" id="email" class="form-control">
                        </div>
                    </div>      
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="user-site">Site web(Optionnel)</label>
                        </div>
                        <div class="col-7">
                            <input type="url" name="user-site" class="form-control">
                        </div>
                    </div>     
                </div> 
            </div>
            <div>
                <h3>Authentification</h3>
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="user-id">Entrez un nom d'utilisateur</label>
                        </div>
                        <div class="col-7">
                            <input type="text" name="user-id" id="" class="form-control">
                        </div>
                    </div> 
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="user-pass">Entrez un mot de passe</label>
                        </div>
                        <div class="col-7">
                            <input type="password" name="user-pass" id="pass" class="form-control">
                        </div>
                    </div>
                </div>  
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                            <label for="pass-confirm">Confirmez le mot de passe</label>
                        </div>
                        <div class="col-7">
                            <input type="password" name="pass-confirm" id="passcf" class="form-control">
                        </div>
                    </div> 
                </div>
            </div>
            <div class="">
                <button type="submit" class="btn btn-success">Enregistrer</button>
            </div>
            
        </form>
    </div>
@endsection