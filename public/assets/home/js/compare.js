
function Compare(Url, token,productId)
 {
   
                    /**Get Data ***/
                    $.ajax({
                        type: "GET",
                        url: Url,
                        data:{
                            "_token": token,
                            "productId":productId,
                        },
                        success: function(data){
                            // alert(data);
                            var compare = 'Compare ('+data+')';
                            $(".compare_product").html(compare);
                             
                           iziToast.success({
                                title: 'OK',
                                message: 'Successfully Added to Compare List!',
                                position: 'topRight',
                            }); 
                            // alert('Sucessfully Added to Your Compare List');
                        }
                       
                    });

                    /** End Data **/
           
}