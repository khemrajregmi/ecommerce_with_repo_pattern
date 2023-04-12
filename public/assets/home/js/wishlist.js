function WishListClick(Url,token,productId,customerId)
 {
                    /**Get Data ***/
                    $.ajax({
                        type: "GET",
                        url: Url,
                        data:{
                            "_token": token,
                            "productId":productId,
                            "customerId":customerId,
                        },
                        success: function(data){
                            var wishlist = 'Wishlist ('+data+')';
                            $(".wishlist").html(wishlist); 
                            
                            iziToast.success({
                                title: 'OK',
                                message: 'Successfully Added to Wishlist',
                                position: 'topRight',
                                progressBarColor: 'rgb(0, 255, 184)',
                            });
                            
                        }
                       
                    });

                    /** End Data **/
            
}