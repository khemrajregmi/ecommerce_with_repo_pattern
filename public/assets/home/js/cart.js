function CartClick(id,token,Url,cartUrl,checkoutUrl,order_CancelUrl)
{
 	
 	// if(productsJson.data == null){
 	// 	analytic.addProductToCart(productsJson);	
 	// } else {
 	// 	analytic.addProductToCart(productsJson, id);	
 	// }
 	

 	/**Get Data ***/
 	$.ajax({
 		type: "GET",
 		url: Url,
 		data: {
 			"_token": token,
 			"id": id,
 		},
 		success: function(data) {
 			$(".total").html(data.total);
 			$(".totalitem").html(+data.totalInCart);
 			var productImg = data.image;
 			var num = data.price;
 			var deleteUrl = order_CancelUrl+"/order/cancel/"+data.rowId;
 			Number(num).toFixed(2);
 			var productprice = Number(num).toFixed(2);


 			if(!product_exists(data.product_id)){
 				var productUrl = document.location.origin+'/'+ productImg
 				append_cart_product('.returnMessage', data.product_id, productUrl, data.name,productprice, cartUrl, checkoutUrl, deleteUrl,data.total);
 				
 				
 			}else{
 				//append new item
 				increment_cart_product(data.product_id,data.qty);
 			}
 			iziToast.success({
                                title: 'OK',
                                message: 'Successfully Added to Your Cart !!',
                                position: 'topRight',
                            });
 			
 		}

 	});

 	/** End Data **/
 }
 

 function append_cart_product(holder,product_id,productUrl,productTitle,productPrice,cartUrl, checkoutUrl,deleteUrl,total){
 	console.log(total);
 	var cart_product_item="";
 		cart_product_item +="<li class='shopping-cart__item'>"
 		cart_product_item += "	<div class='shopping-cart__item__image pull-left' ><a href='#'><img src='" + productUrl +"' alt=''/></a></div>";
 		cart_product_item += "		<div class='shopping-cart__item__info' id='"+product_id+"'>";
 		cart_product_item += "			<div class='shopping-cart__item__info__title'>"; 		
 		cart_product_item += "				<h2 class='text-uppercase'>"
 		cart_product_item += "				<a href='#'>"+ productTitle +"</a>"
 		cart_product_item += "				</h2>";
 		cart_product_item += "			</div>";
 		cart_product_item += "			<div class='shopping-cart__item__info__option'>Color: Blue</div>";
 		cart_product_item += "			<div class='shopping-cart__item__info__option'>Size: Small</div>";
 		cart_product_item += "			<div class='shopping-cart__item__info__price'>Rs "+productPrice+"</div>";
 		cart_product_item += "			<div class='shopping-cart__item__info__qty counter'>Qty:1</div>";
 		cart_product_item += " 			<div class='shopping-cart__item__info__delete'><a href='"+deleteUrl+"' class='icon icon-clear remove'></a></div>";
 		cart_product_item += "		</div>";
 		cart_product_item += "</li>";

 	$(holder).prepend(cart_product_item);

 	

 	var cart_foot='';
		cart_foot +='<div class="shopping-cart__bottom">'
		cart_foot +=	'<div class="pull-left">Subtotal: <span class="shopping-cart__total total"> '+total+'</span></div>';
		cart_foot +=		'<div class="pull-right">';
		cart_foot +=		 	'<a href="'+cartUrl+'" class="btn btn--wd text-uppercase">View Cart</a>   ';
		cart_foot +=		 	'<a href="'+checkoutUrl+'" class="btn btn--wd text-uppercase">Checkout</a>';
		cart_foot +=		'</div>';
		cart_foot +='</div>';
	$('.footercart').html(cart_foot);

}

function product_exists(id) {
	console.log(" Product EXist : " + id + "Lenght : "+ $('.returnMessage #'+ id).length);
	return $('.returnMessage #'+ id).length;
}

function increment_cart_product(id,count){
	// $('.counter').html('Qty:'+count);
	$('#'+id).find('.counter').html('Qty:'+count);
}
