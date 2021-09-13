window.onload=()=>{

   ajaxCRF();

    var sPath = window.location.pathname;
    var page = sPath.substring(sPath.lastIndexOf('/') + 1);

    if(page=="products") {

        $(document).on('click', '.page-link', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            showProducts(page);
        });

        $("#addNew").on("click",function(){
            $("#insertErrors").hide();
            insertProductModal();
        });

        showProducts();
    }
    else if(page=="users"){
        $(document).on('click', '.page-link', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            showUsers(page);
        });
        showUsers();
    }

    else if(page=="categories"){
        $(document).on('click', '.page-link', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            showCategories(page);
        });
        $("#addNew").on("click",function(){
            insertCategoryModal()
        });
        showCategories();
    }

    else if(page=="mainCategories"){
        $(document).on('click', '.page-link', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            showMainCategories(page);
        });
        $("#insertProductBtn").on("click",insertMainCategory);

        showMainCategories();

    }
    else if(page=="orders") {
        $(document).on('click', '.page-link', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            showOrders(page);
        });
        //$("#insertProductBtn").on("click",);

        showOrders();
    }


    else if(page=="messages") {
        $(document).on('click', '.page-link', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            showMessages(page);
        });

        showMessages();
    }

}

//BASE FUNCITONS---------------
function ajaxCRF(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}


//ADMIN PRODUCTS
function insertProductModal(){
    $.ajax({
        type: "GET",
        url: window.location.origin+"/admin/product/insertForm",
        success:function(data){
            $("#insertFormDiv").html(data);
            $("#insertProductBtn").on("click",insertProduct);
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function insertProduct(){
    var form=$("#insertFormData")[0];
    var data = new FormData(form);
    $.ajax({
        url: window.location.origin+"/admin/product/insert",
        type: "POST",
        processData: false,
        contentType: false,
        data:data,
        success:function(data){
            if(validationErrors(data,$("#insertErrors"))) {
                $("#insertErrors").html("").fadeOut();
                if(localStorage.getItem("page")) {
                    showProducts(localStorage.getItem("page"));
                }
                else
                    showProducts();
                $("#insertModal").modal('hide');
                toastr.success('Product inserted successfully');
            }

        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}



function showProducts(page=1){
   // $("#products").hide();
    $.ajax({
        type: "GET",
        url: window.location.origin+"/admin/productsAjax",
        data:{"page":page},
        success:function(data){
            localStorage.setItem("page",page.toString());
            //$("#products").fadeIn();
            $("#products").html(data);
            $(".delete").on("click",function (){
                deleteProduct($(this).data("id"));
            });
            $(".edit").on("click",function (){
                getProductEdit($(this).data("id"));
            });
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function deleteProduct(id){
    $.ajax({
        type: "POST",
        url: window.location.origin+"/admin/product/delete",
        data:{"id":id},
        success:function(data){
            if(localStorage.getItem("page")) {

                    showProducts(localStorage.getItem("page")-1);
            }
            else
                showProducts();
            toastr.success('Product successfully deleted');
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function getProductEdit(id){
    $.ajax({
        type: "GET",
        url: window.location.origin+"/admin/product",
        data:{"id":id},
        success:function(data){
            $("#modalEdit").html(data).fadeIn();
            $('html, body').animate({
                scrollTop: $("#modalEdit").offset().top
            }, 1000);
            $("#cancel").on("click",()=>{
                $('html, body').animate({
                    scrollTop: $("#products").offset().top
                }, 500);
                $("#modalEdit").fadeOut(800)
            });
            $("#save").on("click",()=>{
                editProduct();
            });
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function validationErrors(data,divSelector){
    if(data) {
        let html="";
        $.each(data, function (i, msg) {
            html+="<p>"+msg+"</p>";
        });
        divSelector.html(html).fadeIn();

        toastr.error('Operation failed');
        return false;
    }
    return true;
}


function editProduct(){
    var form=$("#editForm")[0];
    var data = new FormData(form);

    $.ajax({
        type: "POST",
        url: window.location.origin+"/admin/product/edit",
        data:data,
        processData: false,
        contentType: false,
        success:function(data){

           if(validationErrors(data,$("#errors"))) {
               $("#errors").html("").fadeOut();
               if (localStorage.getItem("page")) {
                   showProducts(localStorage.getItem("page"));
                   $('html, body').animate({
                       scrollTop: $("#products").offset().top
                   }, 500);
                   $("#modalEdit").fadeOut();
               } else
                   showProducts();
               toastr.success('Product edited successfully');
           }
        },
        error:function(data,xhr,error,status){
            console.log(status,error);
        }
    });
}

//ADMIN USERS----------
function showUsers(page=1){
    $.ajax({
        type: "GET",
        url: window.location.origin+"/admin/usersAjax",
        data:{"page":page},
        success:function(data){
            localStorage.setItem("page",page.toString());
            $("#users").html(data);
            $(".delete").on("click",function (){
                deleteUser($(this).data("id"));
            });
            $(".edit").on("click",function (){
                getUserEdit($(this).data("id"));
            });
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function deleteUser(id){
    $.ajax({
        type: "POST",
        url: window.location.origin+"/admin/user/delete",
        data:{"id":id},
        success:function(data){
            if(localStorage.getItem("page")) {
                if($(".page-link active").length)
                    showUsers(localStorage.getItem("page"));
                else
                    showUsers(localStorage.getItem("page")-1);
            }
            else
                showUsers();
            toastr.success('User successfully deleted');
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function getUserEdit(id){
    $.ajax({
        type: "GET",
        url: window.location.origin+"/admin/user",
        data:{"id":id},
        success:function(data){
            $("#modalEdit").html(data).fadeIn();
            $('html, body').animate({
                scrollTop: $("#modalEdit").offset().top
            }, 1000);
            $("#cancel").on("click",()=>{
                $("#errors").html("");
                $("#modalEdit").fadeOut();
                $('html, body').animate({
                    scrollTop: $("#users").offset().top
                }, 1000);
            });
            $("#save").on("click",()=>{
                editUser();
            });
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function editUser(){

    let data=$("#userEditForm").serialize();
    $.ajax({
        type: "POST",
        url: window.location.origin+"/admin/user/edit",
        data:{"data":data},
        success:function(data){
            if(validationErrors(data,$("#errors"))) {
                $("#errors").html("");
                if (localStorage.getItem("page")) {
                    showUsers(localStorage.getItem("page"));
                    $("#modalEdit").fadeOut();
                    $('html, body').animate({
                        scrollTop: $("#users").offset().top
                    }, 1000);
                } else
                    showUsers();
                toastr.success('User edited successfully');
            }
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

//ADMIN CATEGORIES------------------------------------------------------

function insertCategoryModal(){
    $.ajax({
        type: "GET",
        url: window.location.origin+"/admin/category/insertForm",
        success:function(data){
            $("#insertFormDiv").html(data);
            $("#insertProductBtn").on("click",insertCategory);
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function insertCategory(){
    let data=$("#insertForm").serialize();

    $.ajax({
        type: "POST",
        url: window.location.origin+"/admin/category/insert",
        data:{"data":data},
        success:function(data){
            if(validationErrors(data,($("#insertErrors")))) {
                if (localStorage.getItem("page")) {
                    showCategories(localStorage.getItem("page"));
                } else
                    showCategories();
                $("#insertModal").modal('hide');
                toastr.success('Category inserted successfully');
            }

        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function showCategories(page=1){
    $.ajax({
        type: "GET",
        url: window.location.origin+"/admin/categoriesAjax",
        data:{"page":page},
        success:function(data){
            localStorage.setItem("page",page.toString());
            $("#categories").html(data);
            $(".delete").on("click",function (){
                deleteCategory($(this).data("id"));
            });
            $(".edit").on("click",function (){
                getCategoryEdit($(this).data("id"));
            });
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function deleteCategory(id){
    $.ajax({
        type: "POST",
        url: window.location.origin+"/admin/category/delete",
        data:{"id":id},
        success:function(data){
            if(localStorage.getItem("page")) {
                if($(".page-link active").length)
                    showCategories(localStorage.getItem("page"));
                else
                    showCategories(localStorage.getItem("page")-1);
            }
            else
                showCategories();
            toastr.success('Category successfully deleted');
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function getCategoryEdit(id){
    $.ajax({
        type: "GET",
        url: window.location.origin+"/admin/category",
        data:{"id":id},
        success:function(data){
            $("#modalEdit").html(data).fadeIn();
            $('html, body').animate({
                scrollTop: $("#modalEdit").offset().top
            }, 1000);
            $("#cancel").on("click",()=>{
                $("#errors").html("");
                $("#modalEdit").fadeOut();
            });
            $("#save").on("click",()=>{
                editCategory();
            });
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function editCategory(){

    let data=$("#editForm").serialize();
    $.ajax({
        type: "POST",
        url: window.location.origin+"/admin/category/edit",
        data:{"data":data},
        success:function(data){
            //console.log(data);
            if(validationErrors(data,($("#errors")))) {
                if (localStorage.getItem("page")) {
                    showCategories(localStorage.getItem("page"));
                    $("#modalEdit").fadeOut();
                    $('html, body').animate({
                        scrollTop: $("#categories").offset().top
                    }, 1000);
                } else
                    showCategories();
                toastr.success('User edited successfully');
            }
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

//ADMIN MAIN CATEGORIES------------------------------------------------------

function insertMainCategory(){
    let data=$("#insertForm").serialize();
    $.ajax({
        type: "POST",
        url: window.location.origin+"/admin/mainCategory/insert",
        data:{"data":data},
        success:function(data){

            if(validationErrors(data,$("#insertErrors"))) {
                if (localStorage.getItem("page")) {
                    showMainCategories(localStorage.getItem("page"));
                } else
                    showMainCategories();
                toastr.success('MainCategory inserted successfully');
                $("#insertModal").modal('hide');
            }
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function showMainCategories(page=1){
    $.ajax({
        type: "GET",
        url: window.location.origin+"/admin/mainCategoriesAjax",
        data:{"page":page},
        success:function(data){
            localStorage.setItem("page",page.toString());
            $("#categories").html(data);
            $(".delete").on("click",function (){
                deleteMainCategory($(this).data("id"));
            });
            $(".edit").on("click",function (){
                getMainCategoryEdit($(this).data("id"));
            });
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function deleteMainCategory(id){
    $.ajax({
        type: "POST",
        url: window.location.origin+"/admin/mainCategory/delete",
        data:{"id":id},
        success:function(data){
            if(localStorage.getItem("page")) {
                if($(".page-link active").length)
                    showMainCategories(localStorage.getItem("page"));
                else
                    showMainCategories(localStorage.getItem("page")-1);
            }
            else
                showMainCategories();
            toastr.success('MainCategory successfully deleted');
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function getMainCategoryEdit(id){
    $.ajax({
        type: "GET",
        url: window.location.origin+"/admin/mainCategory",
        data:{"id":id},
        success:function(data){
            $("#modalEdit").html(data).fadeIn();
            $('html, body').animate({
                scrollTop: $("#modalEdit").offset().top
            }, 1000);
            $("#cancel").on("click",()=>{
                $("#errors").html("");
                $("#modalEdit").fadeOut();
            });
            $("#save").on("click",()=>{
                editMainCategory();
            });
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function editMainCategory(){

    let data=$("#editForm").serialize();
    $.ajax({
        type: "POST",
        url: window.location.origin+"/admin/mainCategory/edit",
        data:{"data":data},
        success:function(data){
            //console.log(data);
            if(validationErrors(data,$("#errors"))) {
                if (localStorage.getItem("page")) {
                    $("#errors").html("");
                    showMainCategories(localStorage.getItem("page"));
                    $("#modalEdit").fadeOut();
                    $('html, body').animate({
                        scrollTop: $("#users").offset().top
                    }, 1000);
                } else
                    showMainCategories();
                toastr.success('MainCategory edited successfully');
            }
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

//orders

function showOrders(page=1){
    // $("#products").hide();
    $.ajax({
        type: "GET",
        url: window.location.origin+"/admin/ordersAjax",
        data:{"page":page},
        success:function(data){
            localStorage.setItem("page",page.toString());

            $("#products").html(data);
            $(".delete").on("click",function (){
                deleteOrder($(this).data("id"));
            });
            $(".edit").on("click",function (){
                getOrderEdit($(this).data("id"));
            });
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function deleteOrder(id){
    $.ajax({
        type: "POST",
        url: window.location.origin+"/admin/order/delete",
        data:{"id":id},
        success:function(data){
            if(localStorage.getItem("page")) {
                showOrders(localStorage.getItem("page")-1);
            }
            else
                showOrders();
            toastr.success('Order successfully deleted');
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function getOrderEdit(id){
    $.ajax({
        type: "GET",
        url: window.location.origin+"/admin/order",
        data:{"id":id},
        success:function(data){

            $("#modalEdit").html(data).fadeIn();
            $('html, body').animate({
                scrollTop: $("#modalEdit").offset().top
            }, 1000);
            $("#cancel").on("click",()=>{
                $('html, body').animate({
                    scrollTop: $("#products").offset().top
                }, 500);
                $("#modalEdit").fadeOut(800)
            });
            $("#save").on("click",()=>{
                editOrder();
            });
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function editOrder(){

    let data=$("#editForm").serialize();
    $.ajax({
        type: "POST",
        url: window.location.origin+"/admin/order/edit",
        data:{"data":data},
        success:function(data){
            if(validationErrors(data,$("#errors"))) {
                if (localStorage.getItem("page")) {
                    $("#errors").html("");
                    showOrders(localStorage.getItem("page"));
                    $("#modalEdit").fadeOut();
                    $('html, body').animate({
                        scrollTop: $("#products").offset().top
                    }, 1000);
                } else
                    showOrders();
                toastr.success('Order edited successfully');
            }
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

//messages

function showMessages(page=1){
    $.ajax({
        type: "GET",
        url: window.location.origin+"/admin/messageAjax",
        data:{"page":page},
        success:function(data){
            localStorage.setItem("page",page.toString());

            $("#products").html(data);
            $(".delete").on("click",function (){
                deleteMessage($(this).data("id"));
            });

        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function deleteMessage(id){
    $.ajax({
        type: "POST",
        url: window.location.origin+"/admin/message/delete",
        data:{"id":id},
        success:function(data){
            if(localStorage.getItem("page")) {
                showMessages(localStorage.getItem("page")-1);
            }
            else
                showMessages();
            toastr.success('Message successfully deleted');
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}
