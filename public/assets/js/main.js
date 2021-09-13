window.onload=()=>{

    ajaxCRF();

    //OTVARANJE MODALA-------------------------------
    $(".modalClick").on("click",function(){
        getModalData($(this).data("id"));
    });

    var sPath = window.location.pathname;
    var page = sPath.substring(sPath.lastIndexOf('/') + 1);

    if(page=="products"){
        localStorage.removeItem("slider");
        localStorage.removeItem("search");
        showProducts();


        //ORDEROVANJE PROIZOVDA ------------------------
        if (localStorage.getItem("order")) {
            $("#sortSelect").val(localStorage.getItem("order"));
        }

        $("#sortSelect").on("change", function () {
            localStorage.setItem("order", $(this).val());
            showProducts();
        });

        //PRETRAGA PROIZVODA----------------------------
        $("#search").on("keyup", function () {
            let search = $(this).val().toLowerCase();
            localStorage.setItem("search", search);
            showProducts();
        });

        //BIRANJE KATEGORIJA------------------------------
        $(".catLink").on("click", function (e) {
            e.preventDefault();

            if (localStorage.getItem("id")) {
                $(".catLink[data-id=" + localStorage.getItem("id") + "]").css("color", " black");
            }

            localStorage.setItem("id", $(this).data("id"));
            $(this).css("color", " #dcb14a");

            showProducts();
        });

        //SLANJE PAGINACIJE U AJAX------------------------------
        $(document).on('click', '.page-link', function (e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            showProducts(page);
        });

        //SLIDER ----------------------------------------------
        slider();
        var sliderr = document.getElementById('range');
        sliderr.noUiSlider.on("change", function () {
            localStorage.setItem("slider", JSON.stringify(sliderr.noUiSlider.get()));
            showProducts();
        });


    }

    else if(page=="login"){

        //FORM LOGIN AND REGISTER
        $("#signUp").on("click", () => {
            $("#container").addClass("right-panel-active");
            localStorage.setItem("loginSlide","1");
        });

        $("#signIn").on("click", () => {
            $("#container").removeClass("right-panel-active");
            localStorage.removeItem("loginSlide");
        });

        if (localStorage.getItem("loginSlide")){
            $("#container").addClass("right-panel-active");
            localStorage.setItem("loginSlide","1");
        }
        //$("#logIn").on("click",loginValidate);
    }

    else if(page=="contact"){
        $("#sendMsg").on("click",sendMessage);
    }

    $(".addToCart").on("click",function(e) {
        e.preventDefault();
        addToCart($(this).data("id"));
    });

    $(".deleteFromCart").on("click",function(e) {
        e.preventDefault();
        deleteFromCart($(this).data("id"));
    });

    $("#commentButton").on("click",function (e){
        e.preventDefault();
        makeComment();
    });

    showComments();


}

//BASE FUNCITONS--------------------------------------
function ajaxCRF(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

function getModalData(id){
    $.ajax({
        type: "POST",
        url: "modal",
        data:{"id":id},
        success:function(data){
            $(".modal-content").html(data);
            $(".addToCart").on("click",function(e) {
                e.preventDefault();
                addToCart($(this).data("id"));
            });
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

//PRODUCTS FUNCTIONS-------------------------------------


function showProducts(page=1){

    //oboji kategoriju
    if(localStorage.getItem("id")){
        $(".catLink[data-id="+localStorage.getItem("id")+"]").css("color"," #dcb14a");
    }

    let order=localStorage.getItem("order");
    if(order==null)
        order=1;

    let search=localStorage.getItem("search");
    let id=localStorage.getItem("id");

    let slider=JSON.parse(localStorage.getItem("slider"));

    $.ajax({
        type: "GET",
        url: window.location.origin+"/productsAjax",
        data:{"id":id,"order":order,"page":page,"search":search,"slider":slider},
        success:function(data){

            //if(data.toString().trim().length<1)
                //$("#products").html("TEST");

            $("#products").html(data);
            //OTVARANJE MODALA-------------------------------
            $(".modalClick").on("click",function(){
                getModalData($(this).data("id"));
            });

            $(".addToCart").on("click",function(e) {
                e.preventDefault();
                addToCart($(this).data("id"));
            });

        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function slider() {
    var range = document.getElementById('range');
    noUiSlider.create(range, {
        range: {
            'min': 0,
            'max': 200
        },
        step: 10,
        start: [0, 200],
        margin: 30,
        connect: true,
        direction: 'ltr',
        orientation: 'horizontal',
        behaviour: 'tap-drag',
        tooltips: true,
        format: {
            to: function (value) {
                return value;
            },
            from: function (value) {
                return value.replace('', '');
            }
        }
    });
}

//LOG I REGISTER FUNKCIJE-------------------------

function loginValidate(){
    let data=$("#logForm").serialize();
    //console.log(data);

}

//CART--------------------
function addToCart(id) {
    $.ajax({
        type: "POST",
        url: window.location.origin + "/cartAddAjax",
        data: {"id": id},
        success: function (data) {
            //console.log(data);
            window.location.replace(window.location.origin + "/cart")
        },
        error: function (xhr, error, status) {
            console.log(status, error,xhr);
        }
    });
}

//CART--------------------
function deleteFromCart(id) {
    $.ajax({
        type: "POST",
        url: window.location.origin + "/cartDeleteAjax",
        data: {"id": id},
        success: function (data) {
            location.reload();
        },
        error: function (xhr, error, status) {
            console.log(status, error,xhr);
        }
    });
}

//COMMENTS--------------
function makeComment(){

    let data = $("#comment").val();
    let id=$(".addToCart").data("id");
    $.ajax({
        type: "POST",
        url: window.location.origin+"/comment",
        data:{"comment":data,"id":id},
        success:function(data){
            if(data){
                let html="";
                $.each(data, function (i, msg) {
                    html+="<p>"+msg+"</p>";
                });
                $("#errors").html(html).fadeIn();
                return;
            }
            $("#comment").val("");
            $("#errors").fadeOut();
            showComments();
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

function showComments(){
    let id=$(".addToCart").data("id");
    $.ajax({
        type: "GET",
        url: window.location.origin+"/showCommentsAjax",
        data:{"id":id},
        success:function(data){
            $("#allComments").html(data);
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}

//CONTACT--------

function sendMessage(){

    let message = $("#message").val();
    let email=$("#email").val();
    $.ajax({
        type: "POST",
        url: window.location.origin+"/contact/send",
        data:{"message":message,"email":email},
        success:function(data){
            if(data){
                let html="";
                $.each(data, function (i, msg) {
                    html+="<p>"+msg+"</p>";
                });
                $("#errors").html(html).fadeIn();
                return;
            }
            $("#message").val("");
            $("#errors").fadeOut();
            alert("Message sent");
        },
        error:function(xhr,error,status){
            console.log(status,error);
        }
    });
}





