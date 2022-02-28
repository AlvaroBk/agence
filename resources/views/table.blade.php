@extends('layouts.main')
@section('main')
<div class="content-wrapper">
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					@if ($message = Session::get('message'))
						<div class="alert alert-success">
							<strong>{{ $message }}</strong>
						</div>
					@endif
					<h4 class="card-title"></h4>
					<button type="button" class="btn btn-primary btn-sm btn-rounded" name="consultor"  value="1" onclick="getData(this.value);">Consultor</button>
					<button type="button" class="btn btn-primary btn-sm btn-rounded" name="consultor"  value="2" onclick="getData(this.value);">Cliente</button>
					
					<div class="table-responsive pt-3">
						<table class="table table-bordered" id="table">
							<thead>
								<tr>
									<th>Periodo</th>
									<th colspan='2' ><input type="date" id="from" name="from" style="width:170px;"> a
										   <input type="date" id="to" name="to" style="width:170px;">
									</th>
							
								</tr>
							</thead>
							<tbody >
								<tr>
									<td id='owner'></td>
									<td >
										<div class="container px-4" >
											<div class="row gx-5">
												<div class="col" >
													<div class="p-3 border bg-light"  style="height: 150px;">
														<select name="from"  id="multiselect" class="select" multiple="multiple" >
														</select>		
													</div>
													
												</div>
												<div style="margin-top:40px;">
												<p><button type="button" id="multiselect_rightSelected" class="btn btn-primary btn-sm mdi mdi-arrow-right"></button></p>
												<p><button type="button" id="multiselect_leftSelected" class="btn btn-primary btn-sm mdi mdi-arrow-left"></button></p>
												</div>
												<div class="col">
													<div class="p-3 border bg-light overflow-auto" style="height: 150px;">
													<select name="to[]" id="multiselect_to"   multiple="multiple"></select>
													
												</div>
											</div>
										</div>
									</td>

								</tr>	
							</tbody>
						</table>
					</div>
					<div >
							<button type="button" class="btn btn-primary btn-sm " onclick="getValues();">Relatório</button>
							<button type="button" class="btn btn-primary btn-sm " onclick="getCharts();">Grafico</button>
							<button type="button" class="btn btn-primary btn-sm mdi" onclick="getChartPie();">Pizza</button>
					</div>	
				</div>
				<div class="card-body" >
					<div class="table-responsive pt-3" id="receitas">
						
					</div>
					<div class="col-lg-6 grid-margin stretch-card">             
						
					<canvas id="chart" width="400" height="200"></canvas>
					<canvas id="pie" width="200" height="200"></canvas>
					
					</div>
				</div>
                

			</div>
		</div>
	</div>	
</div>
<link rel="stylesheet" href="{{ asset('css/multi-form.css') }}">
<link rel="stylesheet" href="{{ asset('css/searchbox.css') }}">
<link rel="stylesheet" href="{{ asset('css/demo.css') }}">
<script src="{{ asset('js/search.js') }}"></script>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="js/multiselect.js"></script>
  
<script>
	
async function getData(id){

        $(".circle").addClass("active");
        var url = '{{ route("dataget", ":id") }}',

        url = url.replace(':id', id);
        $.ajax({
            type:"GET",
            url: url,
            processData: false, // Preventing default data parse behavior
            contentType: false,//"application/json",
            success:function(response){
            
			var option = '', result=response
			div = ' ';
            $(".circle").removeClass("active");
           
             dataResult=result.data;
			 owner=response.owner;
				       
             var div="";
			 var owner=owner;
             
             div=``
			 		
					dataResult.forEach((element, index) => { 
				
				div+=  `
				         <option value="`+element.user+`">`
				          +element.user+`
						  </option>`;
			});   
			
               document.getElementById("multiselect").innerHTML = div;
			   document.getElementById("owner").innerHTML = owner;

           },
           
        });


    }

	$('.select').multiselect();

	async function getValues(){

		var selected = [];
    for (var option of document.getElementById('multiselect_to').options)
    {
        if (option) {
            selected.push(option.value);
        }
    }
    var code = $(this).attr('data-code');
	var from= document.getElementById("from").value;
	var to= document.getElementById("to").value;
	var owner=document.getElementById("table").rows[1].cells.item(0).innerHTML;
         
        $.ajax({
            type: 'GET',
            url: "{{ route('get.report') }}",
            data: {code: code,selected: selected,"_token": "{{ csrf_token() }}",from:from,to:to,owner:owner},
            dataType: 'json',
            success: function (response) {
				var result=response,div="",perc="",receitaL="",mult="",
				vl="",perc_comissao="",comissao="",lucro="",lucroaux="";
				dataResult=result.receitas;
				owner=result.owner;

				if(owner=='consultor'){
				div=`<table class="table table-bordered" id="table">`
						dataResult.forEach((element, index) => {
							div+=`	<thead>
							
							<tr>
								<th colspan='5'>`+element.no_usuario+`</th>
							</tr>
						
								<tr>
									<th>Periodo</th>
									<th>Receita Líquida</th>
									<th>custo fixo</th>
									<th>Comissão</th>
									<th>Lucro</th>
								
								</tr>
							</thead>`
						
				
				div+=  `<tbody >`
				         
					dataResult.forEach((element, index) => {
						perc=100/element.total_imp_inc;
						receitaL=element.valor-perc; 
						mult=element.valor*element.total_imp_inc;
						vl=element.valor-mult;
						perc_comissao=100/element.comissao_cn;
						comissao=vl*perc_comissao;
						lucroaux=element.brut_salario+comissao;
						lucro=receitaL-lucroaux;
						div+=`	<tr >
									<td >`+element.data_emissao+`</td>
									<td >`+receitaL+`</td>
									<td >`+element.brut_salario+`</td>
									<td >`+comissao+`</td>
									<td >`+lucro+`</td>
									</tr>`
								});`
									
							</tbody>`
						});`
						</table>`;
			   

				}else{
					
				
				
				div+=  `
				<table class="table table-bordered" id="table">`
				dataResult.forEach((element, index) => {
					div+=`<thead>
							
						<tr>
							<th>Periodo</th>
								
								<th>`+element.no_razao+`</th>
								
						</tr>
							
					</thead>
					
					<tbody>`
							dataResult.forEach((element, index) => {
							perc=100/element.total_imp_inc;
							receitaL=element.valor-perc; 
					div+=`	<tr >
							<td >`+element.data_emissao+`</td>
							<td >`+receitaL+`</td>
							</tr>`
					});`	
							</tbody>`
						});	`
						</table>`;
			   
				}
				
				
			document.getElementById("receitas").innerHTML = div;	
				
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
		
	}

	async function getCharts(){

		var selected = [];
		for (var option of document.getElementById('multiselect_to').options)
		{
		if (option) {
			selected.push(option.value);
		}
		}
		var code = $(this).attr('data-code');
		var from= document.getElementById("from").value;
		var to= document.getElementById("to").value;
		var owner=document.getElementById("table").rows[1].cells.item(0).innerHTML;


		$.ajax({
			type: 'GET',
			url: "{{ route('get.graph') }}",
			data: {code: code,selected: selected,"_token": "{{ csrf_token() }}",from:from,to:to,owner:owner},
			dataType: 'json',
			success: function (response) {
				var div="", result=response,
				 nome=new Array(),
				 valor=new Array(),
				 custo=new Array(),
				 custo_medio="",
				 custoT="",
				 count="",
			    dataResult=result.graph;
                 
				 dataResult.forEach((element, index) => {
					 nome.push(element.nome);
					 valor.push(element.valor);
					 custo.push(element.brut_salario);
                     custoT +=custo[0];
					 count += index+1
				 });
                    
				console.log(custo_medio=custoT/count);
				var ctx = document.getElementById("chart").getContext('2d');
                var myChart = new Chart(ctx, {
		
				type: "bar",
				data: {
					labels: nome,
					datasets: [
					{
						type: "bar",
						backgroundColor: "rgba(54, 162, 235, 0.2)",
						borderColor: "rgba(54, 162, 235, 1)",
						borderWidth: 1,
						label: "一",
						data: valor
					},
					{
						type: "line",
						label: "",
						data: custo_medio,
						lineTension: 0, 
						fill: true 
					}
					]
				
                  },
                 
              });
				

	},
	error: function (data) {
		console.log('Error:', data);
	}
});

}

async function getChartPie(){

var selected = [];
for (var option of document.getElementById('multiselect_to').options)
{
	if (option) {
	selected.push(option.value);
	}
}
var code = $(this).attr('data-code');
var from= document.getElementById("from").value;
var to= document.getElementById("to").value;
var owner=document.getElementById("table").rows[1].cells.item(0).innerHTML;


$.ajax({
type: 'GET',
url: "{{ route('get.pie') }}",
data: {code: code,selected: selected,"_token": "{{ csrf_token() }}",from:from,to:to,owner:owner},
dataType: 'json',
success: function (response) {
	var div="", result=response,
		nome=new Array(),
		percentage=new Array()
		valor=new Array(),
		dataResult=result.pie;
		
		dataResult.forEach((element, index) => {
			perc=100/element.total_imp_inc;
			receitaL=element.valor-perc;

			nome.push(element.nome);
			valor.push(receitaL);
			
			
		});
			
		console.log(nome);
		
		var pieData = document.getElementById("pie");
		var pieValues = {
			labels: nome,
			datasets: [
				{
					data: valor,
					backgroundColor: [
						"#FF6384",
						"#63FF84",
						"#84FF63",
						"#8463FF",
						"#6384FF"
					]
				}]
		};

		var pieChart = new Chart(pieData, {
		type: 'pie',
		data: pieValues
		});
		},
		error: function (data) {
		console.log('Error:', data);
		}
		});

}


	

</script>
@endsection
	