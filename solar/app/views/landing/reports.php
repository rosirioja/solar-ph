<div class="row-fluid row-report">
	<div class="span8 offset2 well">
		<ul class="nav nav-tabs nav-justified ">
			<li><a class="li-sp">Solar Panel</a></li>
			<li><a class="li-bb">Battery Banks</a></li>
		</ul>

		<div class="table-sp">
		<table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <td>3</td>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
		</div>


		<div class="table-bb" style="display:hidden">
		<table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Rosiliza</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <td>3</td>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>

		</div>
	<div class="pull-right">
		<button class="btn btn-info"><i class="icon-download"></i> Download</button>
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
	});
</script>