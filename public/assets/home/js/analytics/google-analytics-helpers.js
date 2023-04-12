function Analytics(){


this.addImpression=function (productsJson){
    console.log(productsJson);

    productsArray = productsJson['data'];

    for ( var i=0 ;i<productsArray.length; i++){
        product = productsArray[i];
        product['category']='globalCategory';
        ga("ec:addImpression", {
            "id": product['product_id'],
            "name": product['name'],
            "price": product['price'],
            "brand": product['model'],
            // "category": product['catogery'],
            "category": product['category'],
            "position": i,
            "list": "productsList"
        });
    }

};

//add banner click
this.aaPromoClick = function () {
    ga("ec:addPromo", {
        "id": "bts",
        "name": "Back To School",
        "creative": "PRODUCT banner",
        "position": "right sidebar"
    });
    ga("ec:setAction", "promo_click");
    ga("send", "event", "PRODUCT", "click", "banner");
};

this.makeProductReady = function(productsJson,id){
    console.log(" makePRoductREady "+id);
    product=null;

    if( id !=null) {
        productsArray = productsJson['data'];
        for(i=0;i<productsArray.length; i++){
            console.log("product id "+i);
            if(productsArray[i].product_id==id){
                product = productsArray[i];
                break;
            }
        }
    } else {
        product=productsJson;
    }

    // console.log("productJson "+product.name)

    ga("ec:addProduct", {
        "id": product["product_id"],
        "name": product['name'],
        "price": product['price'],
        "brand": product['model'],
        "category": product['category'],
        "position": 0
    });
};

//add product details after product click
this.addProductView = function (productJson) {
    console.log("singlePage product");

    console.log(productJson);
    this.makeProductReady(productJson);
    ga("ec:setAction", "detail");
    //gs("send" is done at footer.
};

    //track the product click action
    this.trackProductClick = function(productJson, id) {
        this.makeProductReady(productJson,id);

        ga("ec:setAction", "click", {
            "list": "productsList"
        });
        ga("send", "event", "productsList", "click", "");
    }

//add product add to cart
this.addProductToCart = function (productJson,id) {
    this.makeProductReady(productJson,id);
    ga("ec:setAction", "add");
    ga("send", "event", "detail view", "click", "add to cart");
};


//remove product from cart
this.removeProductFromCart = function (product){
    ga("ec:addProduct", {
        "id": product['id'],
        "name": product['name'],
        "price": product['price'],
        "brand": product['brand'],
        "category": product['category'],
        "variant": product['variant'],
        "quantity": product['qty']
    });
    ga("ec:setAction", "remove");
    ga("send", "event", "detail view", "click", "remove From Cart");
};


this.checkoutCart = function (productsJson) {
    for(var i=0;i<productsJson.length;i++){
        product = productsJson[i];
        ga("ec:addProduct", {
            "id": product['id'],
            "name": product['name'],
            "price": product['price'],
            "brand": product['brand'],
            "category": product['category'],
            "variant": product['variant'],
            "dimension1": product['dimention1'],
            "position": i,
            "quantity": product['qty']
        });
    }
    ga("ec:setAction", "checkout", {
        "step": 1
    });
};

}