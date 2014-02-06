<div class="row-fluid row-report">
	<div class="span8 offset2 well">
		<ul class="nav nav-tabs nav-justified ">
			<li><a class="li-sp">Solar Panel</a></li>
			<li><a class="li-bb">Battery Banks</a></li>
		</ul>

   


		<div class="table-sp">

	 <div class="row-fluid">
      <div class="span10">

    <table class="table table-condensed table-bordered table-striped">
    <tr>
    <td>
    <small class='font'><strong>From:</strong> </small>
  </td>
  <td>
    <input class="input-medium datefrom" type="date" />
    </td>
    <td>
      <small class='font'><strong>To:</strong> </small>
    </td>
    <td>
    <input class="input-medium dateto" type="date" />
    </td>
    </tr>
  </table>
      </div>
    <div class="span2 ok-div">
          <button class="btn btn-block btn btn-info ok-button-sp" style="text-align:center; margin-top:-10px; margin-left:15px;"><i class="icon-ok"></i> Ok</button>
    </div> 
  
      
  </div> 

  	<table class="table table-condensed table-bordered table-striped">
        <thead>
          <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Temperature (&deg;C) </th>
            <th>Voltage (Volts)</th>
            <th>Current (Amperes)</th>
            <th>Power (Watts)</th>
          </tr>
        </thead>
        <tbody class="show-sp">
        </tbody>
      </table>
		</div>


		<div class="table-bb" style="display:hidden">
       <div class="row-fluid">
      <div class="span10">

    <table class="table table-condensed table-bordered table-striped">
    <tr>
    <td>
    <small class='font'><strong>From:</strong> </small>
  </td>
  <td>
    <input class="input-medium datefrom" type="date" />
    </td>
    <td>
      <small class='font'><strong>To:</strong> </small>
    </td>
    <td>
    <input class="input-medium dateto" type="date" />
    </td>
    </tr>
  </table>
      </div>
    <div class="span2 ok-div">
          <button class="btn btn-block btn btn-info ok-button-bb" style="text-align:center; margin-top:-10px; margin-left:15px;"><i class="icon-ok"></i> Ok</button>
    </div> 
  
      
  </div> 
		<table class="table table-condensed table-bordered table-striped">
        <thead>
          <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Voltage (Volts)</th>
            <th>Current (Amperes)</th>
            <th>Power (Watts)</th>
          </tr>
        </thead>
        <tbody class="show-bb">
        </tbody>
      </table>

		</div>
	<div class="pull-right">
		<!-- <button class="btn btn-info"><i class="icon-download-alt"></i> Download</button> -->
	</div>
	</div>
	<div class="span2"></div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.table-sp').show();
		$('.table-bb').hide();

		$('.li-sp').click(function(){
			$('.table-sp').show();
			$('.table-bb').hide();
		});

		$('.li-bb').click(function(){
			$('.table-sp').hide();
			$('.table-bb').show();
		});


  $('.ok-button-sp').click(function(){
    /*alert("solar panel");*/
    $('.show-sp').empty();
    $('.append-tr-sp').remove();
    /*console.log($(this).parent().prev().find('table tr td').find('.datefrom').val());*/
    
    $.ajax({
      url: "report/summarysp",
      type: "GET",
      data: {  
        datefrom: $(this).parent().prev().find('table tr td').find('.datefrom').val(),
        dateto: $(this).parent().prev().find('table tr td').find('.dateto').val()
      },
      success: function(data){
        console.log(data);
    $('.append-tr-sp').remove();
        $(".show-sp").after(data);
        }
    });
  });

  $('.ok-button-bb').click(function(){
    /*alert("battery bank");*/
    $('.show-bb').empty();
    $('.append-tr-bb').remove();
    /*console.log($(this).parent().prev().find('table tr td').find('.datefrom').val());*/
    
    $.ajax({
      url: "report/summarybb",
      type: "GET",
      data: {  
        datefrom: $(this).parent().prev().find('table tr td').find('.datefrom').val(),
        dateto: $(this).parent().prev().find('table tr td').find('.dateto').val()
      },
      success: function(data){
        console.log(data);
    $('.append-tr-bb').remove();

        $(".show-bb").after(data);
        }
    });
  });


	});
</script>