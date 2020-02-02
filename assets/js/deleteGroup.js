$(document).ready(function(){

function reload_table()
{
  dataTable.ajax.reload(null,false); //reload datatable ajax 
}


   // Check all
   $("#checkall").change(function(){
    // alert("1");
      var checked = $(this).is(':checked');
      if(checked){
         $(".checkbox").each(function(){
             $(this).prop("checked",true);
             $('.dataTables_paginate').hide();
         });
      }else{
         $(".checkbox").each(function(){
             $(this).prop("checked",false);
             $('.dataTables_paginate').show();
         });
      }
   });


   // Changing state of CheckAll checkbox 
   $(".checkbox").click(function(){

    // $('.dataTables_paginate').hide();

// alert("1");
      if($(".checkbox").length == $(".checkbox:checked").length) {
          $("#checkall").prop("checked", true);
          // $('.dataTables_paginate').hide();
      } else {
          $("#checkall").prop("checked",false);
          // $('.dataTables_paginate').show();
      }

   });

   // Delete button clicked
   $('#delete').click(function(){

      // Confirm alert
      var deleteConfirm = confirm("Are you sure?");
      if (deleteConfirm == true) {

         // Get grpid from checked checkboxes
         var grps_arr = [];
         $(".checkbox:checked").each(function(){
             var grpid = $(this).val();

             grps_arr.push(grpid);
         });

         // Array length
         var length = grps_arr.length;

         var hitURL = baseURL + "deleteBulkGroup";

		 // console.log(hitURL);  
   //   console.log(grps_arr);

         if(length > 0){

            // AJAX request
            $.ajax({
               url: hitURL,
               type: 'post',
               data: {grp_ids: grps_arr}
            }).done(function(data){

            	// Remove <tr>
            	$(".checkbox:checked").each(function(){
            	    var grpid = $(this).val();
                  // reload_table();
            	    // $('#tr_'+grpid).remove();
            	});
              $('.dataTables_paginate').show();
            reload_table();
            $("#checkall").prop("checked", false);
            if(data.status = true) { alert("Group successfully deleted"); }
            else if(data.status = false) { alert("Group deletion failed"); }
            else { alert("Access denied..!"); }
            // window.location = window.location.pathname;
            
          });
         }
      } 



   });





	$(document).on("click", ".deleteGroup", function(){
		var grup_id = $(this).data("grp-id"),
			hitURL2 = baseURL + "deleteGroup",
			currentRow = $(this);

		var confirmation = confirm("Are you sure to delete this Group ?");

		if(confirmation)
		{
			$.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL2,
			data : { grp_id : grup_id }
			}).done(function(data){

        // reload_table();
        // $('#GroupTable').DataTable().ajax.reload();
				console.log(data);
				currentRow.parents('tr').remove();


				if(data.status = true) { alert("Group successfully deleted"); }
				else if(data.status = false) { alert("Group deletion failed"); }
				else { alert("Access denied..!"); }

        reload_table();
			});
		}

	});


});
