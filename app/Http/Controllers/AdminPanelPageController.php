<?php

namespace App\Http\Controllers;


class AdminPanelPageController extends Controller
{

    public function loginPage(){
        return view("admin.pages.loginPage");
    }

    public function homePage(){
        $data["commentCount"]=CommentController::Count();
        $data["orderCount"]=CheckoutController::Count();
        $data["userCount"]=AdminUsersController::Count();
        $data["orders"]=CheckoutController::getRecentOrders();

        return view("admin.pages.homePage",$data);
    }

    public function productsPage(){
        return view("admin.pages.productsPage");
    }

    public function usersPage(){
        return view("admin.pages.usersPage");
    }

    public function categoryPage(){
        return view("admin.pages.categoriesPage");
    }

    public function mainCategoryPage(){
        return view("admin.pages.mainCategoriesPage");
    }

    public function ordersPage(){
        return view("admin.pages.ordersPage");
    }

    public function messagesPage(){
        return view("admin.pages.messagesPagewe");
    }

}
