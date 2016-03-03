$(document).ready(function () {
		$("#list_records").jqGrid({
			contentType: 'application/json; charset=UTF-8',
			url: "grid",
			datatype: "json",
			mtype: "POST",
			colNames: ["User Id","First Name", "Last Name",
						"Middle Name","Suffix",
						"Date of Birth","Email",
						"Employement","Employer","Gender",
						"Status","Residential Street",
						"Residential City","Residential State"
						,"Residential Phone no.","Office Street",
						"Office City","Office State",
						"Office Phone no.","Extra","Activate","Username",
						"Twitter"
						],
			colModel: [
				{ name: "id",align:"right",width:30,editable:true},
				{ name: "first",width:60,editable:true},
				{ name: "last",width:60,editable:true},
				{ name: "middle",width:60,editable:true},
				{ name: "suffix",width:60,editable:true},
				{ name: "dob",width:200,editable:true},
				{ name: "email",width:200,editable:true},
				{ name: "employement",width:100,editable:true},
				{ name: "employer",width:100,editable:true},
				{ name: "gender",width:50,editable:true},
				{ name: "status",width:60,editable:true},
				{ name: "rstreet",width:200,editable:true},
				{ name: "rcity",width:200,editable:true},
				{ name: "rstate",width:200,editable:true},
				{ name: "rphone",width:200,editable:true},
				{ name: "ostreet",width:200,editable:true},
				{ name: "ocity",width:200,editable:true},
				{ name: "ostate",width:200,editable:true},
				{ name: "ophone",width:200,editable:true},
				{ name: "extra",width:200,editable:true},
				{ name: "activate",width:50,editable:true,edittype:'checkbox'},
				{ name: "username",width:80,editable:true},
				{ name: "tweet",width:100,editable:true,formatter: 'showlink', 
					formatoptions: { 
							baseLinkUrl: 'javascript:',
							showAction: "Link('", addParam: "');"} }
				],
			pager: "#perpage",
			rowNum: 10,
			rowList: [10,20],
			sortname: "id",
			width : 1165,
    		shrinkToFit: false,
    		loadonce: true,
			sortorder: "asc",
			viewrecords: true,
			gridview: true,
			forceFit:true,
			caption: "Employee Details",
			editurl: "updategrid"
		});
		$('#list_records').navGrid('#perpage',
            { 
            	edit: true, 
            	add: false, 
            	del: true, 
            	search: true, 
            	refresh: true, 
            	view: true, 
            	position: "left", 
            	cloneToTop: true 
            });
	});

function Link(id) {
    var row = id.split("=");
    var row_ID = row[1];
    var tweet= $("#list_records").getCell(row_ID, 'tweet');
    console.log(row_ID);
    console.log(tweet);
    var request = 'tweetsearch';
    $.ajax({
      mtype: 'GET',
      url: request,
      dataType: 'html',
      data: {
        user: tweet
      },
      success: function( htmldata ) {
          $("#tweet").html(htmldata);
      }
	});	
	$(function() {
    	$( "#tweetdialog" ).dialog();
  	});
}