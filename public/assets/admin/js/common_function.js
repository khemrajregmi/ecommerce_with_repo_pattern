/**
 * Created by drudge on 9/9/16.
 */

function deleteTableRow(deleteRow,route,token){
    $(deleteRow).click(function(){
        if(!$("input:checkbox").is(":checked")){
            new PNotify({
                title: 'Warning',
                text: 'No Data Selected. Please select data to delete.',
                hide: false,
                styling: 'bootstrap3'
            });
        }else{
            if(confirm("Are you sure you want to delete ??")){
                var id = [];
                $.each($("input[name='table_records']:checked"), function(){
                    id.push($(this).val());
                });
                // console.log(id);


                /** AJax Delete data ***/
                $.ajax({
                    type: "DELETE",
                    url:  route + "/" + id,
                    data:{
                        "_token":token
                    },
                    success: function(msg){
                        if(msg=='deleted')
                        {
                        new PNotify({
                            title: 'Success',
                            text: 'Data Deleted Successfully. Loading ....',
                            hide: false,
                            type:'success',
                            styling: 'bootstrap3'
                        });
                        setTimeout(function(){// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 2000);

                        }
                        if(msg=='cannot_deleted')
                        {
                        new PNotify({
                            title: 'Warning',
                            text: 'Cannot Delete Parennt This Item Contain Child !!! ....',
                            hide: false,
                            type:'success',
                            styling: 'bootstrap3'
                        });
                        setTimeout(function(){// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 2000);

                        }
                        },
                        error: function() {
                            setTimeout(function(){// wait for 5 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 1000);
                        }

                });

                /** Delete Data **/



            }
        }
    });


}



