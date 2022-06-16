<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Categorie;
use App\Subcategorie;
use App\Solution;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Directory
Breadcrumbs::for('directory', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Directory', route('marketplace'));
});

// Home > Directory > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, Categorie $category) {
    $trail->parent('directory');
    $trail->push($category->name, route('fcat', ['name'=>$category->name]));
});

//Home > Directory > [Category] > [Subcategory]
Breadcrumbs::for('subcategory', function (BreadcrumbTrail $trail, Subcategorie $subcategory) {
    if ($subcategory->categorie()) {
        $category = $subcategory->categorie()->first();
        $trail->parent('category', $category);
    } else {
        $trail->parent('directory');
    }
    $trail->push($subcategory->name, route('fsubcat', ['name'=>$subcategory->name]));
});

//Home > Directory > [Category] > [Subcategory] > [Solution]
Breadcrumbs::for('solution', function (BreadcrumbTrail $trail, Solution $solution) {
    if ($solution->subcategorie()) {
        $subcategory = $solution->subcategorie()->first();
        $trail->parent('subcategory', $subcategory);
    } else {
        $trail->parent('category');
    }
    $trail->push($solution->name, route('staticsolution', ['sol'=>$solution->id]));
});
