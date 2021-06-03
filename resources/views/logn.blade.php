@extends('template.out')
@section('main')
    <style>
        .container input {
            font-size: 1.5em
        }
    </style>
    <div class="container">
        <div class="row" style="margin-top: 13%">
            <div class="col-4"></div>
            <div class="col-4">
                <form action="" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="" placeholder="Identifiant" id="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="" placeholder="Mot de passe" id="">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="" id="" class=""> Remember me
                    </div>
                    <input type="submit" value="Démarrer" class="btn btn-success form-control">
                </form>
                <br>
                <a href="">Mot de passe oublié ?</a>
            </div>
            <div class="col-4"></div>
        </div>
        
    </div>
    
@endsection